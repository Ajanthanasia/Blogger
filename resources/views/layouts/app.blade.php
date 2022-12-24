<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/design.css">
    <link rel="stylesheet" href="/cardstyle.css">
    <link rel="stylesheet" href="/post_design.css">
    <link rel="stylesheet" href="/admin/user.css">
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">

    <script>
        function postUpload(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("post_id");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function postUpdateUpload(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("post_id2");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
{{-- Ajax J Query --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div>
        <section class="hight_home" style="background-color: #9A616D;">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col col-xl-10">
                        <nav class="navbar navbar-light homecard">
                            <a href="{{ route('home.index') }}" class="btn btn-primary btn-lg"> Home</a>

                            {{-- @if ( Auth::user()) --}}
                            @if(Auth::user() )
                                @if( Auth::user()->role == "user"  )
                                    <a href="{{ route('post.index') }}" class="btn btn-primary btn-lg">Posts</a>
                                @else
                                <a href="{{ route('admin_users.index') }}" class="btn btn-primary btn-lg">Users</a>
                                @endif
                                <a href="{{ route('profile.index') }}" class="circle"><img src="/userpic.png"
                                    class="circle_img" /></a>
                            @else
                                <a href="{{ route('user.create') }}" class="btn btn-primary btn-lg">Register</a>
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-lg">Login</a>
                            @endif
                        </nav>
                        <ul class="list-group hide">
                            <li class="list-group-item">An item</li>
                        </ul>
                        <div class="card" style="border-radius: 1rem;">
                            @yield('fullhometemp')
                            <div class="row g-0">
                                @yield('hometemp')
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                                <script src="{{ asset('ajax/like.js') }}" defer></script>
                                <script src="{{ asset('ajax/dislike.js') }}" defer></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
