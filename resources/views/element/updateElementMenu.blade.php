@extends('layouts.app')
@section('content')
    <form action="{{url('updateElement/getElementId')}}" method="get">
        <select name="id">
            @foreach($elements as $element)
                <option value="{{$element['id']}}">{{$element['elementName']}}</option>
            @endforeach
        </select>
        <input type="submit" value="Search">
    </form>
    @endsection