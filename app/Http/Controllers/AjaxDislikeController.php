<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostModel;
use App\Models\Like;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class AjaxDislikeController extends Controller
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
        //$post_id = $request->get('id');
        $post = PostModel::where('id','=',$request->get('id'))->first();
        $oldlike_table = Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first();

        if(empty($oldlike_table))
        {
            $like = new Like;
            $like->post_id = $post->id;
            $like->user_id = Auth::User()->id;
            $msg = 'Dislike Successed';

        }
        else
        {
            $like = $oldlike_table;
            if( $like->like == 1)
            {
                $msg = 'Dislike Successed from Like';
            }
            else
            {
                $msg = 'Already Disliked';
            }
        }
        $like->like = '0';
        $like->save();
        $post = PostModel::withCount([
            'likes',
            'likes as tlikes' =>function(Builder $query) {
                $query->where('like','1');
            },
            'likes as dlikes' =>function(Builder $query) {
                $query->where('like','0');
            }
            ])->with(['likes','likes.user'])->where('id',$request->get('id'))->first();
        $likes_count = $post->tlikes;
        $dislikes_count = $post->dlikes;
        return Response::json(['likes' => $likes_count,'dislikes'=>$dislikes_count,'id'=>$request->get('id'),'msg'=>$msg]);
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
    public function destroy(User $user)
    {
        //
    }
}
