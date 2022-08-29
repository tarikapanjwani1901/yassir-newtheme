<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    protected $table = 'slider';

    public static function getAllSlider($search_name="",$search_slider_status="",$search_slider_type="")
    {
        $sliders = DB::table('slider');
    	if($search_name!=""){
	  		$sliders =  $sliders->where('name','like','%'.$search_name.'%');
		}
		if($search_slider_status!=""){
	  		$sliders =  $sliders->where('slider_status',$search_slider_status);
		}
		if($search_slider_type!=""){
	  		$sliders =  $sliders->where('slider_type',$search_slider_type);
		}
		
        $sliders =  $sliders->orderBy('id', 'DESC');
        $sliders =  $sliders->paginate(10);

        return $sliders;
        
    }
}
