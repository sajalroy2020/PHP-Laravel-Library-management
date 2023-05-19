<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>dashboard</title>
    <style>
        a{
            text-decoration: none;
            font-size: 19px;
            color: #444343;
        }
        .dashboard-sidebar{
            width: 300px;
            height: 90vh;
        }
    </style>
</head>
<body>
    <div class="d-flex m-1">
        <div class="dashboard-sidebar p-3 shadow">
            <h4> Dashboard</h4>
            <hr>
            <ul>
                <li class="pt-2"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                <li class="pt-2"><a href="{{route('user')}}">User</a></li>
                <li class="pt-2"><a href="{{route('category')}}">Category</a></li>
                <li class="pt-2"><a href="">Books</a></li>
            </ul>
        </div>
        <div class="w-100 mt-2">
            <div class="shadow-sm d-flex justify-content-end align-item-center p-2">
                @guest
                    @if (Route::has('signin'))
                        <a href="{{route('signin')}}"><button type="button" class="btn btn-outline-light me-2">Sign-in</button></a>
                    @endif
                    @if (Route::has('signin'))
                        <a href="{{route('signup')}}"><button type="button" class="btn btn-warning">Sign-up</button></a>
                    @endif

                    @else

                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>{{ Auth::user()->user_name }}</b>
                        </button>
                        <ul class="dropdown-menu">
                            <div class="text-dark">
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </ul>
                    </div>
                @endguest
                <hr>
            </div>
            <div class="mb-2">
                <div class="container">
                    @if(session()->has('SUCCESS_MESSAGE'))
                        <div class="alert alert-success mt-2">
                            {{ session()->get('SUCCESS_MESSAGE') }}
                        </div>
                    @endif
                    @if(session()->has('ERROR_MESSAGE'))
                        <div class="alert alert-danger mt-2">
                            {{ session()->get('ERROR_MESSAGE') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
