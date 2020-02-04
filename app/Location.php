<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'title_ar','title_en','status','country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function delegates()
    {
        return $this->belongsToMany('App\Delegate', 'delegate_locations', 'location_id', 'delegate_id');
    }
}
