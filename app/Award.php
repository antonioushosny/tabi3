<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Award extends Model
{
    use Notifiable;

    protected $fillable = [
        'title_ar','title_en','coupons','image','expiry_date','status'
    ];

}
