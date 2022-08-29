<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Sentinel;
use DB;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        //Get all the sliders
        
		$search_name= $search_slider_status= $search_slider_type="";
		$status[''] = "Status";
		$status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		
		$type[''] = "Type";
		$type['Image'] = "Image";
		$type['Video'] = "Video";
		
		
		$sliders = Slider::getAllSlider();
		
        return view('admin.slider.index',compact('sliders','search_name','search_slider_status','search_slider_type','status','type'));
    }

    public function add() {
        $status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		$type['Image'] = "Image";
		$type['Video'] = "Video";
		
		 return view('admin.slider.add',compact('type','status'));
    }

    public function delete(Request $request,$id) {
        DB::table('slider')->where('id', '=', $id)->delete();
		$request->session()->flash('success', 'Slider has been successfully deleted.');
        return 'success';
    }

    public function editSlider($id) 
    {
        $data =  Slider::where('id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               

        $slider = DB::table('slider')->where('id','=',$id)->get()->toArray();

             $status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		$type['Image'] = "Image";
		$type['Video'] = "Video";
		
		 return view('admin.slider.edit',compact('slider','type','status'));
   
    }

    public function slider_search(Request $request)
    {

      
	  	$search_name = $request->search_name;
	   $search_slider_status = $request->search_slider_status;
	   $search_slider_type = $request->search_slider_type;
	   $sliders = Slider::getAllSlider($search_name,$search_slider_status,$search_slider_type);
		$status[''] = "Status";
		$status['Active'] = "Active";
		$status['Inactive'] = "Inactive";
		
		$type[''] = "Type";
		$type['Image'] = "Image";
		$type['Video'] = "Video";
		
		
        return view('admin.slider.index',compact('sliders','search_name','search_slider_status','search_slider_type','status','type'));
   
    }

    public function editPostSlider(Request $request,$id) {
        
        $slider = Slider::find($id);
		
		$slider->name = $request->name;
		$slider->slider_type = $request->slider_type;
		$slider->slider_status = $request->slider_status;
		
	
		$image = $request->file('inputFile');
        if($image) {
			
			

        $target_dir = "images/slider/".$id;

        if (!file_exists($target_dir))
        {
            mkdir($target_dir, 0777, true);
        }
		
		
		$slider_file = time().basename($request->file('inputFile')->getClientOriginalName());
        move_uploaded_file($_FILES["inputFile"]["tmp_name"], $target_dir."/".$slider_file);
		   
		$slider->slider_file = $slider_file;
		
        
                
        }
		
		$slider->save();
           
        		return redirect('admin/slider')->with(['success' => 'Slider has been successfully updated.']);

    }

    public function addSlider(Request $request,$id="") {

        //Insert in to the database
        if($request->hasFile('inputFile')) { 
			$slider = new Slider();
			$slider->name = $request->name;
			$slider->slider_type = $request->slider_type;
			$slider->name = $request->name;	
        	$ids = $slider->id;  
        
            $target_dir = "images/slider/".$ids."/".$id;    

            if (!file_exists($target_dir))
            {
                mkdir($target_dir, 0777, true);
            }

           $slider_file = time().basename($request->file('inputFile')->getClientOriginalName());
       		 move_uploaded_file($_FILES["inputFile"]["tmp_name"], $target_dir."/".$slider_file);
		   
		$slider->slider_file = $slider_file;
		    $slider->save();
		

        }

		return redirect('admin/slider')->with(['success' => 'Slider has been successfully add.']);
    }

}