<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Resources\ProductsCollection;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function __construct(){
        $this->middleware('shopping_cart');
    }

    public function show(Request $request) {
      return $request->shopping_cart->products()->get();
    }

    public function products(Request $request) {
        return new ProductsCollection($request->shopping_cart->products()->get());
      }
}
