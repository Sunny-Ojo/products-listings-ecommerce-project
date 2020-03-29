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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'ShopController@index')->name('about');
Route::get('/services', 'ShopController@index')->name('services');
Route::get('/contact', 'ShopController@index')->name('contact');
Route::get('/allproducts', 'ShopController@show')->name('products.index');
Route::get('/carts', 'ShopController@cart')->name('cart');
Route::get('/myproducts', 'ShopController@viewUserProducts')->name('viewmyproducts');