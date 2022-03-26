
$(document).ready( function (){



    /*=================================================================
    ===========  Create PaymentMethods
    ===================================================================*/
    $("#createPaymentMethodModal button#create-paymentMethod").on("click",function (e){
        e.preventDefault();
        var createFormData = new FormData( $("#createPaymentMethodModal form")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/payment_methods',
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
                        $("#createPaymentMethodModal small.text-danger." + key ).text(val[0]);
                        $('#createPaymentMethodModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                    swal( response.status , response.msg , response.status );
                }
                else if( response.status == 'success' && response.msg == 'paymentMethods created successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/payment_methods";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });
    });



    /*=================================================================
    ===========  Show PaymentMethods
    ===================================================================*/
    $("button#show-paymentMethod").on("click",function (e){
        var paymentMethod_id = $(this).attr('paymentMethod_id');
        e.preventDefault();
        // alert("clicked!");
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/payment_methods/show/' + paymentMethod_id ,
            processData: false,
            contentType : false,
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get paymentMethod failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/payment_methods";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.paymentMethods , function( key , val ){
                        if( val === null || val === '' ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }else if(key == 'img'){
                            val = '<img src="/images/payment_methods/' + val + '" height="30"  alt="paymentMethod-logo">';
                        }
                        $("#showPaymentMethodModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Edit PaymentMethods
    ===================================================================*/
    // Get paymentMethod info & put it in form fields
    $("button#edit-paymentMethod").on("click",function (e){
        var paymentMethod_id = $(this).attr('paymentMethod_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/payment_methods/show/' + paymentMethod_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get paymentMethod failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/payment_methods";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.paymentMethods , function( key , val ){
                        $("#editPaymentMethodModal form [type='text'][name='"+ key +"']").val( val );
                        $("#editPaymentMethodModal form [type='hidden'][name='"+ key +"']").val( val );
                        
                        if( key === 'img' ){
                            $("#editPaymentMethodModal form [for='img'] span")
                            .html('<img src="/images/payment_methods/' + val + '"  class="paymentMethod-logo"  alt="paymentMethod-logo">');
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
    $("#editPaymentMethodModal button#update-paymentMethod").on("click",function (e){
        e.preventDefault();
        var editFormData = new FormData( $("#editPaymentMethodModal form")[0] );
        var paymentMethod_id = $("#editPaymentMethodModal input[name='id']").val();
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/payment_methods/update/' + paymentMethod_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: editFormData  ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#editPaymentMethodModal small.text-danger." + key ).text(val[0]);
                        $('#editPaymentMethodModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'get payment Method failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'error' && response.msg == 'update operation failed'  ){
                    swal( response.status , response.msg , response.status )
                }
                else if( response.status == 'success' && response.msg == 'payment Method updated successfully'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/admin/payment_methods";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Delete PaymentMethod
    ===================================================================*/
    $(".table-buttons button#delete-paymentMethod").on("click",function (e){
        e.preventDefault();
        var paymentMethod_id = $(this).attr('paymentMethod_id');
        // alert(paymentMethod_id);


        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Payment Method again!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
              
                $.ajax({
                    type: "POST",
                    url: '/admin/payment_methods/delete/' + paymentMethod_id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ( response ) {
                        // console.log(response);
                        if( response.status == 'error' && response.msg == 'get Payment Method failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'error' && response.msg == 'delete operation failed'  ){
                            swal( response.status , response.msg , response.status )
                        }
                        else if( response.status == 'success' && response.msg == 'Payment Method deleted successfully'  ){
                            swal( response.status , response.msg , response.status )
                            .then((value) => {
                                window.location.href = "/admin/payment_methods";
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



    




});  