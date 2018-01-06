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
<form action="{{url('insertPokemon')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" id="pokemonName" name="pokemonName" placeholder="Your Pokemon Name" value="{{ old('pokemonName') }}">
    @if ($errors->has('pokemonName'))
        <span class="help-block">
            <strong>{{ $errors->first('pokemonName') }}</strong>
        </span>
    @endif
    <br>

    <select name="element_id">
        @foreach($elements as $element)
            <option value="{{$element['id']}}">{{$element['elementName']}}</option>
        @endforeach
    </select>
    <br>

    <input id="pokemonPicture" type="file" name="pokemonPicture">

    @if ($errors->has('pokemonPicture'))
        <span class="help-block">
            <strong>{{ $errors->first('pokemonPicture') }}</strong>
        </span>
    @endif
    <br>

    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female<br>

    @if ($errors->has('gender'))
        <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
    @endif
    <br>

    <textarea id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>

    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
    <br>

    <input type="number" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
    <br>

    <input type="submit" value="Insert New Pokemon">
</form>
</body>
</html>