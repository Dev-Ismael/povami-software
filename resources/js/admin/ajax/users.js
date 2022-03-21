
$(document).ready( function (){



    /*=================================================================
    ===========  Create Users
    ===================================================================*/
    $("#createUserModal button#create-user").on("click",function (e){
        e.preventDefault();
        var createFormData = new FormData( $("#createUserModal form")[0] );
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/users',
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
                        $("#createUserModal small.text-danger." + key ).text(val[0]);
                        $('#createUserModal input[name="'+ key +'"]').addClass("is-invalid");
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
                alert("Error connections!");   // failed to with url
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
            url: '/admin/users/show/' + user_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
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
                alert("Error connections!");   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Edit Users
    ===================================================================*/
    // Get user info & put it in form fields
    $("button#edit-user").on("click",function (e){
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
                if( response.status == 'error' ){
                    alert("Error get User!");
                    window.location.href = "/admin/users";
                }
                else if( response.status == 'success' ){
                    $.each( response.user , function( key , val ){
                        $("#editUserModal form [name='"+ key +"']").val(val);
                    });
                }
            },
            error: function(response){
                alert("Error connections!");   // failed to with url
            }
        });  
    });
    // Update in Db
    $("#editUserModal button#update-user").on("click",function (e){
        e.preventDefault();
        var editFormData = new FormData( $("#editUserModal form")[0] );
        var user_id = $("#editUserModal input[name='id']").val();
        $.ajax({
            type: "POST",
            enctype : "multipart/form-data" ,
            url: '/admin/users/update/' + user_id,
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
                        $("#editUserModal small.text-danger." + key ).text(val[0]);
                        $('#editUserModal input[name="'+ key +'"]').addClass("is-invalid");
                    });
                }
                else if( response.status == 'error' && response.msg == 'user get error'  ){
                    alert("User get error..");  
                }
                else if( response.status == 'error' && response.msg == 'update operation failed'  ){
                    alert("Update operation failed... ");  
                }
                else if( response.status == 'success' ){
                    alert("User updated!");
                    window.location.href = "/admin/users";
                }
            },
            error: function(response){
                alert("Error connections!");   // failed to with url
            }
        });  
    });



    /*=================================================================
    ===========  Delete User
    ===================================================================*/
    $(".table-buttons button#delete-user").on("click",function (e){
        e.preventDefault();
        var user_id = $(this).attr('user_id');
        // alert(user_id);
        $.ajax({
            type: "POST",
            url: '/admin/users/delete/' + user_id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'user get error'  ){
                    alert("User get error..");  
                }
                else if( response.status == 'error' && response.msg == 'delete operation failed'  ){
                    alert("Delete operation failed... ");  
                }
                else if( response.status == 'success' ){
                    alert("User deleted!");
                    window.location.href = "/admin/users";
                }
            },
            error: function(response){
                alert("Error connections!");   // failed to with url
            }
        });  
    });



    
    /*=================================================================
    ===========  Search Users
    ===================================================================*/
    $("#searchUserModal button#search-user").on("click",function (e){
        var searchFormData = new FormData( $("#searchUserModal form")[0] );
        e.preventDefault();
        // alert(email);
        $.ajax({
            type: "POST",
            url: '/admin/users/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: searchFormData ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);

                $('#searchUserModal button#search-user').text('Loading...');


                if( response.status == 'error' && response.msg == 'validation error' ){
                    $.each( response.errors , function( key , val ){
                        $("#searchUserModal small.text-danger." + key ).text(val[0]);
                        $('#searchUserModal input[name="'+ key +'"]').addClass("is-invalid");
                        $('#searchUserModal button#search-user').text('Search');
                    });
                }
                else if( response.status == 'error' && response.msg == 'user not found'  ){
                    $("#searchUserModal .search-info .get-no-data").removeClass("d-none");
                    $("#searchUserModal .search-info .user-data").addClass("d-none");
                    $('#searchUserModal button#search-user').text('Search');

                }
                else if( response.status == 'success' ){

                    $("#searchUserModal .search-info .user-data").removeClass("d-none");
                    $("#searchUserModal .search-info .get-no-data").addClass("d-none");
                    $('#searchUserModal button#search-user').text('Search');

                    $.each( response.user[0] , function( key , val ){
                        if( val === null ){
                            val = '<i class="fa-solid fa-circle-question"></i>';
                        }
                        $("#searchUserModal .get_info." + key + " .text").html( val );
                    });
                    $("#searchUserModal form")[0].reset();

                }
            },
            error: function(response){
                alert("Error connections!");   // failed to with url
            }
        });  
    });




});  