@extends('layouts.admin')
@section('content')
    <div id="contracts-page">




        <!------- Fetch Data -------->
        @if ($contracts->isEmpty())
            <div class="no_data">
                <div class="container text-center">
                    <img src="{{ asset('images/no_data.png') }}" alt="no_data">
                    <p>No data! <i class="fa-solid fa-face-frown"></i></p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createContractModal">
                        <i class="fa-solid fa-plus"></i> Create Contract Now!
                    </button>

                </div>
            </div>
        @else
            <div class="all-contracts">

                <div class="table-heading col-12 mt-3 mb-1">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-uppercase"> <i class="fa-solid fa-file-signature pr-1"></i> Contracts</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#searchContractModal">
                                <i class="fa-solid fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#createContractModal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"> <i class="fa-solid fa-address-card"></i> title </th>
                                <th scope="col"> <i class="fa-solid fa-user"></i> user </th>
                                <th scope="col"> <i class="fa-solid fa-align-left"></i> content </th>
                                <th scope="col"> <i class="fa-solid fa-dollar-sign"></i> price </th>
                                <th scope="col"> <i class="fa-solid fa-timer"></i> deadline </th>
                                <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $key => $contract)
                                <tr>
                                    <td> {{ Str::ucfirst($contract->title) }}</td>
                                    <td> <a href="#" class="user-link" > {{ $contract->user->name }} </a> </td>
                                    <td> {{ $contract->content }} </td>
                                    <td class="price"> ${{ $contract->price }}  </td>
                                    <td> {{ $contract->deadline }} </td>
                                    <td>
                                        <div class="table-buttons">
                                            <button type="button" id="show-contract" class="btn btn-secondary"
                                                data-toggle="modal" data-target="#showContractModal"
                                                contract_id="{{ $contract->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button type="button" id="edit-contract" class="btn btn-info" data-toggle="modal"
                                                data-target="#editContractModal" contract_id="{{ $contract->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" id="delete-contract" class="btn btn-danger"
                                                contract_id="{{ $contract->id }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-------- Pagination ------->
                    <div class="pagination-container d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            {!! $contracts->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        @endif


        <!---------- Add Contract Modal ------------>
        <div class="modal fade" id="createContractModal" tabindex="-1" role="dialog" aria-labelledby="createContractLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createContractLabel"> <i class="fa-solid fa-plus-circle"></i> Create Contract </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-contract" enctype="multipart/form-data">


                            <label for="name"> <i class="fa-solid fa-contract"></i> Contract Name..</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                            <small class="form-text text-danger name"> </small>
                            <br>

                            <label for="email"> <i class="fa-solid fa-envelope"></i> Contract Email..</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email.." />
                            <small class="form-text text-danger email"> </small>
                            <br>

                            <label for="phone"> <i class="fa-solid fa-phone"></i> Contract Phone..</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone.." />
                            <small class="form-text text-danger phone"> </small>
                            <br>

                            <label for="address"> <i class="fa-solid fa-address-card"></i> Contract Address..</label>
                            <textarea type="text" name="address" class="form-control" placeholder="Enter Address.."></textarea>
                            <small class="form-text text-danger address"> </small>
                            <br>

                            <label for="password"> <i class="fas fa-lock" aria-hidden="true"></i> Contract Password..</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password.." />
                            <small class="form-text text-danger password"> </small>
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                        <button type="button" id="create-contract" class="btn btn-primary"> Save </button>
                    </div>
                </div>
            </div>
        </div>

        <!---------- Show Contract Modal ------------>
        <div class="modal fade" id="showContractModal" tabindex="-1" role="dialog" aria-labelledby="showContractModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showContractModalLabel"> <i class="fa-solid fa-eye"></i> Contract Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="get_info name">
                            <p class="heading"> <i class="fa-solid fa-contract"></i> Contractname : </p>
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


    </div>






@endsection
