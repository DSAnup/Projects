<?php $this->load->view('header');?>
<?php $userID = $this->session->userdata('userID');;?>
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
            <ol class="breadcrumb breadcrumb-bg-teal align-right">
                <?php $d =$this->uri->segment(2);
                    $dd = ucwords(str_replace('-', ' ', $d));
                ?>
                <li><a href="<?= base_url().'Admin_panel'?>"><i class="material-icons">home</i> Home</a></li>
                <li><a href="<?= base_url().'Admin_panel/'. $d;?>"><i class="material-icons">library_books</i> <?php echo $dd?></a></li>
                <li><a href="<?= base_url().'Admin_panel/diaryList';?>"><i class="material-icons">library_books</i> Diary List</a></li>
            </ol>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Diary
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/add_diary" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" value="<?= $userID?>">

                              <div class="form-group form-float">
                                    <label class="form-label">Notes Title</label>
                                    <div class="form-line" >
                                        <input type="text" name="dTitle" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label"> Date</label>
                                    <div class="form-line" >
                                        <input type="date" name="dDate" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                        <label class="form-label">Brief</label>
                                    <div class="form-line">
                                        
                                        <textarea class="form-control ckeditor" id="ckeditor" name="dBrief"></textarea>
                                    </div>
                                </div>


                                <br>
                                <button type="submit" id="enter" class="btn btn-primary m-t-15 waves-effect">Add Diary</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
        </div>
    </section>


   <?php $this->load->view('footern');?>
  