// JavaScript Document
//Toggle
$(document).ready(function () {
    //Top Nav
	//news
	$('.vticker').easyTicker();
	$('#pauseNews').click(function () {
        if ($(this).hasClass('newsBtnToggleOff')) {
            $(this).removeClass('newsBtnToggleOff').addClass('newsBtnToggleOn');
        } else if ($(this).hasClass('newsBtnToggleOn')) {
            $(this).removeClass('newsBtnToggleOn').addClass('newsBtnToggleOff');
        } 
	});
    // Create the dropdown bases
    $("<select />").appendTo(
        ".navigation nav");
    // Create default option "Go to..."
    $("<option />", {
        "selected": "selected",
        "value": "",
        "text": "Go to..."
    }).appendTo("nav select");

    // Populate dropdowns with the first menu ite0px
    $(".navigation nav li a").each(
        function () {
            var el = $(this);
            $("<option />", {
                "value": el.attr("href"),
                "text": el.text()
            }).appendTo("nav select");
        });
    //make responsive dropdown menu actually work			
    $("nav select").change(function () {
        window.location = $(this).find(
            "option:selected").val();
    });
    //mouse ouver home page
    $(".overview_box img").mouseenter(function () {
        $(this).animate({
            "border-width": "15px 15px 15px 15px solid #FFF" ,"opacity": 0.5
        }, 300, "easeOutCubic");
    });
    $(".overview_box img").mouseleave(function () {
        $(this).animate({
            "border-width": "0px 0px 0px 0px solid #FFF", "opacity": 1
        }, 300, "easeOutCubic");
    });
	
    //TABS
    $(".tab_content").hide();
    $(".tab_content:first").show();
    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass(
            "active");
        $(this).addClass("active");
        $(".tab_content").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
    });
    //Toggle Bar
    $('.toggle-trigger').click(function () {
        $(this).next().toggle('slow');
        $(this).toggleClass("active");
        return false;
    }).next().hide();
    //trigger_inner
    $('.toggle-trigger2').click(function () {
        $(this).next().toggle('slow');
        $(this).toggleClass("active");
        return false;
    }).next().hide();
    //camera

    /*jQuery('#camera_wrap_1').camera({
		thumbnails: false,
		pagination: false,
	});
	jQuery('#camera_wrap_2').camera({
		height: '400px',
		loader: 'bar',
		pagination: false,
		thumbnails: true
	});*/
    //Flexslider
    $('.flexslider').flexslider({
        animation: "fade",
        slideshow: true,
        mousewheel: true,
        directionNav: true,
        animationLoop: true,
        pauseOnAction: true,
        pauseOnHover: true,
        slideshowSpeed: 4500,
        animationDuration: 1600,
        controlNav: false,
        controlsContainer: "flex-container",
        start: function (slider) {
            // animate your caption ... 
            // find the item that is the current slide's .slidecaption and animate it
            $('.flexslider .slides').find('.flex-caption').animate({
                bottom: "0px",
                opacity: "1"
            }).delay(0);
        },
        after: function (slider) {
            // animate your caption ... 
            // find the item that is the current slide's .slidecaption and animate it
            $('.flexslider .slides').find('.flex-caption').animate({
                bottom: "0px",
                opacity: "1"
            }).delay(1600);
        },
        before: function (slider) {
            // animate your caption ... 
            // find the item that is the current slide's .slidecaption and animate it
            $('.flexslider .slides').find('.flex-caption').animate({
                bottom: "-20px",
                opacity: "0"
            }).delay(0);
        }

    });

    //POP EYE
    var options1 = {
        navigation: 'permanent',
    }
    var options2 = {
        autoslide: true,
        caption: 'permanent',
        slidespeed: 3000,
        duration: 650,
        navigation: 'permanent',
        direction: 'left',
    }
    /*var options2 = {
            caption:    false,
            navigation: 'permanent',
            direction:  'left'
        }*/
    var options3 = {
        caption: 'permanent',
        opacity: 1
    }
    $('#ppy1').popeye(options1);
    $('#ppy2').popeye(options2);
    $('#ppy3').popeye(options3);
    //Fonts
    WebFontConfig = {
        google: {
            families: ['Voltaire::latin']
        }
    };
    (function () {
        var wf = document.createElement(
            'script');
        wf.src = ('https:' == document.location
            .protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName(
            'script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
    //Easy Tabs
    $('#tab-container').easytabs();
    $('#tab-container2').easytabs();
    $('#tab-container3').easytabs();
    $('#tab-container4').easytabs();
    $('#tab-container5').easytabs();
    $('#tab-container6').easytabs();
    $('#tab-container7').easytabs();
    $('#tab-container8').easytabs();
    $('#tab-container_ong-1').easytabs();
    $('#tab-container_ong-2').easytabs();
    $('#tab-container_upc-1').easytabs();
    $('#tab-container_upc-2').easytabs();
    $('#tab-container_upc-3').easytabs();
    $('#tab-container_upc-4').easytabs();
    $('#tab-container_upc-5').easytabs();
    $('#tab-container_upc-6').easytabs();
    $('#tab-container_upc-7').easytabs();
    $('#tab-container_upc-8').easytabs();
    $('#tab-container_upc-9').easytabs();
    $('#tab-container_upc-10').easytabs();
    $('#tab-container_fp1').easytabs();
    $('#tab-container_fp2').easytabs();
    $('#tab-container_fp3').easytabs();
    $('#tab-container_fp4').easytabs();
    //Examples of how to assign the ColorBox event to elements
    $(".group1").colorbox({
        rel: 'group1'
    });
    $(".group2").colorbox({
        rel: 'group2',
        transition: "fade"
    });
    $(".group3").colorbox({
        rel: 'group3',
        transition: "none",
        width: "75%",
        height: "75%"
    });
    $(".group4").colorbox({
        rel: 'group4',
        slideshow: true
    });
    $(".ajax").colorbox();
    $(".youtube").colorbox({
        iframe: true,
        innerWidth: 425,
        innerHeight: 344
    });
    $(".iframe").colorbox({
        iframe: true,
        innerWidth: 300,
        innerHeight: "100%"
    });
    $(".inline").colorbox({
        inline: true,
        width: "50%"
    });
    $(".callbacks").colorbox({
        onOpen: function () {
            alert(
                'onOpen: colorbox is about to open'
            );
        },
        onLoad: function () {
            alert(
                'onLoad: colorbox has started to load the targeted content'
            );
        },
        onComplete: function () {
            alert(
                'onComplete: colorbox has displayed the loaded content'
            );
        },
        onCleanup: function () {
            alert(
                'onCleanup: colorbox has begun the close process'
            );
        },
        onClosed: function () {
            alert(
                'onClosed: colorbox has completely closed'
            );
        }
    });
    //Example of preserving a JavaScript event for inline calls.
    $("#click").click(function () {
        $('#click').css({
            "background-color": "#f00",
            "color": "#fff",
            "cursor": "inherit"
        }).text(
            "Open this window again and this message will still be here."
        );
        return false;
    });
    //options

    function MM_jumpMenu(targ, selObj,
        restore) { //v3.0
        eval(targ + ".location='" + selObj.options[
            selObj.selectedIndex].value + "'");
        if (restore) selObj.selectedIndex =
            0;
    }
});