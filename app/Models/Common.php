<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Common extends Model
{

   public function countryList(){
		   $countryList = DB::table('countries')
            ->select('countries.name','countries.id')
           ->orderBy('countries.name',"ASC")		
	
		    ->get();
			$countries[''] = 'Please select country';
			foreach($countryList as $single){
				$countries[$single->id] = $single->name;		
			}
    	
		return $countries;
	}
	 public function getVendorList(){
		 $allvendors = DB::table('users')
				->where("user_role",env('VENDOR_ROLE_ID'))
				->whereNull('deleted_at')
				->whereNotNull('company_name')
				->orderBy('users.company_name','asc')
				->get()
				->toArray();
	
			return $allvendors;
	}
	
	 public function getAllBlogList(){
		 $blogs = DB::table('blogs')
				->whereNull('deleted_at')
				->orderBy('title','asc')
				->get()
				->toArray();
	
			return $blogs;
	}
	
	public function getAllBlogCategoriesList(){
		 $blogs = DB::table('blog_categories')
				->whereNull('deleted_at')
				->orderBy('title','asc')
				->get()
				->toArray();
	
			return $blogs;
	}
	
	public function getAllBlogTagList(){
		 $blogs = DB::table('blog_tag')
				->whereNull('deleted_at')
				->orderBy('title','asc')
				->get()
				->toArray();
	
			return $blogs;
	}
	
	public static  function getAllUsersList()
    {
    
       	 $users = DB::table('users')
				->where("user_role",'!=',env('ADMIN_ROLE_ID'))
				->whereNull('deleted_at')
				->whereNotNull('company_name')
				->orderBy('users.company_name','asc')
				->get()
				->toArray();
	
			return $users;

	}
	public static  function getAllPropertyList()
    {
    
       	 $data = DB::table('properties')
				->orderBy('project_name','asc')
				->get()
				->toArray();
	
			return $data;

	}
	
	public function getStateByCountry($country){
			$stateList = DB::table('states')
            ->select('states.name','states.id')
           ->where("states.country_id",$country)
		   ->orderBy('states.name',"ASC")		
	
		    ->get();
			
			$states = array();
			
			foreach($stateList as $single){
				$states[$single->id] = $single->name;		
		}	
		return $states;
	}
	
	
	public function getCityByState($state){
			
			$citiesList = DB::table('cities')
            ->select('cities.name','cities.id')
           ->where("cities.state_id",$state)
		   ->orderBy('cities.name',"ASC")		
	
		    ->get();
	
			
			$cities = array();
			
			foreach($citiesList as $single){
				$cities[$single->id] = $single->name;		
		}	
		return $cities;
	}
	
	public function getSubCityByCity($city){
			
			$citiesList = DB::table('sub_cities')
            ->select('sub_cities.name','sub_cities.id')
           ->where("sub_cities.city_id",$city)
		   ->orderBy('sub_cities.name',"ASC")		
	
		    ->get();
	
			
			$cities = array();
			
			foreach($citiesList as $single){
				$cities[$single->id] = $single->name;		
		}	
		return $cities;
	}
	
	
	public function getAreaBySubCity($sub_city){
			
			$areaList = DB::table('areas')
            ->select('areas.name','areas.id')
           ->where("areas.sub_city_id",$sub_city)
		   ->orderBy('areas.name',"ASC")		
	
		    ->get();
	
			
			$areas = array();
			
			foreach($areaList as $single){
				$areas[$single->id] = $single->name;		
		}	
		return $areas;
	}
}

