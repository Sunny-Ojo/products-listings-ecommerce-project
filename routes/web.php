<?php

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

Route::get('/', 'ProductsController@index');
Route::get('/categories/{name}', 'CategoryController@index');

Auth::routes();
Route::resource('products', 'ProductsController');
Route::resource('wishlists', 'WishlistController');
Route::resource('userproducts', 'UserproductsController');
Route::resource('contact', 'ContactController');
Route::resource('carts', 'CartController');
Route::get('/home', function () {
    return redirect('/products');
});
Route::get('/about', 'ShopController@about')->name('about');
Route::get('/viewcart', 'CartController@index')->name('viewcart');
Route::get('/items/{product}', 'CartController@store')->name('buyproduct')->middleware('auth');
Route::get('/wishlist', 'WishlistController@index')->name('viewwishlist');
Route::get('/addtowishlist/{product}', 'WishlistController@store')->name('addtowishlist');
Route::get('/myproducts', 'ShopController@viewUserProducts')->name('viewmyproducts');