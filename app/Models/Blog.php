<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $table = 'blogs';
	use SoftDeletes;

    public static function getAllBlog()
    {
         $blog = Blog::query();
		 $blog =     $blog->orderBy('id',"DESC");		
         $blog =     $blog->paginate(10);	


        return $blog;
        
    }
}
