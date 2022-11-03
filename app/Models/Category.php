<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function parent_faqs()
    {
        return $this->hasMany(PackageFaq::class)
            ->whereNull('parent_id');
    }

}
