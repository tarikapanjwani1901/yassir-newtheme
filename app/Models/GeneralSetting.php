<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralSetting extends Model
{
    protected $table = 'general_setting';

    public static function getGeneralSetting()
    {
        $general_setting = DB::table('general_setting');
    	$general_setting =  $general_setting->orderBy('id', 'DESC')->limit(1);
        $general_setting =  $general_setting->get()->toArray();

        return $general_setting[0];
        
    }
}
