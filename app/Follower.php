<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id','follower_id'
    ];
    public function follower()
    {
        return $this->belongsTo('App\User','follower_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
