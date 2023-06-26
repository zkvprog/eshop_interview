<?php

namespace App\Http\Controllers;

use App\Contracts\CartContract;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request, CartContract $cart)
    {
        return view('cart', [
            'cartItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice()
        ]);
    }

    public function add(Request $request, CartContract $cart, Product $product)
    {
        $cart->add($product);

        return response()->json([
            'totalQuantity' =>  $cart->getTotalQuantity()
        ]);
    }
}
