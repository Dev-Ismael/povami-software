@extends('layouts.admin')
@section('content')
    <div id="works-page">


        <!------------ Works Table ---------------->
        @if ($works->isEmpty())
            <div class="no_data">
                <div class="container text-center">
                    <img src="{{ asset('images/no_data.png') }}" alt="no_data">
                    <p>No data! <i class="fa-solid fa-face-frown"></i></p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createWorkModal">
                        <i class="fa-solid fa-plus"></i> Create Work Now!
                    </button>

                </div>
            </div>
        @else
            <div class="all-works">

                <div class="table-heading col-12 mt-3 mb-1">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-uppercase"> <i class="fa-solid fa-image"></i> Works</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#createWorkModal">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"> <i class="fa-solid fa-image"></i> screen </th>
                                <th scope="col"> <i class="fa-brands fa-slack"></i> brand </th>
                                <th scope="col"> <i class="fa-solid fa-address-card"></i> name </th>
                                <th scope="col"> <i class="fa-solid fa-file-lines"></i> description </th>
                                <th scope="col"> <i class="fa-solid fa-link"></i> link </th>
                                <th scope="col"> <i class="fa-solid fa-circle-exclamation"></i> action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($works as $key => $work)
                                <tr>
                                    <td> <img src="{{ asset('images/works/' . $work->screen )}}" class="work-screen" alt="work-screen"> </td>
                                    <td> <img src="{{ asset('images/works/' . $work->brand )}}" class="work-brand" alt="work-brand"> </td>
                                    <td> {{ Str::ucfirst($work->name) }}</td>
                                    <td> {{ $work->description }} </td>
                                    <td> <a href="{{ $work->link }}" target="_blank" class="work-link"> {{ $work->link }} </a> </td>
                                    <td>
                                        <div class="table-buttons">
                                            <button type="button" id="show-work" class="btn btn-secondary"
                                                data-toggle="modal" data-target="#showWorkModal"
                                                work_id="{{ $work->id }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button type="button" id="edit-work" class="btn btn-info" data-toggle="modal"
                                                data-target="#editWorkModal" work_id="{{ $work->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" id="delete-work" class="btn btn-danger"
                                                work_id="{{ $work->id }}">
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
                            {!! $works->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
        @endif





        <!---------- Add Work Modal ------------>
        <div class="modal fade" id="createWorkModal" tabindex="-1" role="dialog" aria-labelledby="createWorkLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createWorkLabel"> <i class="fa-solid fa-plus-circle"></i> Create Work </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="create-work" enctype="multipart/form-data">


                            
                            
                            <label for="name"> <i class="fa-solid fa-address-card"></i> Work Name..</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                            <small class="form-text text-danger name"> </small>
                            <br>


                            <label for="link"> <i class="fa-solid fa-link"></i> Work Link..</label>
                            <input type="text" name="link" class="form-control" placeholder="Enter Link.." />
                            <small class="form-text text-danger link"> </small>
                            <br>


                            <label for="description"> <i class="fa-solid fa-file-lines"></i> Work Description..</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Enter Description.."></textarea>
                            <small class="form-text text-danger description"> </small>
                            <br>


                            <label for="screen"> <i class="fa-solid fa-image"></i> Work ScreenShot.. <span></span> </label>
                            <input type="file" name="screen" class="form-control" />
                            <small class="form-text text-danger screen"> </small>
                            <br>


                            <label for="brand"> <i class="fa-brands fa-slack"></i> Work Brand.. <span></span> </label>
                            <input type="file" name="brand" class="form-control" />
                            <small class="form-text text-danger brand"> </small>
                            <br>
                            

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                        <button type="button" id="create-work" class="btn btn-primary"> Save </button>
                    </div>
                </div>
            </div>
        </div>


        <!---------- Edit Work Modal ------------>
        <div class="modal fade" id="editWorkModal" tabindex="-1" role="dialog" aria-labelledby="editWorkLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWorkLabel"> <i class="fa-solid fa-pen-to-square"></i> edit Work </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-work" enctype="multipart/form-data">

                            <input type="hidden" name="id">

                            
                            <label for="name"> <i class="fa-solid fa-address-card"></i> Work Name..</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name.." />
                            <small class="form-text text-danger name"> </small>
                            <br>


                            <label for="link"> <i class="fa-solid fa-link"></i> Work Link..</label>
                            <input type="text" name="link" class="form-control" placeholder="Enter Link.." />
                            <small class="form-text text-danger link"> </small>
                            <br>


                            <label for="description"> <i class="fa-solid fa-file-lines"></i> Work Description..</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Enter Description.."></textarea>
                            <small class="form-text text-danger description"> </small>
                            <br>


                            <label for="screen"> <i class="fa-solid fa-image"></i> Work ScreenShot.. <span></span> </label>
                            <input type="file" name="screen" class="form-control" />
                            <small class="form-text text-danger screen"> </small>
                            <br>


                            <label for="brand"> <i class="fa-brands fa-slack"></i> Work Brand.. <span></span> </label>
                            <input type="file" name="brand" class="form-control" />
                            <small class="form-text text-danger brand"> </small>
                            <br>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                        <button type="button" id="update-work" class="btn btn-primary"> Save </button>
                    </div>
                </div>
            </div>
        </div>



        <!---------- Show Work Modal ------------>
        <div class="modal fade" id="showWorkModal" tabindex="-1" role="dialog" aria-labelledby="showWorkModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showWorkModalLabel"> <i class="fa-solid fa-eye"></i> Work Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="get_info name">
                            <p class="heading"> <i class="fa-solid fa-address-card"></i> Work Name : </p>
                            <p class="text"></p>
                        </div>
                        <hr>
                        <div class="get_info link">
                            <p class="heading"> <i class="fa-solid fa-link"></i> Link : </p>
                            <p class="text"> </p>
                        </div>
                        <hr>
                        <div class="get_info description">
                            <p class="heading"> <i class="fa-solid fa-file-lines"></i> Description : </p>
                            <p class="text"> </p>
                        </div>
                        <hr>
                        <div class="get_info brand">
                            <p class="heading"> <i class="fa-brands fa-slack"></i> Brand : </p>
                            <p class="text"> </p>
                        </div>
                        <hr>
                        <div class="get_info screen">
                            <p class="heading"> <i class="fa-solid fa-image"></i> Screen : </p>
                            <p class="text"> </p>
                        </div>
                        
                        


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>




    </div>

@endsection