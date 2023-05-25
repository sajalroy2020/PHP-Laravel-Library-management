@extends('layouts.dashboard_app')

@section('content')
    <div class="d-flex align-item-center justify-content-between">
        <h5>Dashboard Book Update_</h5>
        <a href="{{route('categoryStore')}}" class="btn btn-primary">Back</a>
    </div>

     <div>
        <div class="modal-dialog">
            <form action="{{route('bookUpdate', $editData->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <div class="form-outline flex-fill mb-0">
                                <div>
                                    <label class="form-label" for="form4Example1">Select Category</label>

                                    <select class="form-select p-2" name="category_id">
                                        <option selected>Open this select menu</option>
                                        @foreach ($categories as $category)
                                            <option class="py-2 my-3" {{old('category_id', $editData->category_id) == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label class="form-label" for="form3Example1c">Book Name</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $editData->title) }}" />
                                    <br>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label class="form-label" for="form3Example1c">Description</label>
                                    <textarea class="form-control" name="description" value="{{old('description')}}" id="form4Example3" rows="2">{{$editData->description}}</textarea>
                                    <br>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label class="form-label" for="form4Example1">Book Image</label>
                                    <img width="150" height="150px" src="{{ asset('cover/'.$editData->book_image) }}" alt="">
                                    <input type="file" name="book_image" class="form-control mt-1"  />
                                    @if ($errors->has('book_image'))
                                        <span class="text-danger">{{ $errors->first('book_image') }}</span>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <label class="form-label" for="form3Example1c">Author Name</label>
                                    <input class="form-control" name="author" value="{{old('author', $editData->author)}}" id="form4Example3" rows="4" />
                                    <br>
                                    @if ($errors->has('author'))
                                        <span class="text-danger">{{ $errors->first('author') }}</span>
                                    @endif
                                </div>
                                <input class="form-check-input me-2" name="publish_at" type="hidden" checked value="{{old('publish_at')}}" id="form4Example4" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
