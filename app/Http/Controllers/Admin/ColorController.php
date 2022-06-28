<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() {
        $categories = Category::with('brands')->get();
        return view('admin.options.color.index', compact('categories'));
    }

    public function add() {
        $categories = Category::all();
        return view('admin.options.color.add', compact('categories'));
    }

    public function addRequest(ColorRequest $request)
    {
        $brand = Color::create([
            'category_id' => $request->input('category'),
            'name' => $request->input('name')
        ]);

        if ($brand) {
            return redirect()->route('admin.colors.index');
        }
    }
}
