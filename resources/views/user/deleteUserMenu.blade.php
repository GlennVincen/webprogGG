@extends('layouts.app')
@section('content')
<form action="{{url('/deleteUser')}}" method="post">
    {{csrf_field()}}
    <select name="id">
        @foreach($users as $user)
            <option value="{{$user['id']}}">{{$user['email']}}</option>
        @endforeach
    </select>
    <input type="submit" value="Delete User">
</form>
@endsection