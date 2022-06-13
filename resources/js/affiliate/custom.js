
$(document).ready(function () {
    "use strict";

    /*============= coupon =============*/
    $("#account-page .ask-for-coupon").click(function (e) {
        $("#account-page #acceptContractModal div.coupon").slideToggle();
        // alert("clicked");
    });

    $("#account-page .coupon .thanks").click(function (e) {
        $("#account-page #acceptContractModal div.coupon").slideToggle();
    });

    /*============= Selcet Option Country =============*/
    var user_country = $("select#country").attr('user_country');

    $("select#country option").each(function () {

        if ($(this).val() == user_country) {
            $(this).attr("selected", "selected");
        }

    });




    /*============= Copy Text =============*/
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(element).select();
        document.execCommand("copy");
        $temp.remove();
    }
    $(".copybtn button").on("click", function () {
        $(this).find('span').text('COPIED!');
        var inputContent = $(this).parent().siblings('input').val();
        copyToClipboard(inputContent);
    })
    $(".copybtn button").on("mouseout" ,function(){
        $(this).find('span').text('COPY');
    });


    /*================= Request With No Balance =================*/
    $('#dashboard-page button.request-no-balance').on("click", function(){
        swal({
            icon: 'error',
            title: 'Oops...',
            text: "You don't have a balance to create withrawal request!" ,
        })
    });

    /*================= Remove text danger at dd-slick =================*/
    $('#dashboard-page .dd-selected').on("click", function(){
        $("#createRequestModal small.text-danger").text('');
    });

    /*============= ddSlick Plugin =============*/
    $('#dashboard-page #ddSlick-dropdown').ddslick({  
        onSelected: function(data){  
            if(data.selectedIndex > 0) {
                $("[name='payment_method']").val( data.selectedData.value );
            }   
        }
    });

    
});