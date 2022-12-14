<?php

use Illuminate\Support\Str;
use TCG\Voyager\Events\Routing;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\RoutingAdmin;
use TCG\Voyager\Events\RoutingAfter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use TCG\Voyager\Events\RoutingAdminAfter;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AjaxCallController;
use App\Http\Controllers\ConnectivityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [CommonController::class, 'home'])->name('home');

Route::post('/custom_solution_request', [CommonController::class, 'getusersysteminfo'])->name('homePost');

// Route::get('/package/{package:slug}', [CommonController::class, 'packageDetails'])->name('package_details');

Route::get('/package/{packageCategory:slug}', [CommonController::class, 'packageUpdated'])->name('package_updated');

Route::get('/helpdesk', [CommonController::class, 'helpdesk'])->name('helpdesk');
Route::post('/helpdesk', [CommonController::class, 'sendComplain'])->name('sendComplainPost');

Route::get('/about', [CommonController::class, 'about'] )->name('about');

Route::get('/blog', [CommonController::class, 'blog'] )->name('blog');
Route::get('/blog/{blog:slug}', [CommonController::class, 'singleBlog'])->name('singleBlog');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/get_information_request', [ContactController::class, 'getInfoRequest'])->name('contactUsPost');
Route::get('/phone_call', [ContactController::class, 'phoneCall'])->name('phone_call');

Route::get('/connectivity', [ConnectivityController::class, 'index'])->name('connectivity');
Route::post('/getDistrictLocalityData', [ConnectivityController::class, 'districtLocality'])->name('getDistrictLocalityData');
Route::post('/connectivity_request', [ConnectivityController::class, 'storeUserConnectivityApplicationInfo'])->name('connectivityRequest');
Route::get('/success', [ConnectivityController::class, 'submissionSuccess'])->name('success');

Route::get('/test', [TestController::class, 'show'])->name('test');
Route::get('/test_digits_between', [TestController::class, 'digitsBetween'])->name('DigitsBetween');
Route::post('/test_digits_between', [TestController::class, 'digitsBetweenPost'])->name('DigitsBetweenPost');

/*Terms of Uses*/

Route::get('/terms', [CommonController::class, 'term'])->name('terms_of_use');

/*Privacy Policy*/

Route::get('/privacies', [CommonController::class, 'privacy'])->name('privacy_policy');

/*Bill Payment Guide*/

Route::get('/bill', [CommonController::class, 'bill'])->name('bill_payment_guide');

/*Media Center*/

Route::get('/media', [CommonController::class, 'media'])->name('media_center');

/*About*/

Route::get('/about', [CommonController::class, 'aboutUs'])->name('about');

/*Reviews*/

Route::get('/reviews',[CommonController::class, 'reviews'])->name('reviews');



//=====================Route for FAQs======================
Route::get('/faqs', [CommonController::class, 'faqs'])->name('faqs');

//=======================Ajax Routes=======================
Route::post('/user_location_rating_wise_slider', [AjaxCallController::class, 'user_location_rating_wise_slider'])->name('user_location_rating_wise_slider');
Route::post('/user_location_rating_wise', [AjaxCallController::class, 'user_location_rating_wise'])->name('user_location_rating_wise');
Route::post('/contents/faqs', [AjaxCallController::class, 'contents_faqs'])->name('contents.faqs');


Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();

});
