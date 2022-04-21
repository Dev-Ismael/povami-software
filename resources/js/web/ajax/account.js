const { functions } = require("lodash");

$(document).ready( function (){

    function ordinal_suffix_of(i) {
        var j = i % 10,
            k = i % 100;
        if (j == 1 && k != 11) {
            return i + "st";
        }
        if (j == 2 && k != 12) {
            return i + "nd";
        }
        if (j == 3 && k != 13) {
            return i + "rd";
        }
        return i + "th";
    }

    /*=================================================================
    ===========  Show Contract Details
    ===================================================================*/
    $("#account-page button#accept-contract").on("click",function (e){
        var contract_id = $(this).attr('contract_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/account/contract/show/' + contract_id ,
            processData: false,
            contentType : false , 
            cache    : false,
            success: function ( response ) {
                // console.log(response);
                if( response.status == 'error' && response.msg == 'get contract failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/account";
                    });
                }
                else if( response.status == 'success' ){
                    $.each( response.contract , function( key , val ){
                        if( key === 'deadline' ){

                            $("#acceptContractModal .today-piece.top.day").html( 
                                new Date(val).toLocaleString('default', { weekday: 'long' })  // Weekday Long Name
                            ); 

                            $("#acceptContractModal .today-piece.middle.month").html( 
                                new Date(val).toLocaleString('default', { month: 'long' })  // Month Long Name
                            ); 

                            $("#acceptContractModal .today-piece.middle.date").html( 
                                ordinal_suffix_of(   new Date(val).toLocaleString('default', { day: 'numeric' }) ) // Day Numeric
                            ); 

                            $("#acceptContractModal .today-piece.bottom.year").html( 
                                new Date(val).toLocaleString('default', { year: 'numeric' })  // Year Numeric
                            ); 

                        }
                        if( key === 'price' ){
                            val = val + "$";
                        }
                        $("#acceptContractModal .get_info." + key + " .text").html( val );
                    });
                }
            },
            error: function(response){  // failed to with url
                swal( "Error!" , "connection failed!" , 'error' )   
                .then((value) => {
                    window.location.href = "/account";
                });
            }
        });  
    });



    /*=================================================================
    ===========  Get Payment Method Account
    ===================================================================*/
    $("#account-page .dd-options .dd-option").click(function (e){
        
        e.preventDefault();
        $("#account-page .accounts").removeClass("d-none").addClass('d-flex');

        var paymentMethod_id = $(this).find("input.dd-option-value").val();
        $.ajax({
            type: "GET",
            enctype : "multipart/form-data" ,
            url: '/account/payment_method/show/' + paymentMethod_id ,
            processData: false,
            contentType : false,
            cache    : false,
            success: function ( response ) {
                console.log(response);
                if( response.status == 'error' && response.msg == 'get paymentMethod failed'  ){
                    swal( response.status , response.msg , response.status )
                    .then((value) => {
                        window.location.href = "/account";
                    });
                }
                else if( response.status == 'success' ){
                    $("#account-page .accounts label span").text(response.paymentMethod.name);
                    $("#account-page .accounts input[name='our_payment_method_account']").val(response.paymentMethod.account);
                }
            },
            error: function(response){  // failed to with url
                swal( "Error!" , "connection failed!" , 'error' )   
                .then((value) => {
                    window.location.href = "/account";
                });
            }
        });

    });









});
