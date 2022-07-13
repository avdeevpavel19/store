<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{
    public function index()
    {
        $categories = Category::with('brands')->get();
        return view('admin.options.brand.index', compact('categories'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.options.brand.add', compact('categories'));
    }

    public function addRequest(BrandRequest $request)
    {
        try {
            Brand::create([
                'category_id' => $request->input('category'),
                'name' => $request->input('name')
            ]);

            return redirect()->route('admin.brands.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.options.brand.edit', compact('brand'));
    }

    public function editRequest(BrandRequest $request, $id)
    {
        try {
            $brand = Brand::find($id);
            $brand->name = $request->input('name');

            if ($brand->save()) {
                return redirect()->route('admin.brands.index');
            }
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function delete($id)
    {
        try {
            Brand::where('id', $id)->delete();
            return redirect()->route('admin.brands.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }
}
