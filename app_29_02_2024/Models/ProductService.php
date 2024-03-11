<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    use HasFactory;
    protected $table = 'product_services';
    function ProducuDetails(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

}
