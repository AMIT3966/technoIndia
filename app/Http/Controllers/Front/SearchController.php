<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SearchResult;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'keyword' => 'required|min:2'
        ]);

        $ip = $_SERVER['REMOTE_ADDR'];

        // store in search result
        $searchStore = new SearchResult();
        $searchStore->ip = $ip;
        $searchStore->keyword = $request->keyword;
        $searchStore->save();

        // get results for this ip
        $searches = SearchResult::where('ip', $ip)->latest('id')->limit(4)->get();

        // popular search
        $popularSearches = DB::select("SELECT keyword, count(keyword) as count FROM `search_results`
        GROUP BY keyword  
        ORDER BY `count` DESC
        LIMIT 4"); 

        // searched products
        $products = Product::select('id', 'title', 'slug')
        ->where('products.title', 'like', '%'.$request->keyword.'%')
        ->where('products.status', 1)
        ->limit(6)->get()->toArray();

        $producResp = [];
        if (count($products) > 0) {
            foreach ($products as $key => $product) {
                $img = ProductImage::select('img_small')
                ->where('product_id', $product['id'])
                ->where('status', 1)
                ->orderBy('position')
                ->orderBy('created_at', 'desc')
                ->first();

                $producResp[] = [
                    'title' => $product['title'],
                    'slug' => $product['slug'],
                    'img' => $img ? asset($img->img_small) : '',
                ];
            }
        }

        $resp = [
            'recentSearches' => $searches,
            'popularSearches' => $popularSearches,
            'products' => $producResp,
        ];

        return response()->json([
            'status' => 200,
            'message' => 'Result found',
            'data' => $resp,
        ]);
    }
}
