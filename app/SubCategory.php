<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SubCategory extends Model
{
    use Notifiable;

    protected $fillable = [
        'name_ar','name_en','image','status','disc_ar','disc_en','category_id'
    ];

    public function deals()
    {
        return $this->hasMany('App\Deal','sub_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

}
