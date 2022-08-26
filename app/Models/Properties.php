<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Properties extends Model
{
    protected $table = 'properties';
	

    public static function getAllProperties($search_keyword="",$search_vendor="",$search_for="",$search_sub_category="",$search_completed_property="",$search_status="")
    {
        $properties = DB::table('properties')
		 ->leftJoin('users', 'properties.property_vendor', '=', 'users.id')
		 ->leftJoin('cities', 'properties.city', '=', 'cities.id')
		 ->leftJoin('sub_cities', 'properties.sub_city', '=', 'sub_cities.id')
		  ->select('properties.*', 'users.company_name as company_name','cities.name as city_name','sub_cities.name as sub_city_name');
      	if($search_keyword!=""){
	  		$properties =  $properties->where('properties.project_name','like','%'.$search_keyword.'%');
		}
		if($search_vendor!=""){
	  		$properties =  $properties->where('users.id','=',$search_vendor);
		}
		if($search_for!=""){
	  		$properties =  $properties->where('properties.property_for','=',$search_for);
		}
		if($search_sub_category!=""){
	  		$properties =  $properties->where('properties.sub_category','=',$search_sub_category);
		}
		
		if($search_completed_property!=""){
	  		$properties =  $properties->where('properties.completed_property','=',$search_completed_property);
		}
		
		if($search_status!=""){
	  		$properties =  $properties->where('properties.status','=',$search_status);
		}
       	$properties = $properties->orderBy('properties.id', 'DESC');
		$properties =  $properties->paginate(10);

        return $properties;
        
    }

	public static function getPropertiesList(){

		$query = Properties::query();
		$query = $query->orderBy('project_name','asc');

		$response = $query->get();

		return $response;

	}

	public static function getFavouritePropertyListById($user_id){

        $query = Properties::query();
        $query = $query->join('vendor_listing_favourite','vendor_listing_favourite.vl_id','=','properties.id');
        $query = $query->select('properties.project_name','properties.address','properties.possesion_date','properties.id');
        $query = $query->orderBy('properties.id','desc');
        $query = $query->where('vendor_listing_favourite.u_id',$user_id);
        $response = $query->get();

        return $response;
        
    }

	public static function getPropertyByUserID($user_id,$limit)
	{
		$query = Properties::query();
		$query = $query->select('properties.project_name','properties.address','properties.possesion_date',
		'properties.id');
        $query = $query->orderBy('properties.id','desc');
		$query = $query->where('properties.property_vendor',$user_id);

		if(isset($limit) && $limit>0)
        	$query= $query->limit($limit);
			
        $response = $query->get();

		return $response;
	}

	public static function getLatestRentedApartments(){

		$query = Properties::query();
		$query = $query->select('properties.project_name','properties.address','properties.address','properties.id',
		'properties.id',DB::raw('COUNT(pi.image) as count'),'property_units.number_of_bedrooms','pi.image',
		'property_units.number_of_bathrooms','properties.property_areas','property_unit_type_area.carpet_area','property_units.total_price');

		$query = $query->join('property_images as pi',function($join){
            $join->on("pi.property_id","=","properties.id");
            $join->where('pi.type','=', 'project_gallery');
        });

		$query = $query->join('property_units','property_units.property_id','=','properties.id');
		$query = $query->join('property_unit_type_area','property_unit_type_area.property_id','=','properties.id');
		$query = $query->orderBy('properties.id','desc');
		$query = $query->groupBy('properties.id');
		$query = $query->where('properties.property_for','rent');
		$query = $query->limit(10);

		$response = $query->get();

		return $response;
	}

	public static function getLatestProperties(){

		$query = Properties::query();
		$query = $query->select('properties.project_name','properties.address','properties.address','properties.id',
		'properties.id',DB::raw('COUNT(pi.image) as count'),'property_units.number_of_bedrooms','pi.image','properties.sub_category',
		'property_units.number_of_bathrooms','properties.property_areas','property_unit_type_area.carpet_area','property_units.total_price',
		'properties.area_details','properties.area_details');
		
		$query = $query->join('property_images as pi',function($join){
            $join->on("pi.property_id","=","properties.id");
            $join->where('pi.type','=', 'project_gallery');
        });

		$query = $query->join('property_units','property_units.property_id','=','properties.id');
		$query = $query->join('property_unit_type_area','property_unit_type_area.property_id','=','properties.id');
		$query = $query->orderBy('properties.id','desc');
		$query = $query->groupBy('properties.id');
		$query = $query->limit(10);

		$response = $query->get();

		return $response;
	}

	public function residentialInfo() {
        return $this->hasOne(PropertyUnits::class,'property_id','id');
    }
	public function userInfo() {
        return $this->hasOne(User::class,'id','property_vendor');
    }
	public function imageList() {
        return $this->hasMany(PropertiesImages::class,'property_id','id');
    }
}
