<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserproductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('products.index')->with(['cat' => $cat, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('products.create')->with(['cat' => $cat, 'products' => $products]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:30',
            'prize' => 'required',
            'productInformation' => 'required|min:10|max:300',
            'rating' => 'required|integer',
            'image' => 'required|image',
            'category' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->getClientOriginalName();
            $imageext = $request->file('image')->getClientOriginalExtension();
            $imageonlyname = pathinfo($imagename, PATHINFO_FILENAME);
            $imagetodb = $imageonlyname . '_' . time() . '.' . $imageext;
            $path = $request->file('image')->storeAs('/public/images/', $imagetodb);
        }
        $product = new Shop();
        $product->name = $request->name;
        $product->prize = $request->prize;
        $product->about = $request->productInformation;
        $product->rating = $request->rating;
        $product->image = $imagetodb;
        $product->user_id = auth()->user()->id;
        $category = DB::select('select * from categories where name = ?', [$request->category]);
        if ($category == true) {
            $product->category = $request->category;

        } else {
            $cat = new Category();
            $cat->name = $request->category;
            $cat->save();
        }
        $product->category = $request->category;

        $product->save();
        return redirect('/userproducts')->with('success', 'Product was successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Shop::find($id);

        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('products.show')->with(['product' => $product, 'cat' => $cat, 'products' => $products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Shop::find($id);
        $cat = Category::all();
        $products = Shop::orderBy('created_at', 'desc')->paginate(9);
        return view('products.edit')->with(['product' => $product, 'cat' => $cat, 'products' => $products]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:30|bail',
            'prize' => 'required',
            'productInformation' => 'required|min:10|max:300',
            'rating' => 'required|integer',
            // 'image' => 'required|image',
             'category' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->getClientOriginalName();
            $imageext = $request->file('image')->getClientOriginalExtension();
            $imageonlyname = pathinfo($imagename, PATHINFO_FILENAME);
            $imagetodb = $imageonlyname . '_' . time() . '.' . $imageext;
            $path = $request->file('image')->storeAs('/public/images/', $imagetodb);
        }
        $product = Shop::find($id);
        $product->name = $request->name;
        $product->prize = $request->prize;
        $product->about = $request->productInformation;
        $product->rating = $request->rating;
        if ($request->hasFile('image')) {
            $product->image = $imagetodb;
        }
        $product->user_id = auth()->user()->id;
        $category = DB::select('select * from categories where name = ?', [$request->category]);
        if ($category == true) {
            $product->category = $request->category;

        } else {
            $cat = new Category();
            $cat->name = $request->category;
            $cat->save();
        }
        $product->category = $request->category;

        $product->save();
        return redirect('/userproducts')->with('success', 'Product was successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //
        $product = Shop::find($id);
        Storage::delete(['/storage/images', $product->image]);
        $product->delete();
        return redirect('/products')->with('success', 'Item has been deleted successfully ');

    }
}