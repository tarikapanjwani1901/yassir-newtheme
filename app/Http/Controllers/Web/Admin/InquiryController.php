<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyBookVisit;
use App\Models\Properties;
use App\Models\User;
use Sentinel;
use DB;

class InquiryController extends Controller
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

        $inquires = PropertyBookVisit::getAllInquiries($inquiry_name,$vendors,$start_date,$end_date);
        $inquiresCount = PropertyBookVisit::getAllInquiriesCount('');

        //$vendors_info = DB::table('vendor_listing')->select('vl_id','l_title')->whereNotNull('l_title')->orderBy('l_title','asc')->get();      

        $vendors_info = User::getVendors();

        return view('admin.inquiry.index')->with('inquires',$inquires)
                                        ->with("vendors_info",$vendors_info)
                                        ->with('vendors',$vendors)
                                        ->with('inquiry_name',$inquiry_name)
                                        ->with('total_inquity',$inquiresCount);

    }

    public function destroy(PropertyBookVisit $bv,$bvID)
    {
        //Destroy product
        PropertyBookVisit::destroyRecord($bvID);

        return 'success';
    }
}