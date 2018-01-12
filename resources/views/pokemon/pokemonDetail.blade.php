@extends('layouts.app')

@section('content')
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


    <form action="{{url('/addCart/'.$pokemon['id'])}}" method="post">
        {{csrf_field()}}
        <input type="text" id="Quantity" name="Quantity" placeholder="Quantity" value="{{ old('Quantity') }}"><br>
        @if ($errors->has('Quantity'))
            <span class="help-block">
            <strong>{{ $errors->first('Quantity') }}</strong>
        </span>
        @endif
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
@endsection