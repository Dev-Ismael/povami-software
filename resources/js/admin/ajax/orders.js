
$(document).ready( function (){



    /*=================================================================
    ===========  Create Orders
    ===================================================================*/
    $("#createOrderModal button#create-order").on("click",function (e){
        e.preventDefault();
        var createFormData = new FormData( $("#createOrderModal form")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/orders',
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
                        $("#createOrderModal small.text-danger." + key ).text(val[0]);
                        $('#createOrderModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                    swal( response.status , response.msg , response.status );
                }
                else if( response.status == 'success' && response.msg == 'order created successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/orders";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Show Orders
    ===================================================================*/
    $("button#show-order").on("click",function (e){
        var order_id = $(this).attr('order_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/orders/show/' + order_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get order failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/orders";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.order , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#showOrderModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Edit Orders
    ===================================================================*/
    // Get order info & put it in form fields
    $("button#edit-order").on("click",function (e){
        var order_id = $(this).attr('order_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/orders/show/' + order_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                if( response.status == 'error' && response.msg == 'get order failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/orders";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.order , function( key , val ){
                        $("#editOrderModal form [name='"+ key +"']").val(val);
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });
    // Update in Db
    $("#editOrderModal button#update-order").on("click",function (e){
        e.preventDefault();
        var editFormData = new FormData( $("#editOrderModal form")[0] );
        var order_id = $("#editOrderModal input[name='id']").val();
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/orders/update/' + order_id,
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
                        $("#editOrderModal small.text-danger." + key ).text(val[0]);
                        $('#editOrderModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'get order failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'error' && response.msg == 'update operation failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'success' && response.msg == 'order updated successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/orders";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Delete Order
    ===================================================================*/
    $(".table-buttons button#delete-order").on("click",function (e){
        e.preventDefault();
        var order_id = $(this).attr('order_id');
        // alert(order_id);


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this order again!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    type: "POST",
                    url: '/admin/orders/delete/' + order_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ( response ) {
                        // console.log(response);
                        if( response.status == 'error' && response.msg == 'get order failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'error' && response.msg == 'delete operation failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'success' && response.msg == 'order deleted successfully'  ){
                            swal( response.status , response.msg , response.status )
                            .then((value) => {
                                window.location.href = "/admin/orders";
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
    ===========  Search Orders
    ===================================================================*/
    $("#searchOrderModal button#search-order").on("click",function (e){
        var searchFormData = new FormData( $("#searchOrderModal form")[0] );
        e.preventDefault();
        // alert(email);
        $.ajax({
            type: "POST",
            url: '/admin/orders/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: searchFormData ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);

                $('#searchOrderModal button#search-order').text('Loading...');


                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#searchOrderModal small.text-danger." + key ).text(val[0]);
                        $('#searchOrderModal input[name="'+ key +'"]').addClass("is-invalid");
                        $('#searchOrderModal button#search-order').text('Search');
                    });
                }
                else if( response.status == 'error' && response.msg == 'order not found'  ){
                    $("#searchOrderModal .search-info .get-no-data").removeClass("d-none");
                    $("#searchOrderModal .search-info .order-data").addClass("d-none");
                    $('#searchOrderModal button#search-order').text('Search');

                }
                else if( response.status == 'success' ){

                    $("#searchOrderModal .search-info .order-data").removeClass("d-none");
                    $("#searchOrderModal .search-info .get-no-data").addClass("d-none");
                    $('#searchOrderModal button#search-order').text('Search');

                    $.each( response.order[0] , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#searchOrderModal .get_info." + key + " .text").html( val );
                    });
                    $("#searchOrderModal form")[0].reset();

                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });




});  