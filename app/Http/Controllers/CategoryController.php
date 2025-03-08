<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CategoryController extends Controller
{
    public function index(){
        $id = session('id');

        \Log::info('Current profile ID from session: ' . $id);
        $categories = Category::where('profile_id', $id)->get();
        return view('categories', compact('categories'));
    }



    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        $id = session('id');
        Category::create([
            'name'=> $validated['name'],
            'profile_id'=> $id,
        ]);

        return redirect('categories')->with('success', 'well done!');
    }
}
