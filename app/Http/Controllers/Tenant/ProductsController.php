<?php

namespace App\Http\Controllers\Tenant;

use App\Tenant\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        \Session::remove('shopping_cart_id');
        $products = Product::paginate(10);
        if ($request->wantsJson()) {
            return new ProductsCollection($products);
        } else {
            # code...
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $options = [
            'title' => $request->title,
            'description' => $request->description,
            'price' =>$request->price
        ];

        if (Product::create($options)) {
            return redirect('/');
        } else {
            return view();
        }
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenant\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
       
        if ( $product->save()) {
            return redirect('/');
        } else {
            return view();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        //o tambien
      //  Product::destroy($id);
    }
}
