@extends('layouts.app')
@section('hometemp')
    <div class="col-md-6 col-lg-5 d-none d-md-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form"
            class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
    </div>
    <div class="col-md-6 col-lg-7 d-flex align-items-center">
        <div class="card-body p-4 p-lg-5 text-black">


            <div class="d-flex align-items-center mb-3 pb-1">
                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                <span class="h1 fw-bold mb-0">Blogger App</span>
            </div>


            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Manage your account</h5>
            <a href="{{ route('post.index') }}" class="btn btn-primary btn-lg btn-block">My Posts</a>
            <a href="{{ route('profile.edit',Auth::User()->id) }}" class="btn btn-info btn-lg btn-block">Change Profile</a>
            <a href="{{ route('password.edit',Auth::User()->id) }}" class="btn btn-success btn-lg btn-block">Change Password</a>
            {{-- <a href="{{ route('profile.destroy',Auth::User()->id) }}" class="btn btn-danger btn-lg btn-block">Logout</a> --}}
            <form method="post" action="{{ route('profile.destroy',Auth::User()->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-lg btn-block">Logout</button>
            </form>


        </div>
    @endsection
