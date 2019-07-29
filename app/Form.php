<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    
    protected $fillable = [
        'title','file','image','amount','user_id','type'
    ];
   
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
