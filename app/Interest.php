<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Interest extends Model
{
    use Notifiable;

    protected $fillable = [
        'title_ar','title_en','image','status'
    ];

    public function users()
    {
        return $this->hasMany('App\UserInterest','interest_id');
    }
}
