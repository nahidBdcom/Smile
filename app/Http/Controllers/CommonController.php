<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Post;
use App\Models\Brand;
//use Illuminate\Foundation\Http\FormRequest;

use App\Models\Content;

use App\Models\Package;
use App\Models\Category;

use App\Models\Customer;
use App\Models\District;
use App\Models\Slideshow;
use App\Models\ContentFaq;
use App\Models\PackageFaq;
use App\Models\ProblemType;
use App\Models\SocialMedia;
use App\Models\ServiceValue;
use Illuminate\Http\Request;
use App\Models\BrandCategory;
use App\Models\CustomerReview;
use App\Models\NetworkCoverage;
use App\Models\PackageCategory;
use App\Models\SolutionRequest;
use App\Models\InternetCoverage;
use Illuminate\Support\Facade\DB;
use App\Helpers\SmileFunctionHelper;
use App\Http\Controllers\Controller;
use App\Helpers\UserSystemInfoHelper;
use App\Models\ConnectivityApplication;
use App\Models\SolutionRequirementType;


class CommonController extends Controller
{
    public function home()
    {

        $homeContent = Content::where('slug', "/")->where('status', 1)->firstOrFail();

        //echo url()->current();
        //dd($homeContent["description_title"]);
        //url($item->link());
        // $customers = Customer::where('status',1)->get();
        $customerReviews = CustomerReview::where('show_at_home',1)->get();
        $slideshows = Slideshow::where('status', 1)->orderBy('order')->get();
        $serviceValues = ServiceValue::where('status', 1)->orderBy('order')->get();
        $packages = Package::where('status', 1)->where('show_in_honepage',1)->orderBy('order')->get();
        $packageCategory= PackageCategory::where('show_in_homepage', 1)->get();
        $requirementTypes = SolutionRequirementType::where('status', 1)->orderBy('order')->get();
        $districts = District::select('id','name')->where('status',1)->orderBy('order','ASC')->get();
        $internetCoverages = InternetCoverage::select('id','title as text','district_id')->where('status', 1)->orderBy('district_id')->orderBy('title')->get();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        $faqs = ContentFaq::where('content_id', 1)->where('status', 1)->orderBy('order')->get();
        //dd($slideshows);


       return view('home', compact('homeContent','slideshows','serviceValues','packages','requirementTypes','customerReviews', 'packageCategory','districts','internetCoverages','socialMedias','faqs'));
    }

    public function about()
    {
        $mainContent = Content::where('slug', "about")->where('status', 1)->firstOrFail();
        $networkCoverages = NetworkCoverage::where('status', 1)->orderBy('order')->get();
        //$problemTypes = ProblemType::where('status', 1)->get();


       return view('about', compact('mainContent','networkCoverages'));
    }

    public function helpdesk()
    {
        $mainContent = Content::where('slug', "helpdesk")->where('status', 1)->firstOrFail();
        $faqs = ContentFaq::where('content_id', $mainContent->id)->where('status', 1)->orderBy('order')->get();
        $problemTypes = ProblemType::where('status', 1)->get();


       return view('helpdesk', compact('mainContent','faqs','problemTypes'));
    }

    public function getusersysteminfo(Request $request)
    {
        $tmpInput = $request->all();
        $tmpInput['guest_name']= strip_tags($request->input('guest_name'));
        $tmpInput['guest_phone'] = strip_tags($request->input('guest_phone'));
        $tmpInput['guest_email'] = strip_tags($request->input('guest_email'));
        $tmpInput['guest_req_type'] = strip_tags($request->input('guest_req_type'));
        $tmpInput['guest_details'] = strip_tags($request->input('guest_details'));
        $request->replace($tmpInput);

        $rules = [
            'guest_name' => ['required', 'max:255'],
            'guest_phone' => ['required', 'regex:/^([0-9\+])([0-9\s]*)$/',  'min:8'],
            'guest_email' => ['required', 'email:rfc,dns', 'max:50'],
            'guest_req_type' => ['required', 'integer', 'min:1']
        ];

        $messages = [];
        $attributes =[
            'guest_name' => 'Name',
            'guest_phone' => 'Phone Number',
            'guest_email' => 'Email Address',
            'guest_req_type' => 'Requeirment Type',
        ];
        $validator =Validator::make($request->all(),$rules, $messages ,$attributes);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
         else
        {
            $browser = get_browser(null, true);

            $solutionRequest = new SolutionRequest;
            $solutionRequest->req_name = $request->guest_name;
            $solutionRequest->req_phone = $request->guest_phone;
            $solutionRequest->req_email = $request->guest_email;
            $solutionRequest->solution_requirement_type_id = $request->guest_req_type;
            $solutionRequest->req_details = $request->guest_details;
            $solutionRequest->is_human_verified = 0;
            $solutionRequest->remote_addr = UserSystemInfoHelper::get_ip();
            $solutionRequest->remote_port = $_SERVER['REMOTE_PORT'];
            $solutionRequest->request_scheme = $_SERVER['REQUEST_SCHEME'];
            $solutionRequest->request_method = $_SERVER['REQUEST_METHOD'];
            $solutionRequest->platform = $browser['platform'];
            $solutionRequest->browser = $browser['browser'];
            $solutionRequest->browser_maker = $browser['browser_maker'];
            $solutionRequest->browser_version = $browser['version'];
            $solutionRequest->device_type = $browser['device_type'];
            $solutionRequest->device_pointing_method = $browser['device_pointing_method'];
            $solutionRequest->minorver = $browser['minorver'];
            $solutionRequest->ismobiledevice = $browser['ismobiledevice'];
            $solutionRequest->istablet = $browser['istablet'];
            $solutionRequest->crawler = $browser['crawler'];
            $solutionRequest->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
            $solutionRequest->save();

            if (! empty($solutionRequest->id)) {
                return response()->json(['status'=>1, 'msg'=>"Our team will contact you very soon."]);
            }
            else
            {
                return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
            }
        }

    }


