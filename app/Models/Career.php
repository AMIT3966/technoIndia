<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    function Jobs(){
        return $this->belongsTo('App\Models\Job', 'job_id', 'id');
    }
}
