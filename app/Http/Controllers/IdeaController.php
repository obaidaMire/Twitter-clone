<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $ideas = idea::orderBy("created_at","DESC")->paginate(5);

        // for search bar
        if(request()->has('search')) {
        $ideas = idea::search(request('search',''))->orderBy("created_at","DESC")
        ->paginate(5);
        }

        return view("dashboard", compact("ideas"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateIdeaRequest $request)
    {
        $inputs = $request->validated();

        $inputs['user_id'] = auth()->id();
        idea::create($inputs);

        return redirect()->route("idea.index")->with("success","idea created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(idea $idea)
    {
        
        return view("ideas.show", compact("idea"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(idea $idea)
    {
        // if(auth()->id() !== $idea->user_id) {
        //     return redirect()->route("idea.index")->with("error","You are not the owner of this post");
        // }
        $this->authorize("update", $idea);

        $edit = true;
        return view("ideas.show", compact("idea","edit"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, idea $idea)
    {
        // if(auth()->id() !== $idea->user_id) {
        //     return redirect()->route("idea.index")->with("error","You are not the owner of this post");
        // }
        $this->authorize("update", $idea);

        $inputs = $request->validated();
        $idea->update($inputs);

        return redirect()->route("idea.show",$idea->id)->with("success","idea Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(idea $idea)
    {
        // if(auth()->id() !== $idea->user_id) {
        //     return redirect()->route("idea.index")->with("error","You are not the owner of this post");
        // }
        $this->authorize("delete", $idea);
        $idea->delete();
        return redirect()->route("idea.index")->with("success","idea deleted successfully!");
    }
}
