<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
@extends('layouts.app')
@section('content')
<h2>Your Cart</h2>
<table border="1">
    <tr>
        <th>Picture</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sub Total</th>
        <th></th>
    </tr>
    @foreach($cart as $carts)
        <tr>
            <td><img src="{{asset('PokemonImages/' . $carts->pokemonPicture)}}" height="200" width="200" alt=""><br></td>
            <td>{{$carts->pokemonName}}</td>
            <td>{{$carts->Quantity}}</td>
            <td>{{$carts->price}}</td>
            <td>5000</td>
            <td>
                <a href="{{URL::to('/cart/'.$carts->id)}}">
                    <input type ="submit" value="Delete">
                </a>
            </td>
        </tr>
    @endforeach


</table>
<br><br><br><br>
<table>
    <tr>
        <td>Total Quantity</td>
        <td>1</td>

    </tr>
    <tr>
        <td>Total Price</td>
        <td>5000</td>
    </tr>
</table>
<br>
<form action="{{url('/insertTransactionDetail')}}" method="post">
    {{csrf_field()}}
    <input type="submit" value="Complete the Payment">
</form>
@endsection
</body>
</html>