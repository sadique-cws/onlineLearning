<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('home.home',compact('courses'));
    }
    public function viewCourse($slug){
        $course = Course::where('slug',$slug)->firstOrFail();
        return view('home.view',compact('course'));
    }
}
