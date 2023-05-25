@extends('layouts.dashboard_app')

@section('content')
    <div class="d-flex align-item-center justify-content-between">
        <h5>Dashboard category Update_</h5>
        <a href="{{route('categoryStore')}}" class="btn btn-primary">Back</a>
    </div>

     <div>
        <div class="modal-dialog">
            <form action="{{route('categoryUpdate', $categoryEdit->id)}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center mb-3">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="form3Example1c">Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $categoryEdit->name) }}" />
                                <br>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
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
