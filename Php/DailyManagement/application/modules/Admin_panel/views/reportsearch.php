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
                                Reports By Date
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/reportsByDate" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" id="userID" value="<?= $userID?>">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <label class="form-label">Start Date</label>
                                    <div class="form-line" >
                                        <input type="date" name="startDate" class="form-control" required="required">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <label class="form-label">End Date</label>
                                    <div class="form-line" >
                                        <input type="date" name="endDate" class="form-control" required="required">
                                    </div>
                                </div>
                                </div>
                                <br>
                                <button type="submit" id="search" class="btn btn-primary m-t-15 waves-effect">Search</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Reports By Month
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/reportsByMonth" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" id="userID" value="<?= $userID?>">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <label for="remember_me_2">Select Month</label>
                                    <div class="form-line">
                                        <select data-placeholder="Select Month..." class="form-control chosen-select" tabindex="2" name="month" id="month" required="required">
                                          <option value=""></option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                      </select>
                                      
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <label class="form-label">Years</label>
                                    <div class="form-line" >
                                        <input type="text" name="year" id="year" class="form-control" required="required" placeholder="Type a year" minlength="4" maxlength="4">
                                    </div>
                                </div>
                                </div>
                                <br>
                                <button type="submit" id="searchm" class="btn btn-primary m-t-15 waves-effect">Search</button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Reports By Years
                            </h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/reportsByYear" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" id="userID" value="<?= $userID?>">
                                <div class="col-md-4">
                                <div class="form-group form-float">
                                    <label class="form-label">Years</label>
                                    <div class="form-line" >
                                        <input type="text" name="year" id="year2" class="form-control" required="required" placeholder="Type a year" minlength="4" maxlength="4">
                                    </div>
                                </div>
                                </div>
                                <br>
                                <button type="submit" id="search" class="btn btn-primary m-t-15 waves-effect">Search</button>
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
    $('#year').keyup(function(){
        var dd = $('#year').val();
        if(isNaN(dd)){
            alert('You must need enter Number')
            $('#year').val("");
        }
    })
    $('#year').click(function(){
        var d = $('#month').val();

        if(d === ""){
            alert('You must select an month')
        }
    })
    $('#year2').keyup(function(){
        var dd = $('#year2').val();
        if(isNaN(dd)){
            alert('You must need enter Number')
            $('#year2').val("");
        }
    })
</script>