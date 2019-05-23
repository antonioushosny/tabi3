<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Model
{
    use Notifiable;

    protected $fillable = [
        'name_ar','name_en','image','status','disc_ar','disc_en'
    ];

    public function deals()
    {
        return $this->hasMany('App\Deal','category_id');
    }

    public function sub_categories()
    {
        return $this->hasMany('App\SubCategory','category_id');
    }

}
