<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followingIDs = auth()->user()->followings()->pluck("user_id");
        $ideas = idea::whereIn('user_id',$followingIDs)->latest()->paginate(5);
        // for search bar
        if(request()->has('search')) {
        $ideas = idea::search(request('search',''))
        ->paginate(5);
        }
        return view("dashboard", compact("ideas"));
    }
}
