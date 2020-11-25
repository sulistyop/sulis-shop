<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route::middleware('role:admin')->get('/dashboard', function(){
   
// })->name('dashboard');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/setting','SettingController@index');
});
Route::group(['middleware' => ['role:super-admin|admin']], function () {
    Route::resource('/products','ProductController');
    Route::get('/dashboard', 'CategoryController@index');
    Route::get('/category', 'CategoryController@index');
    Route::post('/category', 'CategoryController@store');
});

Route::resource('/cart','CartController');

Route::get('/products/{product}', 'ProductController@show');
Route::get('/dashboard', 'AdminController@index');

    // Route::get('/products', 'ProductController@index');
    // Route::get('/products/create', 'ProductController@create');
    // Route::get('/products/{product}', 'ProductController@show');
    // Route::post('/products', 'ProductController@store');
    // Route::delete('/products/{product}', 'ProductController@destroy');
    // Route::get('/products/{product}/edit', 'ProductController@edit');
    // Route::patch('/products/{product}', 'ProductController@update');


    // Route::get('/cart', 'CartController@index');
    // Route::post('/product/cart/{cart}', 'ProductController@inputCart');
    // Route::delete('/cart/{cart}', 'CartController@destroy');







Route::post('/checkout','CheckoutController@index');



// Route::get('admin-page', function() {
//     return 'Halaman untuk Admin';
// })->middleware('role:admin')->name('product.index');

// Route::get('user-page', function() {
//     return 'Halaman untuk User';
// })->middleware('role:user')->name('product.index');

