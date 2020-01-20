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
                <li><a href="<?= base_url().'Admin_panel/diary';?>"><i class="material-icons">library_books</i>Add Diary </a></li>
                <li><a href="<?= base_url().'Admin_panel/'. $d;?>"><i class="material-icons">library_books</i> <?php echo $dd?></a></li>
            </ol>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Diary List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th> Date</th>
                                            <th>Brief</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($diary as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->dTitle;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->dDate)) ;?></td>
                                            <td><?= character_limiter($s->dBrief, 150);?></td>
                                            

                                            <td><a data-toggle="modal" title="Update diary" data-target="#diaryUpdate-<?= $s->id;?>" href="javascript:void(0);"><i class="material-icons">mode_edit</i></a>  <a href="<?=base_url().'Admin_panel/delete_diary/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red"><i class="material-icons">delete</i></a></td>
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
  <?php foreach($diary as $s){?>
<!-- Modal -->
  <div class="modal fade" id="diaryUpdate-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Diary Information</h4>
        </div>
        <div class="modal-body">
          <form action="<?=base_url()?>Admin_panel/update_diary" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= $userID?>">
            <input type="hidden" name="id" value="<?= $s->id?>">
            <div class="form-group form-float">
                <label class="form-label">Notes Title</label>
                <div class="form-line" >
                    <input type="text" name="dTitle"  value="<?= $s->dTitle?>" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label"> Date</label>
                <div class="form-line" >
                    <input type="date" name="dDate"  value="<?= $s->dDate?>" class="form-control" placeholder="Please choose a date...">
                </div>
            </div>
            <div class="form-group form-float">

                <label class="form-label">Diary Brief</label>
                <div class="form-line">

                    <textarea class="form-control ckeditor" id="ckeditor" name="dBrief">
                         <?= $s->dBrief?>
                    </textarea>
                </div>
            </div>


            <br>
            <button type="submit" id="enter" class="btn btn-primary m-t-15 waves-effect">Update Diary</button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>