<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(Auth::User())
        {
            $id = $request->get('post');
            $post = PostModel::where('id','=',$id)->first();
            $like_table = Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
            if(empty($like_table))
            {
                $like = new Like;
                $like->post_id = $post->id;
                $like->user_id = Auth::User()->id;
                $like->like = '1';
                $like->save();

                return redirect()->route('home.index')->with('status','Liked is successfully.');
            }
            else {

                // dd($like_table);
                return redirect()->route('home.index')->with('status','You already liked this Post.');
            }
        }

        else
        {
            return redirect()->route('home.index')->with('status','Sign In your Account for Like.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function show(PostModel $postModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PostModel $postModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostModel $postModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostModel  $postModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $post = PostModel::where('id',$id)->first();
        $like_table = Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
        if(empty($like_table))
        {
            return redirect()->route('home.index')->with('status','You already disliked this Post.');
        }
        else {
            //$like = Like::where('post_id',$post->id)->first();
            $like_table->delete();
            return redirect()->route('home.index')->with('status','Disliked the post.');
        }
    }
    // }
    // else
    // {
    //     return redirect()->route('home.index')->with('status','Sign In your Account for Like.');
    // }
}
