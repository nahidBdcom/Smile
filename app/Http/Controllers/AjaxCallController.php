<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentFaq;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\CustomerReview;

class AjaxCallController extends Controller
{
    public function user_location_rating_wise(Request $request)
    {
        $customerReviews = CustomerReview::join('customers','customer_reviews.customer_id','customers.id')
        ->where('customer_reviews.status',1)
        ->when($request->data['district'], function($query) use ($request){
            $query->where('customers.district_id', $request->data['district']);
        })
        ->when($request->data['rating'], function($query) use ($request){
            $query->where('ratings',$request->data['rating']);
        })
        ->when($request->data['pagination'] == "false", function($query) use ($request){
            $query->where('show_at_home',1);
        })
        ->when($request->data['pagination']=="true", function($query) use ($request){
            $query->paginate(10);
        })
        ->get();

        if($request->data['pagination']){
            return view('partials.hompage_review_page_sub',compact('customerReviews'));
        }else{
            return view('partials.hompage_review_slider_sub',compact('customerReviews'));
        }

    }

    public function contents_faqs(Request $request)
    {
        $faqs = ContentFaq::select('*')
                ->when($request->post_data['content_id'], function($query) use ($request){
                    $query->where('content_id',$request->post_data['content_id']);
                })
                ->where('status',1)
                ->orderBy('order')
                ->limit(10)
                ->get();
        return view('faqs_ajax_call', compact('faqs'));
    }
}
