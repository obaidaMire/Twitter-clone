@auth()
<h4> @lang('ideas.Share_idea') </h4>
<div class="row">
    <form action="{{route('idea.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="idea" rows="3" name="content"></textarea>
            @error('content')
                <span class="d-block fs-5 text-danger mt-2"> {{$message}} </span>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> @lang('ideas.share') </button>
        </div>
    </form> 
</div>
@endauth
@guest
<h4>@lang('ideas.login_to_share')</h4>
    
@endguest