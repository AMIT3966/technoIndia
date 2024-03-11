<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    function category()
    {
        return $this->belongsTo('App\Models\NewsCategory', 'news_category_id', 'id');
    }
}
