<?php

namespace App\Http\Controllers;

use App\Element;
use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PokemonController extends Controller
{
    public function showInsertForm(){
        $elements = Element::orderBy('elementName')->get();
        return view('pokemon.insertPokemonForm')->with('elements', $elements);
    }

    public function insert(Request $request){
        $this->validate($request, [
            'pokemonName' => 'required|alpha|min:3',
            'element_id' => 'required',
            'pokemonPicture' => 'required|image',
            'gender' => 'required|in:Female,Male',
            'description' => 'required|alpha',
            'price' => 'required|integer|min:1000'
        ]);

        $pokemon = Pokemon::create([
            'pokemonName' => $request['pokemonName'],
            'gender' => $request['gender'],
            'description' => $request['description'],
            'price' => $request['price']
        ]);
        $pokemon->element_id = $request['element_id'];

        $pokemonPictureName = time().'.'.$request['pokemonPicture']->getClientOriginalExtension();
        $request['pokemonPicture']->move(base_path().'/public/PokemonImages/',$pokemonPictureName);

        $pokemon -> pokemonPicture = $pokemonPictureName;
        $pokemon -> save();

        return redirect('/insertPokemon');
    }
}
