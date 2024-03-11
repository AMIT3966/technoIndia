<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class CategoryController extends Controller
{
    public function level1detail(Request $request, $slug)
    {
        $data = Category::where('slug', $slug)->where('parent_id', 0)->where('status', 1)->first();

        if (!empty($data)) {
            return view('front.category.level1', compact('data'));
        } else {
            return view('front.error.404');
        }
    }

    public function level2detail(Request $request, $level1slug, $level2slug)
    {
        $data = Category::where('slug', $level2slug)->where('status', 1)->first();

        if (!empty($data)) {
            // check if this category is level 2
            if ($data->categoryDetails) {
                if ($data->categoryDetails->parent_id == 0) {
                    return view('front.category.level2', compact('data'));
                }
            }
        }

        return view('front.error.404');
    }

    public function level3detail(Request $request, $level1slug, $level2slug, $level3slug)
    {
        $data = Category::where('slug', $level3slug)->where('status', 1)->first();

        // dd($data);

        if (!empty($data)) {
            // check if this category is level 3
            if ($data->categoryDetails) {
                if ($data->categoryDetails->categoryDetails) {
                    if ($data->categoryDetails->categoryDetails->parent_id == 0) {
                        return view('front.category.level3', compact('data'));
                    }
                }
            }
        }

        return view('front.error.404');
    }
}
