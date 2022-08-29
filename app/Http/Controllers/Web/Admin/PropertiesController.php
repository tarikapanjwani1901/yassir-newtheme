<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\PropertyUnits;
use App\Models\PropertyUnitsAreas;
use App\Models\PropertiesImages;
use Illuminate\Support\Facades\Auth;



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
		
		$CommonModel = new Common;
		
		$vendors =$CommonModel->getVendorList();
		$search_keyword = $search_vendor = $search_for = $search_sub_category =$search_completed_property = $search_status = "";
		$propertyFor[''] = "Property For";
		$propertyFor['Sell'] = "Sell";
		$propertyFor['Rent'] = "Rent";
		
		
		$SubCategory[''] = "Sub Category";
		$SubCategory['Residential'] = "Residential";
		$SubCategory['Commercial'] = "Commercial";
		$SubCategory['IndustrialParkShades'] = "Industrial Park/Shades";
		$SubCategory['VacantLandPlotting'] = "Vacant Land/ Plotting";
		
		
		
		$completed_property[''] = "Completed Property";
		$completed_property['Yes'] = "Yes";
		$completed_property['No'] = "No";
		
		
		$status[''] = "Status";
		$status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		
		
		
		
		
		

        return view('admin.properties.index',compact('properties','vendors','propertyFor','SubCategory','completed_property','status','search_completed_property','search_status','search_keyword','search_vendor','search_for','search_sub_category'));
    
    }
	public function properties_search(Request $request)
    {
		
		$search_keyword = $request->get('search_keyword');
        $search_vendor = $request->get('search_vendor');
        $search_for = $request->get('search_for');
		$search_sub_category = $request->get('search_sub_category');
		$search_completed_property = $request->get('search_completed_property');
		$search_status = $request->get('search_status');
		
		$propertyFor[''] = "Property For";
		$propertyFor['Sell'] = "Sell";
		$propertyFor['Rent'] = "Rent";
		
		
		$SubCategory[''] = "Sub Category";
		$SubCategory['Residential'] = "Residential";
		$SubCategory['Commercial'] = "Commercial";
		$SubCategory['IndustrialParkShades'] = "Industrial Park/Shades";
		$SubCategory['VacantLandPlotting'] = "Vacant Land/ Plotting";
		
		
		$completed_property[''] = "Completed Property";
		$completed_property['Yes'] = "Yes";
		$completed_property['No'] = "No";
		
		
		$status[''] = "Status";
		$status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		
		
		
		
		
	  
        //Get all the propertiess
        $properties = Properties::getAllProperties($search_keyword,$search_vendor,$search_for,$search_sub_category,$search_completed_property,$search_status);
		
		$CommonModel = new Common;
		
		$vendors =$CommonModel->getVendorList();
		
	   return view('admin.properties.index',compact('properties','vendors','propertyFor','SubCategory','completed_property','status','search_completed_property','search_status','search_keyword','search_vendor','search_for','search_sub_category'));
    
      
    }

    public function add() {
		$vendors = $country = array();
		$CommonModel = new Common;
		$country = $CommonModel->countryList();
		$vendors =$CommonModel->getVendorList();
		
		$propertyFor[''] = "Property For";
		$propertyFor['Sell'] = "Sell";
		$propertyFor['Rent'] = "Rent";
		
		$category[''] = "Select Category";
		$category['For Builder'] = "For Builder";
		$category['For owner'] = "For owner";
		
		
		$SubCategory[''] = "Select Sub Category";
		$SubCategory['Residential'] = "Residential";
		$SubCategory['Commercial'] = "Commercial";
		$SubCategory['IndustrialParkShades'] = "Industrial Park/Shades";
		$SubCategory['VacantLandPlotting'] = "Vacant Land/ Plotting";
		
		$property_type[''] = "Select Type";
		$property_type['Apartment And Flat'] = "Apartment/Flat";
		$property_type['IndependentHouse'] = "Independent House/ Bunglows/villas";
		$property_type['Farmhouse'] = "Farmhouse";
		
		$commercial_property_type[''] = "Select Type";
		$commercial_property_type['Office'] = "Office";
		$commercial_property_type['Retail'] = "Retail";
		$commercial_property_type['Hospitality'] = "Hospitality";
	
		$what_kind_of_vacantland['Commercial Land'] = "Commercial Land";
		$what_kind_of_vacantland['Agriculture Land'] = "Agriculture Land";
		$what_kind_of_vacantland['Industrial Land'] = "Industrial Land";
		
		
		$what_kind_of_hospitality['Hotel / Resort'] = "Hotel / Resort";
		$what_kind_of_hospitality['Guesthouse / Banquet Hall'] = "Guesthouse / Banquet Hall";
		
		
		$retail_type['Commercial shops'] = "Commercial shops";
		$retail_type['Commercial showrooms'] = "Commercial showrooms";
	
		$shop_located_inside['Mall'] = "Mall";
		$shop_located_inside['Commercial Project'] = "Commercial Project";
		$shop_located_inside['Residencial Project'] = "Residencial Project";
		
		$located_inside['IT Park'] = "IT Park";
		$located_inside['Business Park'] = "Business Park";
		
		$age_of_property[''] = "Select";
		$age_of_property['0-1 Year'] = "0-1 Year";
		$age_of_property['1-5 Year'] = "1-5 Year";
		$age_of_property['5-10 Year'] = "5-10 Year";
		$age_of_property['10+ Year'] = "10+ Year";
		
		
		
		$status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		
		$MonthNameList[''] = "Month";
		$MonthNameList['January'] = "January";
		$MonthNameList['February'] = "February";
		$MonthNameList['March'] = "March";
		$MonthNameList['April'] = "April";
		$MonthNameList['May'] = "May";
		$MonthNameList['June'] = "June";
		$MonthNameList['July'] = "July";
		$MonthNameList['August'] = "August";
		$MonthNameList['September'] = "September";
		$MonthNameList['October'] = "October";
		$MonthNameList['November'] = "November";
		$MonthNameList['December'] = "December";
		
		$yearList[''] = 'Year'; 
		 $year_start  = 1999;
    	$year_end = date('Y'); // current Year
	
		   for ($i_year = $year_start; $i_year <= ($year_end+20); $i_year++) {
				$yearList[$i_year] = $i_year;	
		  }
		
			
		$state[''] = "Select State";
		$city[''] = "Select City";
		$sub_city[''] = "Select Sub City";
		
		
		$amenties = array('Power Backup','Lift','24*7 Water Supply','24*7 Security Service','Parking Space','Vaastu Compliant Design','Ventilation','Fitness Center / GYM','Spa'
		,'Yoga','Swimming Pool','Playground','Community Center','Media Room'
		,'Party Room','Community events and classes','Outdoor Areas','Jogging/walking','Eco Friendly','Proximity Area','On Site Maintenance','Electric car charging stations'
		,'Pets Allowed','Wood Flooring','Storage in unit','Wi-Fi','High-Speed Internet','Cable TV','Close to schools','Babysitting Services'
		,'CCTV Surveillance','Doorman','Gated Access','Valet Trash','Recycling Center','Doorstep Recycling Collection','Laundry Facility','Dance studio'
		,'Video Door Phone','Gas Connection','Main Entrance Door','Wi- Fi Smart Homes','Customized Wi- Fi Smart Homes','Terrace Garden','Garden GYM'
		,'Senior Citizen Seating','Indoor Games','Celebration Lawn','Rest Room','River Facing','Basement','Fire Safety','Management Office','Library','School Drop off Zone'
		,'Earthquake Resistance RCC Structure','Indoor Games Club House','Guest waiting Room','Hydro. Pressure Pump','Z+ Security System','Adequate Street Light','Steam Bathroom','Splash Pool'
		,'Basketball Hoop','Skating Area');
	
		
         return view('admin.properties.add',compact('propertyFor','category','SubCategory','property_type','commercial_property_type','what_kind_of_vacantland','what_kind_of_hospitality'
		 ,'retail_type','shop_located_inside','located_inside','state','city','sub_city','age_of_property','amenties','status','MonthNameList','yearList','vendors','country'));
    }

    public function delete($id) {
        DB::table('properties')->where('id', '=', $id)->delete();
		DB::table('property_units')->where('property_id', '=', $id)->delete();
		DB::table('property_unit_type_area')->where('property_id', '=', $id)->delete();
		DB::table('property_images')->where('property_id', '=', $id)->delete();
        return 'success';
    }
	public function status($id,$status) {
      $Properties = Properties::find($id);
	  $Properties->status = $status;
	  $Properties->save();
	  
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
		$property_units = DB::table('property_units')->where('property_id','=',$id)->get()->toArray();
		$properties_unit_type_area = DB::table('property_unit_type_area')->where('property_id','=',$id)->get()->toArray();
		$property_images = DB::table('property_images')->where('property_id','=',$id)->get()->toArray();
		$vendors = $country = array();
		$CommonModel = new Common;
		$country = $CommonModel->countryList();
		$vendors =$CommonModel->getVendorList();
		
		$p = $properties[0];
		
		$propertyFor[''] = "Property For";
		$propertyFor['Sell'] = "Sell";
		$propertyFor['Rent'] = "Rent";
		
		$category[''] = "Select Category";
		$category['For Builder'] = "For Builder";
		$category['For owner'] = "For owner";
		
		
		$SubCategory[''] = "Select Sub Category";
		$SubCategory['Residential'] = "Residential";
		$SubCategory['Commercial'] = "Commercial";
		$SubCategory['IndustrialParkShades'] = "Industrial Park/Shades";
		$SubCategory['VacantLandPlotting'] = "Vacant Land/ Plotting";
		
		$property_type[''] = "Select Type";
		$property_type['Apartment And Flat'] = "Apartment/Flat";
		$property_type['IndependentHouse'] = "Independent House/ Bunglows/villas";
		$property_type['Farmhouse'] = "Farmhouse";
		
		$commercial_property_type[''] = "Select Type";
		$commercial_property_type['Office'] = "Office";
		$commercial_property_type['Retail'] = "Retail";
		$commercial_property_type['Hospitality'] = "Hospitality";
	
		$what_kind_of_vacantland['Commercial Land'] = "Commercial Land";
		$what_kind_of_vacantland['Agriculture Land'] = "Agriculture Land";
		$what_kind_of_vacantland['Industrial Land'] = "Industrial Land";
		
		
		$what_kind_of_hospitality['Hotel / Resort'] = "Hotel / Resort";
		$what_kind_of_hospitality['Guesthouse / Banquet Hall'] = "Guesthouse / Banquet Hall";
		
		
		$retail_type['Commercial shops'] = "Commercial shops";
		$retail_type['Commercial showrooms'] = "Commercial showrooms";
	
		$shop_located_inside['Mall'] = "Mall";
		$shop_located_inside['Commercial Project'] = "Commercial Project";
		$shop_located_inside['Residencial Project'] = "Residencial Project";
		
		$located_inside['IT Park'] = "IT Park";
		$located_inside['Business Park'] = "Business Park";
		
		$age_of_property[''] = "Select";
		$age_of_property['0-1 Year'] = "0-1 Year";
		$age_of_property['1-5 Year'] = "1-5 Year";
		$age_of_property['5-10 Year'] = "5-10 Year";
		$age_of_property['10+ Year'] = "10+ Year";
		
		
		
		$status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		
		$MonthNameList[''] = "Month";
		$MonthNameList['January'] = "January";
		$MonthNameList['February'] = "February";
		$MonthNameList['March'] = "March";
		$MonthNameList['April'] = "April";
		$MonthNameList['May'] = "May";
		$MonthNameList['June'] = "June";
		$MonthNameList['July'] = "July";
		$MonthNameList['August'] = "August";
		$MonthNameList['September'] = "September";
		$MonthNameList['October'] = "October";
		$MonthNameList['November'] = "November";
		$MonthNameList['December'] = "December";
		
		$yearList[''] = 'Year'; 
		 $year_start  = 1999;
    	$year_end = date('Y'); // current Year
	
		   for ($i_year = $year_start; $i_year <= ($year_end+20); $i_year++) {
				$yearList[$i_year] = $i_year;	
		  }
		
		
		$CommonModel=  new Common;	
		$state = $CommonModel->getStateByCountry($p->country);
		$city = $CommonModel->getCityByState($p->state);
		$sub_city = $CommonModel->getSubCityByCity($p->city);
		$area = $CommonModel->getAreaBySubCity($p->sub_city);
		
		$amenties = array('Power Backup','Lift','24*7 Water Supply','24*7 Security Service','Parking Space','Vaastu Compliant Design','Ventilation','Fitness Center / GYM','Spa'
		,'Yoga','Swimming Pool','Playground','Community Center','Media Room'
		,'Party Room','Community events and classes','Outdoor Areas','Jogging/walking','Eco Friendly','Proximity Area','On Site Maintenance','Electric car charging stations'
		,'Pets Allowed','Wood Flooring','Storage in unit','Wi-Fi','High-Speed Internet','Cable TV','Close to schools','Babysitting Services'
		,'CCTV Surveillance','Doorman','Gated Access','Valet Trash','Recycling Center','Doorstep Recycling Collection','Laundry Facility','Dance studio'
		,'Video Door Phone','Gas Connection','Main Entrance Door','Wi- Fi Smart Homes','Customized Wi- Fi Smart Homes','Terrace Garden','Garden GYM'
		,'Senior Citizen Seating','Indoor Games','Celebration Lawn','Rest Room','River Facing','Basement','Fire Safety','Management Office','Library','School Drop off Zone'
		,'Earthquake Resistance RCC Structure','Indoor Games Club House','Guest waiting Room','Hydro. Pressure Pump','Z+ Security System','Adequate Street Light','Steam Bathroom','Splash Pool'
		,'Basketball Hoop','Skating Area');
		$unitAreas = array();
		if(!empty($properties_unit_type_area)){
			foreach($properties_unit_type_area as $single){
				$unitAreas[$single->property_unit_id][] = $single;	
			}	
		}	
		$images = array();
		if(!empty($property_images)){
			foreach($property_images as $single){
				$images[$single->type][] = (array)$single;
			}	
		}
		
         return view('admin.properties.edit',compact('propertyFor','category','SubCategory','property_type','commercial_property_type','what_kind_of_vacantland','what_kind_of_hospitality'
		 ,'retail_type','shop_located_inside','located_inside','state','city','sub_city','area','age_of_property','amenties','status','MonthNameList','yearList','p','property_units','unitAreas','properties_unit_type_area','images','vendors','country'));

    }

    
    public function addProperties(Request $request) {
		
		if($request->property_id!=""){
			$Properties = Properties::find($request->property_id);
		}else{
				$Properties = new Properties();	
				$Properties->added_by = Auth::id();
		}
		$Properties->property_vendor = $request->property_vendor;
		$Properties->property_for = $request->property_for; 
		$Properties->category = $request->category; 
		$Properties->sub_category = $request->sub_category; 
		$Properties->status = $request->status;
		$Properties->save();
		
		$PropertiesID = $Properties->id;
		
		$this->propertyDataUpdate($PropertiesID,$request);
		
		return $PropertiesID;
	   // return redirect('admin/propertiess');
    }
	public function propertyDataUpdate($id,$request){
		
		if($request->stepNumber==1){
			DB::table('property_units')->where('property_id', '=', $id)->delete();
			DB::table('property_unit_type_area')->where('property_id', '=', $id)->delete();
		}
		
		
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
				$basic_price = $expected_price*$super_builtup_area;
			}
			$all_inclusive_price = $taxandgovcharges_price +$basic_price;
			$total_price = $all_inclusive_price;
			
			
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
			$taxandgovcharges_price = $request->IndustrialTaxandgovchargesPrice;
			$total_price =0;
			
			if($expected_price>0 && $super_builtup_area>0){
				$basic_price = $expected_price*$super_builtup_area;
			}
			$all_inclusive_price = $taxandgovcharges_price +$basic_price;
			$total_price = $all_inclusive_price;
			
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
				$basic_price = $expected_price*$plot_area;
			}
			$all_inclusive_price = $taxandgovcharges_price +$basic_price;
			$total_price = $all_inclusive_price;
			
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

		
		if($request->stepNumber=="3" && $request->stepDirection=="last_step"){
		$Properties->completed_property ="Yes";	
		
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
       	 	$pdf_brochure_name = $pdf_brochure->getClientOriginalName();  
        
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
	
		}
		$Properties->save();

	}

}