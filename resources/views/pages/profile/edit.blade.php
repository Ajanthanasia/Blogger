@extends('layouts.app')
@section('hometemp')
    <div class="col-md-6 col-lg-5 d-none d-md-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form"
            class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
    </div>
    <div class="col-md-6 col-lg-7 d-flex align-items-center">
        <div class="card-body p-4 p-lg-5 text-black">
            <form method="post" action="{{ route('profile.update',Auth::User()->id) }}">
                @method('PUT')
                @csrf
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Blogger App</span>
                </div>

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Edit your account</h5>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Name</label>
                    <input type="text" name="name" value="{{ Auth::User()->name }}" id="form2Example17"
                        class="form-control form-control-lg" />
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">User Name</label>
                    <input type="text" name="username" value="{{ Auth::User()->username }}" id="form2Example17"
                        class="form-control form-control-lg" />
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Email address</label>
                    <input type="email" name="email" value="{{ Auth::User()->email }}" id="form2Example17"
                        class="form-control form-control-lg" />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




                <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" type="button">Update Profile</button>
                </div>
            </form>
            <p class="mb-5 pb-lg-2" style="color: #393f81;">No changes then click here : <a href="{{ route('home.index') }}"
                    style="color: #393f81;">Back</a></p>
        </div>
    </div>
@endsection
