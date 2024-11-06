@extends('layout.layout')
@section('title','Users | Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        @include('shared.success-message')
        <h1>Users Dashboard </h1>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Ideas Count</th>
                    <th>Joined At</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <a href="{{route('users.show',$user->id)}}">
                            {{$user->name}}
                        </a>
                    </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->ideas->count()}} </td>
                    <td> {{$user->created_at->toDateString()}} </td>
                    <td>
                        <a class="btn btn-success" href="{{route('users.show',$user->id)}}">View</a>
                        <hr>
                        <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                        <hr>
                        <a class="btn btn-danger" href="{{route('admin.users.delete',$user->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>
            {{$users->links()}}
        </div>
    </div>

</div>
@endsection