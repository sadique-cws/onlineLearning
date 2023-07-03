<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.course', compact('courses'));
    }

    public function create()
    {
        $update = false;
        $category = Category::all();
        return view('admin.addCourse',compact('update','category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
            'start_date' => 'required|date',
            'fees' => 'required',
            'discount_fees' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required'

        ]);

        $course = new Course;
        $course->title = $request->title;
        $course->start_date = $request->start_date;
        $course->slug = Str::slug($request->title);
        $course->duration = $request->duration;
        $course->description = $request->description;
        $course->fees = $request->fees;
        $course->discount_fees = $request->discount_fees;
        $course->category_id = $request->category;

        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $imagePath = $uploadedImage->store('images', 'public');
            $course->image = $imagePath;
        }
        $course->save();


        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $update = true;
        $category = Category::all();
        return view('admin.addCourse', compact('course','update','category'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required|integer',
            'start_date' => 'required|date',
            'fees' => 'required',
            'discount_fees' => 'required',
            'category' => 'required'
        ]);

        $course->title = $request->title;
        $course->start_date = $request->start_date;
        $course->slug = Str::slug($request->title);
        $course->duration = $request->duration;
        $course->description = $request->description;
        $course->fees = $request->fees;
        $course->discount_fees = $request->discount_fees;
        $course->category_id = $request->category;

        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $imagePath = $uploadedImage->store('images', 'public');
            $course->image = $imagePath;
        }
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        Storage::delete($course->image);
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
