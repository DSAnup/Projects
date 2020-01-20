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
                <li><a href="<?= base_url().'Admin_panel/task';?>"><i class="material-icons">library_books</i>Add Task </a></li>
                <li><a href="<?= base_url().'Admin_panel/'. $d;?>"><i class="material-icons">library_books</i> <?php echo $dd?></a></li>
            </ol>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Task List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Brief</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($task as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->title;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->startDate)) ;?></td>
                                            <td><?php if($s->endDate=='0000-00-00'){echo "No End Date";} else{ echo $date = date('d M, Y', strtotime($s->endDate)) ;}?></td>
                                            <td><?= character_limiter($s->taskBreif, 150);?></td>
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

                                            <td><a data-toggle="modal" title="Update Task" data-target="#taskUpdate-<?= $s->id;?>" href="javascript:void(0);"><i class="material-icons">mode_edit</i></a> <a data-toggle="modal"  title="Status Update" data-target="#taskStatusUpdate-<?= $s->id;?>" href="javascript:void(0);"  style="color:purple"><i class="material-icons">donut_small</i></a> <a href="<?=base_url().'Admin_panel/delete_task/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red"><i class="material-icons">delete</i></a></td>
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
  <?php foreach($task as $s){?>
<!-- Modal -->
  <div class="modal fade" id="taskUpdate-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Task Information</h4>
        </div>
        <div class="modal-body">
          <form action="<?=base_url()?>Admin_panel/update_task" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= $userID?>">
            <input type="hidden" name="id" value="<?= $s->id?>">
            <div class="form-group form-float">
                <label class="form-label">Task Title</label>
                <div class="form-line" >
                    <input type="text" name="title"  value="<?= $s->title?>" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label">Start Date</label>
                <div class="form-line" >
                    <input type="date" name="startDate"  value="<?= $s->startDate?>" class="form-control" placeholder="Please choose a date...">
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label">End Date</label>
                <div class="form-line" >
                    <input type="date" id="endDate" value="<?= $s->endDate?>" name="endDate" class="form-control" placeholder="Please choose a date...">
                </div>
            </div>
            <div class="form-group form-float">

                <label class="form-label">Task Brief</label>
                <div class="form-line">

                    <textarea class="form-control ckeditor" id="ckeditor" name="taskBreif">
                         <?= $s->taskBreif?>
                    </textarea>
                </div>
            </div>


            <br>
            <button type="submit" id="enter" class="btn btn-primary m-t-15 waves-effect">Update Task</button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>
<script type="text/javascript">
        $("#endDate").change(function() {
    var endDate = ($("#endDate").val());
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = yyyy + '-' + mm + '-' + dd;
    if (endDate < today) {
        alert("'End Date must be greater than Today'");
    $("#enter").prop('disabled',true)//use prop()
  } else {
    $("#enter").prop('disabled',false)//use prop()
    // alert("Your password doesn't same");
  }

});
   </script>
   <?php foreach($task as $s){?>
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

<?php }?>