    public function packageDetails(Package $package)
    {
        # code...
        $serviceValues = ServiceValue::where('status', 1)->orderBy('order')->get();
        $faqs = PackageFaq::where('package_id', $package->id)->where('status', 1)->orderBy('order')->get();
        $requirementTypes = SolutionRequirementType::where('status', 1)->orderBy('order')->get();

        return view('package_details', compact('package','serviceValues','requirementTypes','faqs'));

        //dd($package);
    }

    public function blog(){

        $mainContent = Content::where('slug', "blog")->where('status', 1)->firstOrFail();
        $blogs = Post::where('status', '=', 'PUBLISHED')->orderBy('featured', 'DESC')->orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('name')->get();
        $sort_options = array('CDA' => 'Date Ascending', 'CDD' => 'Date Descending', 'titleA' => 'Title Ascending', 'titleD' => 'Title Descending'  );

        return view('blogs', compact('mainContent', 'blogs','categories','sort_options'));
    }

    public function singleBlog(Post $blog)
    {
        # code...

        $relatedBlogs = Post::where('status', '=', 'PUBLISHED')->where('category_id', '=', $blog->category_id)->orderBy('featured', 'DESC')->orderBy('created_at', 'DESC')->limit(3)->get();
        $next = Post::where('id', '>', $blog->id)->where('status', '=', 'PUBLISHED')->orderBy('id')->first();
        $previous = Post::where('id', '<', $blog->id)->where('status', '=', 'PUBLISHED')->orderBy('id','desc')->first();
        $mainContent=$blog;

        //$faqs = PackageFaq::where('package_id', $package->id)->where('status', 1)->orderBy('order')->get();
        //$requirementTypes = SolutionRequirementType::where('status', 1)->orderBy('order')->get();

        return view('blog_single', compact('mainContent','relatedBlogs','next','previous'));

        //dd($package);
    }

    public function packageUpdated($packageCategory){

        $packages = PackageCategory::with('packages')->where('slug',$packageCategory)->first();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        return view('package_updated', compact('packages','socialMedias'));


    }

    public function term(){
        $mainContent = Content::where('slug', "terms-of-uses")->where('status', 1)->firstOrFail();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        return view ('terms_of_use', compact('mainContent', 'socialMedias'));
    }


    public function privacy(){
        $mainContent = Content::where('slug', "privacy-policy")->where('status', 1)->firstOrFail();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        return view ('privacy_policy', compact('mainContent', 'socialMedias'));
    }


    public function bill(){
        $mainContent = Content::where('slug', "bill-payment-guide")->where('status', 1)->firstOrFail();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        return view ('bill_payment_guide', compact('mainContent', 'socialMedias'));
    }



    public function media(){
        $mainContent = Content::where('slug', "media-center")->where('status', 1)->firstOrFail();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        return view ('media_center', compact('mainContent', 'socialMedias'));
    }


    public function aboutUs(){
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        $story = Content::where('slug', "about-story")->where('status',1)->firstOrFail();
        $vision = Content::where('slug',"our-vision")-> where('status',1)->firstOrFail();
        $mission = Content::where('slug',"our-mission")->where('status',1)->firstOrFail();
        $trust = Content::where('slug',"brands-who-trusts-us")->where('status', 1)->firstOrFail();
        $brands = Brand::where('status',1)->orderBy('order')->get();

        // dd($brands);

        return view('about', compact('socialMedias', 'story', 'vision', 'mission', 'trust', 'brands'));




    }


    public function faqs(){
        $contents = Content::whereIn('slug',['/','bill-payment-guide','service-and-support','frequently-ask-questions'])
        ->where('status',1)
        ->get();

        $faqs = ContentFaq::whereIn('content_id',$contents->pluck('id'))
        ->where('status',1)
        ->orderBy('order')
        ->limit(10)
        ->get();
        $socialMedias = SocialMedia::where('status',1)->orderBy('order')->get();
        return view('faqs', compact('contents','socialMedias','faqs'));
    }

}
