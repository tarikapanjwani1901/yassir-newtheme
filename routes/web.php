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
use App\Http\Controllers\Web\Admin\TestimonialController;

Route::get('/', function () {
    return view('welcome');
});


// Admin Login
Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'generateOTP'])->name('generateOTP');
Route::post('/postOtp', [LoginController::class, 'otpSubmit'])->name('otpSubmit');
Route::get('resendOTP', [LoginController::class, 'resendOTP'])->name('resendOTP');
Route::get('backtologin', [LoginController::class, 'backtologin'])->name('backtologin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

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