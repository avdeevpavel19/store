<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValueRequest;
use App\Models\Category;
use App\Models\CategoryPropertyValue;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index() {
        $categories = Category::with('properties')->get();
        return view('admin.options.value.index', compact('categories'));
    }

    public function add() {
        $categories = Category::with('properties')->get();
        return view('admin.options.value.add', compact('categories'));
    }

    public function addRequest(ValueRequest $request) {
        $value = CategoryPropertyValue::create([
            'category_property_id' => $request->input('property'),
            'name' => $request->input('name')
        ]);

        if ($value) {
            return redirect()->route('admin.values.index');
        }
    }

    public function edit($id) {
        $value = CategoryPropertyValue::find($id);
        return view('admin.options.value.edit', compact('value'));
    }

    public function editRequest(ValueRequest $request, $id) {
        $value = CategoryPropertyValue::find($id);

        $value->name = $request->input('name');

        if ($value->save()) {
            return redirect()->route('admin.values.index');
        }
    }
}
