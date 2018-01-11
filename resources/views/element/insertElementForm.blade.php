<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Element</title>
</head>
<body>
@extends('layouts.app')
@section('content')
<form action="{{url('insertElement')}}" method="post">
    {{csrf_field()}}
    <input type="text" id="elementName" name="elementName" placeholder="Element Name">
    <input type="submit" value="Insert Element">

    @if ($errors->has('elementName'))
        <span class="help-block">
            <strong>{{ $errors->first('elementName') }}</strong>
        </span>
    @endif
</form>
    @endsection
</body>
</html>