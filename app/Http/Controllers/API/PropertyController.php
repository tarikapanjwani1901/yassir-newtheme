<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\PropertiesImages;
use App\Models\PropertyBookVisit;
use App\Models\PropertyReview;
use App\Models\PropertyUnits;
use App\Models\PropertyUnitsAreas;
use App\Models\User;
use App\Models\VendorListing;
use App\Models\VendorListingFavourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;
use Image;

class PropertyController extends Controller
{
    public function __construct() {
        //$this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function getVendorProperty(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        // check role of user id is vendor
        $user = DB::table('role_users')->select('role_id')->where('user_id', $request->user_id)->where('role_id',3)->first();
        
        if(empty($user)){
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => "Vendor not found",
                'data'    => array()
            ));
        
        }else{
           
            // get property of vendor
            $property = Properties::getPropertyByUserID($request->user_id,'');

            $list = array();
            $i=0;
            if(isset($property) && sizeof($property)>0){
                foreach($property as $k=>$v){
                    $list[$i]['id'] = $v->id;
                    $list[$i]['title'] = $v->project_name;
                    $list[$i]['possession_date'] = $v->possession_date;
                    $list[$i]['address'] = $v->address;
                    $list[$i]['price'] = ''; //$v->price;
                    //$list[$i]['image'] = "public/images/".$v->vl_id."/featured_image/featured_image.jpg";

                    // get property image by id 
                    $property_image = PropertiesImages::getPropertyImageById($v->id);
                    if(isset($property_image->image) && $property_image->image!=''){
                        $list[$i]['image'] = "public/images/properties/".$v->id."/".$property_image->image;
                    }
                    else{
                        $list[$i]['image'] = ''; // "public/images/".$v->vl_id."/featured_image/featured_image.jpg";
                    }

                    $i++;
                }
            }

            return \Illuminate\Support\Facades\Response::json(array(
                'success' => true,
                'code'    => 200,
                'message' => "Success",
			    'data'    => $list));

        }
        
    }

    public function getPropertyDetails(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'property_id' => 'required',
            'user_id' => 'required',
        ]);
		  
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }
		$listingid = $request->property_id;	

		
        $result = DB::table('vendor_listing')
            ->select(DB::raw('vendor_listing.*, vendor_listing_review.*,vendor_listing.first_name as vfname,vendor_listing.last_name as vlname, users.*,users.email as u_email,users.company_name as c_name,vendor_listing.website as web_site,vendor_listing.price'))
            ->leftJoin('vendor_listing_review', 'vendor_listing.vl_id', '=', 'vendor_listing_review.l_id')
            ->join('users', 'vendor_listing.u_id', '=', 'users.id')
            ->where('vendor_listing.vl_id', '=', $listingid)
            ->orderBy('vendor_listing_review.l_review', 'desc')
            ->orderBy('vendor_listing_review.rcreated_at', 'desc')
            ->get()->toArray();
			
           $avgRating = 0;
       $shop_condition = DB::table('vendor_listing')->select('l_sub_category')->where('vendor_listing.url_name', '=', $result[0]->url_name)->get();
	
		foreach ($result as $key => $value) {
            $avgRating+= $value->l_review;
        }

        if ($avgRating != '0') {
            $avgRating = $avgRating/count($result);
        }

        $reviewResult = DB::table('vendor_listing_review')->where('vendor_listing_review.l_id', '=', $listingid)->orderBy('vendor_listing_review.rcreated_at', 'desc')->paginate(5);

        if ($result[0]->l_category == '4') {
            $arr = array();
            $categoryname = array();

            $category =  DB::select('SELECT
                        *
                        FROM
                        `vendor_listing`
                        LEFT JOIN `vendor_listing_review`
                        ON `vendor_listing`.`vl_id` = `vendor_listing_review`.`l_id`
                        INNER JOIN `users`
                        ON `vendor_listing`.`u_id` = `users`.`id`
                        LEFT JOIN `product`
                        ON `product`.`v_id` = `vendor_listing`.`u_id`
                        LEFT JOIN `product_category`
                        ON FIND_IN_SET(
                        `product_category`.`cate_id`,
                        `product`.`product_category`
                        )
                        WHERE `vendor_listing`.`vl_id` = '.$listingid.'
                        ORDER BY `vendor_listing_review`.`l_review` DESC,
                        `vendor_listing_review`.`rcreated_at` DESC'
                    );

                // echo "<pre>"; print_r($category); exit;

            $listCate = explode(',', $result[0]->product_category);

            foreach($category as $s) {
                if (in_array($s->cate_id, $listCate)) {
                    $arr[$s->cate_id][$s->id] = $s->product_name;
                    $categoryname[$s->cate_id] = $s->cate_name;
                }
            }
        }

        $view = DB::table('vendor_listing')
            ->select(DB::raw('vendor_listing.*, users.*'))
            ->join('users', 'vendor_listing.u_id', '=', 'users.id')
            ->where('vendor_listing.vl_id', '=', $listingid)
            ->groupBy('vendor_listing.vl_id')
            ->get();
			
			
            $product_info =  DB::select('SELECT
                    *
                    FROM
                    `vendor_listing`
                    LEFT JOIN `vendor_listing_review`
                    ON `vendor_listing`.`vl_id` = `vendor_listing_review`.`l_id`
                    INNER JOIN `users`
                    ON `vendor_listing`.`u_id` = `users`.`id`
                    LEFT JOIN `product`
                    ON `product`.`v_id` = `vendor_listing`.`u_id`
                    LEFT JOIN `product_category`
                    ON FIND_IN_SET(
                    `product_category`.`cate_id`,
                    `product`.`product_category`
                    )
                    WHERE `vendor_listing`.`vl_id` = '.$listingid.'
                    ORDER BY `vendor_listing_review`.`l_review` DESC,
                    `vendor_listing_review`.`rcreated_at` DESC'
            );    
    	
		
		$path = public_path().'/images/'.$result[0]->vl_id.'/pics/';
        $dh  = opendir($path);
        $ignoreArry = array('.','..','...','....');
        while (false !== ($filename = readdir($dh))) {
            if (!in_array($filename, $ignoreArry)) {
                $files[] = $filename;
            }
        }
        $bpath = public_path().'/images/'.$result[0]->vl_id.'/banner/';
        if (is_dir($bpath)) {
            $bdh  = opendir($bpath);
            $bignoreArry = array('.','..','...','....');
            while (false !== ($filename = readdir($bdh))) {
                if (!in_array($filename, $bignoreArry)) {
                    $bfiles[] = $filename;
                }
            }
        }
	
		$price = $result[0]->price;
		$short_title = $result[0]->short_title;
		$carpet_area = json_decode($result[0]->carpet_area,true);
		$price_perft = $result[0]->price_perft;
		$furnishing = $result[0]->furnishing;
        $car_parking = $result[0]->car_parking;
        $type = json_decode($result[0]->type,true);
        $floor = $result[0]->floor;
        $status = $result[0]->status;
        $super_area = json_decode($result[0]->super_area,true);
        $bathroom = json_decode($result[0]->bathroom,true);
        $bedroom = json_decode($result[0]->bedroom,true);
        $masterArray = array();
        
        foreach ($super_area['type'] as $key => $value) {
            foreach ($super_area[$value] as $k1 => $v1) {
                
                $masterArray[$value][$v1]['carpet_area'][] = $carpet_area[$value][$k1];
                $masterArray[$value][$v1]['super_area'][] = $super_area[$value][$k1];
                $masterArray[$value][$v1]['type'][] = $type[$value][$k1];
                $masterArray[$value][$v1]['bathroom'][] = $bathroom[$value][$k1];
                $masterArray[$value][$v1]['bedroom'][] = $bedroom[$value][$k1];
            }
        }   

		$returnData = array();
		$returnData['title'] =$result[0]->l_title ;
		$returnData['short_title'] =$result[0]->short_title;
		$returnData['address'] = $result[0]->l_nearby;
		$returnData['avg_rating'] = $avgRating;
		$returnData['reviews'] = $reviewResult->total() ;
		$returnData['viewed'] = $result[0]->l_view ;  
		$returnData['description'] = nl2br($result[0]->l_description); 
		$returnData['website'] = ""; 
		if ($result[0]->web_site){
		if(strpos($result[0]->web_site, "http://")){
            $returnData['website'] = $result[0]->web_site;
		}else{
			$returnData['website'] = "http://".$result[0]->web_site;
		}
	}
 
		$returnData['slider'] = array();
		if (!empty($bfiles)) {
			foreach ($bfiles as $key => $value) {
				$returnData['slider'][] ="public/images/".$result[0]->vl_id."/banner/".$value;
			}
		}else{
			
			foreach ($files as $key => $value) {
				$returnData['slider'][] ="public/images/".$result[0]->vl_id."/pics/".$value;
			}
		}
		$returnData['gallery'] = array();
		foreach ($files as $key => $value) {
				$returnData['gallery'][] ="public/images/".$result[0]->vl_id."/pics/".$value;
			}
		
		$amenities = explode(',', $result[0]->amenities);
		$returnData['amenities']= array();
		foreach ($amenities as $key => $value) {
			if(!empty($value)){
				$returnData['amenities'][] =$value;
			}
		}
		$returnData['tags'] =array();
		$tags = explode(',', $result[0]->l_key_area);
		foreach ($tags as $key => $value) {
			if(!empty($value)){
				$returnData['tags'][] =$value;
			}
		}
		$returnData['reviews_list'] = array();
		foreach ($reviewResult as $k => $v) { 
				$returnData['reviews_list'][] =array('reviewer_name'=>$v->reviewer_name,'review'=>$v->l_review,'comment'=>$v->l_comment,'date'=>$v->rcreated_at);
			
		}
		$returnData['location'] = $result[0]->l_location;
		$returnData['vendor_logo'] = 'public/images/logo/'.$result[0]->vl_id.'/'.$result[0]->logo;
		$returnData['vendor_first_name'] = $result[0]->vfname;
		$returnData['vendor_last_name'] = $result[0]->vlname ;
		$returnData['vendor_company_name'] = $result[0]->c_name ;
		
		$returnData['phone'] = $result[0]->Phone ;
		$returnData['email'] = $result[0]->email ;
		$returnData['facebook'] = $result[0]->facebook;
		$returnData['youtube'] = $result[0]->youtube ;
		
		$returnData['achievements'] = array();
		if($result[0]->achievements){
			$explode = explode('<br />', nl2br($result[0]->achievements));
			foreach ($explode as $key => $value) {
				if (trim($value) != ''){
					$returnData['achievements'][] =  trim($value);
				}
			}
			
			}
		$returnData['past_projects'] = array();
		if($result[0]->past_projects != ''){
			$explode = explode('<br />', nl2br($result[0]->past_projects)); 
			foreach ($explode as $key => $value) {
				if (trim($value) != ''){
					$returnData['past_projects'][] =  trim($value);
				}
			}
		}
		
		
		$returnData['current_project'] = array();
		if($result[0]->current_project != ''){
			$explode = explode('<br />', nl2br($result[0]->current_project)); 
			foreach ($explode as $key => $value) {
				if (trim($value) != ''){
					$returnData['current_project'][] =  trim($value);
				}
			}
		}
		
		$week = array(
                '1' => 'Monday',
                '2' => 'Tuesday',
                '3' => 'Wednesday',
                '4' => 'Thursday',
                '5' => 'Friday',
                '6' => 'Saturday',
                '7' => 'Sunday');

        $hrs = explode(',',$result[0]->working_hr);
		$returnData['working_hours']= array(); 
		for ($i=1; $i < 8; $i++) { 
			$time = 'Close';
			if (in_array($i, $hrs)) {
				$time = $result[0]->working_time;
			}
			$returnData['working_hours'][] = array('day'=>$week[$i],'time'=>$time);
		}
		
		
		
		foreach($shop_condition as $shop){
			if($shop->l_sub_category==2){
				$counter=0;
				foreach($masterArray as $key => $v){
					
					foreach($shop_condition as $shop){
						if($shop->l_sub_category=='1'){
							foreach ($v as $kv => $vv) {
								$ans = str_replace('.', '&#8228;', $kv);
								$returnData['project_details'][$key]['square'][] = $ans. ' Sq.Ft';
								
							}
						  }else{
							foreach ($v as $kv => $vv) {
								$ans = str_replace('.', '&#8228;', $kv);
								$returnData['project_details'][$key]['square'][] = $ans. ' Sq.Yard';
								
							}
						  }
						}
						
				foreach ($v as $kv => $vv){
					$ans = str_replace('.', '&#8228;', $kv);
					foreach($shop_condition as $shop){
						if($shop->l_sub_category==1){
							$returnData['project_details'][$key][$vv['super_area'][0].' Sq.Ft']['super_area']=$vv['super_area'][0].' Sq.Ft';
							$returnData['project_details'][$key][$vv['super_area'][0].' Sq.Ft']['carpet_area']=$vv['carpet_area'][0].' Sq.Ft'; 
						}else{
							$returnData['project_details'][$key][$vv['super_area'][0].' Sq.Yard']['super_area']=$vv['super_area'][0].' Sq.Yard';
							$returnData['project_details'][$key][$vv['super_area'][0].' Sq.Yard']['carpet_area']=$vv['carpet_area'][0].' Sq.Yard';
						
						}	
					}	
						$returnData['project_details'][$key]['bathrooms']=$vv['bathroom'][0];
						$returnData['project_details'][$key]['bedroom']=$vv['bedroom'][0];
						$returnData['project_details'][$key]['transaction_type']=$vv['type'][0];
						foreach($view as $info6){
							if($info6->car_parking == 1){
									$returnData['project_details'][$key]['car_parking']="Yes";
							}else{
									
									$returnData['project_details'][$key]['car_parking']="No";
							}
							$returnData['project_details'][$key]['furnishing']=$info6->furnishing;
						}
					$returnData['project_details'][$key]['listed_by']='Owner';	
				}
							
				$counter++;
				}
			}
		}
		$returnData['rera_number']=$result[0]->rera_number;
		$returnData['brochure']="";
		if($result[0]->l_brochure){
			$returnData['brochure']='public/images/brochure/'.$result[0]->vl_id.'/'.$result[0]->l_brochure;
		}
		$returnData['video']="";
		if($result[0]->l_extravideo){
			$directory = "public/images/extravideo/".$result[0]->vl_id."";
                   $files = array_values(array_diff(scandir($directory), array('..', '.')));
			if(isset($directory)){
				$returnData['video']='public/images/extravideo/'.$result[0]->vl_id.'/'.$value;		
			}	
		}
		$returnData['promo_video']="";
		if ( $result[0]->l_video_link != '' || $result[0]->l_video != ''){
				$returnData['promo_video']='public/images/'.$result[0]->vl_id.'/video/'.$result[0]->l_video;
		}
		 return \Illuminate\Support\Facades\Response::json(array(
                'success' => true,
                'code'    => 200,
                'message' => "Success",
			    'data'    => $returnData));
	
		
	}

    public function addFavourite(Request $request) {
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'property_id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $user = DB::table('users')->select('*')->where('id', $request->user_id)->first();
        
        if(empty($user)){
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => "User not found",
                'data'    => array()
            ));
        
        }else{

            // check if already added as favourite then no change
            $favourite_count = VendorListingFavourite::getFavouritePropertyCountById($request->user_id,$request->property_id);
            if($favourite_count==0){
                $vendor_list_favourite = new VendorListingFavourite();
                $vendor_list_favourite->vl_id = $request->property_id;
                $vendor_list_favourite->u_id = $request->user_id;
                $vendor_list_favourite->save();

                return \Illuminate\Support\Facades\Response::json(array(
                    'success' => true,
                    'code'    => 200,
                    'message' => "Property added as favourite",
                    'data'    => array()
                ));
            }
            else{
                return \Illuminate\Support\Facades\Response::json(array(
                    'success' => true,
                    'code'    => 200,
                    'message' => "Property already added as favourite",
                    'data'    => array()
                ));
            }
        }
    }

    public function unFavourite(Request $request) {
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'property_id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $user = DB::table('users')->select('*')->where('id', $request->user_id)->first();
        
        if(empty($user)){
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => "User not found",
                'data'    => array()
            ));
        
        }else{

            // check if added as favourite then no unfavourite
            $favourite_property = VendorListingFavourite::getFavouritePropertyById($request->user_id,$request->property_id);
            if(isset($favourite_property->id) && $favourite_property->id>0){
                $vendor_list_favourite = VendorListingFavourite::find($favourite_property->id);
                $vendor_list_favourite->delete();

                return \Illuminate\Support\Facades\Response::json(array(
                    'success' => true,
                    'code'    => 200,
                    'message' => "Property removed as favourite",
                    'data'    => array()
                ));
            }
            else{
                return \Illuminate\Support\Facades\Response::json(array(
                    'success' => true,
                    'code'    => 200,
                    'message' => "Property was not added as favourite",
                    'data'    => array()
                ));
            }
        }
    }

    public function getfavourite(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $user = DB::table('users')->select('*')->where('id', $request->user_id)->first();

        if(empty($user)){
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => "User not found",
                'data'    => array()
            ));
        
        }else{
           
            // get property of vendor
            $property = Properties::getFavouritePropertyListById($request->user_id);

            $list = array();
            $i=0;
            if(isset($property) && sizeof($property)>0){
                foreach($property as $k=>$v){
                    $list[$i]['id'] = $v->id;
                    $list[$i]['title'] = $v->project_name;
                    $list[$i]['possession_date'] = $v->possession_date;
                    $list[$i]['address'] = $v->address;
                    $list[$i]['price'] = '';
                    $list[$i]['image'] = ""; //"public/images/".$v->vl_id."/featured_image/featured_image.jpg";
                    $i++;
                }
            }

            return \Illuminate\Support\Facades\Response::json(array(
                'success' => true,
                'code'    => 200,
                'message' => "Success",
			    'data'    => $list));

        }
        
    }

    public function bookVisit(Request $request)
    {
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id'=> 'required',
            'property_id'=> 'required',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'date' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }
        
        $property = new PropertyBookVisit();
        $property->user_id = $request->user_id;
        $property->listing_id = $request->property_id;
        $property->name = $request->name;
        $property->email = $request->email;
        $property->contact = $request->contact;
        $property->book_date = $request->date;
        $property->book_from_time = $request->from_time;
        $property->book_to_time = $request->to_time;
        $property->type = "bookvisit";
        $property->save();

        return \Illuminate\Support\Facades\Response::json(
            array('success' => true,
            'code'    => 200,
            'message' => "Book Visit has been done successfully",
			'data'    => array())
        );

    }

    public function getUserProperty(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }
           
        // get property of vendor
        $property = Properties::getPropertyByUserID($request->user_id,10);

        $list = array();
        $i=0;
        if(isset($property) && sizeof($property)>0){
            foreach($property as $k=>$v){
                $list[$i]['id'] = $v->id;
                $list[$i]['title'] = $v->project_name;
                $list[$i]['possession_date'] = $v->possesion_date;
                $list[$i]['address'] = $v->address;
                $list[$i]['price'] = '';

                // get property image by id 
                $property_image = PropertiesImages::getPropertyImageById($v->id);
                if(isset($property_image->image) && $property_image->image!=''){
                    $list[$i]['image'] = "public/images/properties/".$v->id."/".$property_image->image;
                }
                else{
                    $list[$i]['image'] = ''; // "public/images/".$v->vl_id."/featured_image/featured_image.jpg";
                }
                $i++;
            }
        }

        return \Illuminate\Support\Facades\Response::json(array(
            'success' => true,
            'code'    => 200,
            'message' => "Success",
            'data'    => $list)
        );
        
    }

    public function bookInquiry(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'property_id'=> 'required',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $property_book_visit = new PropertyBookVisit();
        $property_book_visit->user_id = $request->user_id;
        $property_book_visit->listing_id = $request->property_id;
        $property_book_visit->name = $request->name;
        $property_book_visit->email = $request->email;
        $property_book_visit->contact = $request->contact;
        $property_book_visit->message = $request->message;
        $property_book_visit->type = "inquiry";
        $property_book_visit->save();

        $book_visit_id = $property_book_visit->id;

        /*if($book_visit_id>0){
            // send message to who raise inquiry
            $otpmessage = urlencode("Thank you for contacting us.");
            $phone = '9712618161'; //$request->contact;

            $curl_handle=curl_init();
            curl_setopt($curl_handle, CURLOPT_URL,'http://sms.incisivewebsolution.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=667810964beb48fcf4f157b070dd89fa&message='.$otpmessage.'&senderId=YASSIR&routeId=1&mobileNos='.$phone.'&smsContentType=english');
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
            $query = curl_exec($curl_handle);
            curl_close($curl_handle);

            // send message to owner of property

            $owner_mobile = '9712618161'; 
            $otpownermessage = urlencode("Tarika has requested for inquiry. Please find contact info as below.");
            $curl_handle=curl_init();
            curl_setopt($curl_handle, CURLOPT_URL,'http://sms.incisivewebsolution.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=667810964beb48fcf4f157b070dd89fa&message='.$otpownermessage.'&senderId=YASSIR&routeId=1&mobileNos='.$owner_mobile.'&smsContentType=english');
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
            $query = curl_exec($curl_handle);
            curl_close($curl_handle);

        }*/

        return \Illuminate\Support\Facades\Response::json(
            array('success' => true,
            'code'    => 200,
            'message' => "Inquiry has been submitted successfully",
			'data'    => array())
        );

    }
    
    public function getUserInquiries(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $property_inquiries = PropertyBookVisit::getAllUserInquiries($request->user_id);

        $list = array();
        $i=0;
        if(isset($property_inquiries) && sizeof($property_inquiries)>0){
            foreach($property_inquiries as $k=>$v){
                $list[$i]['id'] = $v->id;
                
                // get property image by id 
                $property_image = PropertiesImages::getPropertyImageById($v->id);
                if(isset($property_image->image) && $property_image->image!=''){
                    $list[$i]['image'] = "public/images/properties/".$v->id."/".$property_image->image;
                }
                else{
                    $list[$i]['image'] = ''; // "public/images/".$v->vl_id."/featured_image/featured_image.jpg";
                }

                $list[$i]['title'] = $v->project_name;
                $list[$i]['inquiry_date'] = date("d-M-Y",strtotime($v->created_at));
                $list[$i]['address'] = $v->address;
                $list[$i]['status'] = $v->project_status;
                $i++;
            }
        }

        return \Illuminate\Support\Facades\Response::json(array(
            'success' => true,
            'code'    => 200,
            'message' => "Success",
            'data'    => $list)
        );

    }

    public function getVendorInquiries(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $property_inquiries = PropertyBookVisit::getAllVendorInquiriesList($request->user_id);

        $list = array();
        $i=0;
        if(isset($property_inquiries) && sizeof($property_inquiries)>0){
            foreach($property_inquiries as $k=>$v){
                $list[$i]['id'] = $v->vl_id;

                // get property image by id 
                $property_image = PropertiesImages::getPropertyImageById($v->id);
                if(isset($property_image->image) && $property_image->image!=''){
                    $list[$i]['image'] = "public/images/properties/".$v->id."/".$property_image->image;
                }
                else{
                    $list[$i]['image'] = ''; // "public/images/".$v->vl_id."/featured_image/featured_image.jpg";
                }

                $list[$i]['title'] = $v->project_name;
                $list[$i]['inquiry_date'] = date("d-M-Y",strtotime($v->created_at));
                $list[$i]['address'] = $v->address;
                $list[$i]['status'] = $v->property_status;
                $i++;
            }
        }

        return \Illuminate\Support\Facades\Response::json(array(
            'success' => true,
            'code'    => 200,
            'message' => "Success",
            'data'    => $list)
        );

    }

    public function addReview(Request $request) {
        
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

        //valid credential
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'property_id' => 'required',
            'rating' =>'required',
            'comment' =>'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $property_review = new PropertyReview();
        $property_review->user_id = $request->user_id;
        $property_review->property_id = $request->property_id;
        $property_review->comment = $request->comment;
        $property_review->rating = $request->rating;
        $property_review->save();

        return \Illuminate\Support\Facades\Response::json(
            array('success' => true,
            'code'    => 200,
            'message' => "Review added successfully",
			'data'    => array())
        );
    }

    public function addProperty(Request $request)
    {
        $token = CommonController::checkAccessToken();
        if ($token->getData()->success != 1) {
            return CommonController::customAPIResponse(false, 401, 'Invalid token.', []);
        }

         //valid credential
         $validator = Validator::make($request->all(), [
            // 'user_id' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = $validator->errors()->all(':message');
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => $error[0],
                'data'    => (object) $errors
            ));
        }

        $Properties = new Properties();
        $Properties->added_by = $request->user_id;
        $Properties->property_vendor = $request->property_vendor;
		$Properties->property_for = $request->property_for; 
		$Properties->category = $request->category; 
		$Properties->sub_category = $request->sub_category; 
		$Properties->status = $request->status;

        $sub_category = $request->sub_category;
		$property_type = $request->property_type;

        //step 1
		
		$Properties->property_vendor = $request->property_vendor;
		$Properties->property_for = $request->property_for; 
		$Properties->category = $request->category; 
		$Properties->sub_category = $request->sub_category; 
		$Properties->property_type =  $request->property_type;
		$Properties->project_name =  $request->project_name;
		$Properties->country =  $request->country;
		$Properties->state =  $request->state;
		$Properties->city =  $request->city;
		$Properties->sub_city =  $request->sub_city;
		$Properties->area =  $request->area;
		$Properties->zip_code =  $request->zip_code;
		$Properties->address =  $request->address;
        $Properties->save();

        $id = $Properties->id;

        $commercial_property_type =$locality=$located_inside =$what_kind_of_vacantland =$retail_type =$what_kind_of_hospitality=$shop_located_inside
		=$rera_number=$rera_link =$property_areas= "" ;
		
        $area_details = $plot_area =$carpet_area =$property_status =$age_of_property =$possession_month=$possession_year =$number_of_washrooms =$super_builtup_area =
        $pre_leased =$fire_noc_certified =$number_of_rooms =$number_of_balconies =$furnishing_detail =$furnished_data =$entrance_width =
        $ceiling_heights =$number_of_private_washroom =$number_of_shared_washroom =$conference_room =$reception_area =$facilities =$fire_safety_measures =$number_of_floor =
        $number_of_passenger_lifts =$number_of_service_lift =$number_of_staircases =$number_of_parking_allotted =$parkings =$suitable_business_type  = $other_features = $property_ownership = $expected_price = $basic_price = $taxandgovcharges_price = $all_inclusive_price= 
        $booking_amount= $maintenance_type = $membership_charge = $maintenance = $total_price = "";

        if($sub_category=="Residential"){
			if(!empty($request->propertyDetails[str_replace(" ","",$property_type)])){
				foreach($request->propertyDetails[str_replace(" ","",$property_type)]  as $singleBhkType=>$singleBhkData){
                    $PropertyUnits = new PropertyUnits();
                    $PropertyUnits->property_id = $id;
                    $PropertyUnits->property_unit = $singleBhkType;
                    if(isset($singleBhkData['number_of_bedrooms'])){
                        $PropertyUnits->number_of_bedrooms = $singleBhkData['number_of_bedrooms'];
                    }
                    
                    if(isset($singleBhkData['number_of_bathrooms'])){
                        $PropertyUnits->number_of_bathrooms = $singleBhkData['number_of_bathrooms'];
                    }if(isset($singleBhkData['number_of_balconies'])){
                        $PropertyUnits->number_of_balconies = $singleBhkData['number_of_balconies'];
                    
                    }
                    $PropertyUnits->other_room =  "";
                    if(isset($singleBhkData['other_room']) && !empty($singleBhkData['other_room'])){
                        $PropertyUnits->other_room = implode(", ",$singleBhkData['other_room']);
                    }
                    
                    $PropertyUnits->furnished_details =  "";
                    if(isset($singleBhkData['furnished_details']) && !empty($singleBhkData['furnished_details'])){
                        $PropertyUnits->furnished_details = implode(", ",$singleBhkData['furnished_details']);
                    }
							
                    $PropertyUnits->reserved_parking =  "";
                    if(isset($singleBhkData['reserved_parking']) && !empty($singleBhkData['reserved_parking'])){
                        $PropertyUnits->reserved_parking = implode(", ",$singleBhkData['reserved_parking']);
                    }
                    if(isset($singleBhkData['number_of_floor'])){
                        $PropertyUnits->number_of_floor = $singleBhkData['number_of_floor'];
                    }if(isset($singleBhkData['total_units'])){
                        $PropertyUnits->total_units = $singleBhkData['total_units'];
                    }if(isset($singleBhkData['number_of_blocks'])){
                        $PropertyUnits->number_of_blocks = $singleBhkData['number_of_blocks'];
                    }
                    $PropertyUnits->propertystatus = $singleBhkData['propertystatus'];
                    if($singleBhkData['propertystatus']=="Ready to move"){
                        $PropertyUnits->possession_month = "";
                        $PropertyUnits->possession_year = "";
                        $PropertyUnits->age_of_property = $singleBhkData['age_of_property'];
                    }else{
                        
                        $PropertyUnits->age_of_property = "";
                        
                        $PropertyUnits->possession_month = $singleBhkData['possession_month'];
                        $PropertyUnits->possession_year = $singleBhkData['possession_year'];
                        
                    }
							
                    $PropertyUnits->property_ownership = $singleBhkData['Residentialproperty_ownership'];
                    $PropertyUnits->expected_price = $singleBhkData['ResidentialExpectedPrice'];
                    $PropertyUnits->basic_price = $singleBhkData['ResidentialBasicPrice'];
                    $PropertyUnits->taxandgovcharges_price = $singleBhkData['ResidentialTaxandgovchargesPrice'];
                    $PropertyUnits->all_inclusive_price = $singleBhkData['ResidentialAllinclusivePrice'];
                    $PropertyUnits->booking_amount = $singleBhkData['ResidentialBookingamount'];
                    $PropertyUnits->membership_charge = $singleBhkData['ResidentialMembershipCharge'];
                    $PropertyUnits->maintenance = $singleBhkData['ResidentialMaintenance'];
                    $PropertyUnits->total_price = $singleBhkData['HiddenResidentialTotal'];
							
                    if($request->stepNumber==1){
                        $PropertyUnits->save();
                    }
                    $PropertiesUnitID = $PropertyUnits->id;
                    
                    if(!empty($singleBhkData['carpet_area'])){	
                        foreach($singleBhkData['carpet_area'] as $singleAreaKey=>$singleArea){
                            $PropertyUnitsAreas = new PropertyUnitsAreas();
                            $PropertyUnitsAreas->property_id = $id;
                            $PropertyUnitsAreas->property_unit_id = $PropertiesUnitID;
                            
                            if(isset($singleBhkData['carpet_area'][$singleAreaKey])){
                                $PropertyUnitsAreas->carpet_area = $singleBhkData['carpet_area'][$singleAreaKey];
                            }
                            if(isset($singleBhkData['super_builtup_area'][$singleAreaKey])){
                                $PropertyUnitsAreas->super_builtup_area = $singleBhkData['super_builtup_area'][$singleAreaKey];
                            }
                            if(isset($singleBhkData['plot_area'][$singleAreaKey])){
                                $PropertyUnitsAreas->plot_area = $singleBhkData['plot_area'][$singleAreaKey];
                            }
                            if($request->stepNumber==1){
                                $PropertyUnitsAreas->save();
                            }
                        }
                    }
				}
			}
		}

        $Properties->amenities =  "";
		$Properties->property_features =  "";
		if($sub_category=="Residential"){
			$property_areas =$request->property_areas;
			$rera_number =  $request->rera_number;
			$rera_link =  $request->rera_link;
			if(!empty($request->amenities)){
				$Properties->amenities =  implode(", ",$request->amenities);
			}
			if(!empty($request->property_features)){
				$Properties->property_features =  implode(", ",$request->property_features);
			}
			if($request->property_type=="Apartment And Flat" || $request->property_type=="IndependentHouse"){
				if(!empty($request->other_features)){
				$other_features= implode(", ",$request->other_features);
				}
			}
		
		}

        if($sub_category=="Commercial"){
			$commercial_property_type = $request->commercial_property_type;
			$property_areas =$request->commerical_property_areas;
		
			if($commercial_property_type=="Office"){
				$locality = $request->locality;
				$located_inside = $request->located_inside;
				
				
				$carpet_area =  $request->carpet_area;
				$super_builtup_area =  $request->super_builtup_area;
				$number_of_private_washroom =  $request->number_of_private_washroom;
				$number_of_shared_washroom =  $request->number_of_shared_washroom;
				$conference_room =  $request->conference_room;
				$reception_area =  $request->reception_area;
				if(!empty($request->facilities)){	
					$facilities =  implode(", ",$request->facilities);
				}
				if(!empty($request->fire_safety_measures)){
					$fire_safety_measures =  implode(", ",$request->fire_safety_measures);
				}
				$number_of_floor =  $request->number_of_floor;
				$number_of_passenger_lifts =  $request->number_of_passenger_lifts;
				$number_of_service_lift =  $request->number_of_service_lift;
				$number_of_staircases =  $request->number_of_staircases;
				$number_of_parking_allotted =  $request->number_of_parking_allotted;
				if(!empty($request->parkings)){
					$parkings =  implode(", ",$request->parkings);
				}
				$property_status =  $request->propertystatus;
				$pre_leased = $request->pre_leased;
				$fire_noc_certified = $request->fire_noc_certified;
				
				
			}
			if($commercial_property_type=="Retail"){
				$locality = $request->locality;
				$located_inside = $request->located_inside;
				
				
				$retail_type =  $request->retail_type;
				$shop_located_inside =  $request->shop_located_inside;
				
				$carpet_area =  $request->carpet_area;
				$super_builtup_area =  $request->super_builtup_area;
				
				$entrance_width =  $request->entrance_width;
				$ceiling_heights =  $request->ceiling_heights;
				$number_of_private_washroom =  $request->number_of_private_washroom;
				$number_of_shared_washroom =  $request->number_of_shared_washroom;
				
				if(!empty($request->facilities)){
					$facilities =  implode(", ",$request->facilities);
				}
				if(!empty($request->fire_safety_measures)){
					$fire_safety_measures =  implode(", ",$request->fire_safety_measures);
				}
				$number_of_private_washroom =  $request->number_of_private_washroom;
				$number_of_shared_washroom =  $request->number_of_shared_washroom;
				$conference_room =  $request->conference_room;
				$reception_area =  $request->reception_area;
			
				$number_of_floor =  $request->number_of_floor;
				$number_of_passenger_lifts =  $request->number_of_passenger_lifts;
				$number_of_service_lift =  $request->number_of_service_lift;
				$number_of_staircases =  $request->number_of_staircases;
				$number_of_parking_allotted =  $request->number_of_parking_allotted;
				
				if(!empty($request->parkings)){
					$parkings =  implode(", ",$request->parkings);
				}
				$property_status =  $request->propertystatus;
				
				if(!empty($request->suitable_business_type)){
					$suitable_business_type =  implode(", ",$request->suitable_business_type);
				}
				$pre_leased = $request->pre_leased;
				$fire_noc_certified = $request->fire_noc_certified;
				
			
				
			}if($commercial_property_type=="Hospitality"){
				$property_areas =$request->Hospitalitycommerical_property_areas;	
				$what_kind_of_hospitality =  $request->what_kind_of_hospitality;
				$locality = $request->locality;
				$located_inside = $request->located_inside;
				
				
				
				
				$area_details =  $request->HospitalityAddroomDetails;
				$number_of_rooms =  $request->Hospitalitynumber_of_rooms;
				
				$number_of_washrooms =  $request->Hospitalitynumber_of_washrooms;
				$number_of_balconies =  $request->Hospitalitynumber_of_balconies;
				$plot_area =  $request->Hospitalityplot_area;
				$carpet_area =  $request->Hospitalitycarpet_area;
				if(!empty($request->facilities)){
					$facilities =  implode(", ",$request->facilities);
				}
				$super_builtup_area =  $request->Hospitalitysuper_builtup_area;
				$furnishing_detail =  $request->furnishing_detail;
                if($furnishing_detail=="Furnished"){
                	if(!empty($request->furnished_data)){
						$furnished_data =  implode(", ",$request->furnished_data);
					}
                }
				if($furnishing_detail=="Semi furnished"){
                	if(!empty($request->semifurnished_data)){
						$furnished_data =  implode(", ",$request->semifurnished_data);
					}
                }
				
				$property_status =  $request->propertystatus;
				
				$pre_leased = $request->pre_leased;
				$fire_noc_certified = $request->fire_noc_certified;
				
			}
			if($property_status=="Ready to move"){
					$possession_month = "";
					$possession_year = "";
								
					$age_of_property = 	$request->age_of_property;
				}else{
						$possession_month = $request->possession_month;
						$possession_year = $request->possession_year;
					
						$age_of_property = 	"";
				}
				
		
			$property_ownership = $request->Commercialproperty_ownership;
			$expected_price = $request->CommercialExpectedPrice;
			$basic_price = $request->CommercialBasicPrice;
			$taxandgovcharges_price = $request->CommercialTaxandgovchargesPrice;
			$all_inclusive_price = $request->CommercialAllinclusivePrice;
			$booking_amount = $request->CommercialBookingamount;
			$membership_charge = $request->CommercialMembershipCharge;
			$maintenance = $request->CommercialMaintenance;
			$maintenance_type = $request->Commercialmaintenance_type;
			$total_price =0;
			
			if($expected_price>0 && $super_builtup_area>0){
				$total_price += $expected_price*$super_builtup_area;
			}
			if($basic_price>0){
				$total_price += $basic_price;
			}if($taxandgovcharges_price>0){
				$total_price += $taxandgovcharges_price;
			}if($all_inclusive_price>0){
				$total_price += $all_inclusive_price;
			}
			if($commercial_property_type!="Hospitality"){
			if($booking_amount>0){
				$total_price += $booking_amount;
			}if($membership_charge>0){
				$total_price += $membership_charge;
			}if($maintenance>0){
				$total_price += $maintenance;
			}
			}
		}

        if($sub_category=="IndustrialParkShades"){
			$property_areas =$request->Industrial_property_areas;
			$locality = $request->locality;
			$located_inside = $request->located_inside;
			$number_of_washrooms =  $request->Industrialnumber_of_washrooms;
			$area_details =  $request->IndustrialAreadetails;
			$carpet_area =  $request->IndustrialCarpetarea;
			$super_builtup_area =  $request->Industrialsuper_builtup_area;
			$furnishing_detail =  $request->furnishing_detail;
			$property_status =  $request->Industrialpropertystatus;
			if($property_status=="Ready to move"){
					$possession_month = "";
					$possession_year = "";
					
				$age_of_property = 	$request->Industrialage_of_property;
			}else{
					$possession_month = $request->Industrialpossession_month;
					$possession_year = $request->Industrialpossession_year;
					
					$age_of_property = 	"";
			}
			
				$pre_leased = $request->Industrialpre_leased;
				$fire_noc_certified = $request->Industrialfire_noc_certified;	
		
			$property_ownership = $request->Industrialproperty_ownership;
			$expected_price = $request->IndustrialExpectedPrice;
			$basic_price = $request->IndustrialBasicPrice;
			$taxandgovcharges_price = $request->IndustrialTaxandgovchargesPrice;
			$all_inclusive_price = $request->IndustrialAllinclusivePrice;
			$total_price =0;
			
			if($expected_price>0 && $super_builtup_area>0){
				$total_price += $expected_price*$super_builtup_area;
			}
			if($basic_price>0){
				$total_price += $basic_price;
			}if($taxandgovcharges_price>0){
				$total_price += $taxandgovcharges_price;
			}if($all_inclusive_price>0){
				$total_price += $all_inclusive_price;
			}
			
		}

        if($sub_category=="VacantLandPlotting"){
			$property_areas =$request->VacantLandPlottingproperty_areas;
			$locality = $request->locality;
			$what_kind_of_vacantland =  $request->what_kind_of_vacantland;
			$area_details =  $request->VacantLandPlottingAreadetails;
			$plot_area =  $request->VacantLandPlottingCarpetarea;
			$property_status =  $request->VacantLandPlottingpropertystatus;
			if($property_status=="Ready to move"){
					$possession_month = "";
					$possession_year = "";
				
				$age_of_property = 	$request->VacantLandPlottingage_of_property;
			}else{
					$possession_month = $request->VacantLandPlottingpossession_month;
					$possession_year = $request->VacantLandPlottingpossession_year;
				
					
					$age_of_property = 	"";
			}
			
			$property_ownership = $request->VacantLandPlottingproperty_ownership;
			$expected_price = $request->VacantLandPlottingExpectedPrice;
			$basic_price = $request->VacantLandPlottingBasicPrice;
			$taxandgovcharges_price = $request->VacantLandPlottingTaxandgovchargesPrice;
			$all_inclusive_price = $request->VacantLandPlottingAllinclusivePrice;
			$total_price =0;
			
			if($expected_price>0 && $plot_area>0){
				$total_price += $expected_price*$plot_area;
			}
			if($basic_price>0){
				$total_price += $basic_price;
			}if($taxandgovcharges_price>0){
				$total_price += $taxandgovcharges_price;
			}if($all_inclusive_price>0){
				$total_price += $all_inclusive_price;
			}
			
		}

        $Properties->property_areas =  $property_areas;
		$Properties->property_ownership =  $property_ownership;
		$Properties->expected_price =  $expected_price;
		$Properties->basic_price =  $basic_price;
		$Properties->taxandgovcharges_price =  $taxandgovcharges_price;
		$Properties->all_inclusive_price =  $all_inclusive_price;
		$Properties->booking_amount =  $booking_amount;
		$Properties->membership_charge =  $membership_charge;
		$Properties->maintenance =  $maintenance;
		$Properties->maintenance_type =  $maintenance_type;
		$Properties->total_price =  $total_price;
		$Properties->commercial_property_type =  $commercial_property_type;
		$Properties->what_kind_of_vacantland =  $what_kind_of_vacantland;
		$Properties->retail_type =  $retail_type;
		$Properties->what_kind_of_hospitality =  $what_kind_of_hospitality;
		$Properties->shop_located_inside =  $shop_located_inside;
		$Properties->locality =  $locality;
		$Properties->located_inside =  $located_inside;
		$Properties->rera_number =  $rera_number;
		$Properties->rera_link =  $rera_link;


        //step 2
		$Properties->carpet_area =  $carpet_area;
		$Properties->super_builtup_area =  $super_builtup_area;
		$Properties->number_of_private_washroom =  $number_of_private_washroom;
		$Properties->number_of_shared_washroom =  $number_of_shared_washroom;
		$Properties->conference_room =  $conference_room;
		$Properties->reception_area =  $reception_area;
		$Properties->facilities =  $facilities;
		$Properties->fire_safety_measures =  $fire_safety_measures;
		$Properties->number_of_floor =  $number_of_floor;
		$Properties->number_of_passenger_lifts =  $number_of_passenger_lifts;
		$Properties->number_of_service_lift =  $number_of_service_lift;
		$Properties->number_of_staircases =  $number_of_staircases;
		$Properties->number_of_parking_allotted =  $number_of_parking_allotted;
		$Properties->parkings =  $parkings;
		$Properties->property_status =  $property_status;
		
		$Properties->age_of_property =  $age_of_property;
		$Properties->possession_month =  $possession_month;
		$Properties->possession_year =  $possession_year;
		
		$Properties->pre_leased =  $pre_leased;
		$Properties->fire_noc_certified =  $fire_noc_certified;
		
		
		
		$Properties->area_details =  $area_details;
		$Properties->plot_area =  $plot_area;
		
		$Properties->number_of_washrooms =  $number_of_washrooms;
		
		$Properties->number_of_rooms =  $number_of_rooms;
		$Properties->number_of_balconies =  $number_of_balconies;
		$Properties->furnishing_detail =  $furnishing_detail;
		$Properties->furnished_data =  $furnished_data;
		
		$Properties->entrance_width =  $entrance_width;
		$Properties->ceiling_heights =  $ceiling_heights;
		$Properties->suitable_business_type =  $suitable_business_type;
		
		//step 3
		$Properties->project_features =  $request->project_features;
		$Properties->additional_features =  $request->additional_features;
		
		$Properties->other_features =  $other_features;
		$Properties->location_advantages =  $request->location_advantages;
		$Properties->suggestions =  $request->suggestions;
		
		//step 4

		$Properties->video_toor =  $request->video_toor;
		$Properties->sample_house_video =  $request->sample_house_video;

        $target_dir = "images/properties/".$id;

        if(!empty($request->project_gallery_hidden)){
			DB::table('property_images')->where('property_id', '=', $id)->where('type','=','project_gallery')->whereNotIn('id', $request->project_gallery_hidden)->delete();
			
		}else{
			DB::table('property_images')->where('property_id', '=', $id)->where('type','=','project_gallery')->delete();
		}
		if(!empty($request->floor_plan_gallery_hidden)){
			DB::table('property_images')->where('property_id', '=', $id)->where('type','=','floor_plan_gallery')->whereNotIn('id', $request->floor_plan_gallery_hidden)->delete();
			
		}else{
			DB::table('property_images')->where('property_id', '=', $id)->where('type','=','floor_plan_gallery')->delete();
		}
		if(!empty($request->project_status_gallery_hidden)){
			DB::table('property_images')->where('property_id', '=', $id)->where('type','=','project_status_gallery')->whereNotIn('id', $request->project_status_gallery_hidden)->delete();
			
		}else{
			DB::table('property_images')->where('property_id', '=', $id)->where('type','=','project_status_gallery')->delete();
		}	

        if (!file_exists($target_dir))
        {
            mkdir($target_dir, 0777, true);
        }
		$destinationPath = public_path().'/images/properties/'.$id;

		if($request->file('pdf_brochure')){	

			$pdf_brochure = $request->file('pdf_brochure');
       	 	$pdf_brochure_name = $request->file('pdf_brochure')->getClientOriginalName();  
        
            $thumb_img = Image::make($pdf_brochure->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$pdf_brochure_name,80);
            $Properties->pdf_brochure =  $pdf_brochure_name;

		}

        if($request->file('sample_house_video')){	
			$sample_house_video = $request->file('sample_house_video');
       	 	$sample_house_video_name = $sample_house_video->getClientOriginalName();  
        	$thumb_img = Image::make($sample_house_video->getRealPath())->resize(200, 200);
       		 $thumb_img->save($destinationPath.'/'.$sample_house_video_name,80);
			$Properties->sample_house_video =  $sample_house_video_name;

		  $pdf_brochure_name = time().basename($request->file('pdf_brochure')->getClientOriginalName());
           move_uploaded_file($_FILES["pdf_brochure"]["tmp_name"], $target_dir."/".$pdf_brochure_name);
		   $Properties->pdf_brochure =  $pdf_brochure_name;
		}else{
			if(!empty($request->pdf_brochure_hidden)){
					$Properties->pdf_brochure =  $request->pdf_brochure_hidden;
				}else{
					$Properties->pdf_brochure = "";
				}
		}

        if($request->file('video_toor')){	
            $video_toor_name = time().basename($request->file('video_toor')->getClientOriginalName());
            move_uploaded_file($_FILES["video_toor"]["tmp_name"], $target_dir."/".$video_toor_name);
            $Properties->video_toor =  $video_toor_name;
        }else{
            if(!empty($request->video_toor_hidden)){
                $Properties->video_toor =  $request->video_toor_hidden;
            }else{
                $Properties->video_toor = "";
            }
        }

        if($request->file('project_gallery')){
            for($i=0;$i<count($request->file('project_gallery'));$i++){		
                $project_gallery = $request->file('project_gallery')[$i];
                $project_gallery_name = $project_gallery->getClientOriginalName();  
                $thumb_img = Image::make($project_gallery->getRealPath())->resize(200, 200);
                $thumb_img->save($destinationPath.'/'.$project_gallery_name,80);
                
                $PropertiesImages = new PropertiesImages();
                $PropertiesImages->property_id =  $id;
                $PropertiesImages->image =  $project_gallery_name;
                $PropertiesImages->type =  'project_gallery';
                $PropertiesImages->save();
                
            }
        }

        if($request->file('floor_plan_gallery')){
            for($i=0;$i<count($request->file('floor_plan_gallery'));$i++){		
                $floor_plan_gallery = $request->file('floor_plan_gallery')[$i];
                $floor_plan_gallery_name = $floor_plan_gallery->getClientOriginalName();  
                $thumb_img = Image::make($floor_plan_gallery->getRealPath())->resize(200, 200);
                $thumb_img->save($destinationPath.'/'.$floor_plan_gallery_name,80);
                
                $PropertiesImages = new PropertiesImages();
                $PropertiesImages->property_id =  $id;
                $PropertiesImages->image =  $floor_plan_gallery_name;
                $PropertiesImages->type =  'floor_plan_gallery';
                $PropertiesImages->save();
                
            }
        }

        if($request->file('project_status_gallery')){
            for($i=0;$i<count($request->file('project_status_gallery'));$i++){		
                $project_status_gallery = $request->file('project_status_gallery')[$i];
                $project_status_gallery_name = $project_status_gallery->getClientOriginalName();  
                $thumb_img = Image::make($project_status_gallery->getRealPath())->resize(200, 200);
                $thumb_img->save($destinationPath.'/'.$project_status_gallery_name,80);
                
                $PropertiesImages = new PropertiesImages();
                $PropertiesImages->property_id =  $id;
                $PropertiesImages->image =  $project_status_gallery_name;
                $PropertiesImages->type =  'project_status_gallery';
                $PropertiesImages->save();
                
            }
        }

        $Properties->save();
        
    }
}