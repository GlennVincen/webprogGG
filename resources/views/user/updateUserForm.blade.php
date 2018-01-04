<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h3>Update User</h3>
<img src="{{asset('ProfileImages/' . $user->profilePicture)}}" alt="">
<form action="{{url('/updateUser/'.$user->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group{{ $errors->has('profilePicture') ? ' has-error' : '' }}">

        <div class="col-md-6">
            <input id="profilePicture" type="file" class="form-control" name="profilePicture">

            @if ($errors->has('profilePicture'))
                <span class="help-block">
                                        <strong>{{ $errors->first('profilePicture') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail :</label>

        <div class="col-md-6">
            <input id="email" type="email" name="email" value="{{ $user->email }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
        <label for="gender" class="col-md-4 control-label">Gender : </label>

        <div class="col-md-6">
            <input type="radio" name="gender" value="Male"> Male<br>
            <input type="radio" name="gender" value="Female"> Female<br>

            @if ($errors->has('gender'))
                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
        <label for="dateOfBirth" class="col-md-4 control-label">Date of Birth :</label>

        <div class="col-md-6">
            <input id="dateOfBirth" type="text" name="dateOfBirth" value="{{ old('dateOfBirth') }}">

            @if ($errors->has('dateOfBirth'))
                <span class="help-block">
                    <strong>{{ $errors->first('dateOfBirth') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">Address</label>

        <div class="col-md-6">
            <textarea id="address" type="text" name="address">{{ old('address') }}</textarea>

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <input type="submit" value="Edit">
</form>
</body>
</html>