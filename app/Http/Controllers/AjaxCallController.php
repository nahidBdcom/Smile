<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerReview;

class AjaxCallController extends Controller
{
    public function user_location_rating_wise(Request $request)
    {
        $customerReviews = CustomerReview::join('customers','customer_reviews.customer_id','customers.id')
        ->when($request->data['district'], function($query) use ($request){
            $query->where('customers.district_id', $request->data['district']);
        })
        ->when($request->data['rating'], function($query) use ($request){
            $query->where('ratings',$request->data['rating'])->where('show_at_home',1);
        })
        ->get();

        return view('partials.hompage_review_slider_sub',compact('customerReviews'));
    }
}
