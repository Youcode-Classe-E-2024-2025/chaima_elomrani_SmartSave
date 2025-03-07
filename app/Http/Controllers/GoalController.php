<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goals;
use Illuminate\Http\Request;

class GoalController extends Controller
{
     
   

    public function index()
{
    $goals = Goals::with('category')->get(); 
    $categories = Category::all(); 
    return view('goals', compact('goals', 'categories'));
}



    public function create(Request $request){
        $validateData = $request->validate([
            'name'=> 'required|string|max:100',
            'description'=>'required|string|max:750',
            'current_amount'=>'nullable|numeric|min:0',
            'target_amount'=>'required|numeric|min:0',
            'target_date'=>'required|date',
            'category_id' => 'required|exists:category,id',
        ]);

        $goal= Goals::create([
            'name'=> $validateData['name'],
            'description'=>$validateData['description'],
            'current_amount'=>$validateData['current_amount'] ?? 0,
            'target_amount'=>$validateData['target_amount'],
            'target_date'=>$validateData['target_date'],
            'category_id'=>Category::id(),
            
        ]);

        return redirect()->route('goals');

    }
}
