<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(){
        $filters = Product::select('name', 'type')->distinct('type')->get();
        $sizes = Product::select('size')->distinct()->get();
        $colors = Product::select('color')->distinct()->get();
        $products = DB::table('products')->get();
        //dd($products);
        return view('products.products', compact('products', 'filters', 'sizes', 'colors'));
    }

    public function productdetails($id){
        $products = DB::table('products')
                        ->where('products.id', $id)
                        ->get();
        //dd($products);
        return view('products.productdetails', compact('products'));
    }

    public function filterproducts(Request $request){
        //dd($request->get('filter'));
        if($request->get('filter') != "all"){
            $products = DB::table('products')
                        ->orWhere('type', $request->get('type'))
                        ->orWhere('size', $request->get('size'))
                        ->orWhere('type', $request->get('color'))
                        ->whereBetween('selling_price', [$request->get('startprice'), $request->get('endprice')])
                        ->get();
        } else {
            $products = DB::table('products')->get();
        }
        $filters = Product::select('name', 'type')->distinct('type')->get();
        $sizes = Product::select('size')->distinct()->get();
        $colors = Product::select('color')->distinct()->get();
        return view('products.products', compact('products', 'filters', 'sizes', 'colors'));
    }

    public function sorthightolow(){
        $products = DB::table('products')->orderBy('selling_price', 'desc')->get();
        $filters = Product::select('name', 'type')->distinct('type')->get();
        $sizes = Product::select('size')->distinct()->get();
        $colors = Product::select('color')->distinct()->get();
        return view('products.products', compact('products', 'filters', 'sizes', 'colors'));
    }

    public function sortlowtohigh(){
        $products = DB::table('products')->orderBy('selling_price', 'asc')->get();
        $filters = Product::select('name', 'type')->distinct('type')->get();
        $sizes = Product::select('size')->distinct()->get();
        $colors = Product::select('color')->distinct()->get();
        return view('products.products', compact('products', 'filters', 'sizes', 'colors'));
    }

    public function addtobag($id){
        $products = DB::table('products')
                        ->where('products.id', $id)
                        ->get();
        
        Storage::disk('public')->append('bag.json', json_encode($products));
        $exists = Storage::disk('public')->exists('bag.json');
        if($exists){
            $path = storage_path() . "/app/public/bag.json";
            $products = json_decode(("[" . preg_replace("/\n+/",",",file_get_contents($path)) . "]"), true); 
        }
        //dd($products);
        return view('products.cart', compact('products'));
    }
}
