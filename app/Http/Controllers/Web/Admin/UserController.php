<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\User;

use App\Models\Common;

use Sentinel;
use Image;
class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function countryList(){
        $countryList = DB::table('countries')->select('countries.name','countries.id')->orderBy('countries.name',"ASC")->get();

        $countries[''] = 'Please select country';
        foreach($countryList as $single){
            $countries[$single->id] = $single->name;		
        }
    	
		return $countries;
	}

    public function index()
    {
        //Get all the user
        $users = User::getAllUsers();	

	  	$countries = $this->countryList();
		$search_user_role = $search_mobile_number = $search_first_name=$search_last_name=$search_company_name = $search_country = $search_status = $search_state= $search_city =$search_sub_city ="";
		
		
		$status[''] = 'Status';
		$status['Active'] = 'Active';
		$status['Inactive'] = 'Inactive';
		
		
		$states[''] = 'Please select state';
		$cities[''] = 'Please select city';
		$sub_cities[''] = 'Please select sub city';
		$user_role[''] ="Role";
		$user_role[1] = "Admin";
		$user_role[3] = "Vendor";
		$user_role[5] = "Customer";
		$user_role[6] = "Marketing";
		$user_role[4] = "Sales";
		

	    return view('admin.users.index',compact('users','countries','states','cities','sub_cities','user_role','search_user_role','search_mobile_number','search_first_name','search_last_name'
		,'search_company_name','search_country','search_sub_city','search_country','search_state','search_city','search_status','status'));
    }

    public function add() 
    {   
		$CommonModel = new Common;
		$country = $CommonModel->countryList();
	  	$state[''] = "Select State";
		$city[''] = "Select City";
		$sub_city[''] = "Select Sub City";
		$user_role[1] = "Admin";
		$user_role[3] = "Vendor";
		$user_role[5] = "Customer";
		$user_role[6] = "Marketing";
		$user_role[4] = "Sales";
		
		$gender['Male'] = "Male";
		$gender['Female'] = "Female";
				
		$status['Active'] = 'Active';
		$status['Inactive'] = 'Inactive';
		
        return view('admin.users.add',compact('country','state','city','sub_city','user_role','gender','status'));
    }

    public function delete($id) {
        
		User::find($id)->delete();
		//DB::table('users')->where('id', '=', $id)->delete();
        return 'success';
    }

    public function editUser($id) 
    {
        $data =  User::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               
      
        $user = DB::table('users')
                ->where('id','=',$id)
                ->get()
                ->toArray();
		$u = $user[0];
		
		$CommonModel = new Common;
		$country = $CommonModel->countryList();
	  	$state[''] = "Select State";
		$city[''] = "Select City";
		$sub_city[''] = "Select Sub City";
		$user_role[1] = "Admin";
		$user_role[3] = "Vendor";
		$user_role[5] = "Customer";
		$user_role[6] = "Marketing";
		$user_role[4] = "Sales";
		
		$gender['Male'] = "Male";
		$gender['Female'] = "Female";
				
		$status['Active'] = 'Active';
		$status['Inactive'] = 'Inactive';
		
		$CommonModel=  new Common;	
		$state = $CommonModel->getStateByCountry($u->country);
		$city = $CommonModel->getCityByState($u->state);
		$sub_city = $CommonModel->getSubCityByCity($u->city);
		
		
        return view('admin.users.edit',compact('u','country','state','city','sub_city','user_role','gender','status'));

    }

    public function user_search(Request $request)
    {
		
		$search_user_role = $request->search_user_role;
		$search_mobile_number = $request->search_mobile_number;
		$search_first_name = $request->search_first_name;
		$search_last_name = $request->search_last_name;
		$search_company_name = $request->search_company_name;
		$search_country = $request->search_country;
		$search_status = $request->search_status;
		$search_state = $request->search_state;
		$search_city = $request->search_city;
		$search_sub_city = $request->search_sub_city;
				
		$states[''] = 'Please select state';
		$cities[''] = 'Please select city';
		$sub_cities[''] = 'Please select sub city';
	
		$status[''] = 'Status';
		$status['Active'] = 'Active';
		$status['Inactive'] = 'Inactive';
		
		$user_role[''] ="Role";
		$user_role[1] = "Admin";
		$user_role[3] = "Vendor";
		$user_role[5] = "Customer";
		$user_role[6] = "Marketing";
		$user_role[4] = "Sales";
	
		
		if($search_country>0){
		
		$stateList = DB::table('states')
            ->select('states.name','states.id')
           ->where("states.country_id",$search_country)
		   ->orderBy('states.name',"ASC")		
	
		    ->get();
	
			
			
			foreach($stateList as $single){
				$states[$single->id] = $single->name;		
		}	
	}
	
	if($search_country>0 && $search_state>0){
		
		$citiesList = DB::table('cities')
            ->select('cities.name','cities.id')
           ->where("cities.state_id",$search_state)
		   ->orderBy('cities.name',"ASC")		
	
		    ->get();
	
			
			
			foreach($citiesList as $single){
				$cities[$single->id] = $single->name;		
		}	
	}
	
	if($search_country>0 && $search_state>0 && $search_city>0){
		
		$subcitiesList = DB::table('sub_cities')
            ->select('sub_cities.name','sub_cities.id')
           ->where("sub_cities.city_id",$search_city)
		   ->orderBy('sub_cities.name',"ASC")		
	
		    ->get();
	
			
			
			foreach($subcitiesList as $single){
				$sub_cities[$single->id] = $single->name;		
		}	
	}
		$countries = $this->countryList();
	   $users = User::getAllUsers($search_user_role,$search_mobile_number,$search_first_name,$search_last_name,$search_company_name,$search_country,$search_state,$search_city,$search_sub_city,$search_status);		
		
		
	    return view('admin.users.index',compact('users','countries','states','cities','sub_cities','user_role','search_user_role','search_mobile_number','search_first_name','search_last_name'
		,'search_company_name','search_country','search_sub_city','search_country','search_state','search_city','search_status','status'));

     
    }
	public function status($id,$status) {
      $User = User::find($id);
	  $User->status = $status;
	  $User->save();
	  
	     return 'success';
    }
	

    public function editPostUser(Request $request,$id) {
        
      //  $checkUser = User::where('name',$request->name)->where('country_id',$request->country)->where("id",'!=',$id)->first();
				
        if(isset($checkUser->id) && $checkUser->id >0){
        //    return  redirect('admin/user/edit/'.$id)->with(['error' => 'Sorry user already exists.']);
        }
		$User = User::find($id);
        
		$User->status= $request->status;
		$User->user_role = $request->user_role;
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
		   
        return redirect('admin/users')->with(['success' => 'User has been successfully updated.']);

    }

    public function addUser(Request $request,$id="") {

	    $checkUser = User::where('email',$request->email)->where('email',$request->email)->first();
				
        if(isset($checkUser->id) && $checkUser->id >0){
         
		    return  redirect('admin/users/add')->with(['error' => 'Sorry email address already exists.']);
        }
		$checkUser = User::where('mobile',$request->mobile)->where('mobile',$request->mobile)->first();
		if(isset($checkUser->id) && $checkUser->id >0){
         
		    return  redirect('admin/users/add')->with(['error' => 'Sorry mobile number already exists.']);
        }
		
		$User = new User();
		$User->status= $request->status;
		$User->user_role = $request->user_role;
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

		
		return redirect('admin/users')->with(['success' => 'User has been successfully add.']);

    }
}
