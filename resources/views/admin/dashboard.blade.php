@extends('layout.layout')
@section('title','Admin Dashboard')

@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        <h1>Admin dashboard</h1>
    </div>

</div>
@endsection
