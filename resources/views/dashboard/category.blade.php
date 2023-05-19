@extends('layouts.dashboard_app')

@section('content')
    <div class="d-flex align-item-center justify-content-between">
        <h5>Dashboard category page_</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Category
          </button>
    </div>
    <table class="table table-hover border mt-5 w-75">
        <thead class="bg-light shadow-sm">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Category name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $key => $category)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('category_edit', $category->id)}}"><button class="btn btn-success mx-1">Edit</button></a>
                    <a href="{{route('category_destroy', $category->id)}}"><button class="btn btn-danger">Delete</button></a>
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
            <form action="{{route('categoryStore')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                <br>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
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
