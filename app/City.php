<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class City extends Model
{
    use Notifiable;

    protected $fillable = [
        'name_ar','name_en','image','status','country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function areas()
    {
        return $this->hasMany('App\Area','city_id');
    }
}
