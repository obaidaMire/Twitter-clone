@extends('layout.layout')
@section('title',$user->name)

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        <hr>
        <div class="mt-3">
            @include('users.shared.user-card')
        </div>

        @if(count($ideas) > 0)
        @foreach ($ideas as $idea)
        <div class="mt-3">
            @include('ideas.shared.idea-card')
        </div>
        @endforeach
        @else
        <p class="text-center mt-4">No results Found</p>
        @endif
        <div class="mt-3">
            {{ $ideas->withQueryString()->links() }}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')

    </div>
</div>
@endsection
