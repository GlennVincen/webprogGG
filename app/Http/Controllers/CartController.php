<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\User;
use Auth;
use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        return view('cart.indexCart')->with('cart', $cart);
    }

    public function add($pokemonId, Request $request){

        $this->validate($request, [
            'Quantity' => 'required|integer|min:1'
        ]);

        $pokemon = DB::table('pokemons')->select('pokemonName', 'pokemonPicture', 'price')->where('id', $pokemonId)->first();

        $user = Auth::user()->email;
        $cart = Cart::create([
            'pokemonPicture' => $pokemon->pokemonPicture,
            'pokemonName' => $pokemon->pokemonName,
            'Quantity' => $request->Quantity,
            'price' => $pokemon->price,
            'email' => $user
        ]);

        $cart -> save();

        return redirect('/pokemonList');
    }

    public function destroy($cartId)
    {

        Cart::where('id', $cartId)->delete();

        return redirect('/cart');
    }
}
