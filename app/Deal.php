<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Notifications\doctornotify;

class Deal extends Model
{
    use Notifiable;

    protected $fillable = [
        'title_ar','title_en','original_price','initial_price','points','tickets','tender_cost','tender_edit_cost','tender_coupon','	disc_ar','disc_en','info_ar','info_en','image','images','expiry_date','status','category_id','sub_id','country_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Categories','category_id');
    }
    public function sub_category()
    {
        return $this->belongsTo('App\SubCategories','sub_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

}
