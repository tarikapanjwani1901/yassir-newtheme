<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BlogCategories extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "blog_categories";

    public static  function getAllBlogCategories($search_title="")
    {
       	 $category = BlogCategories::query();
		   
		if($search_title!=""){
			$category =  $category->where('blog_categories.title','like','%'.$search_title.'%');
		}
		
           $category =     $category->orderBy('blog_categories.id',"DESC");		
           $category =     $category->paginate(10);	
	    return $category;

    }
	
	 public static  function getAllBlogCategoriesList()
    {
       	 $category = BlogCategories::query();
		   
           $category =     $category->orderBy('blog_categories.title',"asc");		
       return $category;

    }
	
	
}