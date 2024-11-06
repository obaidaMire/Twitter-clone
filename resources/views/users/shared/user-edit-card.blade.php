<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}" alt="{{$user->name}}">
                    <div>
                            <input type="text" value="{{$user->name}}" class="form-control" name="name">
                            @error('name')
                            <span class="d-block fs-5 text-danger mt-2"> {{$message}} </span>
                            @enderror
                    </div>
                </div>
                @if (Auth::id() === $user->id)
                <div>
                    <a href="{{route('users.show',$user->id)}}" class="btn btn-primary">Show</a>
                </div>
                @endif
            </div>
            <div class="mt-4">
                <label for="image">profile picture</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <span class="d-block fs-5 text-danger mt-2"> {{$message}} </span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea class="form-control" id="idea" rows="3" name="bio"  >{{$user->bio}}</textarea>
                    @error('bio')
                        <span class="d-block fs-5 text-danger mt-2"> {{$message}} </span>
                    @enderror
                </div>

                <button class="btn btn-dark btn-sm mb-3">Save</button>
                @include('users.shared.user-stats')
            </div>
        </form>
    </div>
</div>
<hr>