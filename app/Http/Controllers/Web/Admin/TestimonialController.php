<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Sentinel;
use DB;
use Image;

class TestimonialController extends Controller
{
    public function index()
    {
        //Get all the testimonials
        
		$search_name =$search_company = $search_quote = "";
		$testimonials = Testimonials::getAllTestimonial();
		
        return view('admin.testimonial.index',compact('testimonials','search_name','search_company','search_quote'));
    }

    public function add() {
         return view('admin.testimonial.add');
    }

    public function delete(Request $request,$id) {
        DB::table('site_testimonials')->where('t_id', '=', $id)->delete();
		$request->session()->flash('success', 'Testimonial has been successfully deleted.');
        return 'success';
    }

    public function editTestimonail($id) 
    {
        $data =  Testimonials::where('t_id',$id)->firstOrFail();

        if($data == null)
        {
            return abort(404);
        }               

        $testimonial = DB::table('site_testimonials')->where('t_id','=',$id)->get()->toArray();

        return view('admin.testimonial.edit')->with('testimonials', $testimonial);
    }

    public function testimonials_search(Request $request)
    {

      
	  $search_name = $request->search_name;
	   $search_company = $request->search_company;
	   $search_quote = $request->search_quote;
	   $testimonials = Testimonials::getAllTestimonial($search_name,$search_company,$search_quote);
		return view('admin.testimonial.index',compact('testimonials','search_name','search_company','search_quote'));
   
    }

    public function editPostTestimonail(Request $request,$id) {
        
        $image = request()->file('inputFile');
        if($image) {

        $target_dir = "images/testimonial/".$id;

        if (!file_exists($target_dir))
        {
            mkdir($target_dir, 0777, true);
        }

        $photo = $request->file('inputFile');
        $imagename = $photo->getClientOriginalName();  
        $destinationPath = public_path().'/images/testimonial/'.$id;
        $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
        $thumb_img->save($destinationPath.'/'.$imagename,80);

        $testimonial = DB::table('site_testimonials')
            ->where('t_id', $id)
            ->update(['t_rating' => $_POST['rating'], 't_quote' => $_POST['message'], 't_name' => $_POST['name'], 't_company' => $_POST['company'],'t_image' => $imagename , 'created_by' => '1','updated_at' => date('Y-m-d h:i:s')]);
                
        }else{

            $testimonial = DB::table('site_testimonials')
            ->where('t_id', $id)
            ->update(['t_rating' => $_POST['rating'], 't_quote' => $_POST['message'], 't_name' => $_POST['name'], 't_company' => $_POST['company'],'created_by' => '1','updated_at' => date('Y-m-d h:i:s')]);
        }
           
        		return redirect('admin/testimonials')->with(['success' => 'Testimonial has been successfully updated.']);

    }

    public function addTestimonail(Request $request,$id="") {

        //Insert in to the database
        if($request->hasFile('inputFile')) { 

            $photo = $request->file('inputFile');
            $imagename = $photo->getClientOriginalName();  
        
            $ids = DB::table('site_testimonials')->insertGetId(
            ['t_rating' => $_POST['rating'], 't_quote' => $_POST['message'], 't_image' => $imagename, 't_name' => $_POST['name'], 't_company' => $_POST['company'], 'created_at' => date('Y-m-d h:i:s'), 'created_by' => '1']
            );

            $target_dir = "images/testimonial/".$ids."/".$id;    

            if (!file_exists($target_dir))
            {
                mkdir($target_dir, 0777, true);
            }

            $destinationPath = public_path().'/images/testimonial/'. $ids."/".$id;
            $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$imagename,80);

        }

		return redirect('admin/testimonials')->with(['success' => 'Testimonial has been successfully add.']);
    }

}