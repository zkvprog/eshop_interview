<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
       $products = Product::latest()->simplePaginate(6);

       return view('catalog', compact('products'));
    }
}
