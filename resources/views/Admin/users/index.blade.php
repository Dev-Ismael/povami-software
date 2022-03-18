@extends('layouts.admin')
@section('content')
    <div id="users-page">

        <div class="all-users">

            <div class="table-heading">
                <div class="row">
                    <div class="col-6">
                        <h4> <i class="fa-solid fa-user"></i> Users</h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createUser">
                            <i class="fa-solid fa-circle-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> <i class="fa-solid fa-address-card"></i> name</th>
                            <th scope="col"> <i class="fa-solid fa-envelope"></i> email</th>
                            {{-- <th scope="col"> <i class="fa-solid fa-phone"></i> phone</th> --}}
                            <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td> {{ Str::ucfirst($user->name) }}</td>
                                <td> {{ $user->email }} </td>
                                {{-- <td>
                                    @if ($user->phone === null)
                                        <span class="null text-danger"> <i class="fa-solid fa-circle-xmark"></i> </span>
                                    @else
                                        {{ $user->phone }}
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="table-buttons">
                                        <button href="" type="button"  class="btn btn-secondary"><i class="fa-solid fa-eye"></i></button>
                                        <button href="" type="button"  class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button href="" type="button"  class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!---------- Add User Modal ------------>
    <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserLabel"> Create User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="create-user"  enctype="multipart/form-data">

                        @csrf

                        <label for="name"> User Name..</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Name.." />
                        <small class="form-text text-danger name">  </small> <!-- message is var in laravel -->
                        <br>

                        <label for="email"> User Email..</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email.." />
                        <small class="form-text text-danger email">  </small> <!-- message is var in laravel -->
                        <br>

                        <label for="phone"> User Phone..</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter Phone.." />
                        <small class="form-text text-danger phone">  </small> <!-- message is var in laravel -->
                        <br>

                        <label for="address"> User Address..</label>
                        <textarea type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter Address.." ></textarea>
                        <small class="form-text text-danger address">  </small> <!-- message is var in laravel -->
                        <br>
                        
                        <label for="password"> User Password..</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password.." />
                        <small class="form-text text-danger password">  </small> <!-- message is var in laravel -->
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="create-user" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
