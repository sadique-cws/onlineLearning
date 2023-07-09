<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use Illuminate\Http\Request;

class PlacementController extends Controller
{

    public function managePlacement(){
        $placements = Placement::all();
        return view("admin.placements",compact('placements'));
    }

    public function destroy($placement){
        $data = Placement::find($placement);
        $data->delete();
        return redirect()->back();
    }
    
}
