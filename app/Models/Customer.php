<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    public function reviews(){
        return $this->hasMany(CustomerReview::class, 'customer_review_id','id');
    }
    
    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
