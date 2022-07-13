<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValueRequest;
use App\Models\Category;
use App\Models\CategoryPropertyValue;

class ValueController extends Controller
{
    public function index()
    {
        $categories = Category::with('properties')->get();
        return view('admin.options.value.index', compact('categories'));
    }

    public function add()
    {
        $categories = Category::with('properties')->get();
        return view('admin.options.value.add', compact('categories'));
    }

    public function addRequest(ValueRequest $request)
    {
        try {
            CategoryPropertyValue::create([
                'category_property_id' => $request->input('property'),
                'name' => $request->input('name')
            ]);

            return redirect()->route('admin.values.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function edit($id)
    {
        $value = CategoryPropertyValue::findOrFail($id);
        return view('admin.options.value.edit', compact('value'));
    }

    public function editRequest(ValueRequest $request, $id)
    {
        try {
            $value = CategoryPropertyValue::find($id);
            $value->name = $request->input('name');

            if ($value->save()) {
                return redirect()->route('admin.values.index');
            }
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function delete($id)
    {
        try {
            CategoryPropertyValue::where('id', $id)->delete();
            return redirect()->route('admin.values.index');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }
}
