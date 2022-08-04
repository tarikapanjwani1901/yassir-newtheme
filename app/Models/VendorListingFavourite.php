<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VendorListingFavourite extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "vendor_listing_favourite";

    public static function getFavouritePropertyCountById($user_id,$property_id){

        $query = VendorListingFavourite::query();
        $query = $query->where('u_id','=',$user_id);
        $query = $query->where('vl_id','=',$property_id);
        $count = $query->count();

        return $count;
    }

    public static function getFavouritePropertyById($user_id,$property_id){

        $query = VendorListingFavourite::query();
        $query = $query->where('u_id','=',$user_id);
        $query = $query->where('vl_id','=',$property_id);
        $query = $query->select('vendor_listing_favourite.id');
        $count = $query->first();

        return $count;
    }

}