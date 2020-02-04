<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DelegateLocation extends Model
{
    protected $table = 'delegate_locations';

    protected $fillable = [
        'location_id','delegate_id',
    ];

    public function delegate()
    {
        return $this->belongsTo('App\Delegate','delegate_id');
    }
    public function location()
    {
        return $this->belongsTo('App\Location','location_id');
    }

    
}
