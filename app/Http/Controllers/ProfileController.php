<?php

namespace App\Http\Controllers;
use App\Models\Profiles;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function index(){
        return view('profile');
     }

   public function show($id){
      $user= User::findOrFail($id);
      $profiles = $user->profiles;
      return view('/profile', compact('user', 'profiles'));

   }
}
