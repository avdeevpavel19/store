<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\CategoryPropertyValue;
use App\Models\Product;
use App\Models\ProductCategoryPropertyValue;

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

    public function edit($id) {
        $product = Product::with('category')->find($id);

        return view('admin.product.edit', compact('product'));
    }

    public function editRequest(ProductRequest $request, $id) {
        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->file('image')->store('products');
        $product->category_id = $request->input('categoryId');
        $product->brand_id = $request->input('brand');
        $product->color_id = $request->input('color');

        $product_property_value = ProductCategoryPropertyValue::where('product_id', $id)->first();

        $properties = CategoryPropertyValue::query()
            ->whereIn('id', $request->post('properties'))
            ->get();

        foreach($properties as $property) {
            $product_property = ProductCategoryPropertyValue::find($product_property_value->id);
            $product_property->product_id = $product->id;
            $product_property->property_value_id = $property->id;
        }

        if ($product->save() && $product_property->save()) {
            return redirect()->route('admin.products.index', $request->input('categoryId'));
        }
    }

    public function delete($id) {
        $product = Product::with('category')->find($id);

        $isDeleted = Product::where('id', $id)->delete();

        if ($isDeleted) {
            return redirect()->route('admin.products.index', $product->category->id);
        }
    }
}
