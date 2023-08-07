<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <style>
        a{
            text-decoration: none;
        }
        /* rating */
        .rating-css div {
            color: #ffc107;
            padding: 20px 0;
        }
        .rating-css input {
            display: none;
        }
        .rating-css input + label {
            font-size: 30px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }
        .rating-css input:checked + label ~ label {
            color: #b4afaf;
        }
        /* .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        } */
    /* End of Star Rating */
    </style>
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{route('home')}}" class="nav-link pr-3 text-white">Home</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex gap-1" action="{{route('search')}}" type="get">
              <input type="search" id="search" name="query" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
              {{-- <input type="text" id="search" name="search" placeholder="search..."> --}}
              <button type="submit" class="btn btn-success me-3">Search</button>
            </form>

            <div class="text-end">
                @guest
                    @if (Route::has('signin'))
                        <a href="{{route('signin')}}"><button type="button" class="btn btn-outline-light me-2">Sign-in</button></a>
                    @endif
                    @if (Route::has('signin'))
                        <a href="{{route('signup')}}"><button type="button" class="btn btn-warning">Sign-up</button></a>
                    @endif

                    @else

                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>{{ Auth::user()->user_name }}</b>
                        </button>
                        <ul class="dropdown-menu">
                            <div class="text-dark">
                                <a class="dropdown-item text-danger" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item text-danger" href="{{ route('profile') }}">
                                    {{ __('Favourite') }}
                                </a>
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
            </div>
          </div>
        </div>
      </header>


     <div class="mb-5">
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

            <div class="row">
                <div class="col-12 px-4 my-3">
                    <h5>Select Category</h5>
                    @forelse ($categories as $category)
                        <a href="{{route('categoryBook', $category->id)}}" class="btn btn-secondary">{{$category->name}}</a>
                    @empty
                        <h3 class="text-center py-4">No Category Found</h3>
                    @endforelse
                </div>
            </div>


            @yield('content')
        </div>
     </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    {{-- <script>
        $(document).on('keyup',function(e){
            e.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url:"{{route('search.ptoduct')}}",
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    $('.table-data').html(res);
                    if(res.status=='nothing_found'){
                        $('.table-data').html('<span>'+'no data'+'</span>')
                    }
                }
            })
        })
    </script> --}}
</body>
</html>
