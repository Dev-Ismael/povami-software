
$(document).ready( function (){


    /*=================================================================
    ===========   Users
    ===================================================================*/
    // Create User
    $("button#create-user").on("click",function (e){
        e.preventDefault();
        var formData = new FormData( $("form#create-user")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/users',
            data: formData  ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("small.text-danger." + key ).text(val[0]);
                        $('input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'insert operation failed'  ){
                    alert("Error at save, please try later.... ");  
                }
                else if( response.status == 'success' ){
                    alert("User Saved!");
                    window.location.href = "/admin/users";
                }
            },
            error: function(response){
                alert("Error");   // failed to with url
            }
        });  
    });
});  