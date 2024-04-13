@extends('layouts.app-master')

@section('content')
    <form method="post" action="{{ route('home.edited',['user_id' => $user->id]) }}" enctype="multipart/form-data">

{{--        <input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
        @csrf
        @method('PUT')


        <h1 class="h3 mb-3 fw-normal">Edit User</h1>
        <h2>Username: {{$user->username}}</h2>
        <h2>Email: {{$user->email}}</h2>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ $user->name}}" placeholder="Name" required="required" autofocus>
            <label for="floatingEmail">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>


        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="mb-3">
            <input type="file" class="form-control" id="formFile" name="avatar" placeholder="avatar" >
            @if ($errors->has('avatar'))
                <span class="text-danger text-left">{{ $errors->first('avatar') }}</span>
            @endif
        </div>


        <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>


    </form>
@endsection
