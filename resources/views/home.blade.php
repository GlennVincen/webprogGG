@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!<br>
                    @if(Auth::user()->role == 'Admin')
                        Admin<br>

                    @elseif(Auth::user()->role == 'User')
                        User<br>

                    @elseif(Auth::guest())
                        Guest<br>

                    @endif
                    <!--Show Current Date-->
                    {{$carbon}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
