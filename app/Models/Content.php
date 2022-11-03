<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Content extends Model
{
        
    public static function boot()
    {
        parent::boot();
        // Update field update_by with current user id each time article is updated.
        static::creating(function ($thismodel) {
            $thismodel->created_by = \Auth::user()->id;
        });

        // Update field update_by with current user id each time article is updated.
        static::updating(function ($thismodel) {
            $thismodel->last_updated_by = \Auth::user()->id;
        });
    }

    public function faqs()
    {
        return $this->hasMany(ContentFaq::class);
    }

    public function parent_faqs()
    {
        return $this->hasMany(ContentFaq::class)
            ->whereNull('parent_id');
    }


    /**
     * Display faqs.
     *
     * @param int      $contentId
     * @param string|null $type
     * @param array       $options
     *
     * @return string
     */
    public static function faqDisplay($contentId, $type = null, array $options = [])
    {
        // GET THE CONTENT - sort collection in blade
        $content = static::where('id', '=', $contentId)
            ->with(['parent_faqs.children' => function ($q) {
                $q->orderBy('order');
            }])
            ->first();
       
        // Check for content Existence
        if (!isset($content->parent_faqs)) {
            return false;
        }

        // Convert options array into object
        $options = (object) $options;

        $items = $content->parent_faqs->sortBy('order');

        if ($type == 'admin') {
            $type = 'voyager::contents.partial.'.$type;
        } else {
            if (is_null($type)) {
                $type = 'voyager::contents.partial.default';
            } elseif ($type == 'bootstrap' && !view()->exists($type)) {
                $type = 'voyager::contents.partial.bootstrap';
            }
        }

        if ($type === '_json') {
            return $items;
        }

        return new \Illuminate\Support\HtmlString(
            \Illuminate\Support\Facades\View::make($type, ['items' => $items, 'options' => $options])->render()
        );
    }



}
