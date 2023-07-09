<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function create()
    {
        $update = false;
        return view('admin.addCategory',compact('update'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_title' => 'required',
        ]);

        $course = new Category();
        $course->cat_title = $request->cat_title;
        $course->cat_slug = Str::slug($request->cat_title);
        $course->save();


        return redirect()->route('category.index')->with('success', 'Course created successfully.');
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $update = true;
        return view('admin.addCategory', compact('category','update'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cat_title' => 'required',
        ]);

        $category->cat_title = $request->cat_title;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Course deleted successfully.');
    }
}
