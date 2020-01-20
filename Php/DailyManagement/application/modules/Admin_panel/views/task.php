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
                                Add Task
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/add_task" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" value="<?= $userID?>">

                              <div class="form-group form-float">
                                    <label class="form-label">Task Title</label>
                                    <div class="form-line" >
                                        <input type="text" name="title" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Start Date</label>
                                    <div class="form-line" >
                                        <input type="date" name="startDate" class="form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">End Date</label>
                                    <div class="form-line" >
                                        <input type="date" id="endDate" name="endDate" class="form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                        <label class="form-label">Task Brief</label>
                                    <div class="form-line">
                                        
                                        <textarea class="form-control ckeditor" id="ckeditor" name="taskBreif"></textarea>
                                    </div>
                                </div>


                                <br>
                                <button type="submit" id="enter" class="btn btn-primary m-t-15 waves-effect">Add Task</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
        </div>
    </section>


   <?php $this->load->view('footern');?>
  
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