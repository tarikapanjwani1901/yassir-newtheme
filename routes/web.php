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
use App\Http\Controllers\Web\Admin\AdvertiseController;
use App\Http\Controllers\Web\Admin\UserController;
use App\Http\Controllers\Web\Admin\CmsController;
use App\Http\Controllers\Web\Admin\ReviewsController;
use App\Http\Controllers\Web\Admin\BlogCategoriesController;
use App\Http\Controllers\Web\Admin\BlogCommentsController;
use App\Http\Controllers\Web\Admin\BlogTagController;
use App\Http\Controllers\Web\Admin\BlogController;
use App\Http\Controllers\Web\Admin\SliderController;
use App\Http\Controllers\Web\Admin\VisitorSearchRecordController;
use App\Http\Controllers\Web\Admin\GeneralSettingController;
use App\Http\Controllers\Web\Admin\ProfileController;






use App\Http\Controllers\Web\Vendor\VendorDashboardController;
use App\Http\Controllers\Web\Vendor\VendorInquiryController;
use App\Http\Controllers\Web\Vendor\VendorBookVisitController;
use App\Http\Controllers\Web\Vendor\VendorAdvertiseController;
use App\Http\Controllers\Web\Vendor\VendorPropertiesController;

use App\Http\Controllers\Web\Sales\SalesDashboardController;

use App\Http\Controllers\Web\Telecaller\TelecallerDashboardController;

use App\Http\Controllers\Web\Frontend\HomeController;

// Admin Login
Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'generateOTP'])->name('generateOTP');

// Vendor Login
Route::get('/vendor/login', [LoginController::class, 'showVendorLoginForm'])->name('vendorlogin');
Route::post('/vendorlogin', [LoginController::class, 'vendorgenerateOTP'])->name('vendorgenerateOTP');

// Sales Login
Route::get('/sales/login', [LoginController::class, 'showSalesLoginForm'])->name('saleslogin');
Route::post('/saleslogin', [LoginController::class, 'salesgenerateOTP'])->name('salesgenerateOTP');

// Telecaller Login
Route::get('/telecaller/login', [LoginController::class, 'showTelecallerLoginForm'])->name('telecallerlogin');
Route::post('/telecallerlogin', [LoginController::class, 'telecallergenerateOTP'])->name('telecallergenerateOTP');

