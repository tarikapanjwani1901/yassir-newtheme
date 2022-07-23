<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\Common;

use Validator;

class CommonController extends Controller
{
    /**
     * Country list of api countries
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
   
   public function getStateByCountry(Request $request){
	    $CommonModel=  new Common;	
		$states = $CommonModel->getStateByCountry($request->country);
		return $states;
	}
	
	
	public function getCityByState(Request $request){
		
		$CommonModel=  new Common;	
		$cities = $CommonModel->getCityByState($request->state);
		return $cities;
	}
	
	public function getSubCityByCity(Request $request){
			
			
		$CommonModel=  new Common;	
		$cities = $CommonModel->getSubCityByCity($request->city);
		return $cities;
		
			
	}
	
	
	public function getAreaBySubCity(Request $request){
		
		$CommonModel=  new Common;	
		$areas = $CommonModel->getAreaBySubCity($request->sub_city);
		return $areas;
	} 
}

