<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;

class HomeController extends Controller
{

    public function home()
    {
        //get section 1 advertisement
        $ad_section1 = Advertise::getAdvertisementBySectionId(1,'middle');
        
        // section 2 - left
        $ad_section21 = Advertise::getAdvertisementBySectionId(2,'left');

        // section 2 - right
        $ad_section22 = Advertise::getAdvertisementBySectionId(2,'right');

        // section 4
        $ad_section4 = Advertise::getAdvertisementBySectionId(4,'middle');

        // section 5
        $ad_section5 = Advertise::getAdvertisementBySectionId(5,'middle');

        // slider advertisement images
        $ad_section3 = Advertise::getSliderAdvertisementImages(3);
  
        return view('frontend.home',compact('ad_section1','ad_section21','ad_section22','ad_section3','ad_section4','ad_section5'));
    }

}