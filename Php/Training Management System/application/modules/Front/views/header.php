<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>

        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="" />

        <!-- Page Title -->
        <title>Skill Development & Technical Institute</title>

        <!-- Favicon and Touch Icons -->
        <link href="<?=base_url()?>images/logo.jpg" rel="shortcut icon" type="image/png">
        <link href="<?=base_url()?>images/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="<?=base_url()?>images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
        <link href="<?=base_url()?>images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
        <link href="<?=base_url()?>images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

        <!-- Stylesheet -->
        <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url()?>css/css-plugin-collections.css" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link id="menuzord-menu-skins" href="<?=base_url()?>css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="<?=base_url()?>css/style-main.css" rel="stylesheet" type="text/css">
        
        <!-- CSS | Preloader Styles -->
        <!-- <link href="<?=base_url()?>css/preloader.css" rel="stylesheet" type="text/css"> -->
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="<?=base_url()?>css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="<?=base_url()?>css/responsive.css" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- Revolution Slider 5.x CSS settings -->
        <link  href="<?=base_url()?>js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
        <link  href="<?=base_url()?>js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
        <link  href="<?=base_url()?>js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

        <!-- CSS | Theme Color -->
        <link href="<?=base_url()?>css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">
                <link href="<?=base_url()?>css/form.css" rel="stylesheet" type="text/css">

        <!-- external javascripts -->
        <script src="<?=base_url()?>js/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url()?>js/jquery-ui.min.js"></script>
        <script src="<?=base_url()?>js/bootstrap.min.js"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="<?=base_url()?>js/jquery-plugin-collection.js"></script>

        <!-- Revolution Slider 5.x SCRIPTS -->
        <script src="<?=base_url()?>js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?=base_url()?>js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
    </head>
    <body class="">
        <div id="wrapper" class="clearfix">
            <!-- preloader -->
            <!-- <div id="preloader">
                <div id="spinner">
                    <div class="preloader-dot-loading">
                        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                    </div>
                </div>
                <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
            </div> -->

            <!-- Header -->
            <header id="header" class="header">
                <div class="header-top bg-theme-color-2 sm-text-center p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget no-border m-0">
                                    <ul class="list-inline font-13 sm-text-center mt-5">
                                       <!--  <li>
                                            <a class="text-white" href="#">FAQ</a>
                                        </li> -->
                                        <!-- <li class="text-white">|</li> -->
                                        <li>
                                            <a class="text-white" href="<?=base_url().'contact';?>">Help Desk</a>
                                        </li>
                                        <li class="text-white">|</li>
                                        <li>
                                            <a class="text-white" href="<?=base_url().'verify'?>">Verify Certificate</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="widget m-0 pull-right sm-pull-none sm-text-center">
                                    <ul class="list-inline pull-right">
                                        <li class="mb-0 pb-0">
                                            <div class="top-dropdown-outer pt-5 pb-10">
                                                <a class="top-search-box has-dropdown text-white text-hover-theme-colored"><i class="fa fa-search font-13"></i> &nbsp;</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <div class="search-form-wrapper">
                                                            <form method="get" class="mt-10">
                                                                <input type="text" onfocus="if (this.value == 'Enter your search') {
                                                                            this.value = '';
                                                                        }" onblur="if (this.value == '') {
                                                                                    this.value = 'Enter your search';
                                                                                }" value="Enter your search" id="searchinput" name="s" class="">
                                                                <label><input type="submit" name="submit" value=""></label>
                                                            </form>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget no-border m-0 mr-15 pull-right flip sm-pull-none sm-text-center">
                                    <ul class="styled-icons icon-circled icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                                        <li><a href="http://facebook.com"><i class="fa fa-facebook text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-middle p-0 bg-lightest xs-text-center">
                    <div class="container pt-0 pb-0">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-5">
                                <div class="widget no-border m-0">
                                    <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="javascript:void(0)"><img src="<?=base_url()?>images/logo.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-phone-square text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                                        <li>
                                            <a href="<?=base_url().'contact';?>" class="font-12 text-gray text-uppercase">Call us today!</a>
                                            <h5 class="font-14 m-0"> +(88) 02-9012344</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>  
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-clock-o text-theme-colored font-36 mt-5 sm-display-block"></i></li>
                                        <li>
                                            <a href="<?=base_url().'contact';?>" class="font-12 text-gray text-uppercase">We are open!</a>
                                            <h5 class="font-13 text-black m-0"> 10:00AM-08:00PM</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-colored border-bottom-theme-color-2-1px">
                        <div class="container">
                            <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
                                <ul class="menuzord-menu">
                                    <li class="active"><a href="<?=base_url()?>">Home</a></li>

                                    <li><a href="#">About</a>
                                        <ul class="dropdown">
                                           <li><a href="<?=base_url().'sdti'?>">SDTI</a></li>
                                            <li><a href="<?=base_url().'management'?>">Management</a></li>
                                            <li><a href="<?=base_url().'organogram'?>">Organogram</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Training</a>
                                        <ul class="dropdown">
                                            <li><a href="<?=base_url().'all_course/1'?>">Short Courses</a></li>
                                            <li><a href="<?=base_url().'all_course/2'?>">Long Courses</a></li>
                                            <li><a href="<?=base_url().'all_course/3'?>">Outsourcing</a></li>
                                            <li><a href="<?=base_url().'all_course/4'?>">Diploma Courses</a></li>
                                </ul>
                                </li>
                                
                                <li><a href="#">Services</a>
                                    <ul class="dropdown">
                                    <?php
                                        $ci =& get_instance();
                                        $ci->load->model('Admin_model');
                                        $query=$ci->Admin_model->SelectDataOrder('services','*','','id','desc');
                                        foreach ($query as $k) {
                                    ?>
                                        <li><a href="<?=base_url().'services/'.$k->id?>"><?=$k->service?></a></li>
                                        <?php } ?>
                                    </ul>

                                </li> 
                                <li><a href="#">Student</a>
                                    <ul class="dropdown">
                                        <li><a href="<?=base_url().'std_list'?>">Student List</a></li>
                                        <li><a href="<?=base_url().'std_work'?>">Student's Work</a></li>
                                        <!-- <li><a href="achievement.html">Achievement & Awards</a></li>
                                        <li><a href="feedback.html">Feedback</a></li> -->
                                    </ul>

                                </li> 
                                <li><a href="<?=base_url().'gallery'?>">Galleries </a></li>
                                <li><a href="<?=base_url().'contact'?>">Contact</a></li>
                                <li><a href="<?=base_url().'job_placement'?>">Career</a></li>
                                </ul>
                                <ul class="pull-right flip hidden-sm hidden-xs">
                                    <li>
                                        <!-- Modal: Book Now Starts -->
                                        <a class="btn btn-colored btn-flat bg-theme-color-2 text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"  href="<?=base_url().'apply'?>">Apply Now</a>
                                        <!-- Modal: Book Now End -->
                                    </li>
                                </ul>
                                <div id="top-search-bar" class="collapse">
                                    <div class="container">
                                        <form role="search" action="index-mp-layout2.html#" class="search_form_top" method="get">
                                            <input type="text" placeholder="Type text and press Enter..." name="s" class="form-control" autocomplete="off">
                                            <span class="search-close"><i class="fa fa-search"></i></span>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
