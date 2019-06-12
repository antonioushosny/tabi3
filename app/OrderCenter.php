<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCenter extends Model
{
    protected $fillable = [
        'status','reason','accept_date','decline_date','center_id','order_id'
    ];

    public function center()
    {
        return $this->belongsTo('App\User','center_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order','order_id');
    }
}
