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