<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTagAssing extends Model
{
    protected $table = "blog_tag_assing";

    public function tag_name() {
        return $this->hasOne(BlogTag::class,'id','tag_id');
    }

    
}