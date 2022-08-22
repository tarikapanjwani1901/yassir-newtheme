<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Reviews;
use App\Models\Common;



class ReviewsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {
        //Get all the state
        $reviews = Reviews::getAllReviews();	

	  $search_property = $search_user =$search_rating = $search_from=$search_to = "";
	  $usersData = Common::getAllUsersList();
	  $PropetyData = Common::getAllPropertyList();
		
	  $users[''] = "Please select user";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		$properties[''] = "Please select property";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		foreach($PropetyData as $single){
			$properties[$single->id]=  $single->project_name;	
		}
		
		
	    return view('admin.property_reviews.index',compact('reviews','users','properties','search_property','search_user','search_rating','search_from','search_to'));
    }

    public function add() 
    {   
		$usersData = Common::getAllUsersList();
		$PropetyData = Common::getAllPropertyList();
	   
	   	$users[''] = "Please select user";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		$properties[''] = "Please select property";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		foreach($PropetyData as $single){
			$properties[$single->id]=  $single->project_name;	
		}
	   
        return view('admin.property_reviews.add',compact('users','properties'));
    }

    public function delete(Request $request,$id) {
        DB::table('property_review')->where('id', '=', $id)->delete();
		$request->session()->flash('success', 'Reviews has been successfully deleted.');
		return 'success';
    }

    public function editReviews($id) 
    {
        $data =  Reviews::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }      
		$r = $data;        
		$usersData = Common::getAllUsersList();
		$PropetyData = Common::getAllPropertyList();
	   
	   	$users[''] = "Please select user";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		$properties[''] = "Please select property";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		foreach($PropetyData as $single){
			$properties[$single->id]=  $single->project_name;	
		}
	    
      
       
	    return view('admin.property_reviews.edit',compact('r','users','properties'));

    }

    public function reviews_search(Request $request)
    {

	  $search_property =$request->search_property;
	   $search_user =$request->search_user;
	   $search_rating = $request->search_rating;
	   $search_from=$request->search_from;
	   $search_to = $request->search_to;
	   
	     $reviews = Reviews::getAllReviews($search_property,$search_user,$search_rating,$search_from,$search_to);	

	  $usersData = Common::getAllUsersList();
	  $PropetyData = Common::getAllPropertyList();
		
	  $users[''] = "Please select user";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		$properties[''] = "Please select property";
		foreach($usersData as $single){
			$users[$single->id]=  $single->first_name." ".$single->last_name;	
		}
		foreach($PropetyData as $single){
			$properties[$single->id]=  $single->project_name;	
		}
		
		
	    return view('admin.property_reviews.index',compact('reviews','users','properties','search_property','search_user','search_rating','search_from','search_to'));
    }

    public function editPostReviews(Request $request,$id) {
        
      
        $reviews =  Reviews::find($id);
	    $reviews->property_id = $request->property_id;
		$reviews->user_id = $request->user_id;
		$reviews->comment = $request->comment;
		$reviews->rating = $request->rating;
	  	$reviews->save();
   
        return redirect('admin/reviews')->with(['success' => 'Reviews has been successfully updated.']);

    }

    public function addReviews(Request $request) {

	    $reviews = new Reviews;
	    $reviews->property_id = $request->property_id;
		$reviews->user_id = $request->user_id;
		$reviews->comment = $request->comment;
		$reviews->rating = $request->rating;
	  	$reviews->save();

        return redirect('admin/reviews')->with(['success' => 'Review has been successfully add.']);

    }
}
