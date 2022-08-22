<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\BlogComments;

use App\Models\Common;

use Sentinel;
use Image;
class BlogCommentsController extends Controller
{

    public function index()
    {
        $blog_comments = BlogComments::getAllBlogComments();	
		
		$search_name = $search_email = $search_blog =$search_status  ="";
		$blogsList =Common::getAllBlogList();
		$blogs[''] = "Please select blog";
		foreach($blogsList as $single){
			$blogs[$single->id] = $single->title;
		}
		$status['']='Status';
		$status['Pending']='Pending';
		$status['Rejected']='Rejected';
		$status['Approve']='Approve';
			
	    return view('admin.blogs.comments.index',compact('blog_comments','blogs','status','search_name','search_email','search_blog','search_status'));
    }

    public function add() 
    {   
		$blogsList =Common::getAllBlogList();
		$blogs[''] = "Please select blog";
		foreach($blogsList as $single){
			$blogs[$single->id] = $single->title;
		}
		$status['Pending']='Pending';
		$status['Rejected']='Rejected';
		$status['Approve']='Approve';
		
        return view('admin.blogs.comments.add',compact('blogs','status'));
    }

    public function delete(Request $request,$id) {
        
		BlogComments::find($id)->delete();
		$request->session()->flash('success', 'Comment has been successfully deleted.');
        return 'success';
    }

    public function editBlogComment($id) 
    {
        $data =  BlogComments::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               
      
        $blog_comments = DB::table('blog_comments')
                ->where('id','=',$id)
                ->get()
                ->toArray();
		$d = $blog_comments[0];
		
       
	   $blogsList =Common::getAllBlogList();
		$blogs[''] = "Please select blog";
		foreach($blogsList as $single){
			$blogs[$single->id] = $single->title;
		}
		$status['Pending']='Pending';
		$status['Rejected']='Rejected';
		$status['Approve']='Approve';
		
        return view('admin.blogs.comments.edit',compact('d','blogs','status'));

    }

    public function blog_comments_search(Request $request)
    {
		
		
		$search_name = $request->search_name;
		$search_email= $request->search_email;
		$search_blog  = $request->search_blog;
		$search_status  = $request->search_status;
		
		$blog_comments = BlogComments::getAllBlogComments($search_name,$search_email,$search_blog,$search_status);
		 
		$blogsList =Common::getAllBlogList();
		$blogs[''] = "Please select blog";
		foreach($blogsList as $single){
			$blogs[$single->id] = $single->title;
		}	
		$status['']='Status';
		$status['Pending']='Pending';
		$status['Rejected']='Rejected';
		$status['Approve']='Approve';
		
		
	    return view('admin.blogs.comments.index',compact('blog_comments','blogs','status','search_name','search_email','search_blog','search_status'));
    }
	
    public function editPostBlogComment(Request $request,$id) {
        
    	$BlogComments = BlogComments::find($id);
        
		$BlogComments->blog_id = $request->blog_id;
		$BlogComments->name = $request->name;
		$BlogComments->email = $request->email;
		$BlogComments->website = $request->website;
		$BlogComments->comment = $request->comment;
		$BlogComments->status = $request->status;
		
		
		$BlogComments->save();
           
		   
        return redirect('admin/blog_comments')->with(['success' => 'Comment has been successfully updated.']);

    }

    public function addBlogComment(Request $request,$id="") {

	   $BlogComments = new BlogComments();
		$BlogComments->blog_id = $request->blog_id;
		$BlogComments->name = $request->name;
		$BlogComments->email = $request->email;
		$BlogComments->website = $request->website;
		$BlogComments->comment = $request->comment;
		$BlogComments->status = $request->status;
		
		$BlogComments->save();
        
		return redirect('admin/blog_comments')->with(['success' => 'Comment has been successfully add.']);

    }
}
