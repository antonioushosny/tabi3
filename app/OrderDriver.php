<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDriver extends Model
{
    protected $fillable = [
        'status','reason','accept_date','decline_date','center_id','order_id','driver_id'
    ];

    public function center()
    {
        return $this->belongsTo('App\User','center_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order','order_id');
    }
    public function driver()
    {
        return $this->belongsTo('App\User','driver_id');
    }
}
