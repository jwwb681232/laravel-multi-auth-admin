/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 2.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v2.0/admin/html/
*/

var handleSuperboxGallery = function() {
	"use strict";
	$(window).load(function() {
	    $('.superbox').SuperBox();
	});
};


var Gallery = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleSuperboxGallery();
        }
    };
}();