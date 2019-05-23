<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $fillable = [
        'user_name', 'name','email', 'password','mobile','birth_date','job','gender','points','coupons','interested','image','device_token','role','status','available','country_id','type','city_id'
    ];

    protected $hidden = [
        'password',
        //  'remember_token',
    ];
    public function generateToken()
    {
        $this->remember_token = str_random(60);
        $this->save();
        return $this->api_token;
    }
    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }                                      
    public function products()
    {
        return $this->hasMany('App\Product', 'client_id');
    }

    public function clientorders()
    {
        return $this->hasMany('App\Order', 'client_id');
    }

    public function userorders()
    {
        return $this->hasMany('App\Order', 'user_id');
    }
}
