@extends('layout.layout')
@section('title','Ideas | Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        <h1>Ideas Dashboard </h1>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Likes</th>
                    <th>Created At</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ideas as $idea)
                <tr>
                    <td>{{$idea->id}}</td>
                    <td>
                        <a href="{{route('users.show',$idea->user->id)}}">
                            {{$idea->user->name}}
                        </a>
                    </td>
                    <td> {{$idea->content}} </td>
                    <td> {{$idea->likes()->count()}} </td>
                    <td> {{$idea->created_at->toDateString()}} </td>
                    <td>
                        <a class="btn btn-success" href="{{route('idea.show',$idea->id)}}">View</a>
                        <a class="btn btn-primary" href="{{route('idea.edit',$idea->id)}}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>
            {{$ideas->links()}}
        </div>
    </div>

</div>
@endsection