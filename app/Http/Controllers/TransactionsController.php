<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

    public function index(){
        return view('dashboard');
    }

    // public function index()
    // {
    //     $transactions = Transactions::all();
    //     return view('dashboard', ['transaction', $transactions]);
    // }

    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'description' => 'required|string|max:255',
    //         'amount' => 'required|numeric',
    //         'transaction_date' => 'required|date',
    //         'category_id' => 'required|exists:category, id',
    //         'user_id' => 'required|exists:user, id',
    //         'type' => 'required|in:income,expense',
    //     ]);
    //     Transactions::create([
    //         'description' => $request->description,
    //         'amount' => $request->amount,
    //         'transaction_date' => $request->transaction_date,
    //         'category_id' => $request->category_id,
    //         'user_id' => $request->user_id,
    //         'type' => $request->type,
    //     ]);

    //     return redirect('dashboard');
    // }

    // public function delete($id){
    //     Transactions::destroy($id);
    //     return redirect('/dashboard');
    // }
}
