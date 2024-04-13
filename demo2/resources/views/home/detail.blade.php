@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>User information</h1>

            <h2>Username: {{$user->username}}</h2>
            <h2>Email: {{$user->email}}</h2>

            <img width="100px" src="{{asset('storage/' . $user->avatar)}}" alt="">
            <br>
            <br>
            <a href="{{route('home.edit', ['user_id'=>$user->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('home.delete', ['user_id'=>$user->id])}}" class="btn btn-danger mx-3">Delete</a>
        @endauth

        @guest
            <p class="lead">Your viewing the detail page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
