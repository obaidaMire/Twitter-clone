@extends('layout.layout')
@section('title','Comments | Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        @include('shared.success-message')
        <h1>Comments Dashboard </h1>
        @if (!$comments->count() > 0)
        <p class="text-center mt-4">No Comments Found</p>
        @else
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Idea</th>
                    <th>Created At</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td> 
                        <a href="{{route('users.show',$comment->user->id)}}">
                            {{$comment->user->name}}
                        </a>
                    </td>
                    <td> {{$comment->content}} </td>
                    <td>
                        <a href="{{route('idea.show',$comment->idea->id)}}">
                            {{$comment->idea->id}}
                        </a>
                    </td>
                    <td> {{$comment->created_at->toDateString()}} </td>
                    <td>
                        <a class="btn btn-danger" href="{{route('admin.comments.delete',$comment->id)}}">Delete</a>
                </tr>
                @endforeach
            </tbody>
        </table>
                @endif
        <div>
            {{$comments->links()}}
        </div>
    </div>

</div>
@endsection