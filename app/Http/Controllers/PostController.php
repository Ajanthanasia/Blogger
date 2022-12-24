<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\PostModel;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostModel::withCount('likes')->with(['likes', 'likes.user'])->where('user_id', '=', Auth::user()->id)->paginate(3)->withQueryString();
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new PostModel;
        $post->user_id = $request->get('user_id');
        $post->post_heading = $request->get('post_heading');
        $post->description = $request->get('description');
        $post->likes = 0;
        //$post->save();
        // if ($request->file('post_img')) {
        //     $file = $request->file('post_img');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('posts'), $filename);
        //     $post['post_img'] = $filename;
        // }
        if ($request->file('post_img')) {
            $path = Storage::disk('public')->putFile('posts',$request->file('post_img'));
            $post->post_img = $path;
        }
        $post->save();
        return redirect()->route('post.index')->with('status', 'Post is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(PostModel $post)
    {
        $post = PostModel::withCount('likes')->with(['likes', 'likes.user'])->where('id',$post->id)->first();
        //dd($post);
        return view('pages.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(PostModel $post)
    {
        return view('pages.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, PostModel $post)
    {
        $post->post_heading = $request->get('post_heading');
        $post->description = $request->get('description');
        $post->save();
        // if ($request->file('post_img')) {
        //     $file = $request->file('post_img');
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('posts'), $filename);
        //     $post['post_img'] = $filename;
        // }
        if ($request->file('post_img')) {
            $path = Storage::disk('public')->putFile('posts',$request->file('post_img'));
            $post->post_img = $path;
        }
        $post->save();
        return redirect()->route('post.index')->with('status', 'Post is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostModel $post)
    {
        $likes = Like::where('post_id',$post->id)->get();
        foreach($likes as $like)
        {
            $like->delete();
        }
        $post->delete();
        return redirect()->route('post.index')->with('status','Post is deleted successfully.');
    }
}
