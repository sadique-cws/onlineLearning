<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Payment;
use App\Models\Placement;
use App\Models\StudentProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $newStudents =User::whereDoesntHave("payments")->get();
        $students =  User::has("payments")->get();
        $payments = Payment::orderBy("id","DESC")->get();
        $projects =  StudentProject::count();
        $placements =  Placement::count();
        return view('admin.home',compact('newStudents','students','projects','payments','placements'));
    }

    public function manageStudents(){
        $students = User::has("payments")->get();
        return view("admin.user",compact("students"));
    }
    public function login(Request $req){

        // $admin = new Admin();
        // $admin->username = "sadiquesir";
        // $admin->password = "Code@123";
        // $admin->save();

        if ($req->method() == "POST") {
            $credentials = $req->only('username', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                // Authentication successful
                return redirect()->intended('/admin');
            }

            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);

        }
        return view("admin.login");
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function manageProjects(){
        $projects = StudentProject::orderBy('id',"DESC")->get();
        return view('admin.projects',compact('projects'));
    }
    public function managePayments(){
        $payments = Payment::orderBy('id',"DESC")->get();
        return view('admin.payments',compact('payments'));
    }


}
