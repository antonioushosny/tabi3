<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sponsor extends Model
{
    use Notifiable;

    protected $fillable = [
        'image','link','title','status'
    ];

}
