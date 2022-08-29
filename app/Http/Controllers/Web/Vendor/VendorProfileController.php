<?php

namespace App\Http\Controllers\Web\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Common;

use Sentinel;
use Image;
class VendorProfileController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index() 
    {
        $data =  User::where('id',Auth::id())->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               
      
        $user = DB::table('users')
                ->where('id','=',Auth::id())
                ->get()
                ->toArray();
		$u = $user[0];
		
		$CommonModel = new Common;
		$country = $CommonModel->countryList();
	  	$state[''] = "Select State";
		$city[''] = "Select City";
		$sub_city[''] = "Select Sub City";
		
		$gender['Male'] = "Male";
		$gender['Female'] = "Female";
				
		$CommonModel=  new Common;	
		$state = $CommonModel->getStateByCountry($u->country);
		$city = $CommonModel->getCityByState($u->state);
		$sub_city = $CommonModel->getSubCityByCity($u->city);
		
		
        return view('vendor.profile.index',compact('u','country','state','city','sub_city','gender'));

    }
	

    public function editPostProfile(Request $request) {
      $id =   Auth::id();
     
	 $checkUser = User::where('email',$request->email)->where('id','!=',$id)->first();
				
        if(isset($checkUser->id) && $checkUser->id >0){
         
		    return  redirect('vendor/profile')->with(['error' => 'Sorry email address already exists.']);
        }
		$checkUser = User::where('mobile',$request->mobile)->where('id','!=',$id)->first();
		if(isset($checkUser->id) && $checkUser->id >0){
         
		    return  redirect('vendor/profile')->with(['error' => 'Sorry mobile number already exists.']);
        }
	 
		$User = User::find($id);
        
		$User->user_name = $request->user_name;
		$User->first_name = $request->first_name;
		$User->last_name = $request->last_name;
		$User->company_name = $request->company_name;
		$User->gst_number = $request->gst_number;
		$User->email  = $request->email;
		$User->mobile = $request->mobile;
		$User->dob = $request->dob;
		$User->gender = $request->gender;
		$User->bio = $request->bio;
		$User->country = $request->country;
		$User->state = $request->state;
		$User->city = $request->city;
		$User->sub_city = $request->sub_city;
		$User->address = $request->address;
		$User->zipcode = $request->zipcode;
		$User->save();
        
		$UserID = $User->id;
		if($request->hasFile('inputFile')) { 

            $photo = $request->file('inputFile');
            $imagename = $photo->getClientOriginalName();  
        
            $target_dir = "images/users/".$UserID;    

            if (!file_exists($target_dir))
            {
                mkdir($target_dir, 0777, true);
            }

            $destinationPath = public_path().'/images/users/'. $UserID;
            $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
            
			$thumb_img->save($destinationPath.'/'.$imagename,80);
			$UsersFind = User::find($UserID);
        	$UsersFind->pic = $imagename;
			$UsersFind->save();
		}   
		   
        return redirect('vendor/profile')->with(['success' => 'Profile has been successfully updated.']);

    }

   
}
