<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() {
        $categories = Category::with('brands')->get();
        return view('admin.options.brand.index', compact('categories'));
    }

    public function add() {
        $categories = Category::all();
        return view('admin.options.brand.add', compact('categories'));
    }

    public function addRequest(BrandRequest $request)
    {
        $brand = Brand::create([
            'category_id' => $request->input('category'),
            'name' => $request->input('name')
        ]);

        if ($brand) {
            return redirect()->route('admin.brands.index');
        }
    }
}
