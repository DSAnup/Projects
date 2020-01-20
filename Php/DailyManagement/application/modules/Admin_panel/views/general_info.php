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
            
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update General Information
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/update_general_info" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $adm->id?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="email_address" name="ser_title" class="form-control" required="required"  value="<?= $adm->ser_title?>">
                                        <label class="form-label">Service Title</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="email_address" name="ser_desc" class="form-control" required="required"  value="<?= $adm->ser_desc?>">
                                        <label class="form-label">Service Short Description</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">MY CV</label>
                                    <div class="form-line">
                                        <input type="file" name="resume" class="form-control">
                                        <br>
                                        <a href="<?= base_url().'uploads/'.$adm->resume?>" target="_blank">Click to See</a>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Services Background</label>
                                    <div class="form-line">
                                        <input type="file" name="service_back" class="form-control">
                                        <br>
                                        <img src="<?= base_url().'uploads/'.$adm->service_back?>" style="width: 420px; height: 250px" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Slider Background</label>
                                    <div class="form-line">
                                        <input type="file" name="home_pic" class="form-control">
                                        <br>
                                        <img src="<?= base_url().'uploads/'.$adm->home_pic?>" style="width: 420px; height: 250px" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Star Background</label>
                                    <div class="form-line">
                                        <input type="file" name="stat_back" class="form-control">
                                        <br>
                                        <img src="<?= base_url().'uploads/'.$adm->stat_back?>" style="width: 420px; height: 250px" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Work Experience Photo</label>
                                    <div class="form-line">
                                        <input type="file" name="exp_pic" class="form-control">
                                        <br>
                                        <img src="<?= base_url().'uploads/'.$adm->exp_pic?>" style="width: 420px; height: 250px" class="img-responsive">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Skill Background Photo</label>
                                    <div class="form-line">
                                        <input type="file" name="skill_back" class="form-control">
                                        <br>
                                        <img src="<?= base_url().'uploads/'.$adm->skill_back?>" style="width: 420px; height: 250px" class="img-responsive">
                                    </div>
                                </div>


                                <br>
                                <button type="submit" class="btn btn-primary btn-block waves-effect">Update User</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
        </div>
    </section>


   <?php $this->load->view('footern');?>


   