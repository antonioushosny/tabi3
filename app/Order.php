<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_name','user_mobile','city','area','let','lang','container_name_ar','container_name_en','container_size','no_container','notes','status','user_id','center_id','driver_id','container_id','price','total'
    ];

    public function center()
    {
        return $this->belongsTo('App\User','center_id');
    }
    public function container()
    {
        return $this->belongsTo('App\Container','container_id');
    } 
    public function centers()
    {
        return $this->hasMany('App\OrderCenter','order_id')->with('center');
    }
    public function drivers()
    {
        return $this->hasMany('App\OrderDriver','order_id')->with('driver');
    }
}
																
