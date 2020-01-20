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
                <?php if($dd =='Expense_dateWise'){?>
                <li><a href="<?= base_url().'Admin_panel/expense_list';?>"><i class="material-icons">library_books</i> Expense List</a></li><?php }?>
                <li><a href="<?= base_url().'Admin_panel/'. $d;?>"><i class="material-icons">library_books</i> <?php echo $dd?></a></li>
            </ol>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Expense List
                            </h2>
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                        <?php if($dd =='Expense_list'){?>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        <?php } else{?>
                                            <th>Purpose</th>
                                            <th>Total Amount</th>
                                        <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($expense as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->exDate)) ;?></td>

                                            <?php if($dd =='Expense_list'){?>
                                            <td><?php  $eam = $this->AM->dateGroupExpenseSum($s->exDate, $userID); echo $eam->exAmount ;?></td> 
                                            <!-- <td><?= $s->exDate;?></td> -->
                                            <td><a href="<?= base_url().'Admin_panel/expense_dateWise/'.$s->exDate?>">See Full History</a></td>
                                            <?php } else{?>
                                            <?php if($s->purId == 0){?>
                                                <td><?= $s->exPurpose?></td>
                                            <?php }else{?>
                                                <td><?= $s->purpose?></td>
                                            <?php }?>
                                                <td><?= $s->exAmount;?></td> 
                                            <?php }?>
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
   <?php foreach($expense as $s){?>
<!-- Modal -->
  <div class="modal fade" id="myModal-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Expense Information</h4>
        </div>
        <div class="modal-body">
          <form action="<?=base_url()?>Admin_panel/update_expense" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= $userID?>">
            <input type="hidden" name="id" value="<?= $s->id;?>">
            <div class="form-group form-float">
                <label class="form-label">Date</label>
                <div class="form-line" >
                    <input type="date" name="exDate" value="<?= $s->exDate;?>" class="form-control" placeholder="Please choose a date...">
                </div>
            </div>
            <div class="form-group form-float">
                <label for="remember_me_2">Chose Expense Purpose</label>
                <div class="form-line">
                    <select data-placeholder="Choose a Purpose..." class="chosen-select form-control" tabindex="2" name="purId">
                      <option value=""></option>
                      <?php foreach($purpose as $p){?>
                          <option value="<?= $p->id?>" <?php if($p->id == $s->purId){echo "selected";}?>><?= $p->purpose?></option>
                      <?php }?>
                  </select>

              </div>
          </div>
          <h5>OR</h5>
          <div class="form-group form-float">
            <label class="form-label">Type Purpose</label>
            <div class="form-line" >
                <input type="text" name="exPurpose" value="<?= $s->exPurpose;?>" class="form-control">
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" id="email_address" value="<?= $s->exAmount;?>" name="exAmount" class="form-control" required="required">
                <label class="form-label">Amount</label>
            </div>
        </div>



        <br>
        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Expenses</button>
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>
  
   <script src="<?= base_url().'admin_assets/'?>js/pages/ui/dialogs.js"></script>

   <!-- <script type="text/javascript">
    $(document).ready(function() {
    var printCounter = 0;
 
    // Append a caption to the table before the DataTables initialisation
    $('#mainTable').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
 
    $('#mainTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'copy',
            {
                extend: 'excel',
                title: 'My title' + '\n' + 'a new line',

            },
            {
                extend: 'csv',
                title: 'My title' + '\n' + 'a new line',

            },
            {
                extend: 'pdf',
                messageBottom: null,
                title: 'My title' + '\n' + 'a new line',
                customize: function(doc) {
                 doc.styles.title = {
                   color: 'lightgrey',
                   fontSize: '15',
                   background: 'blue',
                   alignment: 'center'
                 }   
               } 
            },
            {
                extend: 'print',
                title: '<h5 style="color:red;">Hello</h5>',
                
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }

            }
        ]
    } );
} );
    
   </script> -->