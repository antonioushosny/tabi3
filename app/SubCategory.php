<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'title_ar','title_en','cost','days','image','status','category_id'
    ];
    public function sons_category()
    {
        return $this->hasMany('App\SubCategory','parent_id')->with('sons_category');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id') ;
    }
}