Route::post('/postOtp', [LoginController::class, 'otpSubmit'])->name('otpSubmit');
Route::get('resendOTP', [LoginController::class, 'resendOTP'])->name('resendOTP');
Route::get('backtologin', [LoginController::class, 'backtologin'])->name('backtologin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// home page
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/contact', [HomeController::class, 'contactUs'])->name('contact');
Route::post('/send-contact', [HomeController::class, 'sendContactInfo'])->name('send.contact');
Route::get('/blog', [HomeController::class, 'blogList'])->name('blog.list');
Route::get('/blog-details/{id}', [HomeController::class, 'blogDetail'])->name('blog.details');
Route::get('/{link}', [HomeController::class, 'dynamicPages'])->name('home.dynamic');
Route::get('/property/{type}', [HomeController::class, 'propertiesList'])->name('properties.list');
Route::get('/property-details/{id}', [HomeController::class, 'propertiesDetails'])->name('properties.details');
Route::get('/property-category/{cat_type}', [HomeController::class, 'propertiesCatDetails'])->name('properties.cat.details');

Route::group(['middleware' => ['auth']], function () {

    Route::group( ['middleware' => 'admin'], function()
    {
        // Dashboard
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admindashboard');

        // Inquiry
        Route::get('/admin/inquiry', [InquiryController::class, 'index'])->name('index');
        Route::post('/admin/inquiry', [InquiryController::class, 'index'])->name('index');
        Route::post('/admin/inquiry/delete/{id}', [InquiryController::class, 'destroy'])->name('destroy');

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
		Route::get('/admin/testimonials_search',[TestimonialController::class, 'testimonials_search']);
		
		
		
        // Properties
        Route::get('/admin/properties', [PropertiesController::class, 'index']);
        Route::get('/admin/properties/add', [PropertiesController::class, 'add']);
        Route::post('/admin/properties/postProperty', [PropertiesController::class, 'addProperties']);
        Route::get('/admin/properties/edit/{id}', [PropertiesController::class, 'editProperties']);
        Route::post('/admin/properties/edit/{id}', [PropertiesController::class, 'editPostProperties']);
        Route::post('/admin/properties/delete/{id}', [PropertiesController::class, 'delete']);
		Route::get('/admin/properties_search',[PropertiesController::class, 'properties_search']);
		Route::post('/admin/properties/status/{id}/{status}', [PropertiesController::class, 'status']);
		
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

        // advertise
        Route::get('/admin/advertise', [AdvertiseController::class, 'index'])->name('admin.advertise.index');
        Route::get('/admin/advertise/create', [AdvertiseController::class, 'create'])->name('admin.advertise.create');
        Route::post('/admin/advertise/store', [AdvertiseController::class, 'addAdvertise'])->name('admin.advertise.store');
        Route::post('/admin/advertise/delete/{id}', [AdvertiseController::class, 'destroy'])->name('admin.advertise.destroy');
        Route::get('/admin/advertise/edit/{id}', [AdvertiseController::class, 'edit'])->name('admin.advertise.edit');
        Route::post('/admin/advertise/edit/{id}', [AdvertiseController::class, 'update'])->name('admin.advertise.update');
        Route::post('/admin/advertise/delete_image',[AdvertiseController::class, 'advertise_delimage'])->name('admin.advertise.delimage');
		
		
		// Users
        Route::get('/admin/users', [UserController::class, 'index']);
        Route::get('/admin/users/add', [UserController::class, 'add']);
        Route::post('/admin/users/add', [UserController::class, 'addUser']);
        Route::get('/admin/users/edit/{id}', [UserController::class, 'editUser']);
        Route::post('/admin/users/edit/{id}', [UserController::class, 'editPostUser']);
        Route::post('/admin/users/delete/{id}', [UserController::class, 'delete']);
        Route::get('/admin/user_search',[UserController::class, 'user_search']);
		Route::post('/admin/users/status/{id}/{status}', [UserController::class, 'status']);
		
		
		  // Cms
        Route::get('/admin/cms', [CmsController::class, 'index']);
        Route::get('/admin/cms/edit/{id}', [CmsController::class, 'editCms']);
        Route::post('/admin/cms/edit/{id}', [CmsController::class, 'editPostCms']);
		
		//Reviews
		
		Route::get('/admin/reviews', [ReviewsController::class, 'index']);
        Route::get('/admin/reviews/add', [ReviewsController::class, 'add']);
        Route::post('/admin/reviews/add', [ReviewsController::class, 'addReviews']);
        Route::get('/admin/reviews/edit/{id}', [ReviewsController::class, 'editReviews']);
        Route::post('/admin/reviews/edit/{id}', [ReviewsController::class, 'editPostReviews']);
        Route::post('/admin/reviews/delete/{id}', [ReviewsController::class, 'delete']);
        Route::get('/admin/reviews_search',[ReviewsController::class, 'reviews_search']);
		
		
		// Blog Category
        Route::get('/admin/blog_categories', [BlogCategoriesController::class, 'index']);
        Route::get('/admin/blog_categories/add', [BlogCategoriesController::class, 'add']);
        Route::post('/admin/blog_categories/add', [BlogCategoriesController::class, 'addBlogCategory']);
        Route::get('/admin/blog_categories/edit/{id}', [BlogCategoriesController::class, 'editBlogCategory']);
        Route::post('/admin/blog_categories/edit/{id}', [BlogCategoriesController::class, 'editPostBlogCategory']);
        Route::post('/admin/blog_categories/delete/{id}', [BlogCategoriesController::class, 'delete']);
        Route::get('/admin/blog_categories_search',[BlogCategoriesController::class, 'blog_categories_search']);
		
		
		// Blog Tag
        Route::get('/admin/blog_tag', [BlogTagController::class, 'index']);
        Route::get('/admin/blog_tag/add', [BlogTagController::class, 'add']);
        Route::post('/admin/blog_tag/add', [BlogTagController::class, 'addBlogTag']);
        Route::get('/admin/blog_tag/edit/{id}', [BlogTagController::class, 'editBlogTag']);
        Route::post('/admin/blog_tag/edit/{id}', [BlogTagController::class, 'editPostBlogTag']);
        Route::post('/admin/blog_tag/delete/{id}', [BlogTagController::class, 'delete']);
        Route::get('/admin/blog_tag_search',[BlogTagController::class, 'blog_tag_search']);
		
		
		
		// Blog Comment
        Route::get('/admin/blog_comments', [BlogCommentsController::class, 'index']);
        Route::get('/admin/blog_comments/add', [BlogCommentsController::class, 'add']);
        Route::post('/admin/blog_comments/add', [BlogCommentsController::class, 'addBlogComment']);
        Route::get('/admin/blog_comments/edit/{id}', [BlogCommentsController::class, 'editBlogComment']);
        Route::post('/admin/blog_comments/edit/{id}', [BlogCommentsController::class, 'editPostBlogComment']);
        Route::post('/admin/blog_comments/delete/{id}', [BlogCommentsController::class, 'delete']);
        Route::get('/admin/blog_comments_search',[BlogCommentsController::class, 'blog_comments_search']);
		
		
		
		// Blog Comment
        Route::get('/admin/blog', [BlogController::class, 'index']);
        Route::get('/admin/blog/add', [BlogController::class, 'add']);
        Route::post('/admin/blog/add', [BlogController::class, 'addBlog']);
        Route::get('/admin/blog/edit/{id}', [BlogController::class, 'editBlog']);
        Route::post('/admin/blog/edit/{id}', [BlogController::class, 'editPostBlog']);
        Route::post('/admin/blog/delete/{id}', [BlogController::class, 'delete']);
        Route::get('/admin/blog_search',[BlogController::class, 'blog_search']);
		
		
		// Slider
        Route::get('/admin/slider', [SliderController::class, 'index']);
        Route::get('/admin/slider/add', [SliderController::class, 'add']);
        Route::post('/admin/slider/add', [SliderController::class, 'addSlider']);
        Route::get('/admin/slider/edit/{id}', [SliderController::class, 'editSlider']);
        Route::post('/admin/slider/edit/{id}', [SliderController::class, 'editPostSlider']);
        Route::post('/admin/slider/delete/{id}', [SliderController::class, 'delete']);
		Route::get('/admin/slider_search',[SliderController::class, 'slider_search']);
		
		
		// Visitor Search Record
        Route::get('/admin/visitor_search_record', [VisitorSearchRecordController::class, 'index']);
        Route::get('/admin/visitor_search_record_filter',[VisitorSearchRecordController::class, 'visitor_search_record_filter']);
		
		
		//General Setting
		Route::get('/admin/general_setting', [GeneralSettingController::class, 'index']);
        Route::post('/admin/general_setting', [GeneralSettingController::class, 'editPostGeneralSetting']);
        
		//Profile Setting
		Route::get('/admin/profile', [ProfileController::class, 'index']);
        Route::post('/admin/profile', [ProfileController::class, 'editPostProfile']);
    	


 
    });
});

Route::group(['middleware' => ['auth']], function () {

    Route::group( ['middleware' => 'vendor'], function()
    {
        // Dashboard
        Route::get('/vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendordashboard');

        // Inquiry
        Route::get('/vendor/inquiry', [VendorInquiryController::class, 'index'])->name('vendors.inquiry.index');
        Route::post('/vendor/inquiry', [VendorInquiryController::class, 'index'])->name('vendors.inquiry.index');
        Route::post('/vendor/inquiry/delete/{id}', [VendorInquiryController::class, 'destroy'])->name('vendors.inquiry.destroy');

        // Book Visit
        Route::get('/vendor/bookvisit', [VendorBookVisitController::class, 'index'])->name('vendors.bookvisit.index');
        Route::post('/vendor/bookvisit', [VendorBookVisitController::class, 'index'])->name('vendors.bookvisit.index');
        Route::post('/vendor/bookvisit/delete/{id}', [VendorBookVisitController::class, 'destroy'])->name('vendors.bookvisit.destroy');
		
		  // Properties
        Route::get('/vendor/properties', [VendorPropertiesController::class, 'index']);
        Route::get('/vendor/properties/add', [VendorPropertiesController::class, 'add']);
        Route::post('/vendor/properties/postProperty', [VendorPropertiesController::class, 'addProperties']);
        Route::get('/vendor/properties/edit/{id}', [VendorPropertiesController::class, 'editProperties']);
        Route::post('/vendor/properties/edit/{id}', [VendorPropertiesController::class, 'editPostProperties']);
        Route::post('/vendor/properties/delete/{id}', [VendorPropertiesController::class, 'delete']);
		Route::get('/vendor/properties_search',[VendorPropertiesController::class, 'properties_search']);
		
		Route::get('/vendor/getState',[CommonController::class,'getStateByCountry']);
		Route::get('/vendor/getCity',[CommonController::class,'getCityByState']);
		Route::get('/vendor/getSubCity',[CommonController::class,'getSubCityByCity']);
		Route::get('/vendor/getArea',[CommonController::class,'getAreaBySubCity']);	

	

        // advertise
        Route::get('/vendor/advertise', [VendorAdvertiseController::class, 'index'])->name('vendor.advertise.index');
        Route::get('/vendor/advertise/create', [VendorAdvertiseController::class, 'create'])->name('vendor.advertise.create');
        Route::post('/vendor/advertise/store', [VendorAdvertiseController::class, 'addAdvertise'])->name('vendor.advertise.store');
        Route::post('/vendor/advertise/delete/{id}', [VendorAdvertiseController::class, 'destroy'])->name('vendor.advertise.destroy');
        Route::get('/vendor/advertise/edit/{id}', [VendorAdvertiseController::class, 'edit'])->name('vendor.advertise.edit');
        Route::post('/vendor/advertise/edit/{id}', [VendorAdvertiseController::class, 'update'])->name('vendor.advertise.update');
        Route::post('/vendor/advertise/delete_image',[VendorAdvertiseController::class, 'advertise_delimage'])->name('vendor.advertise.delimage');
    
    });
});

Route::group(['middleware' => ['auth']], function () {

    Route::group( ['middleware' => 'sales'], function()
    {
        // Dashboard
        Route::get('/sales/dashboard', [SalesDashboardController::class, 'index'])->name('salesdashboard');
    });

});

Route::group(['middleware' => ['auth']], function () {

    Route::group( ['middleware' => 'telecaller'], function()
    {
        // Dashboard
        Route::get('/telecaller/dashboard', [TelecallerDashboardController::class, 'index'])->name('telecallerdashboard');
    });

});
