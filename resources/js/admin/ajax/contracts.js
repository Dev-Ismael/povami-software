
$(document).ready( function (){



    /*=================================================================
    ===========  Create Contracts
    ===================================================================*/

    // Search User 
    $("#createContractModal button#search-user").on("click",function (e){
        e.preventDefault();
        var email = $("form#create-contract input[name='email']").val();
        $.ajax({
            type: "POST",
            url: '/admin/users/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { email:email } ,
            success: function ( response ) {
                // console.log(response);

                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#createContractModal small.text-danger." + key ).text(val[0]);
                        $('#createContractModal input[name="'+ key +'"]').addClass("is-invalid");
                        
                    });
                }
                else if( response.status == 'error' && response.msg == 'user not found'  ){
                    $("form#create-contract span.icon").html('<div class="spinner-grow text-info" role="status"> <span class="sr-only">Loading...</span> </div>');  
                    
                    setTimeout(() => {
                        $("form#create-contract span.icon").html("<i class='fa-solid fa-circle-xmark'></i>");    
                    }, 3000);
                }
                else if( response.status == 'success' ){
                    
                    $("form#create-contract span.icon").html('<div class="spinner-grow text-info" role="status"> <span class="sr-only">Loading...</span> </div>');  
                    setTimeout(() => {
                        $("form#create-contract span.icon").html("<i class='fa-solid fa-circle-check'></i>");
                    }, 3000);
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });
    });

    // Store Contract
    $("#createContractModal button#create-contract").on("click",function (e){
        e.preventDefault();
        var createFormData = new FormData( $("#createContractModal form")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/contracts',
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
                        $("#createContractModal small.text-danger." + key ).text(val[0]);
                        $('#createContractModal input[name="'+ key +'"]').addClass("is-invalid");
                        $('#createContractModal textarea[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                    swal( response.status , response.msg , response.status );
                }
                else if( response.status == 'success' && response.msg == 'contract created successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/contracts";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Show Contracts
    ===================================================================*/
    $("button#show-contract").on("click",function (e){
        var contract_id = $(this).attr('contract_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/contracts/show/' + contract_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get contract failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/contracts";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.contract , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        if( key === 'user' ){
                            val = val.email ;  // get user emaill
                        }
                        $("#showContractModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });

    /*=================================================================
    ===========  Edit Contracts
    ===================================================================*/
    // Get contract info & put it in form fields
    $("button#edit-contract").on("click",function (e){
        var contract_id = $(this).attr('contract_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/contracts/show/' + contract_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' && response.msg == 'get contract failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/contracts";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.contract , function( key , val ){

                        if( key == "user" ){
                            $("#editContractModal form [name='email']").val(val.email);
                        }
                        $("#editContractModal form [name='"+ key +"']").val(val);
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });
    
    // Search User 
    $("#editContractModal button#search-user").on("click",function (e){
        e.preventDefault();
        var email = $("form#edit-contract input[name='email']").val();
        $.ajax({
            type: "POST",
            url: '/admin/users/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { email:email } ,
            success: function ( response ) {
                // console.log(response);

                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#editContractModal small.text-danger." + key ).text(val[0]);
                        $('#editContractModal input[name="'+ key +'"]').addClass("is-invalid");
                        
                    });
                }
                else if( response.status == 'error' && response.msg == 'user not found'  ){
                    $("form#edit-contract span.icon").html('<div class="spinner-grow text-info" role="status"> <span class="sr-only">Loading...</span> </div>');  
                    
                    setTimeout(() => {
                        $("form#edit-contract span.icon").html("<i class='fa-solid fa-circle-xmark'></i>");    
                    }, 3000);
                }
                else if( response.status == 'success' ){
                    
                    $("form#edit-contract span.icon").html('<div class="spinner-grow text-info" role="status"> <span class="sr-only">Loading...</span> </div>');  
                    setTimeout(() => {
                        $("form#edit-contract span.icon").html("<i class='fa-solid fa-circle-check'></i>");
                    }, 3000);
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });
    });
    // Update in Db
    $("#editContractModal button#update-contract").on("click",function (e){
        e.preventDefault();
        var editFormData = new FormData( $("#editContractModal form")[0] );
        var contract_id = $("#editContractModal input[name='id']").val();

        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/contracts/update/' + contract_id,
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
                        $("#editContractModal small.text-danger." + key ).text(val[0]);
                        $('#editContractModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'get contract failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'error' && response.msg == 'update operation failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'success' && response.msg == 'contract updated successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/contracts";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });


    
    /*=================================================================
    ===========  Delete Contract
    ===================================================================*/
    $(".table-buttons button#delete-contract").on("click",function (e){
        e.preventDefault();
        var contract_id = $(this).attr('contract_id');
        // alert(contract_id);


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this contract again!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    type: "POST",
                    url: '/admin/contracts/delete/' + contract_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ( response ) {
                        // console.log(response);
                        if( response.status == 'error' && response.msg == 'get contract failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'error' && response.msg == 'delete operation failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'success' && response.msg == 'contract deleted successfully'  ){
                            swal( response.status , response.msg , response.status )
                            .then((value) => {
                                window.location.href = "/admin/contracts";
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
    ===========  Show Users
    ===================================================================*/
    $("#contracts-page a#show-user").on("click",function (e){
        var user_id = $(this).attr('user_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/users/show/' + user_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get user failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/users";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.user , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#showUserModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



});  