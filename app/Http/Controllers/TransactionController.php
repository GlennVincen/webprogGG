<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::all();
        return view('cart.transactionList')->with('transaction', $transaction);
    }

    public function index2()
    {
        $transaction = Transaction::all();
        return view('cart.deleteTransaction')->with('transaction', $transaction);
    }

    public function insert(Request $request){

        $cart = DB::table('cart')->select('email', 'created_at')->first();

        $transaction = Transaction::create([
            'userEmail' => $cart->email,
            'transactionDate' => $cart->created_at,
            'status' => 'Pending'
        ]);

        $transaction -> save();

        Cart::truncate();

        return redirect('/pokemonList');
    }

    public function Accept($transactionId, Request $request){

        Transaction::where('id', $transactionId)->update(['status' => 'Accepted']);

        return redirect('/transaction');
    }

    public function Decline($transactionId, Request $request){

        Transaction::where('id', $transactionId)->update(['status' => 'Declined']);

        return redirect('/transaction');
    }

    public function Detail($transactionId){

//        Transaction::where('id', $transactionId)->delete();

        return redirect('/cart');
    }

    public function Delete($transactionId)
    {
        Transaction::where('id', $transactionId)->delete();

        return redirect('/deleteTransaction');
    }
}
