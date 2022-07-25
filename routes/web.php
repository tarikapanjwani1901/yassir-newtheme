<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Admin\InquiryController;
use App\Http\Controllers\Web\Admin\BookVisitController;
use App\Http\Controllers\Web\Admin\AdminDashboardController;
use App\Http\Controllers\Web\Admin\CitiesController;
use App\Http\Controllers\Web\Admin\TestimonialController;
use App\Http\Controllers\Web\Admin\PropertiesController;
use App\Http\Controllers\Web\CommonController;
use App\Http\Controllers\Web\Admin\StateController;
use App\Http\Controllers\Web\Admin\SubCitiesController;
use App\Http\Controllers\Web\Admin\AreasController;

use App\Http\Controllers\Web\Vendor\VendorDashboardController;

Route::get('/', [LoginController::class, 'showVendorLoginForm'])->name('vendorlogin');

// Admin Login
Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'generateOTP'])->name('generateOTP');
Route::post('/postOtp', [LoginController::class, 'otpSubmit'])->name('otpSubmit');
Route::get('resendOTP', [LoginController::class, 'resendOTP'])->name('resendOTP');
Route::get('backtologin', [LoginController::class, 'backtologin'])->name('backtologin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group( ['middleware' => 'admin'], function()
    {
        // Dashboard
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admindashboard');

        // Inquiry
        Route::get('/admin/inquiry', [InquiryController::class, 'index'])->name('index');
        Route::post('/admin/inquiry', [InquiryController::class, 'index'])->name('index');

        // Book Visit
        Route::get('/admin/bookvisit', [BookVisitController::class, 'index'])->name('index');
        Route::post('/admin/bookvisit', [BookVisitController::class, 'index'])->name('index');
        Route::post('/admin/bookvisit/delete/{id}', [BookVisitController::class, 'destroy'])->name('destroy');

        // Testimonial
        Route::get('/admin/testimonials', [TestimonialController::class, 'index']);
        Route::get('/admin/testimonials/add', [TestimonialController::class, 'add']);
        Route::post('/admin/testimonials/add', [TestimonialController::class, 'addTestimonail']);
        Route::get('/admin/testimonials/edit/{id}', [TestimonialController::class, 'editTestimonail']);
        Route::post('/admin/testimonials/edit/{id}', [TestimonialController::class, 'editPostTestimonail']);
        Route::post('/admin/testimonials/delete/{id}', [TestimonialController::class, 'delete']);
		
		
        // Testimonial
        Route::get('/admin/properties', [PropertiesController::class, 'index']);
        Route::get('/admin/properties/add', [PropertiesController::class, 'add']);
        Route::post('/admin/properties/postProperty', [PropertiesController::class, 'addProperties']);
        Route::get('/admin/properties/edit/{id}', [PropertiesController::class, 'editProperties']);
        Route::post('/admin/properties/edit/{id}', [PropertiesController::class, 'editPostProperties']);
        Route::post('/admin/properties/delete/{id}', [PropertiesController::class, 'delete']);
		Route::get('/admin/properties_search',[PropertiesController::class, 'properties_search']);
		
		Route::get('/admin/getState',[CommonController::class,'getStateByCountry']);
		Route::get('/admin/getCity',[CommonController::class,'getCityByState']);
		Route::get('/admin/getSubCity',[CommonController::class,'getSubCityByCity']);
		Route::get('/admin/getArea',[CommonController::class,'getAreaBySubCity']);	

        // States
        Route::get('/admin/states', [StateController::class, 'index']);
        Route::get('/admin/states/add', [StateController::class, 'add']);
        Route::post('/admin/states/add', [StateController::class, 'addState']);
        Route::get('/admin/states/edit/{id}', [StateController::class, 'editState']);
        Route::post('/admin/states/edit/{id}', [StateController::class, 'editPostState']);
        Route::post('/admin/states/delete/{id}', [StateController::class, 'delete']);
        Route::get('/admin/state_search',[StateController::class, 'state_search']);

        // Cities
        Route::get('/admin/cities', [CitiesController::class, 'index']);
        Route::get('/admin/cities/add', [CitiesController::class, 'add']);
        Route::post('/admin/cities/add', [CitiesController::class, 'addCities']);
        Route::get('/admin/cities/edit/{id}', [CitiesController::class, 'editCities']);
        Route::post('/admin/cities/edit/{id}', [CitiesController::class, 'editPostCities']);
        Route::post('/admin/cities/delete/{id}', [CitiesController::class, 'delete']);
        Route::get('/admin/getState', [CitiesController::class, 'getStateByCountry']);
        Route::get('/admin/getCity', [CitiesController::class, 'getCityByState']);
        Route::get('/admin/getSubCity', [CitiesController::class, 'getSubCityByCity']);
        Route::get('/admin/cities_search',[CitiesController::class,'search_cities']);

        // Sub-Cities
        Route::get('/admin/sub_cities', [SubCitiesController::class, 'index']);
        Route::get('/admin/sub_cities/add', [SubCitiesController::class, 'add']);
        Route::post('/admin/sub_cities/add', [SubCitiesController::class, 'addSubCities']);
        Route::get('/admin/sub_cities/edit/{id}', [SubCitiesController::class, 'editSubCities']);
        Route::post('/admin/sub_cities/edit/{id}', [SubCitiesController::class, 'editPostSubCities']);
        Route::post('/admin/sub_cities/delete/{id}', [SubCitiesController::class, 'delete']);
        Route::get('/admin/sub_cities_search',[SubCitiesController::class, 'search_sub_cities']);

        // Areas
        Route::get('/admin/areas', [AreasController::class, 'index']);
        Route::get('/admin/areas/add', [AreasController::class, 'add']);
        Route::post('/admin/areas/add', [AreasController::class, 'addAreas']);
        Route::get('/admin/areas/edit/{id}', [AreasController::class, 'editAreas']);
        Route::post('/admin/areas/edit/{id}', [AreasController::class, 'editPostAreas']);
        Route::post('/admin/areas/delete/{id}', [AreasController::class, 'delete']);
        Route::get('/admin/areas_search',[AreasController::class, 'search_areas']);
    });
});

Route::group(['middleware' => ['auth']], function () {

    Route::group( ['middleware' => 'vendor'], function()
    {
        // Dashboard
        Route::get('/vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendordashboard');

    });
});
