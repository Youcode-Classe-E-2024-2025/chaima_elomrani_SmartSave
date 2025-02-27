<?php

namespace App\Http\Controllers;
use App\Models\Profiles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function index()
   {
       // Redirect to the current user's profile if logged in
       if (Auth::check()) {
           return redirect()->route('profile.show', ['id' => Auth::id()]);
       }
       
       // Redirect to login if not authenticated
       return redirect('/login');
   }

   public function show($id)
   {
       // Ensure the user is viewing their own profile or is an admin
       if (Auth::id() != $id) {
           return redirect()->route('profile.show', ['id' => Auth::id()])
               ->with('error', 'You can only view your own profile');
       }

       $user = User::findOrFail($id);
       
       // Fetch user's profiles or related data
       $profiles = $user->profiles ?? collect();

       return view('profile', compact('user', 'profiles'));
   }
}
