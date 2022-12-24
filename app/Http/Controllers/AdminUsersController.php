<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostModel;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('posts')->where('role', 'user')->paginate(3)->withQueryString();
        // dd($users);
        return view('pages.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin_user)
    {
        $user = User::find($admin_user)->first();
        $posts = PostModel::where('user_id', $user->id)->get();
        $user_likes = Like::where('user_id', $user->id)->get();
        foreach ($posts as $post) {
            $likes = Like::where('post_id', $post->id)->get();
            foreach($likes as $like)
            {
                $like->delete();
            }
        }
        foreach($user_likes as $like)
        {
            $like->delete();
        }
        foreach($posts as $post)
        {
            $post->delete();
        }
        $user->delete();
        return back()->with('status', 'User Account & Its Posts Deleted successfully.!');
    }
}
