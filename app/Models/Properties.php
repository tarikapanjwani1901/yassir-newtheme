<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Properties extends Model
{
    protected $table = 'properties';

    public static function getAllProperties($search_keyword="",$search_vendor="",$search_for="",$search_sub_category="")
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
}
