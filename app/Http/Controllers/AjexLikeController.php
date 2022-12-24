<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostModel;
use App\Models\Like;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class AjexLikeController extends Controller
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
        $data = $request->validate([
            'id' => 'required',
        ]);
        $post_id = $request->get('id');
        $post = PostModel::where('id', '=', $post_id)->first();
        $oldlike_table = Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();

        if (empty($oldlike_table)) {
            $like_table = new Like;
            $like_table->post_id = $post->id;
            $like_table->user_id = Auth::User()->id;

            $msg = 'Liked Success';
        } else {
            $like_table = $oldlike_table;

            if ($oldlike_table->like == 0) {
                $msg = 'Liked Success from Disliked';
            } else {
                $msg = 'Already Liked';
            }
        }

        $like_table->like = '1';
        $like_table->save();

        $post = PostModel::withCount([
            'likes',
            'likes as tlikes' => function (Builder $query) {
                $query->where('like', '1');
            },
            'likes as dlikes' => function (Builder $query) {
                $query->where('like', '0');
            }
        ])->with(['likes', 'likes.user'])->where('id', $request->get('id'))->first();

        $count_likes = $post->tlikes;
        $count_dislikes = $post->dlikes;


        return Response::json(['likes' => $count_likes, 'dislikes' => $count_dislikes, 'id' => $request->get('id'), 'msg' => $msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(PostModel $post)
    {
        // if(Auth::User())
        // {
        //     $like_table = Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();
        //     if(empty($like_table))
        //     {
        //         $like = new Like;
        //         $like->post_id = $post->id;
        //         $like->user_id = Auth::User()->id;
        //         $like->like = '1';
        //         $like->save();
        //         // return redirect()->route('home.index')->with('status','Liked is successfully.');
        //         return Response::json()
        //     }
        //     else {
        //         return redirect()->route('home.index')->with('status','You already liked this Post.');
        //     }
        // }
        // else
        // {
        //     return redirect()->route('home.index')->with('status','Sign In your Account for Like.');
        // }
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
    public function destroy($id)
    {

        // $id = $request->get('id');
        $post = PostModel::where('id', '=', $id)->first();
        $like_table = Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();

        if (empty($like_table)) {
            $post = PostModel::withCount('likes')->with(['likes', 'likes.user'])->where('id', $id)->first();
            $count = $post->likes_count;
            return Response::json(['status' => $count, 'msg' => 'Already Disliked']);
        } else {

            $like_table->delete();
            $post = PostModel::withCount('likes')->with(['likes', 'likes.user'])->where('id', $id)->first();
            $count = $post->likes_count;
            return Response::json(['status' => $count, 'msg' => 'Disliked Success']);
        }
    }
}
