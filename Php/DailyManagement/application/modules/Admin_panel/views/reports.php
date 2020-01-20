<?php $this->load->view('header');?>
<?php $userID = $this->session->userdata('userID');;?>
<style type="text/css">
     @media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
  #menubar {display: none;}
  #footer{display: none;}
}
</style>
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
    <section id="menubar">
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
                <!-- <li><a href="<?= base_url().'Admin_panel/diary';?>"><i class="material-icons">library_books</i>Add Diary </a></li> -->
                <li><a href="<?= base_url().'Admin_panel/'. $d;?>"><i class="material-icons">library_books</i> <?php echo $dd?></a></li>
            </ol>
            <!-- Basic Examples -->
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                <?php $dd = $this->uri->segment(2); if($dd=='reportsByDate'){?>
                        <div class="header">
                            <h2 style="text-align: center; font-weight: bolder;">
                                Summary Of <?php echo $date = date('d M, Y', strtotime($startDate)) ;?> To
                                <?php echo $date = date('d M, Y', strtotime($endDate)) ;?>
                            </h2>
                            <form method="post" action="<?= base_url().'Admin_panel/reportsPrintByDate'?>">
                                <input type="hidden" name="startDate" value="<?= $startDate?>">
                                <input type="hidden" name="endDate" value="<?= $endDate?>">
                                <input type="submit" value="Print Preview">
                            </form>
                        </div>
                    <?php } if($dd=='reportsByMonth'){?>
                        <div class="header">
                            <h2 style="text-align: center; font-weight: bolder;">
                                Summary Of <?php echo $date = date('M, Y', strtotime($monthYear)) ;?>
                                
                            </h2>
                            <form method="post" action="<?= base_url().'Admin_panel/reportsPrintByMonth'?>">
                                <input type="hidden" name="monthYear" value="<?= $monthYear?>">
                                <input type="submit" value="Print Preview">
                            </form>
                        </div>
                    
                    <?php } if($dd=='reportsByYear'){?>
                        <div class="header">
                            <h2 style="text-align: center; font-weight: bolder;">
                                Summary Of Year <?php echo $year;?>
                                
                            </h2>
                            <form method="post" action="<?= base_url().'Admin_panel/reportsPrintByYear'?>">
                                <input type="hidden" name="year" value="<?= $year?>">
                                <input type="submit" value="Print Preview">
                            </form>
                        </div>
                    <?php }?>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>Total Earning</th>
                                            <td><?= $earnReportSum->eAmount;?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Expense</th>
                                            <td><?= $expenseReportSum->exAmount;?></td>
                                        </tr>
                                        <tr>
                                            <th> Total Borrow (Balance Only)</th>
                                            <td><?= $dateReportBorrowBalanceSum->borrowBalance;?></td>
                                        </tr>
                                        <tr>
                                            <th> Total Lend (Balance Only)</th>
                                            <td><?= $dateReportLendBalanceSum->lendBalance;?></td>
                                        </tr>
                                            
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                Earn List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Purpose</th>
                                            <th> Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($earnReport as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <?php if($s->purId == 0){?>
                                                <td><?= $s->earnPurpose?></td>
                                            <?php }else{ foreach($purpose as $p){ if($p->id == $s->purId){?>
                                                <td><?= $p->purpose?></td>
                                            <?php } } }?>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->eDate)) ;?></td>
                                            <td><?= $s->eAmount;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total Earn Amount</th>
                                            <td><?= $earnReportSum->eAmount;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                        <div class="card">
                        <div class="header">
                            <h2>
                                Expense List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Purpose</th>
                                            <th> Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($expenseReport as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <?php if($s->purId == 0){?>
                                                <td><?= $s->exPurpose?></td>
                                            <?php }else{ foreach($purpose as $p){ if($p->id == $s->purId){?>
                                                <td><?= $p->purpose?></td>
                                            <?php } } }?>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->exDate)) ;?></td>
                                            <td><?= $s->exAmount;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total Amount</th>
                                            <td><?= $expenseReportSum->exAmount;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                Borrow List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Borrow Form</th>
                                            <th>Date</th>
                                            <th>Borrow Amount</th>
                                            <th>Borrow Give</th>
                                            <th>Borrow Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($borrowReport as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->borrowFrom;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->bDate)) ;?></td>
                                            <td><?= $s->borrowAmount;?></td>
                                            <td><?= $s->borrowGive;?></td>
                                            <td><?= $s->borrowBalance;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total </th>
                                            <td><?= $dateReportBorrowAmountSum->borrowAmount;?></td>
                                            <td><?= $dateReportBorrowGiveSum->borrowGive;?></td>
                                            <td><?= $dateReportBorrowBalanceSum->borrowBalance;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                Lend List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Lend To</th>
                                            <th>Date</th>
                                            <th>Lend Amount</th>
                                            <th>Lend Back</th>
                                            <th>Lend Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($dateReportLend as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->lendTo;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->lDate)) ;?></td>
                                            <td><?= $s->lendAmount;?></td>
                                            <td><?= $s->lendReturn;?></td>
                                            <td><?= $s->lendBalance;?></td>
                                            
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total </th>
                                            <td><?= $dateReportLendAmountSum->lendAmount;?></td>
                                            <td><?= $dateReportLendGiveSum->lendReturn;?></td>
                                            <td><?= $dateReportLendBalanceSum->lendBalance;?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        <!-- </div>   -->         
            <!-- #END# Basic Examples -->
            
        </div>
    </section>


   <?php $this->load->view('footern');?>
  