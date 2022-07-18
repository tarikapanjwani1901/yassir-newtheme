<?php

namespace App\Http\Controllers\Web\Admin;

use App\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use DB;

class InquiryController extends Controller
{

    public function index(Request $request)
    {

        return view('admin.inquiry.index');

    }

}