<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
@extends('layouts.app')
@section('content')
<form action="{{url('/pokemonList/search')}}" method="get">
    <input type="text" name="keyword" placeholder="By Name,By Element">
    <input type="submit" value="Search">
    <select name="category">
            <option value="Name">Name</option>
            <option value="Element">Element</option>
    </select>
</form>
<br>
@foreach($pokemons as $pokemon)
            <img src="{{asset('PokemonImages/' . $pokemon->pokemonPicture)}}" height="200" width="200" alt=""><br>
            {{$pokemon['pokemonName']}}<br>
    @if(Auth::user()->role == 'Member')
        <form action="{{url('/pokemonDetail/'.$pokemon['id'])}}" method="get">
        <input type="submit" value="Display">
        </form>
    @elseif(Auth::user()->role == 'Admin')
        <form action="{{url('/updatePokemon/'.$pokemon['id'])}}" method="get">
            <input type="submit" value="Display">
        </form>
        <form action="{{url('/deletePokemon/'.$pokemon['id'])}}" method="get">
            <input type="submit" value="Delete">
        </form>
    @endif<br>
@endforeach
{{$pokemons->render()}}
    @endsection
</body>
</html>
