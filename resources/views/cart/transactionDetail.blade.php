@extends('layouts.app')
@section('content')
    <h2>Detail Transaction</h2>
    <table border="1">
        <tr>
            <th>Pokemon Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        @foreach($temp as $temps)
        <tr>
            <td>{{$temps->pokemonName}}</td>
            <td>{{$temps->price}}</td>
            <td>{{$temps->Quantity}}</td>
        </tr>
        @endforeach

    </table>
    <br><br><br><br><br><br><br><br><br><br>
    <table>
        <tr>
            <td>Total Quantity: </td>
            <td>{{\App\Temp::getTotalQuantity()}}</td>
        </tr>
        <tr>
            <td>{{\App\Temp::getTotalPrice()}}</td>
        </tr>
        <tr>
            <td>
                <a href="{{url('/transaction')}}">
                    <input type ="submit" value="Back">
                </a>
            </td>
        </tr>
    </table>

@endsection

