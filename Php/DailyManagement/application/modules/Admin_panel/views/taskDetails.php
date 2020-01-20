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
                <li><a href="<?= base_url().'Admin_panel/taskList';?>"><i class="material-icons">library_books</i> Task List</a></li>
            </ol>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Task Details
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover">
                                    <!-- <thead>
                                    </thead> -->
                                    <tbody>

                                        <tr>
                                            <th>Task Title</th>
                                            <td><?= $s->title;?></td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->startDate)) ;?></td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td><?php if($s->endDate=='0000-00-00'){echo "No End Date";} else{ echo $date = date('d M, Y', strtotime($s->endDate)) ;}?></td>
                                        </tr>
                                        <tr>
                                            <th>Task Brief</th>
                                            <td><?= $s->taskBreif;?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <?php if($s->taskComplete == 'Completed'){;?>
                                                <span class="label bg-green">Completed</span>
                                                <?php }if($s->taskComplete == 'Doing'){;?>
                                                    <span class="label bg-orange">Doing</span>
                                                <?php }if($s->taskComplete == 'To Do'){;?>
                                                    <span class="label bg-blue">To Do</span>
                                                <?php }if($s->taskComplete == 'On Hold'){;?>
                                                    <span class="label bg-light-blue">On Hold</span>
                                                <?php }if($s->taskComplete == 'Suspended'){;?>
                                                    <span class="label bg-red">Suspended</span>
                                                <?php };?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a data-toggle="modal"  title="Status Update" data-target="#taskStatusUpdate-<?= $s->id;?>" href="javascript:void(0);"  style="color:red">Update Status</a>

                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
        </div>
    </section>


   <?php $this->load->view('footern');?>
  
<!-- Modal -->
  <div class="modal fade" id="taskStatusUpdate-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Task Status</h4>
        </div>
        <div class="modal-body">
          <form action="<?=base_url()?>Admin_panel/update_taskStatus" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= $userID?>">
            <input type="hidden" name="id" value="<?= $s->id?>">
            <div class="form-group form-float">
                <label class="form-label">Task Title</label>
                <div class="form-line" >
                    <select data-placeholder="Choose a Type..." class="chosen-select form-control" tabindex="2" name="taskComplete">
                        <option value="Select Status"></option>
                        <option value="Completed" <?php if($s->taskComplete=="Completed"){echo "selected";}?>>Completed</option>
                        <option value="Doing" <?php if($s->taskComplete=="Doing"){echo "selected";}?>>Doing</option>
                        <option value="To Do" <?php if($s->taskComplete=="To Do"){echo "selected";}?>>To Do</option>
                        <option value="On Hold" <?php if($s->taskComplete=="On Hold"){echo "selected";}?>>On Hold</option>

                        <option value="Suspended" <?php if($s->taskComplete=="Suspended"){echo "selected";}?>>Suspended</option>

                    </select>
                </div>
            </div>


            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Task Status</button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

