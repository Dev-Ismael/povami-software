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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createUserModal">
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
                            <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td> {{ Str::ucfirst($user->name) }}</td>
                                <td> {{ $user->email }} </td>
                                <td>
                                    <div class="table-buttons">
                                        <button type="button" id="show-user" class="btn btn-secondary" data-toggle="modal" data-target="#showUserModal" user_id="{{ $user->id }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" id="edit-user" class="btn btn-info" data-toggle="modal" data-target="#editUserModal" user_id="{{ $user->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" id="delete-user" class="btn btn-danger" user_id="{{ $user->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!---------- Edit User Modal ------------>
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel"> edit User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-user" enctype="multipart/form-data">

                        <input type="hidden" name="id">

                        <label for="name"> <i class="fa-solid fa-user"></i> User Name..</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                        <small class="form-text text-danger name"> </small> 
                        <br>

                        <label for="email"> <i class="fa-solid fa-envelope"></i> User Email..</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email.." />
                        <small class="form-text text-danger email"> </small> 
                        <br>

                        <label for="phone"> <i class="fa-solid fa-phone"></i> User Phone..</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone.." />
                        <small class="form-text text-danger phone"> </small> 
                        <br>

                        <label for="address"> <i class="fa-solid fa-address-card"></i> User Address..</label>
                        <textarea type="text" name="address" class="form-control" placeholder="Enter Address.."></textarea>
                        <small class="form-text text-danger address"> </small> 
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="button" id="update-user" class="btn btn-primary"> Save </button>
                </div>
            </div>
        </div>
    </div>


    <!---------- Add User Modal ------------>
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserLabel"> Create User </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-user" enctype="multipart/form-data">


                        <label for="name"> <i class="fa-solid fa-user"></i> User Name..</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                        <small class="form-text text-danger name"> </small> 
                        <br>

                        <label for="email"> <i class="fa-solid fa-envelope"></i> User Email..</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email.." />
                        <small class="form-text text-danger email"> </small> 
                        <br>

                        <label for="phone"> <i class="fa-solid fa-phone"></i> User Phone..</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone.." />
                        <small class="form-text text-danger phone"> </small> 
                        <br>

                        <label for="address"> <i class="fa-solid fa-address-card"></i> User Address..</label>
                        <textarea type="text" name="address" class="form-control" placeholder="Enter Address.."></textarea>
                        <small class="form-text text-danger address"> </small> 
                        <br>

                        <label for="password"> <i class="fas fa-lock" aria-hidden="true"></i> User Password..</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password.." />
                        <small class="form-text text-danger password"> </small> 
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="button" id="create-user" class="btn btn-primary"> Save </button>
                </div>
            </div>
        </div>
    </div>

    <!---------- Show User Modal ------------>
    <div class="modal fade" id="showUserModal" tabindex="-1" role="dialog" aria-labelledby="showUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showUserModalLabel">User Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="get_info name">
                        <p class="heading"> <i class="fa-solid fa-user"></i> Username : </p>
                        <p class="text"></p>
                    </div>
                    <hr>
                    <div class="get_info email">
                        <p class="heading"> <i class="fa-solid fa-envelope"></i> Email : </p>
                        <p class="text"> </p>
                    </div>
                    <hr>
                    <div class="get_info phone">
                        <p class="heading"> <i class="fa-solid fa-phone"></i> Phone : </p>
                        <p class="text"> </p>
                    </div>
                    <hr>
                    <div class="get_info address">
                        <p class="heading"> <i class="fa-solid fa-address-card"></i> Address : </p>
                        <p class="text"> </p>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
