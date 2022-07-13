<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Models\Category;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $categories = Category::with('brands')->get();
        return view('admin.options.color.index', compact('categories'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.options.color.add', compact('categories'));
    }

    public function addRequest(ColorRequest $request)
    {
        try {
            Color::create([
                'category_id' => $request->input('category'),
                'name' => $request->input('name')
            ]);

            return redirect()->route('admin.colors.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.options.color.edit', compact('color'));
    }

    public function editRequest(ColorRequest $request, $id)
    {
        try {
            $color = Color::find($id);
            $color->name = $request->input('name');

            if ($color->save()) {
                return redirect()->route('admin.colors.index');
            }
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function delete($id)
    {
        try {
            Color::where('id', $id)->delete();
            return redirect()->route('admin.colors.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }
}
