<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class District extends Model
{
    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($district) {
            $district->order = $district->highestOrderDistrict();
            $district->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($district) {
            $district->last_updated_by = \Auth::user()->id;
        });
    }


    /**
     * Return the Highest Order District.
     *
     * 
     *
     * @return number Order number
     */
    public function highestOrderDistrict()
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
