<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Address extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $fillable = [
        'title', 'disc','zip_code', 'user_id','country_id','city_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }                                      
    public function user()
    {
        return $this->hasMany('App\User', 'user_id');
    }

}
