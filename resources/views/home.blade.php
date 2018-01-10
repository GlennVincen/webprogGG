@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome to PokeMart,<br>
                    @if(Auth::guest())
                    @elseif(Auth::user()->role == 'Admin')
                        Admin<br>

                    @elseif(Auth::user()->role == 'Member')
                        Member<br>

                    @endif
                    <!--Show Current Date-->
                    {{$carbon}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
