
$(document).ready(function () {

    /*=================================================================
    ===========  Create request withdrwal  
    ===================================================================*/
    $("#dashboard-page #create-request-withdrawal").on("click", function (e) {

        e.preventDefault();
        var RequestWithdrawalFormData = new FormData($("#dashboard-page form#request-withdrawal-form")[0]);

        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/affiliate/withdrawal/request',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: RequestWithdrawalFormData,
            processData: false,
            contentType: false,
            cache: false,
            success: function ( response ) {

                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#createRequestModal small.text-danger").text(val[0]);
                    });
                }
                else if( response.status == 'success'){
                    swal(response.status, response.msg, response.status)
                    .then((value) => {
                        window.location.href = "/affiliate/dashboard";
                    });
                }
            },
            error: function(response){
                swal( "Error!" , "connection failed!" , 'error' )   // failed to with url
            }
        });

    });
});

