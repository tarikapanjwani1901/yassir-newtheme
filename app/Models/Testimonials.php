<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testimonials extends Model
{
    protected $table = 'site_testimonials';

    public static function getAllTestimonial($search_name="",$search_company="",$search_quote="")
    {
        $testimonials = DB::table('site_testimonials')
        ->leftJoin('users', 'site_testimonials.created_by', '=', 'users.id');
		
		if($search_name!=""){
	  		$testimonials =  $testimonials->where('site_testimonials.t_name','like','%'.$search_name.'%');
		}
		if($search_company!=""){
	  		$testimonials =  $testimonials->where('site_testimonials.t_company','like','%'.$search_company.'%');
		}
		if($search_quote!=""){
	  		$testimonials =  $testimonials->where('site_testimonials.t_quote','like','%'.$search_quote.'%');
		}
		
        $testimonials =  $testimonials->orderBy('site_testimonials.t_id', 'DESC');
        $testimonials =  $testimonials->paginate(10);

        return $testimonials;
        
    }
}
