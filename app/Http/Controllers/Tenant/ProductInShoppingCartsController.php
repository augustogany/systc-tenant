<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\ProductInShoppingCart;
use App\Http\Controllers\Controller;

class ProductInShoppingCartsController extends Controller
{
    public function __construct () {
        return $this->middleware('shopping_cart');
    }
    public function store(Request $request){
        $in_shopping_cart = ProductInShoppingCart::create([
            'shopping_cart_id' => $request->shopping_cart->id,
            'product_id' => $request->product_id
        ]);
       if ($in_shopping_cart) {
           return redirect()->back();
       } else {
         return redirect()->back()
                                  ->withErrors([
                                          'product'=> 'no se pudo agregar el producto'
                                    ]);
       }
       
    }
    public function destroy($id){}
}
