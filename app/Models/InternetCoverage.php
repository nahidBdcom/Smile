<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InternetCoverage extends Model
{
    


    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($internetcoverage) {
            $internetcoverage->order = $internetcoverage->highestOrderInternetCoverage();
            $internetcoverage->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($internetcoverage) {
            $internetcoverage->last_updated_by = \Auth::user()->id;
        });
    }




    /**
     * Return the Highest Order Network Coverage.
     *
     * 
     *
     * @return number Order number
     */
    public function highestOrderInternetCoverage()
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
