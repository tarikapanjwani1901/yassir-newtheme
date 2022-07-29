<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\PropertyUnits;
use App\Models\PropertyUnitsAreas;


use App\Models\Common;

use Sentinel;
use DB;
use Image;

class PropertiesController extends Controller
{
    public function index()
    {
        //Get all the propertiess
        $properties = Properties::getAllProperties();

        return view('admin.properties.index')->with('properties', $properties);
    }

    public function add() {
		$vendors = $country = array();
		$CommonModel = new Common;
		$country = $CommonModel->countryList();
		$vendors =$CommonModel->getVendorList();
		
         return view('admin.properties.add',compact('vendors','country'));
    }

    public function delete($id) {
        DB::table('properties')->where('id', '=', $id)->delete();
		DB::table('property_units')->where('property_id', '=', $id)->delete();
		DB::table('property_unit_type_area')->where('property_id', '=', $id)->delete();
        return 'success';
    }

    public function editProperties($id) 
    {
        $data =  Properties::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               

        $properties = DB::table('properties')->where('id','=',$id)->get()->toArray();

        return view('admin.properties.edit')->with('properties', $properties);
    }

    public function manage_properties(Request $request)
    {

      // echo "hii"; exit;
       $search = $request->get('properties_search');
       $propertiess = DB::table('site_propertiess')
       ->where('t_quote','like','%'.$search.'%')
       ->orwhere('t_name','like','%'.$search.'%')
       ->orwhere('t_company','like','%'.$search.'%')
       ->orwhere('t_image','like','%'.$search.'%')
       ->paginate(10);   
      // echo "<pre>"; print_r($propertiess); exit; 

       return view('admin.properties')->with('propertiess', $propertiess);
       // return view('admin/properties',compact('propertiess',$propertiess));
    }

    public function editPostProperties(Request $request,$id) {
        
        $image = request()->file('inputFile');
        if($image) {

        $target_dir = "images/properties/".$id;

        if (!file_exists($target_dir))
        {
            mkdir($target_dir, 0777, true);
        }

        $photo = $request->file('inputFile');
        $imagename = $photo->getClientOriginalName();  
        $destinationPath = public_path().'/images/properties/'.$id;
        $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
        $thumb_img->save($destinationPath.'/'.$imagename,80);

           $properties = DB::table('site_propertiess')
            ->where('t_id', $id)
            ->update(['t_rating' => $_POST['rating'], 't_quote' => $_POST['message'], 't_name' => $_POST['name'], 't_company' => $_POST['company'],'t_image' => $imagename , 'created_by' => '1','updated_at' => date('Y-m-d h:i:s')]);
                
        }else{

            $properties = DB::table('site_propertiess')
            ->where('t_id', $id)
            ->update(['t_rating' => $_POST['rating'], 't_quote' => $_POST['message'], 't_name' => $_POST['name'], 't_company' => $_POST['company'],'created_by' => '1','updated_at' => date('Y-m-d h:i:s')]);
        }
           
        return redirect('admin/propertiess');

    }

    public function addProperties(Request $request) {
		
		if($request->property_id!=""){
			$Properties = Properties::find($request->property_id);
		}else{
				$Properties = new Properties();	
		}
		$Properties->property_vendor = $request->property_vendor;
		$Properties->property_for = $request->property_for; 
		$Properties->category = $request->category; 
		$Properties->sub_category = $request->sub_category; 
		$Properties->save();
		
		$PropertiesID = $Properties->id;
		
		$this->propertyDataUpdate($PropertiesID,$request);
		
		return $PropertiesID;
	   // return redirect('admin/propertiess');
    }
	public function propertyDataUpdate($id,$request){
		
		DB::table('property_units')->where('property_id', '=', $id)->delete();
		DB::table('property_unit_type_area')->where('property_id', '=', $id)->delete();
        
		
		
		$Properties = Properties::find($id);
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
		
	
		$commercial_property_type =$locality=$located_inside =$what_kind_of_vacantland =$retail_type =$what_kind_of_hospitality=$shop_located_inside
		=$rera_number=$rera_link= "";
		
		
$area_details = $plot_area =$carpet_area =$property_status =$age_of_property =$possession_date =$number_of_washrooms =$super_builtup_area =
$pre_leased =$fire_noc_certified =$number_of_rooms =$number_of_balconies =$furnishing_detail =$furnished_data =$entrance_width =
$ceiling_heights =$number_of_private_washroom =$number_of_shared_washroom =$conference_room =$reception_area =$facilities =$fire_safety_measures =$number_of_floor =
$number_of_passenger_lifts =$number_of_service_lift =$number_of_staircases =$number_of_parking_allotted =$parkings =$suitable_business_type  = "";
		
		
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
								$PropertyUnits->possession_date = "";
								$PropertyUnits->age_of_property = $singleBhkData['age_of_property'];
							}else{
								
								$PropertyUnits->age_of_property = "";
								$PropertyUnits->possession_date = $singleBhkData['possession_date'];	
							}
							
