<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();
        return view('dashboard', ['categories' => $categories]);
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:20',
        ]);
    
        Category::create([
            'name' => $request->name,
        ]);
    
        return redirect('/dashboard')->with('success', 'Category added successfully!');
    }


    public function delete($id){
        Category::destroy($id);
        return redirect('/dashboard');

    }




}
