<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Advertise extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "advertise";

    public static function getAllAdvertiseByUserId($user_id)
    {
        $query = Advertise::query();
        $query = $query->join('users','users.id','=','advertise.vendor_id');
        $query = $query->select('advertise.title','users.company_name','advertise.id');
        $query = $query->where('advertise.vendor_id',$user_id);

        $response = $query->paginate(20);

        return $response;
    }

    public static function getAllAdvertise(){

        $query = Advertise::query();
        $query = $query->join('users','users.id','=','advertise.vendor_id');
        $query = $query->select('advertise.title','users.company_name','advertise.id','advertise.section','advertise.expiry_date',
        'advertise.position','advertise.priority');
        //$response = $query->get();

        $response = $query->paginate(20);

        return $response;
    } 

    public static function getAdvertiseById($id){

        $query = Advertise::query();
        $query = $query->where('id','=',$id);
        $response = $query->first();

        return $response;
    }

    //Destroy record
    public static function destroyRecord($id)
    {
        DB::table('advertise')->where('id', '=', $id)->delete();

        return true;
    }
}