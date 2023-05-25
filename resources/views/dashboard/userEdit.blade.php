@extends('layouts.dashboard_app')

@section('content')
    <div class="d-flex align-item-center justify-content-between">
        <h5>Dashboard User Edit_</h5>
        <a href="{{route('user')}}" class="btn btn-primary">Back</a>
    </div>
    <!-- Modal -->
        <div class="modal-dialog w-75">
            <form class="mx-1 mx-md-4" action="{{route('signupStore')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="form-outline flex-fill mb-0">
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                    <div class="form-outline flex-fill mb-0">
                                      <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $editUser->first_name) }}" />
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
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $editUser->last_name) }}" />
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
                                        <input type="text" class="form-control" name="user_name" value="{{ old('user_name', $editUser->user_name) }}" />
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
                                      <input type="email" class="form-control" name="email" value="{{ old('email', $editUser->email) }}" />
                                      <label class="form-label" for="form3Example3c">Your Email</label>
                                      <br>
                                      @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                    </div>
                                  </div>

                                  {{-- <div class="d-flex flex-row align-items-center mb-3">
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
                                  </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
@endsection
