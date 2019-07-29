<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Package extends Model
{
    use Notifiable;

    protected $fillable = [
        'title_ar','title_en','type','page','cost','status'
    ];

    public function advertisments()
    {
        return $this->hasMany('App\Advertisment','package_id');
    }
}
