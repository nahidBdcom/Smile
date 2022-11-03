<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class NetworkCoverage extends Model
{


    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($networkcoverage) {
            $networkcoverage->order = $networkcoverage->highestOrderNetworkCoverage();
            $networkcoverage->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($networkcoverage) {
            $networkcoverage->last_updated_by = \Auth::user()->id;
        });
    }




    /**
     * Return the Highest Order Network Coverage.
     *
     * 
     *
     * @return number Order number
     */
    public function highestOrderNetworkCoverage()
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
