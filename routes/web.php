<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@index');
Route::get('/products/create', 'ProductController@create');
Route::post('/products', 'ProductController@store');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/products/delete/{product}', 'ProductController@destroy');
Route::get('/products/edit/{product}', 'ProductController@edit');
Route::patch('/products/{product}', 'ProductController@update');


Route::get('/cart', 'CartController@index');
Route::post('/product/cart/{cart}', 'ProductController@inputCart');
Route::get('/cart/{cart}', 'CartController@destroy');
Route::get('/cart/{product}', 'ProductController@destroy');



Route::get('/admin','AdminController@index');
Route::get('/checkout','CheckoutController@index');

// Route::get('admin-page', function() {
//     return 'Halaman untuk Admin';
// })->middleware('role:admin')->name('product.index');

// Route::get('user-page', function() {
//     return 'Halaman untuk User';
// })->middleware('role:user')->name('product.index');