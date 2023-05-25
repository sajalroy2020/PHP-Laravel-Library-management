@extends('layouts.dashboard_app')

@section('content')
    <div class="d-flex align-item-center justify-content-between">
        <h5>Dashboard Book page_</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Book
          </button>
    </div>
    <table class="table table-hover border mt-5 w-100">
        <thead class="bg-light shadow-sm">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">author</th>
            <th scope="col">Category</th>
            <th scope="col">Create date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $key => $book)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$book->title}}</td>
                <td>
                    <img src="{{ asset('cover/'.$book->book_image) }}" class="img-responsive" style="max-height:100px; width:30%" alt="" srcset="">
                </td>
                <td>{{$book->author}}</td>
                <td>{{$book->category->name}}</td>
                <td>{{$book->publish_at}}</td>
                <td>
                    <a href="{{route('book_edit', $book->id)}}"><button class="btn btn-success mx-1">Edit</button></a>
                    <a href="{{route('book_destroy', $book->id)}}"><button class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-2">No Data Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('bookStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <div class="form-outline flex-fill mb-0">
                                <div>
                                    <label class="form-label" for="form4Example1">Select Category</label>

                                    <select class="form-select p-2" name="category_id">
                                        <option selected>Open this select category</option>
                                        @foreach ($categories as $category)
                                            <option class="py-2 my-3" {{old('category_id' == $category->id ? 'selected' : '')}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label class="form-label" for="form3Example1c">Book Name</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" />
                                    <br>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label class="form-label" for="form3Example1c">Description</label>
                                    <textarea class="form-control" name="description" value="{{old('description')}}" id="form4Example3" rows="2"></textarea>
                                    <br>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label class="form-label" for="form4Example1">Book Image</label>
                                    <input type="file" name="book_image" class="form-control"  />
                                    @if ($errors->has('book_image'))
                                        <span class="text-danger">{{ $errors->first('book_image') }}</span>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <label class="form-label" for="form3Example1c">Author Name</label>
                                    <input class="form-control" name="author" value="{{old('author')}}" id="form4Example3" rows="4" />
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
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
