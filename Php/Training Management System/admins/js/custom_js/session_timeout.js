'use strict';
jQuery(document).ready(function () {
    // initialize session timeout settings
    $.sessionTimeout({
        title: 'Session Timeout Notification',
        message: 'Your session is about to expire.',
        keepAliveUrl: 'session_timeout.html',
        redirUrl: 'lockscreen.html',
        logoutUrl: 'login.html',
        warnAfter: 7000, //warn after 5 seconds
        redirAfter: 11000 //redirect after 10 secons
    });
    var left_height = $(window).height() - 1;
    $('.wrapper').css('height', left_height);
});