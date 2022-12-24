@extends('layouts.app')
@section('hometemp')
    <div class="col-md-6 col-lg-5 d-none d-md-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form"
            class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
    </div>
    <div class="col-md-6 col-lg-7 d-flex align-items-center">
        <div class="card-body p-4 p-lg-5 text-black">
            <form method="post" action="{{ route('check.store') }}">
                @csrf
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Blogger App</span>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="form2Example17"
                        class="form-control form-control-lg" />
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example27">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" id="form2Example27"
                        class="form-control form-control-lg" />
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                </div>
            </form>
            <a class="small text-muted" href="#!">Forgot password?</a>
            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('user.create') }}"
                    style="color: #393f81;">Register here</a></p>
            <a href="#!" class="small text-muted">Terms of use.</a>
            <a href="#!" class="small text-muted">Privacy policy</a>
        </div>
    </div>
@endsection
