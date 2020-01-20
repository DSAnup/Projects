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
                <h2>BASIC FORM ELEMENTS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">

                            <form>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control">
                                        <label class="form-label">Email Address</label>
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control">
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>

                                <input type="checkbox" id="remember_me_2" class="filled-in">
                                <label for="remember_me_2">Remember Me</label>
                                <br>
                                <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                            </form>


                            <h2 class="card-inside-title">Floating Label Examples</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control">
                                            <label class="form-label">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" />
                                            <!-- <label class="form-label">Large Input</label> -->
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" />
                                            <label class="form-label">Default Input</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-sm">
                                        <label for="remember_me_2">CkEditor</label>
                                        <div class="form-line">
                                            <textarea class="form-control ckeditor" id="ckeditor"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="remember_me_2">Choosen Data</label>
                                        <div class="form-line">
                                            <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="pId">
                                                  <option value=""></option>
                                                  <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
            <!--Bootstrap Date Picker -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BOOTSTRAP DATE PICKER
                                <small>Taken from <a href="https://github.com/uxsolutions/bootstrap-datepicker" target="_blank">github.com/uxsolutions/bootstrap-datepicker</a></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-3">
                                    <h2 class="card-inside-title">Text Input</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" class="form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <h2 class="card-inside-title">Component</h2>
                                    <div class="input-group date" id="bs_datepicker_component_container">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Please choose a date...">
                                        </div>
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <h2 class="card-inside-title">Range</h2>
                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Date start...">
                                        </div>
                                        <span class="input-group-addon">to</span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Date end...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--#END# Bootstrap Date Picker -->
            <!-- Checkbox -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CHECKBOX
                                <small>Taken from <a href="http://materializecss.com/" target="_blank">materializecss.com</a></small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Basic Examples</h2>
                            <div class="demo-checkbox">
                                <input type="checkbox" id="basic_checkbox_1" checked />
                                <label for="basic_checkbox_1">Default</label>
                                <input type="checkbox" id="basic_checkbox_2" class="filled-in" checked />
                                <label for="basic_checkbox_2">Filled In</label>
                                <input type="checkbox" id="basic_checkbox_3" checked disabled />
                                <label for="basic_checkbox_3">Default - Disabled</label>
                                <input type="checkbox" id="basic_checkbox_4" class="filled-in" checked disabled />
                                <label for="basic_checkbox_4">Filled In - Disabled</label>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Checkbox -->
            <!-- Radio -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RADIO
                                <small>Taken from <a href="http://materializecss.com/" target="_blank">materializecss.com</a></small>
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Basic Examples</h2>
                            <div class="demo-radio-button">
                                <input name="group1" type="radio" id="radio_1" checked />
                                <label for="radio_1">Radio - 1</label>
                                <input name="group1" type="radio" id="radio_2" />
                                <label for="radio_2">Radio - 2</label>
                                <input name="group1" type="radio" class="with-gap" id="radio_3" />
                                <label for="radio_3">Radio - With Gap</label>
                                <input name="group1" type="radio" id="radio_4" class="with-gap" />
                                <label for="radio_4">Radio - With Gap</label>
                                <input name="group2" type="radio" id="radio_5" checked disabled />
                                <label for="radio_5">Radio - Disabled</label>
                                <input name="group3" type="radio" id="radio_6" class="with-gap" checked disabled />
                                <label for="radio_6">Radio - Disabled</label>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Radio -->
            <!-- Switch Button -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SWITCH BUTTON
                                <small>Taken from <a href="http://materializecss.com/" target="_blank">materializecss.com</a></small>
                            </h2>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Basic Examples</h2>
                            <div class="demo-switch">
                                <div class="switch">
                                    <label>OFF<input type="checkbox" checked><span class="lever"></span>ON</label>
                                </div>
                                <div class="switch">
                                    <label>DISABLED<input type="checkbox" disabled><span class="lever"></span></label>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            <!--#END# Switch Button -->
            
        </div>
    </section>

   <?php $this->load->view('footern');?>