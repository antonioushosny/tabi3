<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'title','file','image','amount','user_id'
    ];
   
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
																
