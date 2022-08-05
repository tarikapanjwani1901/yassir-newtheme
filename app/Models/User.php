<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
		
		use SoftDeletes;
	    protected $table = 'users';	
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function verifyOTP($otp,$mobile_number){

    }

    public static function getVendors()
    {
        $vendor_role_id = env('VENDOR_ROLE_ID');

        $query = User::query();
		$query = $query->orderBy('company_name','asc');
        $query = $query->where('users.user_role',$vendor_role_id);

		$response = $query->get();

		return $response;
    }
	
	public static  function getAllUsers($search_user_role="",$search_mobile_number="",$search_first_name="",$search_last_name="",$search_company_name="",$search_country="",$search_state="",$search_city="",$search_sub_city="",$search_status="")
    {
       	 $user = User::query();
	    $user =  $user->leftJoin('countries', 'users.country', '=', 'countries.id');
		 $user =  $user->leftJoin('states', 'users.state', '=', 'states.id');
		 $user =  $user->leftJoin('cities', 'users.city', '=', 'cities.id');
		 $user =  $user->leftJoin('sub_cities', 'users.sub_city', '=', 'sub_cities.id');
		  $user =  $user->select('users.*','states.name as state_name','countries.name as country_name','cities.name as city_name','sub_cities.name as sub_city_name');
      	if($search_user_role!=""){
	  		$user =  $user->where('users.user_role','=',$search_user_role);
		}
		if($search_mobile_number!=""){
	  		$user =  $user->where('users.mobile','like','%'.$search_mobile_number.'%');
		}
		if($search_first_name!=""){
	  		$user =  $user->where('users.first_name','like','%'.$search_first_name.'%');
		}
		if($search_last_name!=""){
	  		$user =  $user->where('users.last_name','like','%'.$search_last_name.'%');
		}
		if($search_company_name!=""){
	  		$user =  $user->where('users.company_name','like','%'.$search_company_name.'%');
		}
		if($search_country!=""){
	  		$user =  $user->where('countries.id','=',$search_country);
		}
		if($search_state!=""){
	  		$user =  $user->where('states.id','=',$search_state);
		}
		if($search_city!=""){
	  		$user =  $user->where('cities.id','=',$search_city);
		}
		
		if($search_sub_city!=""){
	  		$user =  $user->where('sub_cities.id','=',$search_sub_city);
		}
		
		if($search_status!=""){
	  		$user =  $user->where('users.status','=',$search_status);
		}
		
           $user =     $user->orderBy('id',"DESC");		
           $user =     $user->paginate(10);	

        return $user;

    }
}
