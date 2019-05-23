<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ContactUs extends Model
{
    use Notifiable;
    protected $table = 'contact_us';

    protected $fillable = [
        'name','email','title','message','status'
    ];

}
