<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $products = Product::take(12)->get();
      $categories = Category::all();

      return view('home', compact('products', 'categories'));
    }

    public function showAll()
    {
      $products = Product::All();

      return view('/allproducts', compact('products'));
    }
}
