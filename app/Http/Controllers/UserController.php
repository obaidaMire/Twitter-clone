<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view("users.show", compact('user','ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $edit = true;
        $ideas = $user->ideas()->paginate(5);
        return view("users.edit", compact('user','edit','ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // بقدر من جوا ال request
        $this->authorize('update', $user);

        $inputs = $request->validated();

        if($request->has('image')) {
            $imagepath = $request->file('image')->store('profile','public');
            $inputs['image'] = $imagepath;

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        $user->update($inputs); 
        return redirect()->route('profile')->with('success','Updated');
    }

    public function follow(User $user) {
        $follower = auth()->user();

        $follower->followings()->attach($user);

        return redirect()->route('users.show',$user->id)
        ->with('success','Followed Successfully!');
    }

    public function unfollow(User $user) {
        $follower = auth()->user();

        $follower->followings()->detach($user);

        return redirect()->route('users.show',$user->id)
        ->with('success','UnFollowed Successfully!');
    }

    public function profile() {
        return $this->show(auth()->user());
    }


}
