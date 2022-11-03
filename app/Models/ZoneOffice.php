<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ZoneOffice extends Model
{
    
    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($zoneoffice) {
            $zoneoffice->order = $zoneoffice->highestOrderZoneOffice();
            $zoneoffice->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($zoneoffice) {
            $zoneoffice->last_updated_by = \Auth::user()->id;
        });
    }




    /**
     * Return the Highest Order Zone Office.
     *
     * 
     *
     * @return number Order number
     */
    public function highestOrderZoneOffice()
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
