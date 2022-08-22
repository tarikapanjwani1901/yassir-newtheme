<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\BlogCategories;

use App\Models\Common;

use Sentinel;
use Image;
class BlogCategoriesController extends Controller
{

    public function index()
    {
        //Get all the user
        $blog_categories = BlogCategories::getAllBlogCategories();	
		
		
	  	$search_title  ="";
	
	    return view('admin.blogs.category.index',compact('blog_categories','search_title'));
    }

    public function add() 
    {   
		
        return view('admin.blogs.category.add');
    }

    public function delete(Request $request,$id) {
        
		BlogCategories::find($id)->delete();
		$request->session()->flash('success', 'Category has been successfully deleted.');
        return 'success';
    }

    public function editBlogCategory($id) 
    {
        $data =  BlogCategories::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               
      
        $blog_categories = DB::table('blog_categories')
                ->where('id','=',$id)
                ->get()
                ->toArray();
		$d = $blog_categories[0];
		
        return view('admin.blogs.category.edit',compact('d'));

    }

    public function blog_categories_search(Request $request)
    {
		
		$search_title = $request->search_title;
	 
	     $blog_categories = BlogCategories::getAllBlogCategories($search_title);	

	
	    return view('admin.blogs.category.index',compact('blog_categories','search_title'));
    }
	
    public function editPostBlogCategory(Request $request,$id) {
        
     
	 $checkCategory = BlogCategories::where('title',$request->title)->where('id','!=',$id)->first();
				
        if(isset($checkCategory->id) && $checkCategory->id >0){
         
		    return  redirect('admin/blog_categories/edit/'.$id)->with(['error' => 'Sorry category already exists.']);
        }
		
		$BlogCategories = BlogCategories::find($id);
        
		$BlogCategories->title= $request->title;
		$BlogCategories->save();
           
		   
        return redirect('admin/blog_categories')->with(['success' => 'Category has been successfully updated.']);

    }

    public function addBlogCategory(Request $request,$id="") {

	    $checkCategory = BlogCategories::where('title',$request->title)->first();
				
        if(isset($checkCategory->id) && $checkCategory->id >0){
         
		    return  redirect('admin/blog_categories/add')->with(['error' => 'Sorry category already exists.']);
        }
		
		$BlogCategories = new BlogCategories();
		$BlogCategories->title = $request->title;
		$BlogCategories->save();
        
		return redirect('admin/blog_categories')->with(['success' => 'Category has been successfully add.']);

    }
}
