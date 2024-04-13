@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email"
                   placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>


        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username"
                   required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="mssv"
                   placeholder="Mssv" required="required">
            <label for="floatingPassword">Mssv</label>
            @if ($errors->has('mssv'))
                <span class="text-danger text-left">{{ $errors->first('mssv') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password"
                   placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation"
                    placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="mb-3">
            <input type="file" class="form-control" id="formFile" name="avatar" placeholder="avatar" required="required">
            @if ($errors->has('avatar'))
                <span class="text-danger text-left">{{ $errors->first('avatar') }}</span>
            @endif
        </div>


        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>


    </form>
@endsection