							$PropertyUnits->save();
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
									
									$PropertyUnitsAreas->save();
								}
							}
							
					
				}
			}
		}
		
		if($sub_category=="Residential"){
			$rera_number =  $request->rera_number;
			$rera_link =  $request->rera_link;
	
		}
		
		if($sub_category=="Commercial"){
			$commercial_property_type = $request->commercial_property_type;
			
			
	
		
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
					$suitable_business_type =  implode(",",$request->suitable_business_type);
				}
				$pre_leased = $request->pre_leased;
				$fire_noc_certified = $request->fire_noc_certified;
				
			
				
			}if($commercial_property_type=="Hospitality"){
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
                if($furnishing_detail=="Furnished" || $furnishing_detail=="Semi furnished"){
                	if(!empty($request->furnished_data)){
						$furnished_data =  implode(", ",$request->furnished_data);
					}
                }
				
				$property_status =  $request->propertystatus;
				
				$pre_leased = $request->pre_leased;
				$fire_noc_certified = $request->fire_noc_certified;
				
			}
			if($property_status=="Ready to move"){
					$possession_date = "";
					$age_of_property = 	$request->age_of_property;
				}else{
						$possession_date = $request->possession_date;
						$age_of_property = 	"";
				}
				
			
		}
		if($sub_category=="IndustrialParkShades"){
			$locality = $request->locality;
			$located_inside = $request->located_inside;
			$number_of_washrooms =  $request->Industrialnumber_of_washrooms;
			$area_details =  $request->IndustrialAreadetails;
			$carpet_area =  $request->IndustrialCarpetarea;
			$super_builtup_area =  $request->Industrialsuper_builtup_area;
			$furnishing_detail =  $request->furnishing_detail;
			$property_status =  $request->Industrialpropertystatus;
			if($property_status=="Ready to move"){
				$possession_date = "";
				$age_of_property = 	$request->Industrialage_of_property;
			}else{
					$possession_date = $request->Industrialpossession_date;
					$age_of_property = 	"";
			}
			
				$pre_leased = $request->Industrialpre_leased;
				$fire_noc_certified = $request->Industrialfire_noc_certified;	
			
		}
		if($sub_category=="VacantLandPlotting"){
			$locality = $request->locality;
			$what_kind_of_vacantland =  $request->what_kind_of_vacantland;
			$area_details =  $request->VacantLandPlottingAreadetails;
			$plot_area =  $request->VacantLandPlottingCarpetarea;
			$property_status =  $request->VacantLandPlottingpropertystatus;
			if($property_status=="Ready to move"){
				$possession_date = "";
				$age_of_property = 	$request->VacantLandPlottingage_of_property;
			}else{
					$possession_date = $request->VacantLandPlottingpossession_date;
					$age_of_property = 	"";
			}
		}
		
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
		$Properties->possesion_date =  $possession_date;
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
		if(!empty($request->amenities)){
			$Properties->amenities =  implode(", ",$request->amenities);
		}else{
			$Properties->amenities =  "";
		}
		$Properties->project_features =  $request->project_features;
		$Properties->additional_features =  $request->additional_features;
		
		if(!empty($request->property_features)){
			$Properties->property_features =  implode(", ",$request->property_features);
		}else{
			$Properties->property_features =  "";	
		}
		
		if(!empty($request->other_features)){
			$Properties->other_features =  implode(", ",$request->other_features);
		}else{
			$Properties->other_features =  "";	
		}
		//$Properties->location_advantages =  $request->location_advantages;
		$Properties->suggestions =  $request->suggestions;
		
		//step 4
		$Properties->video_toor =  $request->video_toor;
		
		
		
			
        $target_dir = "images/properties/".$id;

        if (!file_exists($target_dir))
        {
            mkdir($target_dir, 0777, true);
        }
		$destinationPath = public_path().'/images/properties/'.$id;
		if($request->file('pdf_brochure')){	
			$pdf_brochure = $request->file('pdf_brochure');
       	 	$pdf_brochure_name = $photo->getClientOriginalName();  
        
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
		}
		$Properties->save();

	}

}