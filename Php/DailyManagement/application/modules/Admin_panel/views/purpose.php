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
                                Add Purpose
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/add_purpose" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" value="<?= $userID?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="email_address" name="purpose" class="form-control" required="required">
                                        <label class="form-label">Purpose Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label for="remember_me_2">Chose Purpose Type</label>
                                    <div class="form-line">
                                            <select data-placeholder="Choose a Type..." class="chosen-select form-control" tabindex="2" name="type" required="required">
                                                  <option value=""></option>
                                                  <option value="Earn Purpose">Earn Purpose</option>
                                                    <option value="Expense Purpose">Expense Purpose</option>
                                                </select>
                                            
                                        </div>
                                </div>


                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add An Purposes</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Purpose List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($purpose as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                                  <td><?= $s->purpose;?></td>
                                                  <td><?= $s->type;?></td>
                                                  
                                                  <td><a href="<?=base_url().'Admin_panel/edit_purpose/'.$s->id?>">Edit |<a href="<?=base_url().'Admin_panel/delete_purpose/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red">Delete</a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>


   <?php $this->load->view('footern');?>
   <script src="<?= base_url().'admin_assets/'?>js/pages/ui/dialogs.js"></script>