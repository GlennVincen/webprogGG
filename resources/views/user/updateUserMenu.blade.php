@extends('layouts.app')
@section('content')
    <form action="{{url('updateUser/getUserId')}}" method="get">
        <select name="id">
        @foreach($users as $user)
                <option value="{{$user['id']}}">{{$user['email']}}</option>
            @endforeach
        </select>
        <input type="submit" value="Edit User">
    </form>
    @endsection