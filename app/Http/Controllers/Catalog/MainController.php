<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function showProduct($id)
    {
        $product = Product::where('id', $id)->first();

        if($product) {
            return view('catalog.show', compact('product'));
        }
    }
}
