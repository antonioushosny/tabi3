<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'title','cost','images','video','allow_messages','allow_call','without_number','republish','not_disturb','numbers','lat','lng','views','favorites','likes','star','address','status','category_id','sub_id','country_id','city_id','area_id','user_id','from','to','expiry_date','install','cost_advertising','cost_benefits','total','disc'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }
    public function area()
    {
        return $this->belongsTo('App\Area','area_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory','sub_id');
    }
}


 	 																																	