<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PropertiesImages extends Model
{
    protected $table = 'property_images';

    public static function getPropertyImageById($property_id)
	{
		$query = PropertiesImages::query();
        $query = $query->where('property_images.property_id',"=",$property_id);
        $response = $query->first();
        
        return $response;
	}
}
