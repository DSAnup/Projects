<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TMS | Dashboard </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?=base_url().'admins/'?>img/logo.png"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="<?=base_url().'admins/'?>css/app.css"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="<?=base_url().'admins/'?>vendors/swiper/css/swiper.min.css">
    <link href="<?=base_url().'admins/'?>vendors/nvd3/css/nv.d3.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=base_url().'admins/'?>vendors/lcswitch/css/lc_switch.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url().'admins/'?>css/custom.css">

    <link href="<?=base_url().'admins/'?>css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url().'admins/'?>css/custom_css/dashboard1_timeline.css" rel="stylesheet"/>

    <!--end of page level css-->
<script type="text/javascript">
(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.10.506#p=toshibaxmq01abf050_75l7s3x8sxx75l7s3x8p";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script></head>


<body class="skin-default">
<div class="preloader">
    <div class="loader_img"><img src="<?=base_url().'admins/'?>img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the marginin -->
            <img src="<?=base_url().'images/logo2.png'?>" alt="logo" width='50'/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="index.html#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                
                <!--rightside toggle-->
              
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        
                        <div class="riot">
                            <div>
                                <?=$this->session->userdata('name')?>
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">                            
                            <p> <?=$this->session->userdata('name')?></p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3"><a href="#"> <i class="fa fa-fw ti-user"></i> My Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <li><a href="#"> <i class="fa fa-fw ti-settings"></i> Account Settings </a></li>
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#">
                                    <i class="fa fa-fw ti-lock"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="<?=base_url().'Admin/logout'?>">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>