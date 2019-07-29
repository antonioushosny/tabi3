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
        'user_name', 'name','email', 'password','mobile','address','desc','fax','lat','lng','image','device_token','role','status','available','type','lang','department_id'
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
   
}
