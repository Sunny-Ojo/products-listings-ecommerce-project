<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('products.index')->with(['cat' => $cat, 'products' => $products]);

    }
}