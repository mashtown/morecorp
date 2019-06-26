<?php
use App\Product;
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

Route::get('/', function () {
	$products = Product::all();
    return view('welcome', ['products' => $products]);
});

Route::get('/product/{id}/{slug}', 'StoreController@singleProduct');
Route::post('/post-bidding', 'StoreController@postBidding');

Auth::routes();

Route::prefix('dashboard')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    // PRODUCTS ROUTES
    Route::get('/products', 'ProductsController@index');
    Route::get('/products/create', 'ProductsController@create');
    Route::post('/products/create', 'ProductsController@postCreate');
    Route::get('/products/edit/{id}', 'ProductsController@edit');
    Route::post('/products/update', 'ProductsController@postEdit');
    Route::get('/products/delete/{id}', 'ProductsController@delete');

});