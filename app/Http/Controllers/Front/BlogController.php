<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CaseStudy;
use App\Models\SeoPage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $seo = SeoPage::where('page', 'blog')->first();
        $data = CaseStudy::where('status', 1)->latest('id')->get();
        return view('front.blog.index', compact('data', 'seo'));
    }

    public function detail(Request $request, $slug)
    {
        $data = CaseStudy::where('slug', $slug)->where('status', 1)->first();

        if (!empty($data)) {
            return view('front.blog.detail', compact('data'));
        } else {
            return view('front.error.404');
        }
    }

}
