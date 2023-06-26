<?php

namespace App\Http\Controllers;

use App\Contracts\CartContract;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request, CartContract $cart)
    {
        $cart->destroy();

        return redirect('/');
    }
}
