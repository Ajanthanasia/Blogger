@extends('layouts.app')
@section('hometemp')
<div class="container">
    <div class="row">
        <div class="col">

            <div class="card-body p-4 p-lg-5 text-black">
            <h3>Create a New Post</h3>
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example17">Post Heading</label>
                        <input type="text" name="post_heading" id="form2Example17"
                            class="form-control form-control-lg" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example17">Upload Image</label>
                        <input type="file" name="post_img" id="post_upload" accept="image/*"
                            onchange="postUpload(event);" class="form-control form-control-lg" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-center p-2">
                            <img class="rounded img-thumbnail  w-25" id="post_id" >
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example17">Description</label>
                        <input type="text" name="description" id="form2Example17" class="form-control form-control-lg" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />

                    <button class="btn btn-dark btn-lg btn-block" type="submit">Create</button>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection
