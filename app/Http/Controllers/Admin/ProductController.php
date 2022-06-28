<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\CategoryPropertyValue;
use App\Models\Product;
use App\Models\ProductCategoryPropertyValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id) {
        $category = Category::find($id);

        $products = Product::query()
            ->where('category_id', $id)
            ->get();

        return view('admin.product.index', compact('category', 'products'));
    }

    public function add($id) {
        $category = Category::with('brands', 'colors')->where('id' , $id)->first();

        return view('admin.product.add', compact('category'));
    }

    public function addRequest(ProductRequest $request) {
        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $request->file('image')->store('products'),
            'category_id' => $request->input('categoryId'),
            'brand_id' => $request->input('brand'),
            'color_id' => $request->input('color'),
        ]);

        $properties = CategoryPropertyValue::query()
            ->whereIn('id', $request->post('properties'))
            ->get();


        foreach ($properties as $property) {
            $product_property = ProductCategoryPropertyValue::create([
                'product_id' => $product->id,
                'property_value_id' => $property->id
            ]);
        }

        if ($product && $product_property) {
            return redirect()->route('admin.products.index', $request->input('categoryId'));
        }
    }
}
