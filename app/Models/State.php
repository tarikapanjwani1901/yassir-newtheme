<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class State extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "states";

    public static function getStatesByCountryId($country_id){

        $query = State::query();
        $query = $query->select('*');
        $query = $query->where('status','=','active');
        $query = $query->where('country_id','=',$country_id);
        $response = $query->get();

        return $response;
    }   

    public static  function getAllStates()
    {
        $state = DB::table('states')
                ->select('states.id as state_id','states.name as state_name','states.status as status','countries.name as country_name')
                ->join('countries', 'states.country_id', '=', 'countries.id')
                ->orderBy('states.id',"DESC")		
                ->paginate(10);	

        return $state;

    }
}