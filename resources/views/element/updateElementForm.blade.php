@extends('layouts.app')
@section('content')
<form action="{{url('updateElement/'.$element->id)}}" method="post">
    {{csrf_field()}}
    <input type="text" id="elementName" name="elementName" placeholder="Element Name" value="{{$element->elementName}}">
    <input type="submit" value="Edit">

    @if ($errors->has('elementName'))
        <span class="help-block">
            <strong>{{ $errors->first('elementName') }}</strong>
        </span>
    @endif
</form>
    @endsection