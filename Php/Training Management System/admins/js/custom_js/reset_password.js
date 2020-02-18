"use strict";
$(document).ready(function () {
    //=================Preloader===========//
    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
    //=================end of Preloader===========//

    $('.reset_validator').bootstrapValidator({
        fields: {
            password: {
                validators: {

                    notEmpty: {
                        message: 'Enter new password'
                    }
                }
            },
            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'Confirm your new password'
                    },
                    identical: {
                        field: 'password',
                        message: 'Password is not matching the above one'
                    }
                }
            }
        }
    });
    // for demopage js fast loading

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-59850948-1', 'auto');
    ga('send', 'pageview');

// for demopage js loading ends

});