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
		 ->leftJoin('areas', 'properties.area', '=', 'areas.id')
		  ->select('properties.*', 'users.company_name as company_name','cities.name as city_name','sub_cities.name as sub_city_name','areas.name as area_name');
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

}
