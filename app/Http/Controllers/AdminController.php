<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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
}
