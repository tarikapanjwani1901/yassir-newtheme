<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Common;
use Sentinel;
use DB;
use Image;

class BlogController extends Controller
{
    public function index()
    {
        //Get all the blog
        $blog = Blog::getAllBlog();
        return view('admin.blogs.blog.index')->with('blog', $blog);
    }

    public function add() {
		$getAllBlogCategoriesList = Common::getAllBlogCategoriesList();
		$getAllBlogTagList = Common::getAllBlogTagList();	
    	   $category = $tags = array();
		 
		 foreach($getAllBlogCategoriesList as $single){
			 $category[$single->id] = $single->title;
			}
			
		 foreach($getAllBlogTagList as $single){
			 $tags[$single->id] = $single->title;
			}
			$status['Active'] = 'Active';
		$status['Inactive'] = 'Inactive';
		
		 return view('admin.blogs.blog.add',compact('category','tags','status'));
    }

    public function delete(Request $request,$id) {
		DB::table('blogs')->where('id', '=', $id)->delete();
		DB::table('blog_category_assing')->where('blog_id', '=', $id)->delete();
		DB::table('blog_tag_assing')->where('blog_id', '=', $id)->delete();
		$request->session()->flash('success', 'Blog has been successfully deleted.');
        return 'success';
    }

    public function editBlog($id) 
    {
        $blog =  Blog::where('id',$id)->firstOrFail();
		
        if($blog == null)
        {
            return abort(404);
        }               

	
		$getAllBlogCategoriesList = Common::getAllBlogCategoriesList();
		$getAllBlogTagList = Common::getAllBlogTagList();	
    	 $category = $tags = array();
		 
		 foreach($getAllBlogCategoriesList as $single){
			 $category[$single->id] = $single->title;
			}
			
		 foreach($getAllBlogTagList as $single){
			 $tags[$single->id] = $single->title;
		 }
			$status['Active'] = 'Active';
			$status['Inactive'] = 'Inactive';
		
	   $categoryAssing = DB::table('blog_category_assing')->where('blog_id','=',$id)->get()->toArray();
       $categoryAssingList = array();
	   
	   if(!empty($categoryAssing)){
		  	foreach($categoryAssing as $single){
				$categoryAssingList[$single->category_id] = $single->category_id;	
			}  
		 }
		 
		 $tagAssing = DB::table('blog_tag_assing')->where('blog_id','=',$id)->get()->toArray();
       $tagAssingList = array();
	   
	   if(!empty($tagAssing)){
		  	foreach($tagAssing as $single){
				$tagAssingList[$single->tag_id] = $single->tag_id;	
			}  
		 }
		
		 return view('admin.blogs.blog.edit',compact('category','tags','status','blog','categoryAssingList','tagAssingList'));
    }

    public function manage_blog(Request $request)
    {

      // echo "hii"; exit;
       $search = $request->get('blog_search');
       $blog = DB::table('blog')
       ->where('t_quote','like','%'.$search.'%')
       ->orwhere('t_name','like','%'.$search.'%')
       ->orwhere('t_company','like','%'.$search.'%')
       ->orwhere('t_image','like','%'.$search.'%')
       ->paginate(10);   
      // echo "<pre>"; print_r($blog); exit; 

       return view('admin.blogs.blog')->with('blog', $blog);
       // return view('admin/blog',compact('blog',$blog));
    }

    public function editPostBlog(Request $request,$id) {
		

     
		$Blog = Blog::find($id);
		$Blog->title= $request->title;
		$Blog->content= $request->description;
		$Blog->status= $request->status;
		$Blog->save();
	
		   if($request->hasFile('inputFile')) { 

            $photo = $request->file('inputFile');
            $imagename = $photo->getClientOriginalName();  
        
            $target_dir = "images/blog/".$id;    

            if (!file_exists($target_dir))
            {
                mkdir($target_dir, 0777, true);
            }

            $destinationPath = public_path().'/images/blog/'.$id;
            $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
			$BlogFind = Blog::find($id);
        	$BlogFind->image = $imagename;
			$BlogFind->save();
        }
		 DB::table('blog_category_assing')->where('blog_id', '=', $id)->delete();
		if(!empty($request->category)){
				foreach($request->category as $single){
					$ids = DB::table('blog_category_assing')->insertGetId(array('blog_id' => $id, 'category_id' => $single));
				}
		}
		 DB::table('blog_tag_assing')->where('blog_id', '=', $id)->delete();
		if(!empty($request->tag)){
				foreach($request->tag as $single){
					$ids = DB::table('blog_tag_assing')->insertGetId(array('blog_id' => $id, 'tag_id' => $single));
				}
		}
		
		return redirect('admin/blog')->with(['success' => 'Blog has been successfully updated.']);
    
		
		}

    public function addBlog(Request $request,$id="") {

     
		$Blog = new Blog();
		$Blog->title= $request->title;
		$Blog->content= $request->description;
		$Blog->status= $request->status;
		
		$Blog->save();
		$BlogID = $Blog->id;
	
		   if($request->hasFile('inputFile')) { 

            $photo = $request->file('inputFile');
            $imagename = $photo->getClientOriginalName();  
        
            $target_dir = "images/blog/".$BlogID."/".$id;    

            if (!file_exists($target_dir))
            {
                mkdir($target_dir, 0777, true);
            }

            $destinationPath = public_path().'/images/blog/'. $BlogID."/".$id;
            $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);
			$BlogFind = Blog::find($BlogID);
        	$BlogFind->image = $imagename;
			$BlogFind->save();
        }
		 DB::table('blog_category_assing')->where('blog_id', '=', $BlogID)->delete();
		if(!empty($request->category)){
				foreach($request->category as $single){
					$ids = DB::table('blog_category_assing')->insertGetId(array('blog_id' => $BlogID, 'category_id' => $single));
				}
		}
		 DB::table('blog_tag_assing')->where('blog_id', '=', $BlogID)->delete();
		if(!empty($request->tag)){
				foreach($request->tag as $single){
					$ids = DB::table('blog_tag_assing')->insertGetId(array('blog_id' => $BlogID, 'tag_id' => $single));
				}
		}
		
		return redirect('admin/blog')->with(['success' => 'Blog has been successfully add.']);
    }

}