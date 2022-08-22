<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Reviews extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "property_review";

  
    public static  function getAllReviews($search_property="",$search_user="",$search_rating="",$search_from="",$search_to="")
    {
        $properties = DB::table('property_review')
		 ->leftJoin('users', 'property_review.user_id', '=', 'users.id')
		 ->leftJoin('properties', 'properties.id', '=', 'property_review.property_id')
		  ->select('property_review.*', 'users.first_name as first_name', 'users.last_name as last_name','properties.project_name as property_name');
      	if($search_property!=""){
	  		$properties =  $properties->where('property_review.property_id','=',$search_property);
		}
		if($search_user!=""){
	  		$properties =  $properties->where('property_review.user_id','=',$search_user);
		}
		if($search_rating!=""){
	  		$properties =  $properties->where('property_review.rating','=',$search_rating);
		}
		if($search_from!=""){
	  		$properties =  $properties->where('property_review.created_at','>=',$search_from." 00:00:00");
		}
		if($search_to!=""){
	  		$properties =  $properties->where('property_review.created_at','<=',$search_to." 23:59:59");
		}
		
       	$reviews = $properties->orderBy('properties.id', 'DESC');
		$reviews =  $properties->paginate(10);

        return $reviews;
       

    }
	
	
}