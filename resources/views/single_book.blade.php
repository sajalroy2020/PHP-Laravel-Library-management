@extends('layouts.app')

@section('content')

<div class="mt-4 mb-3">
    <img src="{{ asset('cover/'.$singleBook->book_image) }}" class="img-responsive rounded mb-2" style="width:auto" alt="" srcset="">
    <div class="mb-4 d-flex align-items-center">
        <h5 class="me-4"> Add to Favourite-</h5>

        @if ($favourite)
            <button type="submit" class="border-0 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"    style="width:30px; color:red;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
            </button>
        @else
            <form action="{{route('favouriteStore')}}" method="POST" class="py-2 px-1 rounded-circle shadow border">
                @csrf
                <input type="hidden" name="book_id" value="{{$singleBook->id}}">
                <button type="submit" class="border-0 bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"    style="width:30px; color:rgb(48, 47, 47);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>
            </form>
        @endif

    </div>
    <h2>{{$singleBook->title}}</h2>
    <p class="mb-3">{{$singleBook->description}}</p>
    <h6>Author Name: <b>{{$singleBook->author}}</b></h6>
    <h6>Category Name: <b>{{$singleBook->category->name}}</b></h6>
    <small class="text-danger my-3">{{$singleBook->updated_at}}</small>
</div>

<div class="">
    <hr>
    <h5> Review *</h5>
    <form class="w-50" action="{{route('reviewStore')}}" method="POST">
        @csrf
        <div class="form-outline my-4">
            <input type="hidden" name="book_id" value="{{$singleBook->id}}">
            <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
                @error('rating')
                <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
            <textarea class="form-control" name="comment" value="{{old('comment')}}" rows="2"></textarea>
            @error('comment')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-warning btn-block mb-4">Review</button>
        </div>
    </form>
</div>
<hr>

@foreach ($reviewes as $review)
    <div class="shadow p-3 mt-2">
        <p><b>{{$review->author->user_name}}</b></p>
        <span class="fa fa-star @if ($review->rating >= '1') text-danger @endif"></span>
        <span class="fa fa-star @if ($review->rating >= '2') text-danger @endif"></span>
        <span class="fa fa-star @if ($review->rating >= '3') text-danger @endif"></span>
        <span class="fa fa-star @if ($review->rating >= '4') text-danger @endif"></span>
        <span class="fa fa-star @if ($review->rating >= '5') text-danger @endif"></span>
        <p>{{$review->comment}}</p>
    </div>
@endforeach

@endsection
