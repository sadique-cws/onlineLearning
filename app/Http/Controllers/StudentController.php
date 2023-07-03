<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //

    public function dashboard () {
        $course = Payment::where('user_id',Auth::id())->where('status','1')->get();
        return view('dashboard',compact('course'));
    }
}
