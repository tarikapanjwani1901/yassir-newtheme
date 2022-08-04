<?php

namespace App\Models;

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PropertyBookVisit extends Model
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "property_book_visit";
      
    public static function getPropertyBooking($search,$vendor_id,$start_date,$end_date){

        $query = PropertyBookVisit::query();
        //$query = $query->join('vendor_listing','vendor_listing.vl_id','=','property_book_visit.listing_id');
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->join('users','users.id','=','properties.property_vendor');
        $query = $query->select('property_book_visit.*','properties.project_name','users.company_name');
        $query = $query->where('property_book_visit.type','like','bookvisit');

        if(isset($search) && $search!=''){
            $query = $query->where(function($query) use ($search) {
                //$query = $query->where('properties.project_name','like','%'.$search.'%');
                $query = $query->where('property_book_visit.name','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.email','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.contact','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.message','like','%'.$search.'%');
            });
        }

        if(isset($vendor_id) && $vendor_id!=''){
            $query = $query->where('users.id','=',$vendor_id);
        }

        if ($start_date != 'null' && $start_date != '' && $end_date != 'null' && $end_date != '') {
            $query->where("property_book_visit.created_at",'>=',$start_date);
            $query->where("property_book_visit.created_at",'<=',$end_date);
        }

        $response = $query->paginate(20);

        return $response;
    }
    
    public static function getPropertyBookingByUserId($user_id,$search,$property_id,$start_date,$end_date){

        $query = PropertyBookVisit::query();
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->join('users','users.id','=','properties.property_vendor');
        $query = $query->select('property_book_visit.*','properties.project_name','users.company_name');

        $query = $query->where('users.id',$user_id);
        $query = $query->where('property_book_visit.type','like','bookvisit');

        if(isset($search) && $search!=''){
            $query = $query->where(function($query) use ($search) {
                //$query = $query->where('properties.project_name','like','%'.$search.'%');
                $query = $query->where('property_book_visit.name','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.email','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.contact','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.message','like','%'.$search.'%');
            });
        }

        if(isset($property_id) && $property_id!=''){
            $query = $query->where('property_book_visit.listing_id','=',$property_id);
        }

        if ($start_date != 'null' && $start_date != '' && $end_date != 'null' && $end_date != '') {
            $query->where("property_book_visit.created_at",'>=',$start_date);
            $query->where("property_book_visit.created_at",'<=',$end_date);
        }
        
        $response = $query->paginate(20);

        return $response;
    }

    //Destroy record
    public static function destroyRecord($id)
    {
        DB::table('property_book_visit')->where('id', '=', $id)->delete();
        return true;
    }

    public static function getAllInquiriesCount()
    {
        $query = PropertyBookVisit::query();
        $query = $query->select('property_book_visit.*');
        $query = $query->where('property_book_visit.type','like','inquiry');

        $response = $query->count();

        return $response;
    }

    public static function getAllInquiries($search,$vendor_id,$start_date,$end_date)
    {
        $query = PropertyBookVisit::query();
        //$query = $query->join('vendor_listing','vendor_listing.vl_id','=','property_book_visit.listing_id');
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->join('users','users.id','=','properties.property_vendor');
        $query = $query->select('property_book_visit.*','properties.project_name','users.company_name');
        $query = $query->where('property_book_visit.type','like','inquiry');

        if(isset($search) && $search!=''){
            $query = $query->where(function($query) use ($search) {
                $query = $query->where('property_book_visit.name','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.email','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.contact','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.message','like','%'.$search.'%');
            });
        }

        if(isset($vendor_id) && $vendor_id!=''){
            $query = $query->where('users.id','=',$vendor_id);
        }

        if ($start_date != 'null' && $start_date != '' && $end_date != 'null' && $end_date != '') {
            $query->where("property_book_visit.created_at",'>=',$start_date);
            $query->where("property_book_visit.created_at",'<=',$end_date);
        }

        $response = $query->paginate(20);
       
        return $response;
    }

    public static function getAllVendorInquiriesCount($user_id)
    {
        $query = PropertyBookVisit::query();
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->join('users','users.id','=','properties.property_vendor');
        $query = $query->select('property_book_visit.*');
        $query = $query->where('property_book_visit.type','like','inquiry');
        $query = $query->where('users.id','=',$user_id);

        $response = $query->count();

        return $response;
    }

    public static function getAllVendorInquiries($user_id,$search,$property_id,$start_date,$end_date)
    {

        $query = PropertyBookVisit::query();
        //$query = $query->join('vendor_listing','vendor_listing.vl_id','=','property_book_visit.listing_id');
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->join('users','users.id','=','properties.property_vendor');
        $query = $query->select('property_book_visit.*','properties.project_name','users.company_name');
        $query = $query->where('property_book_visit.type','like','inquiry');
        $query = $query->where('users.id','=',$user_id);

        if(isset($search) && $search!=''){
            $query = $query->where(function($query) use ($search) {
                $query = $query->where('property_book_visit.name','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.email','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.contact','like','%'.$search.'%');
                $query = $query->orWhere('property_book_visit.message','like','%'.$search.'%');
            });
        }

        if(isset($property_id) && $property_id!=''){
            $query = $query->where('property_book_visit.listing_id','=',$property_id);
        }

        if ($start_date != 'null' && $start_date != '' && $end_date != 'null' && $end_date != '') {
            $query->where("property_book_visit.created_at",'>=',$start_date);
            $query->where("property_book_visit.created_at",'<=',$end_date);
        }
        
        $response = $query->paginate(20);
        
        return $response;

    }

    public static function getAllUserInquiries($user_id)
    {
        $query = PropertyBookVisit::query();
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->select('properties.created_at','properties.project_name','properties.id',
        'properties.address','properties.property_status','properties.id');
        $query = $query->where('property_book_visit.type','like','inquiry');
        $query = $query->where('property_book_visit.user_id','=',$user_id);
        $query = $query->orderBy('property_book_visit.created_at','desc');

        $response = $query->get();
        
        return $response;

    }

    public static function getAllVendorInquiriesList($vendor_id)
    {
        $query = PropertyBookVisit::query();
        $query = $query->join('properties','properties.id','=','property_book_visit.listing_id');
        $query = $query->select('property_book_visit.created_at','properties.project_name','properties.id','properties.address',
        'properties.property_status','properties.id');
        $query = $query->where('property_book_visit.type','like','inquiry');
        $query = $query->where('properties.property_vendor','=',$vendor_id);
        
        $query = $query->orderBy('property_book_visit.created_at','desc');
        
        $response = $query->get();
        
        return $response;

    }

}