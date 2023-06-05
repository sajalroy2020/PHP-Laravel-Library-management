@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card-body">
            <div class="card p-3 shadow-md">
                @forelse ($favourites as $favourite)
                    <a class="w-100" href="{{route('single_book', $favourite->id)}}">
                        <div class="card p-2 shadow-sm mt-2">
                            <div class="d-flex justify-content-between">
                                 <span>{{$favourite->book->title}}</span>
                                 <img src="{{ asset('cover/'.$favourite->book->book_image) }}" class="img-responsive rounded mb-2" style="width:50px" alt="" srcset="">
                                 <a href="{{route('favouriteDelete', $favourite->id)}}" class="btn btn-danger">x</a>
                            </div>
                         </div>
                    </a>
                @empty
                    <h5 class="text-danger text-center">No favourite data</h5>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mt-3">
            <div class="card-body text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid border p-2" style="width: 150px;">
                <h5 class="my-3">{{Auth::user()->user_name}}</h5>
                <p class="text-muted mb-1">Full Stack Developer</p>
                <p class="text-muted mb-4">{{Auth::user()->email}}</p>

            </div>
        </div>
    </div>
</div>
@endsection
