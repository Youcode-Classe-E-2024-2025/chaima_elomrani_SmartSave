<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    public function index()
    {
        $transactions = Transactions::with('category')->get();
        $categories = Category::all();
        return view('transactions', compact('transactions', 'categories'));
    }

    public function create(Request $request)
    {
        // Ensure user is authenticated
        if (!auth()->check()) {
            return redirect('login')->with('error', 'Please log in to create a transaction');
        }
    
        $validator = \Validator::make($request->all(), [
            'description' => 'required|string|min:2|max:255',
            'amount' => 'required|numeric|min:0.01|max:1000000',
            'transaction_date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),
            'category_id' => 'required|exists:category,id',
            'type' => 'required|in:income,expense',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the errors in the form');
        }
    
        try {
            $validatedData = $validator->validated();
            $validatedData['user_id'] = auth()->id();
    
            $transaction = Transactions::create($validatedData);
    
            return redirect('transactions')
                ->with('success', 'Transaction created successfully');
        } catch (\Exception $e) {
            \Log::error('Transaction creation failed: ' . $e->getMessage());
            
            return redirect('transactions')
                ->with('error', 'Failed to create transaction. ' . $e->getMessage());
        }   
    }  

    public function delete($id){
        Transactions::destroy($id);
        return redirect('transactions');
    }
}
