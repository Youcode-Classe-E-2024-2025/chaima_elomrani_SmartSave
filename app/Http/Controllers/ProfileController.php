<?php

namespace App\Http\Controllers;
use App\Models\Profiles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;


class ProfileController extends Controller
{
   public function index()
   {
       if (Auth::check()) {
           return redirect()->route('profile.show', ['id' => Auth::id()]);
       }
       
       return redirect('/login');
   }

   public function show($id)
   {
       // Check if the user exists
       $user = User::findOrFail($id);
       
       // Allow viewing if the user is viewing their own profile or is an admin
       if (Auth::id() != $id && !Auth::user()->isAdmin()) {
           return redirect()->route('profile.show', ['id' => Auth::id()])
               ->with('error', 'You are not authorized to view this profile');
       }
   
       // Fetch profiles associated with the user
       $profiles = Profiles::where('user_id', $id)->get();
   
       return view('profile', compact('user', 'profiles'));
   }



   public function showCreateForm()
{
    return view('profile.create');
}



public function create(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:50',
        'number' => 'required|string|max:20',
    ]);

    // Correctly retrieve authenticated user's ID
    $profile = Profiles::create([
        'user_id' => Auth::id(), // Correct way to get user ID
        'name' => $validatedData['name'],
        'number' => $validatedData['number'],
    ]);

    return redirect()->route('profile.show', ['id' => Auth::id()])
        ->with('success', 'Profile created successfully');
}



public function delete($id)
{
    // Find the profile
    $profile = Profiles::findOrFail($id);

    // Ensure the user is deleting their own profile
    if ($profile->user_id !== Auth::id()) {
        return redirect()->route('profile.show', ['id' => Auth::id()])
            ->with('error', 'You are not authorized to delete this profile');
    }

    // Delete the profile
    $profile->delete();

    return redirect()->route('profile.show', ['id' => Auth::id()])
        ->with('success', 'Profile deleted successfully');
}







}
