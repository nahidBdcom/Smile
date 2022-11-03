<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProblemType extends Model
{
        
    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($thismodel) {
            //$thismodel->order = $thismodel->highestOrderThisModel();
            $thismodel->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($thismodel) {
            $thismodel->last_updated_by = \Auth::user()->id;
        });
    }


}
