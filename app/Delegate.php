<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Delegate extends Model
{
    use Notifiable;

    protected $fillable = [
        'name','image','mobile','status'
    ];
    public function locations()
    {
        return $this->belongsToMany('App\Location', 'delegate_locations', 'delegate_id', 'location_id');
    }

}
