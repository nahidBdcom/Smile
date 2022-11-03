<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use App\Models\User;


class TestController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('welcome');
    }

    public function digitsBetween(){
        return view('test.digit_between');
    }

    public function digitsBetweenPost(Request $request){
        $rules = [
            'fnumber' => ['required', 'numeric', 'digits_between:2,5'],
            'snumber' => ['required', 'numeric', 'between:2,7'],
        ];

        $messages = [];
        $attributes =[
            'fnumber' => 'First Number',
            'snumber' => 'Second Number',
        ];
        $validator =Validator::make($request->all(),$rules, $messages ,$attributes);

        if(!$validator->passes()){
            echo "<pre>";
            print_r($validator->errors());
            //return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
         else
        {
            echo "<h1>Success</h1>";
        }


        //return view('test.digit_between');
    }
}
