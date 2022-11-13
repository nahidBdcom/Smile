<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Content;
use App\Models\ContentFaq;
//use Illuminate\Foundation\Http\FormRequest;

//use Illuminate\Support\Facade\DB;

use App\Models\ZoneOffice;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UserSystemInfoHelper;
use App\Models\GetInformationRequest;

class ContactController extends Controller
{
    public function index(){
        $mainContent = Content::where('slug', "contact")->where('status', 1)->firstOrFail();
        $zoneOffices = ZoneOffice::where('status', 1)->orderBy('order')->get();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        //$mainFAQs = ;
        //dd($mainContent);


        return view('contact', compact('mainContent','zoneOffices', 'socialMedias'));
    }

    public function getInfoRequest(Request $request)
    {
        $tmpInput = $request->all();
        $tmpInput['info_name']= trim(strip_tags($request->input('info_name')));
        $tmpInput['info_phone'] = trim(strip_tags($request->input('info_phone')));
        $tmpInput['info_email'] = trim(strip_tags($request->input('info_email')));
        $tmpInput['info_details'] = trim(strip_tags($request->input('info_details')));
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
