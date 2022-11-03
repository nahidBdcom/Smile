<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
//use Illuminate\Foundation\Http\FormRequest;

//use Illuminate\Support\Facade\DB;

use App\Helpers\UserSystemInfoHelper;
use App\Helpers\SmileFunctionHelper;

use App\Models\Content;
use App\Models\ContentFaq;
use App\Models\District;
use App\Models\Package;
use App\Models\InternetCoverage;
use App\Models\GetInformationRequest;
use App\Models\ConnectivityApplication;


class ConnectivityController extends Controller
{
    public function index(){
        $mainContent = Content::where('slug', "connectivity")->where('status', 1)->firstOrFail();
        $faqs = ContentFaq::where('content_id', $mainContent->id)->where('status', 1)->orderBy('order')->get();
        $districts = District::where('status', 1)->orderBy('name')->get();
        $packages = Package::where('status', 1)->orderBy('order')->get();
        //$mainFAQs = ;
        //dd($mainContent);


        return view('connectivity', compact('mainContent','faqs','districts','packages'));
    }

    public function districtLocality(Request $request){
        $rules = [
            'district' => ['required', 'regex:/^[0-9]+$/'],
        ];
        $validator =Validator::make($request->all(),$rules);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>1, 'message'=>"invalied Data"]);
        }
        $locality = InternetCoverage::select('id','title as text')->where('district_id', $request->input('district'))->where('status', 1)->orderBy('title')->get();
        if(!count($locality)){
            return response()->json(['status'=>0, 'error'=>0, 'message'=>"No Data Found"]);
        }
        return response()->json(['status'=>1, 'error'=>0, 'message'=> count($locality) ." Records Found", 'data'=>$locality]);
        
    }

    public function storeUserConnectivityApplicationInfo(Request $request)
    {
        $tmpInput = $request->all();
        $tmpInput['name']= trim(strip_tags($request->input('name')));
        $tmpInput['phone'] = trim(strip_tags($request->input('phone')));
        $tmpInput['email'] = trim(strip_tags($request->input('email')));
        $tmpInput['address'] = trim(strip_tags($request->input('address')));
        $tmpInput['referral'] = trim(strip_tags($request->input('referral')));
        $request->replace($tmpInput);

        $rules = [
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\+])([0-9\s]*)$/',  'min:8'],
            'email' => ['required', 'email:rfc,dns', 'max:50'],
            'district' => ['required', 'integer', 'min:1'],
            'locality' => ['required', 'integer', 'min:1'],
            'package' => ['required', 'integer', 'min:1'],
            'policy' => ['accepted'],
        ];

        $messages = [];
        $attributes =[
            'name' => 'Name',
            'phone' => 'Phone Number',
            'email' => 'Email Address',
            'locality' => 'Area/Locality',
            'package' => 'Desired Package',
            'policy' => 'Agree with the privacy policy',
        ];
        $validator =Validator::make($request->all(),$rules, $messages ,$attributes);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
         else
        {
		$browser = get_browser(null, true);

		$isemailed =0 ;
		$emailed_to ='' ;
		$is_sent_by_api = 0;
		$api_request_data = '' ;
		$api_reply_data = '' ;

            $connectivityApplication = new ConnectivityApplication;
            $connectivityApplication->name = $request->name;
            $connectivityApplication->phone = $request->phone;
            $connectivityApplication->email = $request->email;
            $connectivityApplication->district_id = $request->district;
            $connectivityApplication->internet_coverage_id = $request->locality;
            $connectivityApplication->address = $request->address;
            $connectivityApplication->package_id = $request->package;
            $connectivityApplication->promo_code = $request->referral;
            $connectivityApplication->policy_agreed = $request->policy;
            $connectivityApplication->is_human_verified = 0;
            $connectivityApplication->remote_addr = UserSystemInfoHelper::get_ip();
            $connectivityApplication->remote_port = $_SERVER['REMOTE_PORT'];
            $connectivityApplication->request_scheme = $_SERVER['REQUEST_SCHEME'];
            $connectivityApplication->request_method = $_SERVER['REQUEST_METHOD'];
            $connectivityApplication->platform = $browser['platform'];
            $connectivityApplication->browser = $browser['browser'];
            $connectivityApplication->browser_maker = $browser['browser_maker'];
            $connectivityApplication->browser_version = $browser['version'];
            $connectivityApplication->device_type = $browser['device_type'];
            $connectivityApplication->device_pointing_method = $browser['device_pointing_method'];
            $connectivityApplication->minorver = $browser['minorver'];
            $connectivityApplication->ismobiledevice = $browser['ismobiledevice'];
            $connectivityApplication->istablet = $browser['istablet'];
            $connectivityApplication->crawler = $browser['crawler'];
            $connectivityApplication->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
            $connectivityApplication->isemailed = $isemailed;
            $connectivityApplication->emailed_to = $emailed_to;
            $connectivityApplication->is_sent_by_api = $is_sent_by_api;
            $connectivityApplication->api_request_data = $api_request_data;
            $connectivityApplication->api_reply_data = $api_reply_data;
            $connectivityApplication->save();

            if (! empty($connectivityApplication->id)) {
                return response()->json(['status'=>1, 'msg'=>"Our team will contact you very soon."]);
            }
            else
            {
                return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
            }
        }
       
    }


    public function getInfoRequest(Request $request)
    {
        $tmpInput = $request->all();
        $tmpInput['info_name']= strip_tags($request->input('info_name'));
        $tmpInput['info_phone'] = strip_tags($request->input('info_phone'));
        $tmpInput['info_email'] = strip_tags($request->input('info_email'));
        $tmpInput['info_details'] = strip_tags($request->input('info_details'));
        $request->replace($tmpInput);

        $rules = [
            'info_name' => ['required', 'max:255'],
            'info_phone' => ['required', 'regex:/^([0-9\+])([0-9\s]*)$/',  'min:8'],
            'info_email' => ['required', 'email:rfc,dns', 'max:50'],
        ];

        $messages = [];
        $attributes =[
            'info_name' => 'Name',
            'info_phone' => 'Phone Number',
            'info_email' => 'Email Address',
        ];
        $validator =Validator::make($request->all(),$rules, $messages ,$attributes);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
         else
        {
            $browser = get_browser(null, true);

            $infoRequest = new GetInformationRequest;
            $infoRequest->name = $request->info_name;
            $infoRequest->phone = $request->info_phone;
            $infoRequest->email = $request->info_email;
            $infoRequest->details = $request->info_details;
            $infoRequest->is_human_verified = 0;
            $infoRequest->remote_addr = UserSystemInfoHelper::get_ip();
            $infoRequest->remote_port = $_SERVER['REMOTE_PORT'];
            $infoRequest->request_scheme = $_SERVER['REQUEST_SCHEME'];
            $infoRequest->request_method = $_SERVER['REQUEST_METHOD'];
            $infoRequest->platform = $browser['platform'];
            $infoRequest->browser = $browser['browser'];
            $infoRequest->browser_maker = $browser['browser_maker'];
            $infoRequest->browser_version = $browser['version'];
            $infoRequest->device_type = $browser['device_type'];
            $infoRequest->device_pointing_method = $browser['device_pointing_method'];
            $infoRequest->minorver = $browser['minorver'];
            $infoRequest->ismobiledevice = $browser['ismobiledevice'];
            $infoRequest->istablet = $browser['istablet'];
            $infoRequest->crawler = $browser['crawler'];
            $infoRequest->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
            $infoRequest->save();

            if (! empty($infoRequest->id)) {
                return response()->json(['status'=>1, 'msg'=>"Our team will contact you very soon."]);
            }
            else
            {
                return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
            }
        }
       
    }
  

}
