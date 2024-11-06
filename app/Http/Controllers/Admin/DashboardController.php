<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index() {

        // if (!Gate::allows("admin")) {
        //     return abort(403);
        // }
        #2
        // if (!Gate::denies("admin")) {
        //     return abort(403);
        // }
        #3
        // $this->authorize("admin"); 

        return view("admin.dashboard");
    }

    public function users()
    {
        $users = User::latest()->paginate(5);
        return view("admin.users.index" ,compact("users"));
    } 

    public function ideas() {
        $ideas = idea::latest()->paginate(5);
        return view("admin.ideas.index",compact("ideas"));
    }

    public function comments()
    {
        $comments = comment::latest()->paginate(5);
        return view("admin.comments.index",compact("comments"));
    }

    public function CommentDelete(comment $comment) {
        $comment->delete();
        return redirect()->back()->with("success","Comment Deleted successfully");
    }
    
    public function UserDelete(User $user) {
        $user->delete();
        return redirect()->back()->with("success","User Deleted successfully");
    }
}
