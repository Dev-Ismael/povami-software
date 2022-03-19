
$(document).ready( function (){


    /*=================================================================
    ===========  Create Users
    ===================================================================*/
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

    /*=================================================================
    ===========  Show Users
    ===================================================================*/
    $("button#show-user").on("click",function (e){
        var user_id = $(this).attr('user_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/admin/users/' + user_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' ){
                    alert("Error get User!");
                    window.location.href = "/admin/users";
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
                alert("Error");   // failed to with url
            }
        });  
    });







});  