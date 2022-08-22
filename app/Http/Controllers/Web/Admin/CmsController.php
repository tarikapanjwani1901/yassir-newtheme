<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Cms;

class CmsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {
        //Get all the state
        $cms = Cms::getAllCms();	

	    return view('admin.cms.index',compact('cms'));
    }

   
    public function editCms($id) 
    {
        $data =  Cms::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               
      
        $cms = DB::table('cms')
                ->where('id','=',$id)
                ->get()
                ->toArray();

	    return view('admin.cms.edit',compact('cms'));

    }

    public function editPostCms(Request $request,$id) {
        
        $checkCms = Cms::where('title',$request->title)->where("id",'!=',$id)->first();
				
        if(isset($checkCms->id) && $checkCms->id >0){
            return  redirect('admin/cms/edit/'.$id)->with(['error' => 'Sorry cms already exists.']);
        }
		
         $update_data = [

            'title' => $request->title,
            'description' => $request->description
            
        ];

        DB::table('cms')->where('id',$id)->update($update_data);
       
           
		   
        return redirect('admin/cms')->with(['success' => 'CMS has been successfully updated.']);

    }

}
