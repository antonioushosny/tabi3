<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'image','status','link','title','type','page','package_id','user_id','number','cost','total','start_date','expiry_date'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function package()
    {
        return $this->belongsTo('App\Package','package_id');
    }
}

