<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests;
use App\Http\Controllers\Controller;


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
        $transaction = Transaction::create([
            'userEmail'=>'Dummy',
            'transactionDate'=>'Dummy',
            'status'=>'Pending'
        ]);
        // $pokemonPictureName = time().'.'.$request['pokemonPicture']->getClientOriginalExtension();
        // $request['pokemonPicture']->move(base_path().'/public/PokemonImages/',$pokemonPictureName);

        // $pokemon -> pokemonPicture = $pokemonPictureName;
        $transaction -> save();

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

        Transaction::where('id', $transactionId)->delete();

        return redirect('/cart');
    }

    public function Delete($transactionId)
    {
        Transaction::where('id', $transactionId)->delete();

        return redirect('/deleteTransaction');
    }
}
