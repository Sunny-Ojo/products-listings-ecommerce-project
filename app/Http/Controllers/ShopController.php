<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Shop;
use App\Wishlist;

class ShopController extends Controller
{
    //
    public function viewUserProducts()
    {
        $auth = auth()->user()->id;
        $userproducts = Shop::where('user_id', $auth)->paginate(6);
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->paginate(6);
        $cart = Cart::where('user_id', auth()->user()->id)->paginate(9);
        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('user.allproducts')->with(['userproducts' => $userproducts, 'wishlist' => $wishlist, 'cart' => $cart, 'cat' => $cat, 'products' => $products]);

    }
    public function about()
    {

        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('about')->with(['cat' => $cat, 'products' => $products]);

        # code...
    }
    public function contact()
    {

        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('contact')->with(['cat' => $cat, 'products' => $products]);

    }
}