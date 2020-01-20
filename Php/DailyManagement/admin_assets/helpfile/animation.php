<?php $this->load->view('header');?>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php $this->load->view('topbar');?>
    <section>
        <?php $this->load->view('leftsidebar');?>
        <?php $this->load->view('rightsidebar');?>
    </section>

        <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ANIMATIONS</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CSS ANIMATIONS
                                <small>Pure css animations - <a href="https://daneden.github.io/animate.css/" target="_blank">daneden.github.io/animate.css</a></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <img src="<?= base_url().'admin_assets/'?>/images/animation-bg.jpg" class="js-animating-object img-responsive">
                            <div class="demo-image-copyright">
                                This image taken from <a href="https://unsplash.com" target="_blank">Unsplash</a>
                            </div>
                            <select class="js-animations form-control show-tick">
                                <optgroup label="Attention Seekers">
                                    <option value="bounce">bounce</option>
                                    <option value="flash">flash</option>
                                    <option value="pulse">pulse</option>
                                    <option value="rubberBand">rubberBand</option>
                                    <option value="shake">shake</option>
                                    <option value="swing">swing</option>
                                    <option value="tada">tada</option>
                                    <option value="wobble">wobble</option>
                                    <option value="jello">jello</option>
                                </optgroup>
                                <optgroup label="Bouncing Entrances">
                                    <option value="bounceIn">bounceIn</option>
                                    <option value="bounceInDown">bounceInDown</option>
                                    <option value="bounceInLeft">bounceInLeft</option>
                                    <option value="bounceInRight">bounceInRight</option>
                                    <option value="bounceInUp">bounceInUp</option>
                                </optgroup>
                                <optgroup label="Bouncing Exits">
                                    <option value="bounceOut">bounceOut</option>
                                    <option value="bounceOutDown">bounceOutDown</option>
                                    <option value="bounceOutLeft">bounceOutLeft</option>
                                    <option value="bounceOutRight">bounceOutRight</option>
                                    <option value="bounceOutUp">bounceOutUp</option>
                                </optgroup>
                                <optgroup label="Fading Entrances">
                                    <option value="fadeIn">fadeIn</option>
                                    <option value="fadeInDown">fadeInDown</option>
                                    <option value="fadeInDownBig">fadeInDownBig</option>
                                    <option value="fadeInLeft">fadeInLeft</option>
                                    <option value="fadeInLeftBig">fadeInLeftBig</option>
                                    <option value="fadeInRight">fadeInRight</option>
                                    <option value="fadeInRightBig">fadeInRightBig</option>
                                    <option value="fadeInUp">fadeInUp</option>
                                    <option value="fadeInUpBig">fadeInUpBig</option>
                                </optgroup>
                                <optgroup label="Fading Exits">
                                    <option value="fadeOut">fadeOut</option>
                                    <option value="fadeOutDown">fadeOutDown</option>
                                    <option value="fadeOutDownBig">fadeOutDownBig</option>
                                    <option value="fadeOutLeft">fadeOutLeft</option>
                                    <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                    <option value="fadeOutRight">fadeOutRight</option>
                                    <option value="fadeOutRightBig">fadeOutRightBig</option>
                                    <option value="fadeOutUp">fadeOutUp</option>
                                    <option value="fadeOutUpBig">fadeOutUpBig</option>
                                </optgroup>
                                <optgroup label="Flippers">
                                    <option value="flip">flip</option>
                                    <option value="flipInX">flipInX</option>
                                    <option value="flipInY">flipInY</option>
                                    <option value="flipOutX">flipOutX</option>
                                    <option value="flipOutY">flipOutY</option>
                                </optgroup>
                                <optgroup label="Lightspeed">
                                    <option value="lightSpeedIn">lightSpeedIn</option>
                                    <option value="lightSpeedOut">lightSpeedOut</option>
                                </optgroup>
                                <optgroup label="Rotating Entrances">
                                    <option value="rotateIn">rotateIn</option>
                                    <option value="rotateInDownLeft">rotateInDownLeft</option>
                                    <option value="rotateInDownRight">rotateInDownRight</option>
                                    <option value="rotateInUpLeft">rotateInUpLeft</option>
                                    <option value="rotateInUpRight">rotateInUpRight</option>
                                </optgroup>
                                <optgroup label="Rotating Exits">
                                    <option value="rotateOut">rotateOut</option>
                                    <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                                    <option value="rotateOutDownRight">rotateOutDownRight</option>
                                    <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                                    <option value="rotateOutUpRight">rotateOutUpRight</option>
                                </optgroup>
                                <optgroup label="Sliding Entrances">
                                    <option value="slideInUp">slideInUp</option>
                                    <option value="slideInDown">slideInDown</option>
                                    <option value="slideInLeft">slideInLeft</option>
                                    <option value="slideInRight">slideInRight</option>
                                </optgroup>
                                <optgroup label="Sliding Exits">
                                    <option value="slideOutUp">slideOutUp</option>
                                    <option value="slideOutDown">slideOutDown</option>
                                    <option value="slideOutLeft">slideOutLeft</option>
                                    <option value="slideOutRight">slideOutRight</option>
                                </optgroup>
                                <optgroup label="Zoom Entrances">
                                    <option value="zoomIn">zoomIn</option>
                                    <option value="zoomInDown">zoomInDown</option>
                                    <option value="zoomInLeft">zoomInLeft</option>
                                    <option value="zoomInRight">zoomInRight</option>
                                    <option value="zoomInUp">zoomInUp</option>
                                </optgroup>
                                <optgroup label="Zoom Exits">
                                    <option value="zoomOut">zoomOut</option>
                                    <option value="zoomOutDown">zoomOutDown</option>
                                    <option value="zoomOutLeft">zoomOutLeft</option>
                                    <option value="zoomOutRight">zoomOutRight</option>
                                    <option value="zoomOutUp">zoomOutUp</option>
                                </optgroup>
                                <optgroup label="Specials">
                                    <option value="hinge">hinge</option>
                                    <option value="rollIn">rollIn</option>
                                    <option value="rollOut">rollOut</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <?php $this->load->view('footern');?>
<script src="<?= base_url().'admin_assets/'?>/js/pages/ui/animations.js"></script>