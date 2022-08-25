<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Cms;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Properties;
use App\Models\PropertiesImages;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

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
  
        // latest rented apartment
        $rented_properties = Properties::getLatestRentedApartments();

        return view('frontend.home',compact('ad_section1','ad_section21','ad_section22','ad_section3',
        'ad_section4','ad_section5','rented_properties'));
    }

    public function dynamicPages(Request $request,$link){
        $cmsInfo = Cms::where('link',$link)->first();
        if($cmsInfo){
            return view('frontend.page.dynamic',compact('cmsInfo'));
        }else{
            return redirect('/');
        }
       
    }
    public function contactUs(){
        return view('frontend.contact.contact');
    }
    public function sendContactInfo(Request $request){
        $this->validate($request,[
            'fname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'comment' => 'required'
        ]);
        return redirect()->route('contact')->with('message','Data added Successfully');
        //  $name = $request->fname;
        //  $email = $request->email;
        // $phone = $request->phone;
        // $comment = $request->comment;
        // Mail::to($email)->send(new SendMailable($name));
        // if (Mail::failures()) {
        //     return response()->Fail('Sorry! Please try again latter');
        // }else{
        //     return response()->success('Great! Successfully send in your mail');
        // }

       
    }
    public function blogList(){
        $blogList = Blog::query();
        $blogList->with(['blog_tag.tag_name']);
        $blogList->orderBy('id','DESC');
        $result =$blogList->get();
        return view('frontend.blog.list',compact('result'));
    }

    public function blogDetail(Request $request,$id){
        $blogInfo = Blog::query();
        $blogInfo->with(['blog_tag.tag_name']);
        $blogInfo->where('id',$id);
        $resultInfo =$blogInfo->first();
       
        if($resultInfo){
            return view('frontend.blog.detail',compact('resultInfo'));
        }else{
            return redirect('/');
        }
        
    }

    public function propertiesList(Request $request,$type){
        $propertyList = Properties::query();
        $propertyList->with(['residentialInfo','imageList']);
        $propertyList->where('property_for',$type);
        $propertyList->where('completed_property','Yes');
        $propertyList->where('status','Active');
        $propertyList->orderBy('id','DESC');
        $result =$propertyList->get();
        
        return view('frontend.properties.list',compact('result','type'));
    }

}