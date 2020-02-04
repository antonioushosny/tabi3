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
        'user_name', 'name','email', 'password','mobile','address','desc','lat','lng','image','device_token','role','status','available','type','lang','mobile_code','image','country_id'
    ];

     /**
     * Set services's image.
     * 
     * @param string $file
     */
    public function setImageAttribute($file)
    {
        
        if ($file) {
            if (is_string($file)) {
                $this->attributes['image'] = $file;
            } else {
                 
                $image = $file;
                $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $name);
                $this->attributes['image'] = $name;

            }
        } else {
            $this->attributes['image'] = null;
        }
    }
    public function routeNotificationForWhatsApp()
    {
      return $this->mobile;
    }
    public function routeNotificationForChatAPI()
    {
        return $this->mobile;
    }
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
}
