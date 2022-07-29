<?php

namespace App\Http\Controllers\Web\Marketing;

use App\Http\Controllers\Controller;
use App\Models\UserOtp;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Models\User;

class MarketingDashboardController extends Controller
{

    public function index()
    {
        return view('marketing.dashboard');
    }

}