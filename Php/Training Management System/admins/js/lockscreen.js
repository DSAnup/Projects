"use strict";
$(document).ready(function() {
    //=================Preloader===========//
    $(window).on('load', function () {
        $('.preloader img').fadeOut();
        $('.preloader').fadeOut();
    });
    //=================end of Preloader===========//
    var textfield = $("input[name=user]");
    $('button[type="submit"]').on('click', function(e) {
        e.preventDefault();
        //little validation just to check username
        if (textfield.val() != "") {
            //$("body").scrollTo("#output");
            $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back Addison").removeClass(' alert-danger');
            $("input").css({
                "height":"0",
                "padding":"0",
                "margin":"0",
                "opacity":"0"
            });
            //change button text
            $('.user-name').html('Unlocked');
            $('button[type="submit"]').html("CONTINUE")
                .addClass("btn-submit").on('click', function(){
                window.location.href = 'index.html';
            });

            //show avatar
            $(".avatar").css({
                "background-image": "url('img/authors/avatar1.jpg')"
            });
        } else {
            //profile pic error animation
            $(".avatar").addClass('error_anim');
            setTimeout(function() {
                $(".avatar").removeClass('error_anim');
            }, 400);
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
