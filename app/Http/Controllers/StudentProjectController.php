<?php

namespace App\Http\Controllers;

use App\Models\StudentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = StudentProject::where('user_id',Auth::id())->get(); 
        return view('profile.manageProject',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'project_name' => 'required',
            'project_url' => 'required',
            'project_description' => 'required',
        ]);

        $data += ['user_id'=>Auth::id()];

        StudentProject::create($data);
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentProject $studentProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentProject $studentProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentProject $studentProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($studentProject)
    {
        $data = StudentProject::find($studentProject);
        $data->delete();
        return redirect()->back();
    }
}
