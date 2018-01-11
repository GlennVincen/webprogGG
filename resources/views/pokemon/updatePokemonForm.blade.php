@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Pokemon</title>
</head>
<body>

<img src="{{asset('PokemonImages/' . $pokemon->pokemonPicture)}}" height="200" width="200" alt=""><br><br>

<form action="{{url('updatePokemon/'.$pokemon['id'])}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input id="pokemonPicture" type="file" name="pokemonPicture">

    @if ($errors->has('pokemonPicture'))
        <span class="help-block">
            <strong>{{ $errors->first('pokemonPicture') }}</strong>
        </span>
    @endif
    <br><br>

    Name :<br>
    <input type="text" id="pokemonName" name="pokemonName" placeholder="Your Pokemon Name" value="{{ $pokemon['pokemonName'] }}">
    @if ($errors->has('pokemonName'))
        <span class="help-block">
            <strong>{{ $errors->first('pokemonName') }}</strong>
        </span>
    @endif
    <br>
    Element:<br>
    <select name="element_id">
        @foreach($elements as $element)
            <option value="{{$element['id']}}" @if($pokemon['element_id'] == $element['id']) selected @endif>{{$element['elementName']}}</option>
        @endforeach
    </select>
    <br>
    Gender:<br>
    <input type="radio" name="gender" value="Male" @if($pokemon['gender'] == 'Male') checked @endif> Male
    <input type="radio" name="gender" value="Female" @if($pokemon['gender'] == 'Female') checked @endif> Female

    @if ($errors->has('gender'))
        <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
    @endif
    <br>
    Description:<br>
    <textarea id="description" name="description" placeholder="Description">{{ $pokemon['description'] }}</textarea>

    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
    <br>
    Price:<br>
    <input type="number" id="price" name="price" placeholder="Price" value="{{ $pokemon['price'] }}">
    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
    <br>

    <input type="submit" value="Edit">
</form>
</body>
</html>
@endsection