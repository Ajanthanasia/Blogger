@extends('layouts.app')
@section('fullhometemp')
    <div class="card-body p-4 p-lg-5 text-black">
        <h3>My Posts</h3>
        <a href="{{ route('post.create') }}" class="link_post"><i class="fa-solid fa-pen-to-square"></i> New Post</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @foreach ($posts as $post)
            <div class="rounded">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <a href="{{ route('post.show', $post->id) }}">

                            <img class="rounded mx-auto d-block img-thumbnail"
                                src="{{ asset('storage/' . $post->post_img) }}" alt="Post Pic" />

                        </a>
                    </div>
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-3">
                                <p class="card-text">TItle : </p>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text">{{ $post->post_heading }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p class="card-text">Description : </p>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text">{{ $post->description }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p class="card-text">Likes :</p>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text">{{ $post->likes_count }}</p>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-3">
                                <a href="{{ route('post.edit', $post->id) }}"><i class="fa-solid fa-pen-to-square"></i>Edit
                                    Post</a>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('post.destroy', $post->id) }}"
                                    onclick="confirm('Are you Sure want to Delete the Post?')"><i
                                        class="fa-solid fa-trash"></i>Delete Post</a>
                            </div>

                        </div>


                    </div>
                </div>
                <br>
            </div>
        @endforeach
        <br />
        <div class="align-content-center">
            {{ $posts->links() }}
        </div>


    </div>
@endsection
