<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('home.home',compact('courses'));
    }
    public function viewCourse($cat_slug,$slug){
        $course = Course::where('slug',$slug)->firstOrFail();
        return view('home.view',compact('course'));
    }
    public function allCourse($cat_slug=NULL){

        if($cat_slug==NULL){
            $courses = Course::all();
        }
        else{
            $category = Category::where('cat_slug',$cat_slug)->firstOrFail();
            $courses = Course::where('category_id',$category->id)->get();
        }

        return view('home.courses',compact('courses','cat_slug'));
    }
}
