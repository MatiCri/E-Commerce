<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Cart;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      $categories = Category::all();
      return view('welcome', compact('products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules=[
        "productname" => "string|min:3|required",
        "productprice" => "numeric|min:0|max:100000|required",
        "productstock" => "numeric|min:0|max:100|required",
        "productimg" => "file|filled",
        "productcategory"=>"required",
      ];

      $message=[
        "string"=>"El :attribute no puede contener numeros",
        "required"=>"El :attribute debe completarse",
        "string"=> "El :attribute no corresponde",
        "numeric"=>"El :attribute debe ser de tipo numerico",
        "min" => "El :attribute debe tener ser como minimo :min",
        "max"=>"El :attribute debe tener ser como maximo :max",
        "file"=>"El :attribute no corresponde",
        "filled"=>"No se eligio ninguna foto",
      ];

      $this->validate($request, $rules, $message);


      $path = $request->file('productimg')->store('public/products');
      $file = basename($path);


      $product = new Product;
      $product->name = $request->productname;
      $product->description = $request->productdescription;
      $product->price = $request->productprice;
      $product->stock = $request->productstock;
      $product->featured_img = $file;
      $product->categorie_id = $request->productcategory;

      $product->save();

      return redirect('/addproduct');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);
      return view('product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      return view('editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $rules=[
        "editproductname" => "min:3",
        "editproductprice" => "numeric|min:0|max:10000",
        "editproductstock" => "numeric|min:0|max:100",
        "editproductimg" => "file|filled",
        "editproductcategory"=>"required",
      ];

      $message=[
        "alpha"=>"El :attribute no corresponde",
        "required"=>"El :attribute debe completarse",
        "string"=> "El :attribute no corresponde",
        "numeric"=>"El :attribute debe ser de tipo numerico",
        "min" => "El :attribute debe tener ser como minimo :min",
        "max"=>"El :attribute debe tener ser como maximo :max",
        "file"=>"El :attribute no corresponde",
        "filled"=>"No se eligio ninguna foto",
      ];

      $this->validate($request, $rules, $message);

      $product = Product::find($id);

      $product->name = $request->editproductname;
      $product->price = $request->editproductprice;
      $product->stock = $request->editproductstock;
      $product->categorie_id = $request->editproductcategory;
      $product->description = $request->editproductdescription;


      if ($request->file('editproductimg')){
      $path = $request->file('editproductimg')->store('public/products');
      $file = basename($path);
      $product->featured_img = $file;
      }

      $product->save();

        return redirect('/allproducts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function bestproducts()
    {

      $products=Cart::where('status', '=', '1')->groupBy('product_id')
      ->selectRaw('*, SUM(cant) as cantidad, price*SUM(cant) as ingreso')->orderByRaw('cantidad DESC')->get();

      $totIngresado=0;

      foreach ($products as $product) {
        $win= $product->ingreso;
        $totIngresado=$totIngresado + $win;
      }



      return view('/bestproducts', compact('products', 'totIngresado'));
    }
    public function usertransactions()
    {
      $carts=Cart::where('status', '=', '1')->where('user_id','=', Auth::user()->id)->get()->groupBy('cart_number');

      //
      //
      // foreach ($carts as $cart) {
      //   dump($cart[0]->cart_number);
      // foreach ($cart as $item) {
      //   dump($item->name);
      // }
      // }



      return view('/usertransactions', compact('carts'));

    }

public function search()
{

 $param = $_GET["search"]; //search es poruq el epuse search al form.
 // var_dump($param);
 // exit;
 $products = Product::where('name', 'like', "$param%" )->get(); //no olvidar get() para las colnsultas where;
// dd($products);

 return view('search')->with('products', $products);

}

}
