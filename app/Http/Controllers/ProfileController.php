<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Placement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $placement = Placement::where('user_id',Auth::id())->first();
        
        if(!$placement){
            Placement::create(['user_id'=>Auth::id()]);
        }


        return view('profile.edit', [
            'user' => $request->user(),
            "placement"=>$placement
        ]);

    
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePlacement(Request $request){
            
            $data = $request->validate([
                'company_name'=>'required',
                'role'=>'required',
                'job_type'=>'required',
                'description'=>'required',
            ]);

           Placement::where('user_id',Auth::id())->first()->update($data);
           return redirect()->back()->with('status','placement-updated');
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Define validation rules for the picture
        ]);

        // Handle picture upload and update logic
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $fileName = time().'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('dp'), $fileName);

            // Save the picture path in the user's profile or wherever you want to store it
            // Example:
            auth()->user()->update([
                'picture' => 'dp/'.$fileName,
            ]);
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }
}
