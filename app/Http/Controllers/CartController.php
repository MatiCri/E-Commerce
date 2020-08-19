<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Product;
use App\Category;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
      $product = Product::find($id);

      $cart= Cart::where('user_id','=', Auth::user()->id )->where('status','=', 0)->where('product_id', '=', $product->id)->first();


      if (empty($cart)) {
        $user = Auth::user()->id;

        $cart = new Cart;

        $cart->name = $product->name;
        $cart->description = $product->description;
        $cart->price = $product->price;
        $cart->featured_img = $product->featured_img;
        $cart->product_id = $product->id;
        $cart->cant = 1;
        $cart->user_id = $user;

        $cart->save();

        return redirect('/');
      }else{
        $cart->cant = $cart->cant + 1;

        $cart->save();


        return redirect('/', compact('total'));
      }





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
      $cart = Cart::where('user_id','=', Auth::user()->id )->where('status','=', 0)->get();

      $total=0;
      foreach ($cart as $item) {
        $total=$total + ($item->cant * $item->price);
      }

      return view('cart', compact('cart', 'total'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::find($id);

        $cart->delete();

        return redirect('/cart');
    }

    public function cartClose(Request $request)
    {

    $openCart= Cart::where('user_id','=', Auth::user()->id )->where('status','=', 0)->get()->all();

    $cartNumber=Cart::select('cart_number')->where('user_id','=', Auth::user()->id )->where('status','=', 1)->get()->max();


    foreach ($openCart as $item) {
      $number=$item->id;
      if ($cartNumber !== null) {
        $item->cart_number = $cartNumber->cart_number + 1;
      }
        else {
          $item->cart_number = 1;
        }
      $item->status = 1;
      $item->cant = $request->$number;
      $item->save();
    }

    $cartNumberLast=Cart::select('cart_number')->where('user_id','=', Auth::user()->id )->where('status','=', 1)->get()->max();


    $closeCart=Cart::where('user_id','=', Auth::user()->id )->where('status','=', 1)
    ->where('cart_number', '=', $cartNumberLast->cart_number)->get()->all();

    // dd($closeCart);

    $total=0;
    foreach ($closeCart as $item) {
      $total=$total + ($item->cant * $item->price);
    }


    return view('/deliverdetails', compact('closeCart', 'total'));


  }
  public function thanks()
  {
    $cartNumberLast=Cart::select('cart_number')->where('user_id','=', Auth::user()->id )->where('status','=', 1)->get()->max();

    $closeCart=Cart::where('user_id','=', Auth::user()->id )->where('status','=', 1)
    ->where('cart_number', '=', $cartNumberLast->cart_number)->get()->all();

    $total=0;
    foreach ($closeCart as $item) {
      $total=$total + ($item->cant * $item->price);
    }



    return view('/thanks', compact('closeCart', 'total'));

  }
}
