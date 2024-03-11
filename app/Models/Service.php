<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function categoryDetails()
    {
        return $this->belongsTo('App\Models\ServiceCategory', 'category_id', 'id');
    }

    public function subCategoryDetails()
    {
        return $this->belongsTo('App\Models\ServiceSubCategory', 'subcategory_id', 'id')->where('subcategory_id', '!=', null);
    }
}
