<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Size;
use App\Color;
use App\Product;
use App\Stock;

class FrontProductController extends Controller
{
    public function index(){
      $products = Product::all()->where('on',true);
      return view('home', ['products'=>$products]);
    }

    public function show($id){
        $product = Product::find($id);
        $sizes = $product->sizes()->groupBy('size_id')->get();
        $colors = $product->colors()->groupBy('color_id')->get();
        $stock = DB::table('color_product_size')->where('product_id', $product->id)->get();
        return view('theproduct',['product'=>$product, 'sizes'=>$sizes, 'colors'=>$colors, 'stock'=>$stock]);
    }
}
