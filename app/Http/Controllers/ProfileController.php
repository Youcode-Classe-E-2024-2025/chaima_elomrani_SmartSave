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
       if (Auth::id() != $id) {
           return redirect()->route('profile.show', ['id' => Auth::id()])
               ->with('error', 'You can only view your own profile');
       }

       $user = User::findOrFail($id);
       
       $profiles = $user->profiles ?? collect();

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
}
