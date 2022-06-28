<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Category;
use App\Models\CategoryProperty;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index() {
        $categories = Category::with('properties')->get();
        return view('admin.options.property.index', compact('categories'));
    }

    public function add() {
        $categories = Category::all();
        return view('admin.options.property.add', compact('categories'));
    }

    public function addRequest(PropertyRequest $request) {
        $property = CategoryProperty::create([
            'category_id' => $request->input('category'),
            'name' => $request->input('name')
        ]);

        if ($property) {
            return redirect()->route('admin.properties.index');
        }
    }

    public function edit($id) {
        $property = CategoryProperty::find($id);

        return view('admin.options.property.edit', compact('property'));
    }

    public function editRequest(PropertyRequest $request, $id) {
        $property = CategoryProperty::find($id);

        $property->name = $request->input('name');

        if ($property->save()) {
            return redirect()->route('admin.properties.index');
        }
    }

    public function delete($id) {
        $property = CategoryProperty::where('id', $id)->delete();

        if ($property) {
            return redirect()->route('admin.properties.index');
        }
    }
}
