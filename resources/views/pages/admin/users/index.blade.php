@extends('layouts.app')
@section('fullhometemp')

<div class="card-body p-4 p-lg-5 text-black">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@foreach($users as $user)
    <div class="rounded" >
        <div class="row">

            <div class="col-md-4 text-center">
                <img class="text-center rounded-circle img-thumbnail" src="{{ url('./users/user.png') }}" alt="...">
            </div>
            <div class="col-md-8">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12 bg-secondary">
                        <label for="inputPassword6" class="col-form-label"> <i class="fa-solid fa-user"></i> {{ $user->name }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label"><i class="fa-regular fa-user"></i> @ {{  $user->username }}</label>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12 bg-secondary">
                        <label for="inputPassword6" class="col-form-label"><i class="fa-sharp fa-solid fa-envelope"></i> {{ $user->email }}</label>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6"><i class="fa-solid fa-pen-to-square"></i> {{ $user->posts_count }} Posts</div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 ">
                        <form method="post" action="{{ route('admin_users.destroy',$user->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="confirm('Are you Sure ?')">Delete User</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <div class="align-content-center">
        {{ $users->links() }}
    </div>
</div>

@endsection
