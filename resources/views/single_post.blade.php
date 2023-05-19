@extends('layouts.app')

@section('content')

<div class="mt-4 mb-5">
    <h2>{{$postsDetails->title}}</h2>
    <p class="mb-3">{{$postsDetails->description}}</p>
    <h6>Author Name: <b>{{$postsDetails->author->name}}</b></h6>
    <h6>Category Name: <b>{{$postsDetails->category->name}}</b></h6>
    <small class="text-danger my-3">{{$postsDetails->updated_at}}</small>
</div>
<div class="">
    <h5>Comment *</h5>
    <form class=" w-50" action="{{route('commentPost', $postsDetails->category->id)}}" method="POST">
        @csrf
        <div class="form-outline my-4">
            <textarea class="form-control" name="comment" value="{{old('comment')}}" rows="2"></textarea>
            @error('comment')
              <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-warning btn-block mb-4">Post comment</button>
        </div>
    </form>
</div>
<hr>

@foreach ($postsComments as $postsComment)
    <div class="shadow p-3 mt-2">
        <p><b>{{$postsComment->user->name}}</b></p>
        <p>{{$postsComment->comment}}</p>
    </div>
@endforeach

@endsection
