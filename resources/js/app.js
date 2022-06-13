/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */




// require Bootstrap & jquery is in
require('./bootstrap');


// require Sweet Alert 
require('./sweetalert.min');

// require ddslick  
require('./ddslick.min');





/*=====================================================
============ Web Files ================================
=====================================================*/
require('./web/custom');
// require Ajax files
require('./web/ajax/account');



/*=====================================================
============ Affiliate Files ==========================
=====================================================*/
require('./affiliate/custom');
// require Ajax files
require('./affiliate/ajax/dashboard');






/*======================================================
============ Ajax Files ================================
======================================================*/
require('./admin/custom');
// require Ajax files
require('./admin/ajax/users');
require('./admin/ajax/affiliators');
require('./admin/ajax/payment_methods');
require('./admin/ajax/works');
require('./admin/ajax/contracts');
require('./admin/ajax/orders');
