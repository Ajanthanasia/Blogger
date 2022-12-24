@extends('layouts.app')
@section('hometemp')
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
                        <img src="{{ asset('storage/'.$post->post_img) }}" class="rounded img-thumbnail" id="post_id2" >
                    </div>
                </div>
            </div>
            <div class="col-sm-8">

                <div class="card-body p-4 p-lg-5 text-black">
                    <h3>Edit the Post</h3>
                        <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example17">Post Heading</label>
                                <input type="text" name="post_heading" value="{{$post->post_heading}}" id="form2Example17" class="form-control form-control-lg" />
                                @error('post_heading')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example17">Upload Image</label>
                                <input type="file" name="post_img" id="post_upload2" accept="image/*" value="{{$post->post_img}}" onchange="postUpdateUpload(event);"
                                    class="form-control form-control-lg" />
                                @error('post_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example17">Description</label>
                                <input type="text" name="description" value="{{$post->description}}" id="form2Example17" class="form-control form-control-lg" />
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-dark btn-lg btn-block" type="submit">Update</button>
                        </form>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-7 d-flex align-items-center">

    </div>
@endsection
