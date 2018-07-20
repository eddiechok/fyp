<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name','asc')->get();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();

        return view('products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('img_default')) {
            $path = Storage::putFile('public/products', $request->file('img_default'));
            $product->img_default = str_replace('public/', '', $path);
            // $request->file('img_default')->move(public_path('/storage/products'), $product->code.'.jpg');
            // $product->img_default = 'products/'.$product->code.'.jpg';
        }
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(!$product) throw new ModelNotFoundException;

        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if(!$product) throw new ModelNotFoundException;
        return view('products.edit', ['product' => $product]);
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
        $product = Product::find($id);
        if(!$product) throw new ModelNotFoundException;
        $product->fill($request->all());
        if($request->hasFile('img_default')) {
            // if(file_exists($product->img_default)) {
            //     Storage::delete($product->img_default);
            // }
            $path = Storage::putFile('public/products', $request->file('img_default'));
            $product->img_default = str_replace('public/', '', $path);
            // $request->file('img_default')->move(public_path('/storage/products'), $product->code.'.jpg');
            // $product->img_default = 'products/'.$product->code.'.jpg';
        }
        $product->save();

        return redirect()->route('product.index');
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
    }
}
