<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Category;
use App\Models\CategoryProperty;

class PropertyController extends Controller
{
    public function index()
    {
        $categories = Category::with('properties')->get();
        return view('admin.options.property.index', compact('categories'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.options.property.add', compact('categories'));
    }

    public function addRequest(PropertyRequest $request)
    {
        try {
            CategoryProperty::create([
                'category_id' => $request->input('category'),
                'name' => $request->input('name')
            ]);

            return redirect()->route('admin.properties.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $property = CategoryProperty::findOrFail($id);

        return view('admin.options.property.edit', compact('property'));
    }

    public function editRequest(PropertyRequest $request, $id)
    {
        try {
            $property = CategoryProperty::find($id);
            $property->name = $request->input('name');

            if ($property->save()) {
                return redirect()->route('admin.properties.index');
            }
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function delete($id)
    {
        try {
            CategoryProperty::where('id', $id)->delete();
            return redirect()->route('admin.properties.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }
}
