$(document).ready( function (){
    "use strict";


    /*================= Admin Sidebar =================*/
        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function(){
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
		

    /*================= Remove text danger Inputs =================*/
    $('form input , form textarea').on("click", function(){

        // get Attr name=['']
        var attr_name = $(this).attr('name');

        $(this).removeClass('is-invalid');
        $("form small.text-danger." + attr_name ).text('');


    });

}); 