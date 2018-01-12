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
//        $cart = session('cart');
//
//        $items = Product::find(array_keys($cart));
//
//        return view('cart.index', compact('items', 'cart'));

        $cart = Cart::all();
        return view('cart.indexCart')->with('cart', $cart);
    }

//    public function create()
//    {
//        $products = Product::all();
//
//        return view('cart.create', compact('products'));
//    }

    public function store(Request $request)
    {
//        $cart = session('cart');
//
//        if(isset($cart[$id]))
//            $cart[$id]+=1;
//        else
//            $cart[$id]=1;
//
//        session(['cart'=>$cart]);
//
//        return redirect('/cart/createCart');

//        $cart = new Cart();
//
//        $cart->pokemonName = $request->name;
//        $cart->pokemonPicture = $request->picture;
//        $cart->Quantity = $request->quantity;
//        $cart->price = $request->price;
//        $cart->status = $request->status;
//
//        $cart->save();
    }
//$request['pokemonName']
//$request['price']
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
//        $cart = session('cart');
//
//        $cart[$id]-=1;
//
//        if($cart[$id]==0)
//            unset($cart[$id]);
//
//        session(['cart'=>$cart]);
//
//        return redirect('/cart');

        Cart::where('id', $cartId)->delete();

        return redirect('/cart');
    }
}
