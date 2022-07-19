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

Route::get('/', function () {
    return view('welcome');
});


// Admin Login
Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'generateOTP'])->name('generateOTP');
Route::post('/postOtp', [LoginController::class, 'otpSubmit'])->name('otpSubmit');
Route::get('resendOTP', [LoginController::class, 'resendOTP'])->name('resendOTP');
Route::get('backtologin', [LoginController::class, 'backtologin'])->name('backtologin');

// Inquiry
Route::get('/admin/inquiry', [InquiryController::class, 'index'])->name('index');
Route::post('/admin/inquiry', [InquiryController::class, 'index'])->name('index');

// Book Visit
Route::get('/admin/bookvisit', [BookVisitController::class, 'index'])->name('index');
Route::post('/admin/bookvisit', [BookVisitController::class, 'index'])->name('index');
Route::post('/admin/bookvisit/delete/{id}', [BookVisitController::class, 'destroy'])->name('destroy');