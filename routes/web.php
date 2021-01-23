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

use App\Http\Controllers\ShoppingController;

Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/product/{id}', [
    'uses' => 'FrontendController@singleproduct',
    'as' => 'product.single'
]); 

Route::get('/shop', [
    'uses' => 'FrontendController@shop',
    'as' => 'shop'
]);

Route::get('/about', [
    'uses' => 'FrontendController@about',
    'as' => 'about'
]);

Route::get('/contact', [
    'uses' => 'FrontendController@contact',
    'as' => 'contact'
]);

Route::get('/category/{$id}', [
    'uses' => 'FrontendController@category',
    'as' => 'category.single'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController')->middleware('auth');

Route::resource('products', 'ProductsController')->middleware('auth');

Route::get('/category/{id}','FrontendController@SingleCatgory');

// Route::post('/cart/add', [
//     'uses' => 'ShoppingController@add_to_cart',
//     'as' => 'cart.add'
// ]);


Route::post('/cart/add',[ShoppingController::class, 'add_to_cart'])->name('cart.add');

Route::get('/cart',[

    'uses' => 'ShoppingController@cart',
    'as' => 'cart'

]);

Route::get('/cart/delete/{$id}', [
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/checkout', [

    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'

]);

Route::post('/cart/checkout', [

    'uses' => 'CheckoutController@pay',
    'as' => 'cart.check'

]);
