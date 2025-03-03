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
        // Detailed logging and debugging
        \Log::info('Transaction Creation Request', [
            'all_input' => $request->all(),
            'authenticated' => auth()->check(),
            'user' => auth()->user(),
            'user_id' => auth()->id(),
        ]);
    
        // Ensure user is authenticated
        if (!auth()->check()) {
            \Log::error('Transaction creation attempted without authentication');
            return redirect('login')->with('error', 'Please log in to create a transaction');
        }
    
        // Explicitly get the authenticated user's ID
        $userId = auth()->id();
        if (!$userId) {
            \Log::error('No valid user ID found');
            return redirect('login')->with('error', 'Unable to identify user');
        }
    
        $validator = \Validator::make($request->all(), [
            'description' => 'required|string|min:2|max:255',
            'amount' => 'required|numeric|min:0.01|max:1000000',
            'transaction_date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),
            'category_id' => 'required|exists:category,id',
            'type' => 'required|in:income,expense',
        ]);
    
        if ($validator->fails()) {
            \Log::warning('Transaction validation failed', [
                'errors' => $validator->errors(),
                'input' => $request->all()
            ]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please correct the errors in the form');
        }
    
        try {
            $validatedData = $validator->validated();
            $validatedData['user_id'] = $userId;
    
            \Log::info('Attempting to create transaction', [
                'validated_data' => $validatedData
            ]);
    
            $transaction = Transactions::create($validatedData);
    
            return redirect('transactions')
                ->with('success', 'Transaction created successfully');
        } catch (\Exception $e) {
            \Log::error('Transaction creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $validatedData ?? 'No data'
            ]);
            
            return redirect('transactions')
                ->with('error', 'Failed to create transaction. ' . $e->getMessage());
        }   
    }

    public function delete($id){
        Transactions::destroy($id);
        return redirect('transactions');
    }
}
