<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VisitorSearchRecord extends Model
{
    protected $table = 'visitors_search';

    public static function getAllVisitorSearchRecord($search_keyword='',$search_device='',$search_os='',$search_ip_address='',$start_date='',$end_date='')
    {
        $visitors_search_records = DB::table('visitors_search');
    	if($search_keyword!=""){
	  		$visitors_search_records =  $visitors_search_records->where('search_keyword','like','%'.$search_keyword.'%');
		}
		if($search_device!=""){
	  		$visitors_search_records =  $visitors_search_records->where('device','like','%'.$search_device.'%');
		}
		if($search_os!=""){
	  		$visitors_search_records =  $visitors_search_records->where('ios','like','%'.$search_os.'%');
		}
		
		if($search_ip_address!=""){
	  		$visitors_search_records =  $visitors_search_records->where('ip','like','%'.$search_ip_address.'%');
		}
		
		 if ($start_date != 'null' && $start_date != '' && $end_date != 'null' && $end_date != '') {
            $visitors_search_records =  $visitors_search_records->where("created_at",'>=',$start_date);
            $visitors_search_records =  $visitors_search_records->where("created_at",'<=',$end_date);
        }

		
        $visitors_search_records =  $visitors_search_records->orderBy('id', 'DESC');
        $visitors_search_records =  $visitors_search_records->paginate(10);

        return $visitors_search_records;
        
    }
}
