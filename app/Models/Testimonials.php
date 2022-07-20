<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testimonials extends Model
{
    protected $table = 'site_testimonials';

    public static function getAllTestimonial()
    {
        $testimonials = DB::table('site_testimonials')
        ->leftJoin('users', 'site_testimonials.created_by', '=', 'users.id')
        ->orderBy('site_testimonials.t_id', 'DESC')
        ->paginate(5);

        return $testimonials;
        
    }
}
