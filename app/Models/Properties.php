<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Properties extends Model
{
    protected $table = 'properties';

    public static function getAllProperties()
    {
        $properties = DB::table('properties')
		 ->leftJoin('users', 'properties.property_vendor', '=', 'users.id')
		 ->leftJoin('cities', 'properties.city', '=', 'cities.id')
		 ->leftJoin('sub_cities', 'properties.sub_city', '=', 'sub_cities.id')
		 ->leftJoin('areas', 'properties.area', '=', 'areas.id')
		  ->select('properties.*', 'users.company_name as company_name','cities.name as city_name','sub_cities.name as sub_city_name','areas.name as area_name')
      
        ->orderBy('id', 'DESC')
        ->paginate(1);

        return $properties;
        
    }
}
