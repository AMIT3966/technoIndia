<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Collection;
use App\Models\JobCategory;
use App\Models\order;

class CategoryRepository implements CategoryInterface
{
    // Collection
    public function listAll()
    {
        return Collection::latest()->where('deleted_at', 1)->get();
    }
    

    public function findById($id)
    {
        return Collection::findOrFail($id);
    }

    public function getSearchCollection(string $term)
    {
        return Collection::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    // Job Category
    public function getSearchJobCategory(string $term){
        return JobCategory::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }
    public function listAllJobCategory(){
        return JobCategory::latest()->where('deleted_at', 1)->get();
    }
}
