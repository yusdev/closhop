<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Size;
use App\Color;
use App\Product;
use App\Stock;

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
        return view('myproducts', ['user'=>$user,'products' => $products]);
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

        /*imagenes adicionales*/
        $images = $request->file('aditionalimage');
        if(count($images)>0){
          for($i = 0; $i < count($images); $i++) {
            $ext = $images[$i]->getClientOriginalExtension();
            $name = \Auth::user()->id . uniqid();
            $path = $images[$i]->storeAs('products', $name.'.'.$ext, 'public');
            if($i){
              $product->aditionalimage1= $path;
            }else{
              $product->aditionalimage2= $path;
            }
            $product->save();
          }
        }
        /*fin imagenes adicionales*/

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
        session()->flash('saved');
        return redirect('/vendor/products/'.$productId.'/edit')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $sizes = $product->sizes;
        $colors = $product->colors;
        $stocks = DB::table('color_product_size')->where('product_id', $product->id)->get();
        return view('editproduct', ['product'=>$product, 'sizes'=>$sizes, 'colors'=>$colors, 'stocks'=>$stocks]);
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
      $product = Product::findOrFail($id);
      $updateProduct = [
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'originalprice' => $request->input('originalprice'),
        'saleprice' => $request->input('saleprice')
      ];
      $product->update($updateProduct);

      $variants = $request->input('variants');
      $allstocks = DB::table('color_product_size')->where('product_id', $id)->get();

      foreach ($allstocks as $stock) {
          $s = Stock::find($stock->id);
          if(in_array($stock->id ,$variants)){
            $s->stock = true;
          } else {
            $s->stock = false;
          }
          $s->save();
        }

      $request->flash();
      session()->flash('saved');
      return redirect('/vendor/products/'.$product->id.'/edit')->withInput();
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
