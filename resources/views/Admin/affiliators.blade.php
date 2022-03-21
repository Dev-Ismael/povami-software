@extends('layouts.admin')
@section('content')
    <div id="affiliators-page">

        @if ($affiliators->isEmpty())
            <div class="no_data">
                <div class="container text-center">
                    <img src="{{ asset('images/no_data.png') }}" alt="no_data">
                    <p>No data! <i class="fa-solid fa-face-frown"></i></p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createAffiliatorModal">
                        <i class="fa-solid fa-plus"></i> Create Affiliator Now!
                    </button>

                </div>
            </div>
        @else
            <div class="all-affiliators">

                <div class="table-heading col-12 mt-3 mb-1">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-uppercase"> <i class="fa-solid fa-users"></i> Affiliators</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#searchAffiliatorModal">
                                <i class="fa-solid fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#createAffiliatorModal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"> <i class="fa-solid fa-address-card"></i> name</th>
                                <th scope="col"> <i class="fa-solid fa-envelope"></i> email</th>
                                <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($affiliators as $key => $affiliator)
                                <tr>
                                    <td> {{ Str::ucfirst($affiliator->name) }}</td>
                                    <td> {{ $affiliator->email }} </td>
                                    <td>
                                        <div class="table-buttons">
                                            <button type="button" id="show-affiliator" class="btn btn-secondary"
                                                data-toggle="modal" data-target="#showAffiliatorModal"
                                                affiliator_id="{{ $affiliator->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button type="button" id="edit-affiliator" class="btn btn-info" data-toggle="modal"
                                                data-target="#editAffiliatorModal" affiliator_id="{{ $affiliator->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" id="delete-affiliator" class="btn btn-danger"
                                                affiliator_id="{{ $affiliator->id }}">
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
                            {!! $affiliators->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        @endif



    </div>


    <!---------- Edit Affiliator Modal ------------>
    <div class="modal fade" id="editAffiliatorModal" tabindex="-1" role="dialog" aria-labelledby="editAffiliatorLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAffiliatorLabel"> <i class="fa-solid fa-pen-to-square"></i> edit Affiliator </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-affiliator" enctype="multipart/form-data">

                        <input type="hidden" name="id">

                        <label for="name"> <i class="fa-solid fa-affiliator"></i> Affiliator Name..</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                        <small class="form-text text-danger name"> </small>
                        <br>

                        <label for="email"> <i class="fa-solid fa-envelope"></i> Affiliator Email..</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email.." />
                        <small class="form-text text-danger email"> </small>
                        <br>

                        <label for="phone"> <i class="fa-solid fa-phone"></i> Affiliator Phone..</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone.." />
                        <small class="form-text text-danger phone"> </small>
                        <br>

                        <label for="address"> <i class="fa-solid fa-address-card"></i> Affiliator Address..</label>
                        <textarea type="text" name="address" class="form-control" placeholder="Enter Address.."></textarea>
                        <small class="form-text text-danger address"> </small>
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="button" id="update-affiliator" class="btn btn-primary"> Save </button>
                </div>
            </div>
        </div>
    </div>


    <!---------- Add Affiliator Modal ------------>
    <div class="modal fade" id="createAffiliatorModal" tabindex="-1" role="dialog" aria-labelledby="createAffiliatorLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAffiliatorLabel"> <i class="fa-solid fa-plus-circle"></i> Create Affiliator </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-affiliator" enctype="multipart/form-data">


                        <label for="name"> <i class="fa-solid fa-affiliator"></i> Affiliator Name..</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                        <small class="form-text text-danger name"> </small>
                        <br>

                        <label for="email"> <i class="fa-solid fa-envelope"></i> Affiliator Email..</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email.." />
                        <small class="form-text text-danger email"> </small>
                        <br>

                        <label for="phone"> <i class="fa-solid fa-phone"></i> Affiliator Phone..</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone.." />
                        <small class="form-text text-danger phone"> </small>
                        <br>

                        <label for="address"> <i class="fa-solid fa-address-card"></i> Affiliator Address..</label>
                        <textarea type="text" name="address" class="form-control" placeholder="Enter Address.."></textarea>
                        <small class="form-text text-danger address"> </small>
                        <br>

                        <label for="password"> <i class="fas fa-lock" aria-hidden="true"></i> Affiliator Password..</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password.." />
                        <small class="form-text text-danger password"> </small>
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="button" id="create-affiliator" class="btn btn-primary"> Save </button>
                </div>
            </div>
        </div>
    </div>

    <!---------- Show Affiliator Modal ------------>
    <div class="modal fade" id="showAffiliatorModal" tabindex="-1" role="dialog" aria-labelledby="showAffiliatorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showAffiliatorModalLabel"> <i class="fa-solid fa-eye"></i> Affiliator Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="get_info name">
                        <p class="heading"> <i class="fa-solid fa-affiliator"></i> Affiliatorname : </p>
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

    <!---------- Search Model ------------>
    <div class="modal fade" id="searchAffiliatorModal" tabindex="-1" role="dialog" aria-labelledby="searchAffiliatorLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchAffiliatorLabel"> <i class="fa-solid fa-search"></i> Search Affiliator </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data">
                        <label for="email"> <i class="fa-solid fa-envelope"></i> Affiliator Email..</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email.." />
                        <small class="form-text text-danger email"> </small>
                        <br>
                        <button type="button" id="search-affiliator" class="btn btn-purple float-right"> Search </button>
                    </form>

                    <div class="search-info pt-5">
                        <div class="affiliator-data d-none">
                            <div class="get_info name">
                                <p class="heading"> <i class="fa-solid fa-affiliator"></i> Affiliatorname : </p>
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
                        <div class="get-no-data d-none text-center">
                            <img src="{{ asset('images/no_data.png') }}" width="200px" alt="no_data">
                            <p>Affiliator not found! <i class="fa-solid fa-face-frown"></i></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>








@endsection
