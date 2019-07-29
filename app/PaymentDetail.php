<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PaymentDetail extends Model
{
    use Notifiable;

    protected $fillable = [
        'title','amount','date','user_id','file','image','payment_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function payment()
    {
        return $this->belongsTo('App\Payment','payment_id');
    }
}
