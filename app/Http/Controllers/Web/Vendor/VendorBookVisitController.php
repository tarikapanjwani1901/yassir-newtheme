<?php

namespace App\Http\Controllers\Web\Vendor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\PropertyBookVisit;
use Sentinel;
use DB;

class VendorBookVisitController extends Controller
{

    public function index(Request $request)
    {
        $properties = $request->get('properties');
        $inquiry_name = $request->get('inquiry_name');

        $start_date = (!empty($_GET["from"])) ? ($_GET["from"]) : ('');
        $end_date = (!empty($_GET["to"])) ? ($_GET["to"]) : ('');

        if($start_date && $end_date){
            $start_date = date('Y-m-d 00:00:00', strtotime($start_date));
            $end_date = date('Y-m-d 23:59:59', strtotime($end_date));
        }

        $user_id = \Auth::user()->id;

        $bookvisit_response = PropertyBookVisit::getPropertyBookingByUserId($user_id,$inquiry_name,$properties,$start_date,$end_date);

       // $vendors_info = DB::table('vendor_listing')->select('vl_id','l_title')->whereNotNull('l_title')->orderBy('l_title','asc')->get();   

        $properties_info = Properties::getPropertiesList();

        return view('vendor.bookvisit.index')->with('bookvisit',$bookvisit_response)
                                            ->with("properties_info",$properties_info)
                                            ->with('properties',$properties)
                                            ->with('inquiry_name',$inquiry_name)
                                            ->with('start_date',$start_date)
                                            ->with('end_date',$end_date);
    }

    public function destroy(PropertyBookVisit $bv,$bvID)
    {
        //Destroy product
        PropertyBookVisit::destroyRecord($bvID);

        return 'success';
    }
}