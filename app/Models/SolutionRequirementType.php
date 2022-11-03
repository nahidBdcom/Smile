<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SolutionRequirementType extends Model
{
    

    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($thismodel) {
            $thismodel->order = $thismodel->highestOrderThisModel();
            $thismodel->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($thismodel) {
            $thismodel->last_updated_by = \Auth::user()->id;
        });
    }




    /**
     * Return the Highest Order of this Model
     *
     * 
     *
     * @return number Order number
     */
    public function highestOrderThisModel()
    {
        $order = 1;

        $item = $this->orderBy('order', 'DESC')
            ->first();

        if (!is_null($item)) {
            $order = intval($item->order) + 1;
        }

        return $order;
    }
}
