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
            </ol>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Purpose
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/update_purpose" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" value="<?= $userID?>">
                                <input type="hidden" name="id" value="<?= $s->id?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="email_address" name="purpose" class="form-control" value="<?= $s->purpose?>" required="required">
                                        <label class="form-label">Purpose Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label for="remember_me_2">Chose Purpose Type</label>
                                    <div class="form-line">
                                            <select data-placeholder="Choose a Type..." class="chosen-select form-control" tabindex="2" name="type" required="required">
                                                  <option value=""></option>
                                                  <option value="Earn Purpose" <?php if ($s->type =="Earn Purpose") {
                                                      echo "Selected";
                                                  }?>>Earn Purpose</option>
                                                    <option value="Expense Purpose" <?php if ($s->type =="Expense Purpose") {
                                                        echo "Selected";
                                                    }?>>Expense Purpose</option>
                                                </select>
                                            
                                        </div>
                                </div>


                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Purposes</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
        </div>
    </section>


   <?php $this->load->view('footern');?>
   <script src="<?= base_url().'admin_assets/'?>js/pages/ui/dialogs.js"></script>