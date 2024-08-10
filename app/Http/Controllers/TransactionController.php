<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['item', 'user'])->where('transaction_type', 'masuk')->get();
        // dd($transactions);
        
        return view('partials.barangmasuk',  ['transactions' => $transactions]);
    }

    public function index2()
    {
        $transactions = Transaction::with(['item', 'user'])->where('transaction_type', 'keluar')->get();
        // dd($transactions);
        
        return view('partials.barangkeluar',  ['transactions' => $transactions]);
    }

    public function create_in()
    {
        $item = Items::all();
        return view('partials.scan-in',  ['item' => $item]);
    }

    public function store_in(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,qr_code',
            'quantity' => 'required|integer',
        ]);

        $item = Items::where('qr_code', $request->item_id)->first();

        $transaction = new Transaction();
        $transaction->item_id = $item->id;
        $transaction->transaction_type = 'masuk'; 
        $transaction->quantity = $request->quantity;
        $transaction->transaction_date = now();
        $transaction->user_id = Auth::id();
        $transaction->save();

        $item->stock += $request->quantity;
        $item->save();

        return back()->with('success', 'Transaction saved successfully.');
    }

    public function create_out()
    {
        $item = Items::all();
        return view('partials.scan-out',  ['item' => $item]);
    }

    public function store_out(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,qr_code',
            'quantity' => 'required|integer',
        ]);

        $item = Items::where('qr_code', $request->item_id)->first();

        $transaction = new Transaction();
        $transaction->item_id = $item->id;
        $transaction->transaction_type = 'keluar'; 
        $transaction->quantity = $request->quantity;
        $transaction->transaction_date = now();
        $transaction->user_id = Auth::id();
        $transaction->save();

        $item->stock -= $request->quantity;
        $item->save();

        return back()->with('success', 'Transaction saved successfully.');
    }
}
