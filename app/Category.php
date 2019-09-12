<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title_ar','title_en','cost','days','image','status'
    ];
    public function sub_categories()
    {
        return $this->hasMany('App\SubCategory','category_id')->with('sons_category');
    }
    
}

