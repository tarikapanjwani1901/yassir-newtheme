<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\BlogTag;

use App\Models\Common;

use Sentinel;
use Image;
class BlogTagController extends Controller
{

    public function index()
    {
        //Get all the user
        $blog_tag = BlogTag::getAllBlogTag();	
		
		
	  	$search_title  ="";
	
	    return view('admin.blogs.tag.index',compact('blog_tag','search_title'));
    }

    public function add() 
    {   
		
        return view('admin.blogs.tag.add');
    }

    public function delete(Request $request,$id) {
        
		BlogTag::find($id)->delete();
		$request->session()->flash('success', 'Tag has been successfully deleted.');
        return 'success';
    }

    public function editBlogTag($id) 
    {
        $data =  BlogTag::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               
      
        $blog_tag = DB::table('blog_tag')
                ->where('id','=',$id)
                ->get()
                ->toArray();
		$d = $blog_tag[0];
		
        return view('admin.blogs.tag.edit',compact('d'));

    }

    public function blog_tag_search(Request $request)
    {
		
		$search_title = $request->search_title;
	 
	     $blog_tag = BlogTag::getAllBlogTag($search_title);	

	
	    return view('admin.blogs.tag.index',compact('blog_tag','search_title'));
    }
	
    public function editPostBlogTag(Request $request,$id) {
        
     
	 $checkTag = BlogTag::where('title',$request->title)->where('id','!=',$id)->first();
				
        if(isset($checkTag->id) && $checkTag->id >0){
         
		    return  redirect('admin/blog_tag/edit/'.$id)->with(['error' => 'Sorry tag already exists.']);
        }
		
		$BlogTag = BlogTag::find($id);
        
		$BlogTag->title= $request->title;
		$BlogTag->save();
           
		   
        return redirect('admin/blog_tag')->with(['success' => 'Tag has been successfully updated.']);

    }

    public function addBlogTag(Request $request,$id="") {

	    $checkTag = BlogTag::where('title',$request->title)->first();
				
        if(isset($checkTag->id) && $checkTag->id >0){
         
		    return  redirect('admin/blog_tag/add')->with(['error' => 'Sorry tag already exists.']);
        }
		
		$BlogTag = new BlogTag();
		$BlogTag->title = $request->title;
		$BlogTag->save();
        
		return redirect('admin/blog_tag')->with(['success' => 'Tag has been successfully add.']);

    }
}
