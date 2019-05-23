<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Term extends Model
{
    use Notifiable;
    protected $table = 'terms';

    protected $fillable = [
        'title','disc','status'
    ];

}
