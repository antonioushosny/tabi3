<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Charge extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_name','package','points','package_id','user_id'
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
