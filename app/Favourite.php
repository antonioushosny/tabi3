<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $fillable = [
        'user_id','ad_id'
    ];
    public function ad()
    {
        return $this->belongsTo('App\Advertisement','ad_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
