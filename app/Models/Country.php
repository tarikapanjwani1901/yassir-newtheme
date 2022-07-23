<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Authenticatable
{
    use Eloquence;


    protected $table = 'countries';
    protected $guarded  = ['id'];
    protected $searchableColumns = ['name'];

    public static function getAllCountries(){

        $query = Country::query();
        $query = $query->select('*');
        $response = $query->get();

        return $response;
    }
     
}