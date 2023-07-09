<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Placement;
use Illuminate\Support\Facades\DB;
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
            $viewCategory = false;
        }
        else{
            $viewCategory = Category::where('cat_slug',$cat_slug)->firstOrFail();
            $courses = Course::where('category_id',$viewCategory->id)->get();
        }

        return view('home.courses',compact('courses','cat_slug','viewCategory'));
    }

    public function placements(){
        $placements = DB::table('oldPlacements')->get();
        $newplacements = Placement::where([['company_name','!=',NULL],["company_name","!=",""]])->get();
        return view("home.placement",compact("placements","newplacements"));
    }

    public function about(){
        return  view("home.about");
    }
    public function contact(){
        return  view("home.contact");
    }
}
