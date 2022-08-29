<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitorSearchRecord;

use App\Models\Common;
use Sentinel;
use DB;
use Image;

class VisitorSearchRecordController extends Controller
{
    public function index()
    {
		
		$search_keyword = $search_device = $search_os = $search_ip_address  = $from= $to = '';
	   
	    $visitor_search_records = VisitorSearchRecord::getAllVisitorSearchRecord();
		
        return view('admin.visitor_search_record.index',compact('visitor_search_records','search_keyword','search_device','search_os','search_ip_address','from','to'));
   
  	}

    public function visitor_search_record_filter(Request $request)
    {

      
	   $search_keyword = $request->search_keyword;
	   $search_device = $request->search_device;
	   $search_os = $request->search_os;
	   $search_ip_address = $request->search_ip_address;
	    $from = $request->get('from');
        $to = $request->get('to');

        $start_date = (!empty($_GET["from"])) ? ($_GET["from"]) : ('');
        $end_date = (!empty($_GET["to"])) ? ($_GET["to"]) : ('');

        if($start_date && $end_date){
            $start_date = date('Y-m-d 00:00:00', strtotime($start_date));
            $end_date = date('Y-m-d 23:59:59', strtotime($end_date));
        }

	   
	    $visitor_search_records = VisitorSearchRecord::getAllVisitorSearchRecord($search_keyword,$search_device,$search_os,$search_ip_address,$start_date,$end_date);
		
        return view('admin.visitor_search_record.index',compact('visitor_search_records','search_keyword','search_device','search_os','search_ip_address','from','to'));
   
    }

}