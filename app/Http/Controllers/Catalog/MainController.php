<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Review;
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
        $product = Product::where('id', $id)->firstOrFail();

        $reviews = Review::with('user')
            ->where('product_id', Product::findOrFail($id)->id)
            ->get();

        if ($product) {
            return view('catalog.show', compact('product', 'reviews'));
        }
    }

    public function categoryProduct($id)
    {
        $categoryProduct = Product::where('category_id', $id)->get();
        return view('catalog.category-product', compact('categoryProduct'));
    }

    public function searchProduct(Request $request)
    {
        $products = Product::where('title', 'LIKE', "%{$request->search}%")->get();
        return view('welcome', compact('products'));
    }

    public function addReview($id)
    {
        $product = Product::findOrFail($id);
        return view('catalog.review-form', compact('product'));
    }

    public function addReviewRequest(Request $request, $id)
    {
        try {
            Review::create([
                'user_id' => auth()->user()->id,
                'product_id' => Product::find($id)->id,
                'like' => $request->input('like'),
                'dislike' => $request->input('dislike'),
                'other_impressions' => $request->input('other_impressions')
            ]);

            return redirect()->route('catalog.show', $id);
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function addProductRequest(Request $request)
    {
        try {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->input('product_id')
            ]);

            return redirect()->route('catalog.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }
}
