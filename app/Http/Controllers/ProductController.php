<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.products', compact('products'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.AddProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required',
            'path' => 'nullable|image',
            'category_id' => 'required|numeric',
        ]);

        $product = new Product([
                'name'=> $request->get('name'),
                'price'=> $request->get('price'),
                'category_id'=> $request->get('category_id'),
            ]);

        $name = $request->file('path')->getClientOriginalName();
        $path = $request->file('path')->store('public/images');
        $path = substr($path, 7);
        $product->image = $name;
        $product->path= $path;
        
        $product->save();

        return redirect()->back()->with('msg','Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.showProduct', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view( 'products.editProduct' , compact('product'));
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
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required',
            'path' => 'nullable',
            'category_id' => 'required|numeric',
        ]);

        if ($request->path != null) {
            $name = $request->file('path')->getClientOriginalName();
            $path = $request->file('path')->store('public/images');
            $path = substr($path, 7);
            $product->image = $name;
            $product->path= $path;
        }

        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category_id');


        $product->save();

        return redirect()->back()->with('msg','Product saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findorfail($id)->delete();
        return  redirect()->route('products.index')->with('msg','Product deleted successfully');
    }
}
