<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BlogTag extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "blog_tag";

    public static  function getAllBlogTag($search_title="")
    {
       	 $category = BlogTag::query();
		   
		if($search_title!=""){
			$category =  $category->where('blog_tag.title','like','%'.$search_title.'%');
		}
		
           $category =     $category->orderBy('blog_tag.id',"DESC");		
           $category =     $category->paginate(10);	
	    return $category;

    }
	
	
}