<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.options.category.index', compact('categories'));
    }

    public function add() {
        return view('admin.options.category.add');
    }

    public function addRequest(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->input('name')
        ]);

        if ($category) {
            return redirect()->route('admin.categories.index');
        }
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('admin.options.category.edit', compact('category'));
    }

    public function editRequest(CategoryRequest $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->input('name');

        if ($category->save()) {
            return redirect()->route('admin.categories.index');
        }
    }

    public function delete($id) {
        $category = Category::where('id', $id)->delete();

        if ($category) {
            return redirect()->route('admin.categories.index');
        }
    }
}
