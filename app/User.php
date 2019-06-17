<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\MailResetPasswordNotification;
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $fillable = [
        'company_name', 'name','email', 'password','mobile','address','desc','join_date','city','area','lat','lng','image','device_token','role','status','available','country_id','type','city_id','provider_id','center_id','area_id'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }
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
    public function City()
    {
        return $this->belongsTo('App\City','city_id');
    }             
    public function Area()
    {
        return $this->belongsTo('App\Area','area_id');
    }                            
    public function usersorders()
    {
        return $this->hasMany('App\Order', 'user_id');
    }
    public function centersorders()
    {
        return $this->hasMany('App\Order', 'center_id');
    }
    public function driversorders()
    {
        return $this->hasMany('App\Order', 'driver_id');
    }
    public function centers()
    {
        return $this->hasMany('App\User', 'provider_id');
    }
    public function provider()
    {
        return $this->belongsTo('App\User','provider_id');
    } 
    public function center()
    {
        return $this->belongsTo('App\User','center_id');
    } 
    public function containers()
    {
        return $this->belongsToMany('App\Container', 'center_containers', 'center_id', 'container_id')->withPivot('price');; 
    }
    public function centercontainer()
    {
        return $this->belongsTo('App\CenterContainer','center_id');
    } 
}
