<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,idea $idea) {
        comment::create([
            "idea_id"=> $idea->id,
            "content"=> $request['content'],
            'user_id'=> auth()->id(),
        ]);
        return redirect()->route("idea.show",$idea->id)->with("success","comment created successfully!");

    }
}
