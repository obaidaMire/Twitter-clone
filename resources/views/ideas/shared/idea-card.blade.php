<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a class="text-decoration-none" href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{route('idea.destroy',$idea->id)}}" method="post">
                    @method('delete')
                    @csrf
                        <a href="{{route('idea.show',$idea->id)}}" class="btn btn-success">view</a>
                        @auth()
                            {{-- @if (auth()->user()->id === $idea->user_id) --}}
                            @can('update', $idea)
                            <a href="{{route('idea.edit',$idea->id)}}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger btn-sm">X</button>
                            @endcan
                            {{-- @endif --}}
                        @endauth
                </form> 
            </div>
        </div>
    </div>     
    <div class="card-body">
        @if ($edit ?? false)
        <form action="{{route('idea.update',$idea->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <textarea class="form-control" id="idea" rows="3" name="content">{{$idea->content}}</textarea>
                @error('content')
                    <span class="d-block fs-5 text-danger mt-2"> {{$message}} </span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark mb-3"> Update </button>
            </div>
        </form> 
        @else
        <p class="fs-6 fw-light text-muted">
            {{$idea->content}}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                {{$idea->created_at->diffForHumans()}} </span>
            </div>
        </div>
        @include("ideas.shared.comments")
    </div>
    
</div>