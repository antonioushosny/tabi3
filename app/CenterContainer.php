<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CenterContainer extends Model
{
    use Notifiable;

    protected $fillable = [
        'center_id','container_id','price'
    ];

    public function center()
    {
        return $this->belongsTo('App\User','center_id');
    }

    public function container()
    {
        return $this->belongsTo('App\Container','container_id');
    }
}
