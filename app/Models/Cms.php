<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Cms extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;

    //use SoftDeletes;

    protected $table = "cms";

  
    public static  function getAllCms()
    {
        $cms = DB::table('cms')
                ->orderBy('id',"DESC")		
                ->paginate(10);	

        return $cms;

    }
}