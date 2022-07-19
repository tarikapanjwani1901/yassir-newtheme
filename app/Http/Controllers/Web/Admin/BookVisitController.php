<?php

namespace App\Http\Controllers\Web\Admin;

use App\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyBookVisit;
use Sentinel;
use DB;

class BookVisitController extends Controller
{

    public function index(Request $request)
    {
        $vendors = $request->get('vendors');
        $inquiry_name = $request->get('inquiry_name');

        $start_date = (!empty($_GET["from"])) ? ($_GET["from"]) : ('');
        $end_date = (!empty($_GET["to"])) ? ($_GET["to"]) : ('');

        if($start_date && $end_date){
            $start_date = date('Y-m-d 00:00:00', strtotime($start_date));
            $end_date = date('Y-m-d 23:59:59', strtotime($end_date));
        }

        $bookvisit_response = PropertyBookVisit::getPropertyBooking($inquiry_name,$vendors,$start_date,$end_date);

        $vendors_info = DB::table('vendor_listing')->select('vl_id','l_title')->whereNotNull('l_title')->orderBy('l_title','asc')->get();   

        return view('admin.bookvisit.index')->with('bookvisit',$bookvisit_response)->with("vendors_info",$vendors_info)->with('vendors',$vendors)->with('inquiry_name',$inquiry_name);
    }

    public function destroy(PropertyBookVisit $bv,$bvID)
    {
        //Destroy product
        PropertyBookVisit::destroyRecord($bvID);

        return 'success';
    }
}