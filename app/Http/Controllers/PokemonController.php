<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Element;
use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonController extends Controller
{
    public function search(Request $request){
        if($request->has('keyword')){
            if($request['category'] == "Name"){
                $pokemons = Pokemon::where('pokemonName', 'like', '%'.$request['keyword'].'%')->paginate(24);
            }
            else if($request['category'] == "Element"){
                $element = Element::where('elementName', $request['keyword'])->first();
                $pokemons = Pokemon::where('element_id', $element['id'])->paginate(24);
            }
        }
        else $pokemons = Pokemon::paginate(24);
        $pokemons->appends(['keyword' => $request['keyword'], 'category' => $request['category']]);
        return view('pokemon.pokemonList')->with('pokemons', $pokemons);
    }



    public function showPokemonList(Request $request){
        $pokemons = Pokemon::paginate(24);
        return view('pokemon.pokemonList')->with('pokemons', $pokemons);
    }

    public function showPokemonDetail($pokemonId){
        $pokemon = Pokemon::where('id', $pokemonId)->first();
        return view('pokemon.pokemonDetail')->with('pokemon', $pokemon);
    }

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

    public function showUpdateForm($pokemonId){
        $pokemon = Pokemon::where('id', $pokemonId)->first();
        $elements = Element::orderBy('elementName')->get();
        return view('pokemon.updatePokemonForm',['pokemon' => $pokemon, 'elements' => $elements]);
    }

    public function update($pokemonId, Request $request){
        $this->validate($request, [
            'pokemonName' => 'required|alpha|min:3',
            'element_id' => 'required',
            'pokemonPicture' => 'required|image',
            'gender' => 'required|in:Female,Male',
            'description' => 'required|alpha',
            'price' => 'required|integer|min:1000'
        ]);

        $pokemon = Pokemon::where('id', $pokemonId)->update([
            'pokemonName' => $request['pokemonName'],
            'gender' => $request['gender'],
            'description' => $request['description'],
            'price' => $request['price']
        ]);

        $pokemon = Pokemon::where('id', $pokemonId)->first();

        $pokemon->element_id = $request['element_id'];

        $pokemonPictureName = time().'.'.$request['pokemonPicture']->getClientOriginalExtension();
        $request['pokemonPicture']->move(base_path().'/public/PokemonImages/',$pokemonPictureName);

        $pokemon -> pokemonPicture = $pokemonPictureName;
        $pokemon -> save();

        return redirect('/pokemonList');
    }

    public function delete($pokemonId){
        Comment::where('pokemon_id', $pokemonId)->delete();
        Pokemon::where('id', $pokemonId)->delete();

        return redirect('/pokemonList');
    }
}
