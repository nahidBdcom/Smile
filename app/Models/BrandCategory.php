<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BrandCategory extends Model
{

    public function brands(){
        return $this->hasMany(Brand::class,'brand_category_id','id');
    }
    
}
