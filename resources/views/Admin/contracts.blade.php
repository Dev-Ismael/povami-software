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
                                <th scope="col"> <i class="fa-solid fa-sack-dollar"></i> price </th>
                                <th scope="col"> <i class="fa-solid fa-clock"></i> deadline </th>
                                <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $key => $contract)
                                <tr>
                                    <td> {{ Str::ucfirst($contract->title) }}</td>
                                    <td> <a href="#" class="user-link"> {{ $contract->user->name }} </a> </td>
                                    <td> {{ $contract->content }} </td>
                                    <td class="price"> ${{ $contract->price }} </td>
                                    <td> {{ $contract->deadline }} </td>
                                    <td>
                                        <div class="table-buttons">
                                            <button type="button" id="show-contract" class="btn btn-secondary"
                                                data-toggle="modal" data-target="#showContractModal"
                                                contract_id="{{ $contract->id }}">
                                                <i class="fa-solid fa-eye"></i>
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
        <div class="modal fade" id="createContractModal" tabindex="-1" role="dialog"
            aria-labelledby="createContractLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createContractLabel"> <i class="fa-solid fa-plus-circle"></i> Create
                            Contract </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-contract" enctype="multipart/form-data">

                            <label for="email"> <i class="fa-solid fa-user"></i> User Email..</label>
                            <div class="search"> 
                                <span class="icon"> 
                                    <i class="fa-solid fa-search"></i>
                                </span>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email..">
                                <button id="search-user" class="btn btn-primary"> <i class="fa fa-search"></i> Search </button> 
                            </div>
                            <small class="form-text text-danger email"> </small>
                            <br>

                            <label for="title"> <i class="fa-solid fa-address-card"></i> Project Title..</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title.." />
                            <small class="form-text text-danger title"> </small>
                            <br>

                            <label for="content"> <i class="fa-solid fa-align-left"></i> Contract Content..</label>
                            <textarea type="text" name="content" class="form-control" rows="10" cols="50"
                                placeholder="Enter Content.."></textarea>
                            <small class="form-text text-danger content"> </small>
                            <br>

                            <label for="price"> <i class="fa-solid fa-sack-dollar"></i> Project Price..</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Price.." />
                            <small class="form-text text-danger price"> </small>
                            <br>

                            <label for="deadline"> <i class="fa-solid fa-clock"></i> Project Deadline..</label>
                            <input type="date" name="deadline" class="form-control" placeholder="Enter Deadline.." />
                            <small class="form-text text-danger deadline"> </small>
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
        <div class="modal fade" id="showContractModal" tabindex="-1" role="dialog"
            aria-labelledby="showContractModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showContractModalLabel"> <i class="fa-solid fa-eye"></i> Contract
                            Info</h5>
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
