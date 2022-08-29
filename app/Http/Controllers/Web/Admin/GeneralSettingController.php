<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Sentinel;
use DB;
use Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::getGeneralSetting();
		return view('admin.general_setting.index',compact('settings'));
    }
	  public function editPostGeneralSetting(Request $request,$id='') {

       $GeneralSetting = GeneralSetting::find($request->id);
        
		$GeneralSetting->phone_Number= $request->phone_Number;
		$GeneralSetting->facebook= $request->facebook;
		$GeneralSetting->twitter= $request->twitter;
		$GeneralSetting->instagram= $request->instagram;
		$GeneralSetting->youtube= $request->youtube;
		$GeneralSetting->email= $request->email;
		$GeneralSetting->address= $request->address;
		$GeneralSetting->description= $request->description;
		$GeneralSetting->save();
       
		return redirect('admin/general_setting')->with(['success' => 'Settings has been successfully updated.']);
    }

}