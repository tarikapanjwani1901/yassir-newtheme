<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BlogComments extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;

    protected $table = "blog_comments";

    public static  function getAllBlogComments($search_name="",$search_email="",$search_blog="",$search_status="")
    {
       	 $comments = BlogComments::query();
		 $comments =  $comments->leftJoin('blogs', 'blog_comments.blog_id', '=', 'blogs.id');
		 $comments =  $comments->select('blog_comments.*','blogs.title as blog_name');
		 if($search_name!=""){
	  		$comments =  $comments->where('blog_comments.name','like','%'.$search_name.'%');
		}
		if($search_email!=""){
	  		$comments =  $comments->where('blog_comments.email','like','%'.$search_email.'%');
		}
		if($search_status!=""){
	  		$comments =  $comments->where('blog_comments.status',$search_status);
		}
		if($search_blog!=""){
	  		$comments =  $comments->where('blogs.id',$search_blog);
		}
		 $comments =     $comments->orderBy('blog_comments.id',"DESC");		
         $comments =     $comments->paginate(10);	
	    return $comments;
	}
	
	
}