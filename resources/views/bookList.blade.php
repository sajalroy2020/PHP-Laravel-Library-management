@extends('layouts.app')

@section('content')

    <div class="row">
        @forelse ($categoryBooks as $categoryBook)
        {{-- <h1 class="my-4 text-center">{{$categoryBook->category->name}}</h1> --}}
            <div class="col-md-4">
                <div class="card-body">
                    <div class="card shadow p-4">
                        <h4>{{$categoryBook->title}}</h4>
                        <div class="my-2">
                            <img src="{{ asset('cover/'.$categoryBook->book_image) }}" class="img-responsive" style="max-height:150px; width:100%" alt="" srcset="">
                        </div>
                        <p class="mb-3">{{$categoryBook->description}}</p>
                        <h6>Author Name: <b class="text-primary">{{$categoryBook->author}}</b></h6>
                        <h6>Category : <b>{{$categoryBook->category->name}}</b></h6>
                        <small class="text-danger my-3">{{$categoryBook->updated_at}}</small>
                        <a class="btn btn-success" href="{{route('single_book', $categoryBook->id)}}">See more...</a>
                    </div>
                </div>
            </div>
        @empty
            <h3 class="text-center py-4">No Data Found</h3>
        @endforelse
    </div>

    {{-- <div class="row">
        @forelse ($books as $book)
            <div class="col-md-4">
                <div class="card-body">
                    <div class="card shadow p-4">
                        <h4>{{$book->title}}</h4>
                        <div class="my-2">
                            <img src="{{ asset('cover/'.$book->book_image) }}" class="img-responsive" style="max-height:150px; width:100%" alt="" srcset="">
                        </div>
                        <p class="mb-3">{{$book->description}}</p>
                        <h6>Author Name: <b class="text-primary">{{$book->author}}</b></h6>
                        <h6>Category : <b>{{$book->category->name}}</b></h6>
                        <small class="text-danger my-3">{{$book->updated_at}}</small>
                        <a class="btn btn-success" href="{{route('single_book', $book->id)}}">See more...</a>
                    </div>
                </div>
            </div>
        @empty
            <h3 class="text-center py-4">No Data Found</h3>
        @endforelse
    </div> --}}
@endsection

