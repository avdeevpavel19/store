<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
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
        $product = Product::where('id', $id)->first();

        if($product) {
            return view('catalog.show', compact('product'));
        }
    }

    public function categoryProduct($id) {
        $categoryProduct = Product::where('category_id', $id)->get();
        return view('catalog.category-product', compact('categoryProduct'));
    }

    public function searchProduct(Request $request) {
        $products = Product::where('title', 'LIKE', "%{$request->search}%")->get();
        return view('welcome', compact('products'));
    }

    public function addReview($id) {
        $product = Product::find($id);
        return view('catalog.review-form', compact('product'));
    }

    public function addReviewRequest(Request $request, $id) {
        $review = Review::create([
            'user_id' => auth()->user()->id,
            'product_id' => Product::find($id)->id,
            'like' => $request->input('like'),
            'dislike' => $request->input('dislike'),
            'other_impressions' => $request->input('other_impressions')
        ]);

        if ($review) {
            return redirect()->route('catalog.show', $id);
        }
    }
}
