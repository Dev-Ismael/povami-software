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
                        <i class="fa-solid fa-circle-plus"></i>
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
                            <th scope="col"> <i class="fa-solid fa-phone"></i> phone</th>
                            <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                            <tr>    
                                <th scope="row">{{$key }}</th>
                                <td> {{$user->name}}</td>
                                <td> {{$user->email}} </td>
                                <td>
                                    @if ( $user->phone === null  )
                                        <span class="null text-danger"> <i class="fa-solid fa-circle-xmark"></i> </span>
                                    @else
                                        {{ $user->phone }}
                                    @endif
                                </td>
                                <td>
                                    <div class="table-buttons">
                                        <a href="" class="btn btn-show"><i class="fa-solid fa-eye"></i></a>    
                                        <a href="" class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i></a>    
                                        <a href="" class="btn btn-delete"><i class="fa-solid fa-trash-can"></i></a>    
                                    </div>    
                                </td>                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
