<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Auth;

class ProductController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if($user){
        $filters = Product::select('name', 'type')->distinct('type')->get();
        $sizes = Product::select('size')->distinct()->get();
        $colors = Product::select('color')->distinct()->get();
        $products = DB::table('products')->get();
        //dd($products);
            return view('products.products', compact('products', 'filters', 'sizes', 'colors'));
        } else {
            return view('home');
        }
    }

    public function filterproducts(Request $request){
        //dd($request->get('filter'));
        if($request->get('filter') != "all"){
            $products = DB::table('products')
                        ->orWhere('type', $request->get('type'))
                        ->orWhere('size', $request->get('size'))
                        ->orWhere('type', $request->get('color'))
                        ->orWhereBetween('selling_price', [$request->get('startprice'), $request->get('endprice')])
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

    public function productdetails($id){
        $products = DB::table('products')
                        ->where('products.id', $id)
                        ->get();
        //dd($products);
        return view('products.productdetails', compact('products'));
    }

    public function addtobag($id){
        $products = DB::table('products')
                        ->where('products.id', $id)
                        ->get();
        
        
        $exists = Storage::disk('public')->exists('bag.json');
        
        if($exists){
            Storage::disk('public')->append('bag.json', json_encode($products));
        } else {
            Storage::disk('public')->put('bag.json', json_encode($products));
        }
        $path = storage_path() . "/app/public/bag.json";
        $products = json_decode(("[" . preg_replace("/\n+/",",",file_get_contents($path)) . "]"), true); 
        //dd($products);
        return view('products.cart', compact('products'));
    }

    public function order(){
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $orderNo = $characters[rand(0, strlen($characters) - 1)].mt_rand(100, 999)
            . mt_rand(10000, 99999);
        
        return view('products.order', ["orderNo"=>$orderNo]);
    }
}
