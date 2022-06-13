const { functions } = require("lodash");

$(document).ready(function () {

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
    $("#account-page button#accept-contract").on("click", function (e) {
        var contract_id = $(this).attr('contract_id');
        e.preventDefault();
        $.ajax({
            type: "GET",
            enctype: "multipart/form-data",
            url: '/account/contract/show/' + contract_id,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                // console.log(response);
                if (response.status == 'error' && response.msg == 'get contract failed') {
                    swal(response.status, response.msg, response.status)
                        .then((value) => {
                            window.location.href = "/account";
                        });
                }
                else if (response.status == 'success') {
                    $.each(response.contract, function (key, val) {
                        if (key === 'deadline') {

                            $("#acceptContractModal .today-piece.top.day").html(
                                new Date(val).toLocaleString('default', { weekday: 'long' })  // Weekday Long Name
                            );

                            $("#acceptContractModal .today-piece.middle.month").html(
                                new Date(val).toLocaleString('default', { month: 'long' })  // Month Long Name
                            );

                            $("#acceptContractModal .today-piece.middle.date").html(
                                ordinal_suffix_of(new Date(val).toLocaleString('default', { day: 'numeric' })) // Day Numeric
                            );

                            $("#acceptContractModal .today-piece.bottom.year").html(
                                new Date(val).toLocaleString('default', { year: 'numeric' })  // Year Numeric
                            );

                        }
                        if (key === 'price') {
                            $("#acceptContractModal .milestone-text .milestone-price").html(val / 2 + "$");  // Show price at milestone
                            val = val + "$";
                        }
                        $("#acceptContractModal .get_info." + key + " .text").html(val);
                        // show at milestone

                    });
                }
            },
            error: function (response) {  // failed to with url
                swal("Error!", "connection failed!", 'error')
                    .then((value) => {
                        window.location.href = "/account";
                    });
            }
        });
    });



    /*=================================================================
    ===========  Get Payment Method Account
    ===================================================================*/
    $("#account-page .dd-options .dd-option").click(function (e) {

        e.preventDefault();
        $("#account-page .accounts").removeClass("d-none").addClass('d-flex');

        var paymentMethod_id = $(this).find("input.dd-option-value").val();
        $.ajax({
            type: "GET",
            enctype: "multipart/form-data",
            url: '/account/payment_method/show/' + paymentMethod_id,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'error' && response.msg == 'get paymentMethod failed') {
                    swal(response.status, response.msg, response.status)
                        .then((value) => {
                            window.location.href = "/account";
                        });
                }
                else if (response.status == 'success') {
                    $("#account-page .accounts label span").text(response.paymentMethod.name);
                    $("#account-page .accounts input[name='our_payment_method_account']").val(response.paymentMethod.account);
                }
            },
            error: function (response) {  // failed to with url
                swal("Error!", "connection failed!", 'error')
                    .then((value) => {
                        window.location.href = "/account";
                    });
            }
        });

    });





    /*=================================================================
    ===========  Get Coupon 
    ===================================================================*/
    $("#account-page .get-coupon-btn").on("click", function (e) {
        $("#account-page .get-coupon-btn").removeClass("cancle green").addClass("purple");
        var searchFormData = new FormData($("#account-page #acceptContractModal form")[0]);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/account/coupon/search',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: searchFormData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {

                console.log(response);

                $("#account-page .get-coupon-btn").html(' <i class="fa fa-spinner fa-spin mr-2"></i> Loading...');


                if (response.status == 'error') {

                    setTimeout(() => {
                        $("#acceptContractModal small.text-danger.coupon").text(response.msg);
                        $(".modal .get_info.price .price-discounted").text('');
                        $('#acceptContractModal input[name="coupon"]').addClass("is-invalid");
                        $(".modal .get_info.price .text").removeClass("discounted");
                        $("#acceptContractModal .get-coupon-btn").removeClass("purple green").addClass("cancle").html(' <i class="fa-solid fa-xmark mr-2"></i> Not valid');
                    }, 3000);

                }

                else if (response.status == 'success') {

                    var price = $(".modal .get_info.price .text").text();
                    price = price.replace("$", '');
                    var price_discounted = price - (price * 0.2);


                    setTimeout(() => {

                        $(".modal .get_info.price .text").addClass("discounted");
                        $(".modal .get_info.price .price-discounted").text(price_discounted + "$");
                        $("#acceptContractModal .get-coupon-btn").removeClass("purple cancle").addClass("green").html(' <i class="fa-solid fa-check mr-2"></i> Great');
                    }, 3000);
                    setTimeout(() => {
                        $("#account-page #acceptContractModal div.coupon").slideToggle();
                    }, 4000);
                }


            },
            error: function (response) {
                swal("Error!", "connection failed!", 'error')   // failed to with url
            }
        });
    });





    /*=================================================================
    ===========  Create Personal Info  
    ===================================================================*/
    $("#account-page #update-user-info").on("click", function (e) {

        e.preventDefault();
        var updateFormData = new FormData($("#account-page form#presonal-info")[0]);

        $.ajax({
            type: "POST",
            enctype: "multipart/form-data",
            url: '/account/user/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: updateFormData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                if (response.status == 'error' && response.msg == 'validation error') {
                    $.each(response.errors, function (key, val) {
                        $("#account-page form#presonal-info small.text-danger." + key).text(val[0]);
                        $('#account-page form#presonal-info input[name="' + key + '"]').addClass("is-invalid");
                    });
                }
                else if (response.status == 'error' && response.msg == 'update operation failed') {
                    swal(response.status, response.msg, response.status)
                        .then((value) => {
                            window.location.href = "/account";
                        });
                }
                else if (response.status == 'success' && response.msg == 'information updated successfully') {
                    swal(response.status, response.msg, response.status)
                }
            },
            error: function (response) {
                swal("Error!", "connection failed!", 'error')   // failed to with url
            }
        });


    });




});
