<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Package extends Model
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

    public function category()
    {
        return $this->belongsTo(PackageCategory::class);
    }

    public function faqs()
    {
        return $this->hasMany(PackageFaq::class);
    }

    public function parent_faqs()
    {
        return $this->hasMany(PackageFaq::class)
            ->whereNull('parent_id');
    }


    /**
     * Display faqs.
     *
     * @param int      $packageId
     * @param string|null $type
     * @param array       $options
     *
     * @return string
     */
    public static function faqDisplay($packageId, $type = null, array $options = [])
    {
        // GET THE PACKAGE - sort collection in blade
        $package = static::where('id', '=', $packageId)
            ->with(['parent_faqs.children' => function ($q) {
                $q->orderBy('order');
            }])
            ->first();
       
        // Check for Package Existence
        if (!isset($package->parent_faqs)) {
            return false;
        }

        // Convert options array into object
        $options = (object) $options;

        $items = $package->parent_faqs->sortBy('order');

        if ($type == 'admin') {
            $type = 'voyager::packages.partial.'.$type;
        } else {
            if (is_null($type)) {
                $type = 'voyager::packages.partial.default';
            } elseif ($type == 'bootstrap' && !view()->exists($type)) {
                $type = 'voyager::packages.partial.bootstrap';
            }
        }

        if ($type === '_json') {
            return $items;
        }

        return new \Illuminate\Support\HtmlString(
            \Illuminate\Support\Facades\View::make($type, ['items' => $items, 'options' => $options])->render()
        );
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
