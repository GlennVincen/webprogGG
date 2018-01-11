<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Transaction</title>
</head>
<body>
@extends('layouts.app')
@section('content')
    <h2>Delete Transaction</h2>
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
                    <form action="{{url('/transactionDelete/'.$transactions->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
    @endforeach
@endsection
</body>
</html>