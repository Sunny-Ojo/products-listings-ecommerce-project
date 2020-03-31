<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;
use DB;

class CategoryController extends Controller
{
    //
    public function index($name)
    {

        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(10);
        $cats = DB::select('select * from shops where category = ?', [$name]);
        if ($cat == true) {
            return view('categories.index')->with(['cats' => $cats, 'cat' => $cat, 'products' => $products]);
        }
    }
}