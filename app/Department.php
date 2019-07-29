<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'title_ar','title_en','image','status'
    ];
    public function companies()
    {
        return $this->hasMany('App\User', 'department_id');
    }
}
