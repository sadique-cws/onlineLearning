<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Str;
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
        return view('admin.addCourse',compact('update'));
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
        ]); 

        $course = new Course;
        $course->title = $request->title;
        $course->start_date = $request->start_date;
        $course->slug = Str::slug($request->title);
        $course->duration = $request->duration;
        $course->description = $request->description;
        $course->fees = $request->fees;
        $course->discount_fees = $request->discount_fees;

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
        return view('admin.addCourse', compact('course','update'));
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
        ]); 

        $course->title = $request->title;
        $course->start_date = $request->start_date;
        $course->slug = Str::slug($request->title);
        $course->duration = $request->duration;
        $course->description = $request->description;
        $course->fees = $request->fees;
        $course->discount_fees = $request->discount_fees;

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
