<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = DB::table('products')->get();
        //dd($products);
        return view('products.products', compact('products'));
    }
}
