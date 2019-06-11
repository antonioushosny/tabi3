<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    protected $fillable = [
        'name_ar','name_en','image','status','size','desc_ar','desc_en'
    ];
    public function centers()
    {
        return $this->belongsToMany('App\User', 'center_containers', 'container_id', 'center_id')->withPivot('price');; 
    }
}
