<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VendorListing extends Model
{

    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "vendor_listing";

    public static function getPropertyByVendor($user_id){

        $query = VendorListing::query();
        $query = $query->select('vendor_listing.l_title','vendor_listing.l_location','vendor_listing.price',
        'vendor_listing.possession_date','vendor_listing.vl_id');
        $query = $query->orderBy('vendor_listing.vl_id','desc');
        $query = $query->where('u_id',$user_id);
        $response = $query->get();

        return $response;
        
    }

    public static function getPropertyBySearch(){

        $query = VendorListing::query();
        $query = $query->select('vendor_listing.l_title','vendor_listing.l_location','vendor_listing.price',
        'vendor_listing.possession_date','vendor_listing.vl_id');
        $query = $query->orderBy('vendor_listing.vl_id','desc');
        $query= $query->limit(10);
        $response = $query->get();

        return $response;
        
    }
}