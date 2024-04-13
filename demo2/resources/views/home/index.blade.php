@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>User List</h1>
            <table>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mssv</th>
                    <th>Avatar</th>
                    <th>Thao tác</th>
                </tr>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mssv}}</td>

                        <td><img width="50px" src="{{asset('storage/' . $user->avatar)}}" alt=""></td>
                        <td><a href="{{route('home.detail', ['user_id'=>$user->id])}}">View</a> |
                            <a href="{{route('home.edit', ['user_id'=>$user->id])}}">Edit</a> |
                            <a href="{{route('home.delete', ['user_id'=>$user->id])}}">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            <div class="pagination mt-3 d-flex justify-content-center">
                {{ $users->links() }}
            </div>

        @endauth

        @guest
            <h1>Homepage</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
