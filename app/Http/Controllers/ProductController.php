<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Size;
use App\Color;
use App\Product;
use App\Variant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //Lista de productos del usuario
    {
        $user = \Auth::user();
        $products = $user->products()->orderBy('id', 'desc')->get();
        return view('myproducts', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Mostrar formulario para crear un producto
    {
      return view('createnewproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Guardar un nuevo producto
    {
        $mainfile = $request->file('mainimage');
        $mainext = $mainfile->getClientOriginalExtension();
        $mainname = \Auth::user()->id . uniqid();
        $mainpath = $mainfile->storeAs('products', $mainname.'.'.$mainext, 'public');
        $uploadProduct = [
          'name' => $request->input('name'),
          'description' => $request->input('description'),
          'originalprice' => $request->input('originalprice'),
          'saleprice' => $request->input('saleprice'),
          'mainimage' => $mainpath
        ];
        $productCreated = \Auth::user()->products()->create($uploadProduct);
        $productId = $productCreated->id;
        $product = Product::find($productId);

        $sizes = $request->input('sizes');
        $colors = $request->input('colors');

        foreach ($sizes as $size) {
          Size::firstOrCreate(['size' => $size]);
          $size = Size::where('size','=',$size)->first();
          $sizeID = $size->id;
          foreach ($colors as $color) {
            Color::firstOrCreate(['color' => $color]);
            $color = Color::where('color','=',$color)->first();
            $colorID = $color->id;
            $product->sizes()->attach($sizeID,['color_id'=> $colorID, 'stock'=>true]);
          }
        }
        return redirect('/v/micuenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $sizes = $product->sizes()->groupBy('size_id')->get();
        $colors = $product->colors()->groupBy('color_id')->get();
        $stock = DB::table('color_product_size')->where('product_id', $product->id)->get();
        return view('theproduct',['product'=>$product, 'sizes'=>$sizes, 'colors'=>$colors, 'stock'=>$stock]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
