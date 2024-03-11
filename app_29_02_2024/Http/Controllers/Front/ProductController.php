<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Lead;

class ProductController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $data = Product::where('slug', $slug)->where('status', '!=', 2)->first();

        if (!empty($data)) {
            return view('front.product.detail', compact('data'));
        } else {
            return view('front.error.404');
        }
    }

    public function enquiry(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'number' => 'required|integer|digits:10',
            'email' => 'required|email|min:1|max:255',
            'page' => 'required|string|min:1|max:255'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validate->errors(),
            ]);
        }

        $lead = new Lead();
        $lead->page = $request->page ?? '';
        $lead->company_name = '';
        $lead->full_name = $request->name;
        $lead->mobile_no = $request->number;
        $lead->email = $request->email;
        $lead->save();

        return response()->json([
            'status' => 200,
            'message' => 'Lead generated successfully',
        ]);
    }

}
