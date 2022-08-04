<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\CommonController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PropertyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/loginVerification', [ApiAuthController::class, 'loginVerification']);
Route::post('/Registration', [ApiAuthController::class, 'Registration']);
Route::post('/RegistrationVerification', [ApiAuthController::class, 'RegistrationVerification']);
Route::post('/userRegistration', [ApiAuthController::class, 'userRegistration']);
Route::post('/userRegistrationVerification', [ApiAuthController::class, 'userRegistrationVerification']);
Route::post('/ResendOtp', [ApiAuthController::class, 'ResendOtp']);

Route::get('/getCountries', [CommonController::class, 'getCountries']);
Route::get('/getStates', [CommonController::class, 'getStates']);
Route::get('/getCities', [CommonController::class, 'getCities']);
Route::get('/getSubCities', [CommonController::class, 'getSubCities']);
Route::get('/getAreas', [CommonController::class, 'getAreas']);

Route::get('/getUserProfile', [UserController::class, 'getUserProfile']);
Route::post('/updateUserProfile', [UserController::class, 'updateUserProfile']);

Route::post('/property/addfavourite', [PropertyController::class, 'addFavourite']);
Route::post('/property/unfavourite', [PropertyController::class, 'unFavourite']);
Route::get('/property/getfavourite', [PropertyController::class, 'getFavourite']);
Route::post('/property/bookvisit', [PropertyController::class, 'bookVisit']);
Route::post('/property/bookinquiry', [PropertyController::class, 'bookInquiry']);

Route::get('/user/getUserProperty', [PropertyController::class, 'getUserProperty']);
Route::get('/user/getUserInquiries', [PropertyController::class, 'getUserInquiries']);
Route::get('/user/getVendorInquiries', [PropertyController::class, 'getVendorInquiries']);
Route::get('/dashboard/getVendorProperty', [PropertyController::class, 'getVendorProperty']);
 
Route::get('/getPropertyDetails', 'API\PropertyController@getPropertyDetails');