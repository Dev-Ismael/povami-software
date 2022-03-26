@extends('layouts.admin')
@section('content')
    <div id="paymentMethods-page">

        @if ($paymentMethods->isEmpty())
            <div class="no_data">
                <div class="container text-center">
                    <img src="{{ asset('images/no_data.png') }}" alt="no_data">
                    <p>No data! <i class="fa-solid fa-face-frown"></i></p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createPaymentMethodModal">
                        <i class="fa-solid fa-plus"></i> Create Payment Method Now!
                    </button>

                </div>
            </div>
        @else
            <div class="all-paymentMethods">

                <div class="table-heading col-12 mt-3 mb-1">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-uppercase"> <i class="fa-solid fa-money-bill-1"></i> Payment Methods</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#createPaymentMethodModal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"> <i class="fa-solid fa-image"></i> image</th>
                                <th scope="col"> <i class="fa-solid fa-money-bill-1"></i> Payment Method </th>
                                <th scope="col"> <i class="fa-solid fa-id-badge"></i> Our Account </th>
                                <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentMethods as $key => $paymentMethod)
                                <tr>
                                    <td> <img src="{{ asset('images/payment_methods/' . $paymentMethod->img ) }}" height="30" alt="paymentMethod-logo"> </td>
                                    <td> {{ Str::ucfirst($paymentMethod->name) }}</td>
                                    <td> {{ $paymentMethod->account }} </td>
                                    <td>
                                        <div class="table-buttons">
                                            <button type="button" id="show-paymentMethod" class="btn btn-secondary"
                                                data-toggle="modal" data-target="#showPaymentMethodModal"
                                                paymentMethod_id="{{ $paymentMethod->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button type="button" id="edit-paymentMethod" class="btn btn-info" data-toggle="modal"
                                                data-target="#editPaymentMethodModal" paymentMethod_id="{{ $paymentMethod->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" id="delete-paymentMethod" class="btn btn-danger"
                                                paymentMethod_id="{{ $paymentMethod->id }}">
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
                            {!! $paymentMethods->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        @endif



    </div>



    

    <!---------- Add PaymentMethod Modal ------------>
    <div class="modal fade" id="createPaymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="createPaymentMethodLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPaymentMethodLabel"> <i class="fa-solid fa-plus-circle"></i> Create Payment Method </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="create-paymentMethod" enctype="multipart/form-data">

                        <label for="name"> <i class="fa-solid fa-money-bill-1"></i> Payment Method Name..</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                        <small class="form-text text-danger name"> </small>
                        <br>

                        <label for="account"> <i class="fa-solid fa-id-badge"></i> Our Account..</label>
                        <input type="text" name="account" class="form-control" placeholder="Enter Account.." />
                        <small class="form-text text-danger account"> </small>
                        <br>

                        <label for="img"> <i class="fa-solid fa-image"></i> Payment Method Image.. </label>
                        <input type="file" name="img" class="form-control" />
                        <small class="form-text text-danger img"> </small>
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="button" id="create-paymentMethod" class="btn btn-primary"> Save </button>
                </div>
            </div>
        </div>
    </div>



    <!---------- Edit PaymentMethod Modal ------------>
    <div class="modal fade" id="editPaymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="editPaymentMethodLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPaymentMethodLabel"> <i class="fa-solid fa-pen-to-square"></i> edit PaymentMethod </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-paymentMethod" enctype="multipart/form-data">

                        <input type="hidden" name="id">

                        <label for="name"> <i class="fa-solid fa-money-bill-1"></i> Payment Method Name..</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                        <small class="form-text text-danger name"> </small>
                        <br>

                        <label for="account"> <i class="fa-solid fa-id-badge"></i> Our Account.. </label>
                        <input type="text" name="account" class="form-control" placeholder="Enter Aaccount.." />
                        <small class="form-text text-danger account"> </small>
                        <br>

                        <label for="img"> <i class="fa-solid fa-image"></i> Payment Method Image &nbsp; <span></span> </label>
                        <input type="file" name="img" class="form-control" />
                        <small class="form-text text-danger img"> </small>
                        <br>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                    <button type="button" id="update-paymentMethod" class="btn btn-primary"> Save </button>
                </div>
            </div>
        </div>
    </div>


    <!---------- Show PaymentMethod Modal ------------>
    <div class="modal fade" id="showPaymentMethodModal" tabindex="-1" role="dialog" aria-labelledby="showPaymentMethodModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showPaymentMethodModalLabel"> <i class="fa-solid fa-eye"></i> Payment Method Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="get_info name">
                        <p class="heading"> <i class="fa-solid fa-money-bill-1"></i>  Name : </p>
                        <p class="text"></p>
                    </div>
                    <hr>

                    <div class="get_info account">
                        <p class="heading"> <i class="fa-solid fa-id-badge"></i> Account : </p>
                        <p class="text"> </p>
                    </div>
                    <hr>

                    <div class="get_info img">
                        <p class="heading"> <i class="fa-solid fa-image"></i>  Image : </p>
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
