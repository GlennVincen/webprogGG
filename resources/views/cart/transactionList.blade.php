<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Transaction</title>
</head>
<body>
@extends('layouts.app')
@section('content')
    <h2>Update Transaction</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User Email</th>
            <th>Transaction Date</th>
            <th>Status</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($transaction as $transactions)
            <tr>
                <td>{{$transactions->id}}</td>
                <td>{{$transactions->userEmail}}</td>
                <td>{{$transactions->transactionDate}}</td>
                <td>{{$transactions->status}}</td>
                <td>
                    <form action="{{url('/transaction/'.$transactions->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" value="Accept">
                    </form>
                </td>
                <td>
                    <form action="{{url('/transaction2/'.$transactions->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" value="Decline">
                    </form>
                </td>
                <td>
                    <a href="{{URL::to('/transactionDetail/'.$transactions->id)}}">
                        <input type ="submit" value="Detail">
                    </a>
                </td>
            </tr>
        @endforeach
@endsection
</body>
</html>