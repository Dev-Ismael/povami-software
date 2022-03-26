
$(document).ready( function (){



    /*=================================================================
    ===========  Create Works
    ===================================================================*/
    $("#createWorkModal button#create-work").on("click",function (e){
        e.preventDefault();
        var createFormData = new FormData( $("#createWorkModal form")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/works',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: createFormData  ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#createWorkModal small.text-danger." + key ).text(val[0]);
                        $('#createWorkModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                    swal( response.status , response.msg , response.status );
                }
                else if( response.status == 'success' && response.msg == 'work created successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/works";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });
    });



    /*=================================================================
    ===========  Show Works
    ===================================================================*/
    $("button#show-work").on("click",function (e){
        var work_id = $(this).attr('work_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/works/show/' + work_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' && response.msg == 'get work failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/works";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.work , function( key , val ){
                        if( val === null || val === '' ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }else if(key == 'img'){
                            val = '<img src="/images/works/' + val + '" target="_blank" class="show-work-logo" alt="work-logo">';
                        }else if(key == 'link'){
                            val = '<a href="'+ val +'"> '+ val +' </a>';
                        }
                        $("#showWorkModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Edit Works
    ===================================================================*/
    // Get work info & put it in form fields
    $("button#edit-work").on("click",function (e){
        var work_id = $(this).attr('work_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/works/show/' + work_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                if( response.status == 'error' && response.msg == 'get work failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/works";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.work , function( key , val ){

                        $("#editWorkModal form [type='text'][name='"+ key +"']").val( val );
                        $("#editWorkModal form [type='hidden'][name='"+ key +"']").val( val );
                        
                        if( key === 'img' ){
                            $("#editWorkModal form [for='img'] span")
                            .html('<img src="/images/works/' + val + '" class="work-logo"  alt="work-logo">');
                        }
                    });
                    
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });
    // Update in Db
    $("#editWorkModal button#update-work").on("click",function (e){
        e.preventDefault();
        var editFormData = new FormData( $("#editWorkModal form")[0] );
        var work_id = $("#editWorkModal input[name='id']").val();
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/works/update/' + work_id,
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
                        $("#editWorkModal small.text-danger." + key ).text(val[0]);
                        $('#editWorkModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'get work failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'error' && response.msg == 'update operation failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'success' && response.msg == 'work updated successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/works";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Delete Work
    ===================================================================*/
    $(".table-buttons button#delete-work").on("click",function (e){
        e.preventDefault();
        var work_id = $(this).attr('work_id');
        // alert(work_id);


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this work again!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    type: "POST",
                    url: '/admin/works/delete/' + work_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ( response ) {
                        // console.log(response);
                        if( response.status == 'error' && response.msg == 'get work failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'error' && response.msg == 'delete operation failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'success' && response.msg == 'work deleted successfully'  ){
                            swal( response.status , response.msg , response.status )
                            .then((value) => {
                                window.location.href = "/admin/works";
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
    ===========  Search Works
    ===================================================================*/
    $("#searchWorkModal button#search-work").on("click",function (e){
        var searchFormData = new FormData( $("#searchWorkModal form")[0] );
        e.preventDefault();
        // alert(email);
        $.ajax({
            type: "POST",
            url: '/admin/works/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: searchFormData ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);

                $('#searchWorkModal button#search-work').text('Loading...');


                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#searchWorkModal small.text-danger." + key ).text(val[0]);
                        $('#searchWorkModal input[name="'+ key +'"]').addClass("is-invalid");
                        $('#searchWorkModal button#search-work').text('Search');
                    });
                }
                else if( response.status == 'error' && response.msg == 'work not found'  ){
                    $("#searchWorkModal .search-info .get-no-data").removeClass("d-none");
                    $("#searchWorkModal .search-info .work-data").addClass("d-none");
                    $('#searchWorkModal button#search-work').text('Search');

                }
                else if( response.status == 'success' ){

                    $("#searchWorkModal .search-info .work-data").removeClass("d-none");
                    $("#searchWorkModal .search-info .get-no-data").addClass("d-none");
                    $('#searchWorkModal button#search-work').text('Search');

                    $.each( response.work[0] , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#searchWorkModal .get_info." + key + " .text").html( val );
                    });
                    $("#searchWorkModal form")[0].reset();

                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });




});  