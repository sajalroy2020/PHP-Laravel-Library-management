@extends('layouts.dashboard_app')

@section('content')
    <div class="d-flex align-item-center justify-content-between">
        <h5>Dashboard User page_</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add User
          </button>
    </div>
    <table class="table table-hover border mt-5 w-100">
        <thead class="bg-light shadow-sm">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Is active</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $user)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->user_name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->is_active == 0)
                        <span class="badge bg-danger">InActive</span>
                    @else
                        <span class="badge bg-success">Active</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('user_edit', $user->id)}}"><button class="btn btn-success mx-1">Edit</button></a>
                    <a href="{{route('user_destroy', $user->id)}}"><button class="btn btn-danger">Delete</button></a>
                </td>

            </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-2">User Data Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="mx-1 mx-md-4" action="{{route('signupStore')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="form-outline flex-fill mb-0">
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" />
                                      <label class="form-label" for="form3Example1c">Your First name</label>
                                      <br>
                                      @if ($errors->has('first_name'))
                                          <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                      @endif
                                    </div>
                                  </div>

                                  <div class="d-flex flex-row align-items-center mb-3">
                                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" />
                                        <label class="form-label" for="form3Example1c">Your Last name</label>
                                        <br>
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                      </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-3">
                                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" />
                                        <label class="form-label" for="form3Example1c">User Name</label>
                                        <br>
                                        @if ($errors->has('user_name'))
                                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                        @endif
                                      </div>
                                    </div>

                                  <div class="d-flex flex-row align-items-center mb-3">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                      <label class="form-label" for="form3Example3c">Your Email</label>
                                      <br>
                                      @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                    </div>
                                  </div>

                                  <div class="d-flex flex-row align-items-center mb-3">
                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <input type="password" class="form-control" name="password" />
                                      <label class="form-label" for="form3Example4c">Password</label>
                                      <br>
                                      @if ($errors->has('password'))
                                          <span class="text-danger">{{ $errors->first('password') }}</span>
                                      @endif
                                    </div>
                                  </div>

                                  <div class="d-flex flex-row align-items-center mb-3">
                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <input type="password" class="form-control" name="password_confirmation" />
                                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save user</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
