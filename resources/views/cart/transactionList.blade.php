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
    </table>
@endsection
