@extends('layouts.app')
@section('hometemp')
    <div class="col-md-6 col-lg-5 d-none d-md-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form"
            class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
    </div>
    <div class="col-md-6 col-lg-7 d-flex align-items-center">
        <div class="card-body p-4 p-lg-5 text-black">
            <form method="post" action="{{ route('password.update',Auth::User()->id) }}">
                @method('PUT')
                @csrf
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Blogger App</span>
                </div>

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Change Your Password</h5>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Current Password</label>
                    <input type="password" name="old_password" id="form2Example17" class="form-control form-control-lg" />
                    @error('old_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">New Password</label>
                    <input type="password" name="password" id="form2Example17" class="form-control form-control-lg" />
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example17">Confirm Password</label>
                    <input type="password" name="confirm_password" id="form2Example17"
                        class="form-control form-control-lg" />
                    @error('confirm_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




                <div class="pt-1 mb-4">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" type="button">Change Password</button>
                </div>
            </form>
            <p class="mb-5 pb-lg-2" style="color: #393f81;">No changes then click here : <a
                    href="{{ route('profile.index') }}" style="color: #393f81;">Back</a></p>
        </div>
    </div>
@endsection
