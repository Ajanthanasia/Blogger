@extends('layouts.app')
@section('fullhometemp')
    <div class="card-body p-4 p-lg-5 text-black">
        <div class="d-flex align-items-center mb-3 pb-1">
            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
            @if (Auth::User())
                <span class="h1 fw-bold mb-0">Hi, {{ Auth::user()->name }}</span>
            @endif
        </div>
        <h5 class="card-title">Welcome to Post App</h5>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (Auth::User() && Auth::user()->role == 'user')
            <h3>All Posts</h3>
        @endif

        @if (Auth::User() && Auth::user()->role == 'admin')
            <h3>Welcome to Admin DashBoard</h3>
        @endif

        {{-- @dump($count_likes)
            @foreach ($count_likes as $like)
                <h2>{{ $like->likes_count }}</h2>
            @endforeach --}}
        <label id="ajax_msg"></label>
        <input type="hidden" id="url" name="url" value="{{ route('ajaxlike.store') }}" />
        <input type="hidden" id="url_dis" name="url_dis" value="{{ route('ajax_dislike.store') }}" />

        @foreach ($posts as $post)
            {{-- @dump($post->toArray()) --}}
            <div class="container">
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

                        @if (Auth::User())
                            <div class="row">

                                <div class="col-md-2">
                                    <input type="hidden" class="post_id" value="{{ $post->id }}" />
                                    <button class="ajax_like" data-post_id="{{ $post->id }}"><i
                                            class="fa fa-2x fa-heart"></i></button>
                                    <span id="ajax_like_count_{{ $post->id }}"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                                        {{ $post->tlikes }}
                                        <span class="visually-hidden"></span>
                                    </span>
                                </div>

                                <div class="col-md-2">
                                    <input type="hidden" class="post_id" />
                                    <button class="ajax_dislike2" data-post_id="{{ $post->id }}"><i
                                            class="fa fa-2x fa-regular fa-heart"></i></button>
                                    <span id="ajax_dislike2_{{ $post->id }}"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white">
                                        {{ $post->dlikes }}
                                        <span class="visually-hidden"></span>
                                    </span>
                                </div>

                                @if (Auth::User() && Auth::user()->id == "$post->user_id")
                                    <div class="col-md-3">
                                        <a href="{{ route('post.edit', $post->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i>Edit
                                            Post</a>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="{{ route('post.destroy', $post->id) }}"
                                            onclick="confirm('Are you Sure want to Delete the Post?')"><i
                                                class="fa-solid fa-trash"></i>Delete Post</a>
                                    </div>
                                @endif

                                @if (Auth::User() && Auth::user()->role == 'admin')
                                    <div class="col-md-4">
                                        <form method="post" action="{{ route('admin_post.destroy', $post->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                onclick="confirm('Are you Sure want to Delete the Post?')"
                                                class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        @endif

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
