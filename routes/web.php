<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/product/{id}', 'ProductController@show');
Route::get('/addproduct', function(){
  return view('addproduct');
});
Route::post('/addproduct', 'ProductController@store');
Route::get('/editproduct/{id}', 'ProductController@edit');
Route::post('/editproduct/{id}', 'ProductController@update');
Route::get('/bestproducts', 'ProductController@bestproducts');
Route::get('/usertransactions', 'ProductController@usertransactions')->middleware('auth');

Route::get('/categories/{id}', 'CategoryController@show');


Route::get('/cart', 'CartController@show')->middleware('auth');
Route::get('/addtocart/{id}', 'CartController@store')->middleware('auth');
Route::get('/deletecart/{id}', 'CartController@destroy')->middleware('auth');
Route::post('/closecart', 'CartController@cartClose');

Auth::routes();
Route::get('/contactus', function(){
  return view('contactus');
});

Route::get('/compras', function(){
  return view('compras');
});

Route::post('/thanks', 'CartController@thanks');

Route::get('/allproducts', 'HomeController@showAll');
Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index');


Route::get('/users', 'UserController@index' );
Route::get('/users/{id}', 'UserController@show');

Route::get('/products', "ProductController@directory"); // Le digo que vaya a buscar a ProductController directory
Route::get('/products/search', "ProductController@search"); // Le digo que vaya a buscar a ProductController directory


// Solo para correr la primera vez en el hosting. Luego comentar.
//Route::get('/install', function(){
//   Artisan::call('migrate');
//   Artisan::call('db:seed');
//   Artisan::call('storage:link');
// });
