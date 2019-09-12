<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Area extends Model
{
    use Notifiable;

    protected $fillable = [
        'name_ar','name_en','image','status','city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }
}
