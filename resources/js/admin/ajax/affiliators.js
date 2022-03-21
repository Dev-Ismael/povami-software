
$(document).ready( function (){



    /*=================================================================
    ===========  Create Affiliators
    ===================================================================*/
    $("#createAffiliatorModal button#create-affiliator").on("click",function (e){
        e.preventDefault();
        var createFormData = new FormData( $("#createAffiliatorModal form")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/affiliators',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: createFormData  ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#createAffiliatorModal small.text-danger." + key ).text(val[0]);
                        $('#createAffiliatorModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                    swal( response.status , response.msg , response.status );
                }
                else if( response.status == 'success' && response.msg == 'affiliator created successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/affiliators";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Show Affiliators
    ===================================================================*/
    $("button#show-affiliator").on("click",function (e){
        var affiliator_id = $(this).attr('affiliator_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/affiliators/show/' + affiliator_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get affiliator failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/affiliators";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.affiliator , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#showAffiliatorModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Edit Affiliators
    ===================================================================*/
    // Get affiliator info & put it in form fields
    $("button#edit-affiliator").on("click",function (e){
        var affiliator_id = $(this).attr('affiliator_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/affiliators/show/' + affiliator_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                if( response.status == 'error' && response.msg == 'get affiliator failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/affiliators";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.affiliator , function( key , val ){
                        $("#editAffiliatorModal form [name='"+ key +"']").val(val);
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });
    // Update in Db
    $("#editAffiliatorModal button#update-affiliator").on("click",function (e){
        e.preventDefault();
        var editFormData = new FormData( $("#editAffiliatorModal form")[0] );
        var affiliator_id = $("#editAffiliatorModal input[name='id']").val();
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/affiliators/update/' + affiliator_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: editFormData  ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#editAffiliatorModal small.text-danger." + key ).text(val[0]);
                        $('#editAffiliatorModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'get affiliator failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'error' && response.msg == 'update operation failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'success' && response.msg == 'affiliator updated successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/affiliators";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Delete Affiliator
    ===================================================================*/
    $(".table-buttons button#delete-affiliator").on("click",function (e){
        e.preventDefault();
        var affiliator_id = $(this).attr('affiliator_id');
        // alert(affiliator_id);


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this affiliator again!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    type: "POST",
                    url: '/admin/affiliators/delete/' + affiliator_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ( response ) {
                        // console.log(response);
                        if( response.status == 'error' && response.msg == 'get affiliator failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'error' && response.msg == 'delete operation failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'success' && response.msg == 'affiliator deleted successfully'  ){
                            swal( response.status , response.msg , response.status )
                            .then((value) => {
                                window.location.href = "/admin/affiliators";
                            });

                        }
                    },
                    error: function(response){
                        swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
                    }
                });

            }
        });
       
    });



    
    /*=================================================================
    ===========  Search Affiliators
    ===================================================================*/
    $("#searchAffiliatorModal button#search-affiliator").on("click",function (e){
        var searchFormData = new FormData( $("#searchAffiliatorModal form")[0] );
        e.preventDefault();
        // alert(email);
        $.ajax({
            type: "POST",
            url: '/admin/affiliators/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: searchFormData ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);

                $('#searchAffiliatorModal button#search-affiliator').text('Loading...');


                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#searchAffiliatorModal small.text-danger." + key ).text(val[0]);
                        $('#searchAffiliatorModal input[name="'+ key +'"]').addClass("is-invalid");
                        $('#searchAffiliatorModal button#search-affiliator').text('Search');
                    });
                }
                else if( response.status == 'error' && response.msg == 'affiliator not found'  ){
                    $("#searchAffiliatorModal .search-info .get-no-data").removeClass("d-none");
                    $("#searchAffiliatorModal .search-info .affiliator-data").addClass("d-none");
                    $('#searchAffiliatorModal button#search-affiliator').text('Search');

                }
                else if( response.status == 'success' ){

                    $("#searchAffiliatorModal .search-info .affiliator-data").removeClass("d-none");
                    $("#searchAffiliatorModal .search-info .get-no-data").addClass("d-none");
                    $('#searchAffiliatorModal button#search-affiliator').text('Search');

                    $.each( response.affiliator[0] , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#searchAffiliatorModal .get_info." + key + " .text").html( val );
                    });
                    $("#searchAffiliatorModal form")[0].reset();

                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });




});  