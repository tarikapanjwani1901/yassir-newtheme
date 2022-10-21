<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Cms;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Properties;
use App\Models\PropertiesImages;
use App\Models\Slider;
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
            

        $slider = Slider::where('slider_status','active')->latest('id')->first();
        /* trendingTopProList */
        $trendingTop = Properties::query();
        $trendingTop->with(['residentialInfo','imageList','userInfo.userRole']);
        $trendingTop->where('status','Active');
        $trendingTop->where('is_top_trading','yes');
        $trendingTop->where('top_trading_possition','top');
        $trendingTop->orderBy('id','DESC');
        $trendingTopProList = $trendingTop->limit(10)->get();
        /* trendingBottomProList */
        $trendingBottom = Properties::query();
        $trendingBottom->with(['residentialInfo','imageList','userInfo.userRole']);
        $trendingBottom->where('status','Active');
        $trendingBottom->where('is_top_trading','yes');
        $trendingBottom->where('top_trading_possition','bottom');
        $trendingBottom->orderBy('id','DESC');
        $trendingBottomProList = $trendingBottom->limit(10)->get();
        /* Rent */
        $rent = Properties::query();
        $rent->with(['residentialInfo','imageList','userInfo.userRole']);
        $rent->where('status','Active');
        $rent->where('property_for','Rent');
        $rent->orderBy('id','DESC');
        $rentProList = $rent->limit(10)->get();
        /* Blog */
        $blog = Blog::query();
        $blog->with(['blog_tag.tag_name']);
        $blog->orderBy('id','DESC');
        $blogList =$blog->limit(10)->get();
        
        return view('frontend.home',compact('slider','trendingTopProList','trendingBottomProList','rentProList','blogList'));
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
        if(!$result->isEmpty()){   
            return view('frontend.blog.list',compact('result'));
        }else{
            return redirect('/');
        }
        
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

    public function propertiesList(){
     
        $propertyList = Properties::query();
        $propertyList->with(['residentialInfo','imageList']);
        $propertyList->where('completed_property','Yes');
        $propertyList->where('status','Active');
        $propertyList->orderBy('id','DESC');
        $result = $propertyList->paginate(2);
       $totalHouse = Properties::where('sub_category','Residential')->where('property_type','IndependentHouse')->count();
       $totalApartement = Properties::where('sub_category','Residential')->where('property_type','Apartment And Flat')->count();
       $totalCommercial = Properties::where('sub_category','Commercial')->count();
       $totalOffice = Properties::where('sub_category','Commercial')->where('commercial_property_type','Office')->count();

       $totalRent = Properties::where('property_for','Rent')->where('completed_property','Yes')->where('status','Active')->count();
       $totalSell = Properties::where('property_for','Sell')->where('completed_property','Yes')->where('status','Active')->count();

        
        return view('frontend.properties.list',compact('result','totalHouse','totalApartement','totalCommercial','totalOffice','totalRent','totalSell'));
        
    }

    public function propertiesListAjax(Request $request){
        
            
            $filterData['type'] =  isset($request->proType)?$request->proType:'';
            $filterData['searchKey'] =  isset($request->searchKey)?$request->searchKey:'';
            $filterData['sortByPro'] =  isset($request->sortByPro)?$request->sortByPro:'';
            $filterData['minRange'] =  isset($request->minRange)?$request->minRange:'';
            $filterData['maxRange'] =  isset($request->maxRange)?$request->maxRange:'';
            
            $propertyList = Properties::query();
            $propertyList->with(['residentialInfo','imageList']);
            
            $propertyList->where('completed_property','Yes');
            $propertyList->where('status','Active');
           
           
            if(!empty($filterData['type'])){
                $type = explode(",",$filterData['type']);
                $propertyList->whereIn('property_for',$type);
            }
            if(!empty($filterData['searchKey'])){
                $propertyList->where('project_name','LIKE','%'.$filterData['searchKey'].'%');
            }
            if(!empty($filterData['minRange']) && !empty($filterData['maxRange'])){
                $propertyList->where('total_price', '>=',  $filterData['minRange']);
                $propertyList->where('total_price', '<=',  $filterData['maxRange']);
            }
            if(!empty($filterData['sortByPro'])){
                if($filterData['sortByPro']=='popularity'){
                    $propertyList->orderBy('top_trading_possition','DESC');
                }elseif($filterData['sortByPro']=='new arrivals'){
                    $propertyList->orderBy('id','DESC');
                }elseif($filterData['sortByPro']=='low to high'){
                    $propertyList->orderBy('total_price','ASC');
                }elseif($filterData['sortByPro']=='high to low'){
                    $propertyList->orderBy('total_price','DESC');
                }else{
                    $propertyList->orderBy('id','ASC');
                }
            }
            $result =$propertyList->paginate(2);
            
            return view('frontend.properties.property_data',compact('result'))->render();
            
        
    }



    public function propertiesTypeList(Request $request,$type){
       
        $propertyList = Properties::query();
        $propertyList->with(['residentialInfo','imageList']);
        $propertyList->where('property_for',$type);
        $propertyList->where('completed_property','Yes');
        $propertyList->where('status','Active');
        $propertyList->orderBy('id','DESC');
        $result =$propertyList->paginate(2);
        $totalHouse = Properties::where('sub_category','Residential')->where('property_type','IndependentHouse')->count();
        $totalApartement = Properties::where('sub_category','Residential')->where('property_type','Apartment And Flat')->count();
        $totalCommercial = Properties::where('sub_category','Commercial')->count();
        $totalOffice = Properties::where('sub_category','Commercial')->where('commercial_property_type','Office')->count();

        
        return view('frontend.properties.list_type',compact('result','type','totalHouse','totalApartement','totalCommercial','totalOffice'));
        
    }

    public function propertiesTypeAjax(Request $request){
        if($request->ajax()){
            
            $filterData['type'] =  isset($request->proType)?$request->proType:'';
            $filterData['searchKey'] =  isset($request->searchKey)?$request->searchKey:'';
            $filterData['sortByPro'] =  isset($request->sortByPro)?$request->sortByPro:'';
            $filterData['minRange'] =  isset($request->minRange)?$request->minRange:'';
            $filterData['maxRange'] =  isset($request->maxRange)?$request->maxRange:'';
            
            $propertyList = Properties::query();
            $propertyList->with(['residentialInfo','imageList']);
            
            $propertyList->where('completed_property','Yes');
            $propertyList->where('status','Active');
            // $propertyList->orderBy('id','DESC');
           
            if(!empty($filterData['type'])){
                $propertyList->where('property_for',$filterData['type']);
            }
            if(!empty($filterData['searchKey'])){
                $propertyList->where('project_name','LIKE','%'.$filterData['searchKey'].'%');
            }
            if(!empty($filterData['minRange']) && !empty($filterData['maxRange'])){
                $propertyList->where('total_price', '>=',  $filterData['minRange']);
                $propertyList->where('total_price', '<=',  $filterData['maxRange']);
            }
            if(!empty($filterData['sortByPro'])){
                if($filterData['sortByPro']=='popularity'){
                    $propertyList->orderBy('top_trading_possition','DESC');
                }elseif($filterData['sortByPro']=='new arrivals'){
                    $propertyList->orderBy('id','DESC');
                }elseif($filterData['sortByPro']=='low to high'){
                    $propertyList->orderBy('total_price','ASC');
                }elseif($filterData['sortByPro']=='high to low'){
                    $propertyList->orderBy('total_price','DESC');
                }else{
                    $propertyList->orderBy('id','ASC');
                }
            }
            $result =$propertyList->paginate(2);
            $type =isset($request->proType)?$request->proType:'';
            return view('frontend.properties.property_data',compact('result','type'))->render();
        }
    }

    public function propertiesDetails(Request $request,$id){
        $propertyList = Properties::query();
        $propertyList->with(['residentialInfo','imageList']);
        $propertyList->where('id',$id);
        $result =$propertyList->first();
        if($result){   
            return view('frontend.properties.detail',compact('result'));
        }else{
            return redirect('/');
        }
    }

    public function propertiesCatDetails(Request $request,$cat_type){
        
        $propertyList = Properties::query();
        $propertyList->with(['residentialInfo','imageList']);
        $propertyList->where('sub_category',$cat_type);
        $propertyList->where('completed_property','Yes');
        $propertyList->where('status','Active');
        $propertyList->orderBy('id','DESC');
        $result =$propertyList->get();
        if(!$result->isEmpty()){   
            return view('frontend.properties.buy',compact('result','cat_type'));
        }else{
            return redirect('/');
        }
    }
        

}