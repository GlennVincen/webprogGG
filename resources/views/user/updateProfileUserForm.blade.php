<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile</title>
</head>
<body>
@extends('layouts.app')
@section('content')
    <h2>Profile</h2>
    <img src="{{asset('ProfileImages/' . $user->profilePicture)}}" alt="">
    <form action="{{url('/profileUpdate/'.$user->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group{{ $errors->has('profilePicture') ? ' has-error' : '' }}">

            <div class="col-md-2">
                <input id="profilePicture" type="file" class="form-control" name="profilePicture">

                @if ($errors->has('profilePicture'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('profilePicture') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br><br><br>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-1 control-label">E-Mail :</label>

            <div class="col-md-2">
                <input id="email" type="email" name="email" value="{{ $user['email'] }}">
<br>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="col-md-1 control-label">Gender : </label>

            <div class="col-md-2">
                <input type="radio" name="gender" value="Male" @if($user['gender'] == 'Male') checked @endif> Male<br>
                <input type="radio" name="gender" value="Female" @if($user['gender'] == 'Female') checked @endif> Female<br>
                <br>
                @if ($errors->has('gender'))
                    <span class="help-block">
                          <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
            <label for="dateOfBirth" class="col-md-1 control-label">Date of Birth :</label>

            <div class="col-md-2">
                <input id="dateOfBirth" type="text" name="dateOfBirth" value="{{ $user['dateOfBirth'] }}">
<br>
                @if ($errors->has('dateOfBirth'))
                    <span class="help-block">
                    <strong>{{ $errors->first('dateOfBirth') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <br>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-md-1 control-label">Address</label>

            <div class="col-md-2">
                <textarea id="address" type="text" name="address">{{ $user['address'] }}</textarea>
<br>
                @if ($errors->has('address'))
                    <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <br><br>
        <div class="col-md-2">
        <input type="submit" value="Edit">
        </div>
    </form>
@endsection
</body>
</html>