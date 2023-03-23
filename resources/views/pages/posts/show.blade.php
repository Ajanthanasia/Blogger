@extends('layouts.app')
@section('fullhometemp')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="card-body p-4 p-lg-5 text-black">
                <div class="text-center">
                    <img src="{{asset('storage/' . $post->post_img )}}" class="rounded img-thumbnail" id="post_id2" >
                </div>
            </div>
        </div>
        <div class="col-sm-8">

            <div class="card-body p-4 p-lg-5 text-black">
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="form2Example17">Post Heading</label>
                    </div>
                    <div class="col">
                        <label class="form-control">{{ $post->post_heading }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Post Description</label>
                    </div>
                    <div class="col">
                        <label class="form">{{ $post->description }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Total Likes</label>
                    </div>
                    <div class="col">
                        <label class="form-control">{{ $post->likes_count }}</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
