<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Banner;
use App\Models\NationProduct;
use App\Models\Partner;
use App\Models\News;
use App\Models\ContentHome;
use App\Models\Certificate;
use App\Models\CaseStudy;
use App\Models\Service;
use App\Models\SeoPage;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return Redirect::route('front.career.index');
        $data = (object)[];
        $data->banners = Banner::where('status', 1)->orderBy('position')->get();
        $data->NationProduct = NationProduct::where('status', 1)->latest('id')->limit(7)->get();
        $data->News = News::where('status', 1)->latest('id')->limit(5)->get();
        $data->Partner = Partner::latest('id')->limit(16)->get();
        $data->Certificate = Certificate::latest('id')->limit(8)->get();
        $data->ContentHome = ContentHome::first();
        $seo = SeoPage::where('page', 'home')->first();
        // return view('front.index', compact('data', 'seo'));
        return view('admin.auth.login');
    }
    public function test(Request $request){
        return 'test';
    }

    
}
