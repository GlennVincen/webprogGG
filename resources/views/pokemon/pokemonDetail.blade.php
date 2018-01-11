@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon Detail</title>
</head>
<body>
    {{$pokemon['pokemonName']}}<br>
    <img src="{{asset('PokemonImages/' . $pokemon->pokemonPicture)}}" height="200" width="200" alt=""><br>
    Price : {{$pokemon['price']}}<br>
    Element : {{$pokemon->element['elementName']}}<br>
    Gender : {{$pokemon['gender']}}<br><br>
    {{$pokemon['description']}}<br><br>
    Comments:<br>
    @foreach($pokemon->comments as $comment)
        {{$comment->user['email']}}<br>
        {{$comment['created_at']}}<br>
        {{$comment['body']}}<br>
    @endforeach
    <br>
    <!--Bagian cart (Glenn)-->
    <!-->

    <form action="{{url('/addCart/'.$pokemon['id'])}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Add to cart">
    </form>

    <form action="{{url('/pokemonDetail/'.$pokemon['id'].'/comment')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="body" id="body" placeholder="Your Comment Here">

        @if ($errors->has('body'))
            <span class="help-block">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
        @endif<br>

        <input type="submit" value="Post Comment">
    </form>
</body>
</html>
@endsection