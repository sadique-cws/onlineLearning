<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use App\Models\StudentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //

    public function dashboard () {
        $course = Payment::where('user_id',Auth::id())->where('status','1')->get();
        $projects = StudentProject::where('user_id',Auth::id())->get();
        return view('dashboard',compact('course','projects'));
    }
}
