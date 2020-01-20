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
                                Add Borrow
                            </h2>
                            <h6 style="background-color: lightgrey; color: red; text-align: center;"><?php echo $this->session->flashdata('item'); ?></h6> 
                        </div>
                        <div class="body">

                            <form action="<?=base_url()?>Admin_panel/add_borrow" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="userID" value="<?= $userID?>">
                                <div class="form-group form-float">
                                    <label class="form-label">Date</label>
                                    <div class="form-line" >
                                        <input type="date" name="bDate" class="form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                              <div class="form-group form-float">
                                    <label class="form-label">Borrow From</label>
                                    <div class="form-line" >
                                        <input type="text" name="borrowFrom" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="email_address" name="borrowAmount" class="form-control" required="required">
                                        <label class="form-label">Borrow Amount</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                        <label class="form-label">Comments</label>
                                    <div class="form-line">
                                        
                                        <textarea class="form-control ckeditor" id="ckeditor" name="bComments"></textarea>
                                    </div>
                                </div>


                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Borrow</button>
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
                                Borrow List
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Borrow From</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Return Balance</th>
                                            <th>Borrow Give</th>
                                            <th>Comments</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($borrow as $s) {?>
                                        <tr>
                                            <td><?= ++$i;?></td>
                                            <td><?= $s->borrowFrom;?></td>
                                            <td><?= $s->borrowAmount;?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->bDate)) ;?></td>
                                            <td><?= $s->borrowBalance;?></td>
                                            <td><?= $s->borrowGive;?></td>
                                            <td><?= character_limiter($s->bComments, 150);?></td>

                                            <td><a data-toggle="modal" title="Update Borrow" data-target="#borrowUpdate-<?= $s->id;?>" href="javascript:void(0);"><i class="material-icons">mode_edit</i></a> <a data-toggle="modal"  title="Add Borrow Back" data-target="#borrowBack-<?= $s->id;?>" href="javascript:void(0);"><i class="material-icons">add_box</i></a> <a data-toggle="modal"  title="Borrow Back History" data-target="#borrowBackHistory-<?= $s->id;?>" href="javascript:void(0);"><i class="material-icons">assignment</i></a><a title="Delete Forever" href="<?=base_url().'Admin_panel/delete_borrow/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red"><i class="material-icons">delete</i></a></td>
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
  <?php foreach($borrow as $s){?>
<!-- Modal -->
  <div class="modal fade" id="borrowUpdate-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update borrow Information</h4>
        </div>
        <div class="modal-body">
          <form action="<?=base_url()?>Admin_panel/update_borrow" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= $userID?>">
            <input type="hidden" name="id" value="<?= $s->id?>">
            <div class="form-group form-float">
                <label class="form-label">Date</label>
                <div class="form-line" >
                    <input type="date" name="bDate" class="form-control" placeholder="Please choose a date..."  value="<?= $s->bDate?>">
                </div>
            </div>
            <div class="form-group form-float">
                <label class="form-label">Borrow From</label>
                <div class="form-line" >
                    <input type="text" name="borrowFrom" class="form-control"  value="<?= $s->borrowFrom	?>">
                </div>
            </div>
            <?php if($s->borrowGive > 0){?>
            
            <span style="color:red;">* You can not change the borrow Amount (<?= $s->borrowAmount?>)</span>
        <?php } else{?>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" id="email_address" name="borrowAmount" class="form-control" required="required"  value="<?= $s->borrowAmount?>">
                    <label class="form-label">Borrow Amount</label>
                </div>
            </div>
        <?php }?>
            <div class="form-group form-float">

                <label class="form-label">Comments</label>
                <div class="form-line">

                    <textarea class="form-control ckeditor" id="ckeditor" name="bComments">
                         <?= $s->bComments?>
                    </textarea>
                </div>
            </div>


            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Borrow</button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>
<?php foreach($borrow as $s){?>
<!-- Modal -->
  <div class="modal fade" id="borrowBack-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Borrow Back</h4>
        </div>

        <div class="modal-body">
        <?php if($s->borrowAmount == $s->borrowGive){?>
          <span >Your Borrow is Balance</span>
        <?php } else{?>
            <form action="<?=base_url()?>Admin_panel/borrow_back" method="post" enctype="multipart/form-data">
            <input type="hidden" name="userID" value="<?= $userID?>">
            <input type="hidden" name="borrowId" value="<?= $s->id?>">
            <div class="form-group form-float">
                <label class="form-label">Date</label>
                <div class="form-line" >
                    <input type="date" name="hdate" class="form-control" placeholder="Please choose a date..." >
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="number" id="hamount" name="hamount" class="form-control" required="required">
                    <input type="hidden" id="borrowAmount" value="<?= $s->borrowBalance?>" class="form-control" required="required">
                    <label class="form-label">Amount Back</label>
                </div>
            </div>
            
            <span id='message'></span>
            <br>
            <input type="submit"  id="enter" value="Add borrow Amount" class="btn btn-info btn-block">
        </form>
        <?php }?> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>

   <!-- <script type="text/javascript">
        $("#hamount").keyup(function() {
 // alert($("#hamount").val());
  var user_pass = parseInt($("#hamount").val());
  var user_pass2 = parseInt($("#borrowAmount").val());
  // alert(user_pass);
  if (user_pass <= user_pass2) {
    $("#enter").prop('disabled',false)//use prop()
    $('#message').html('You can borrow back').css('color', 'green');
  } else {
    $("#enter").prop('disabled',true)//use prop()
    $('#message').html('Pay amount must be less than borrow Balance ').css('color', 'red');
    // alert("Your password doesn't same");
  }

});
   </script> -->
<?php foreach($borrow as $s){?>
<!-- Modal -->
  <div class="modal fade" id="borrowBackHistory-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Borrow Back History Of <?= $s->borrowFrom	;?></h4>
          <p>Amount Given <?= $s->borrowAmount;?></p>
        </div>
            <?php 
                $dd = $this->DS->SelectDataOrder('borrowlendhistory','*',array('borrowId'=>$s->id),'id','desc');
            ?>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Amount Back</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($dd as $s) {?>
                            <tr>
                                <td><?= ++$i;?></td>
                                <td><?= $s->hamount;?></td>
                                <td><?php echo $date = date('d M, Y', strtotime($s->hdate)) ;?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>
   
   <!-- <script src="<?= base_url().'admin_assets/'?>js/pages/ui/dialogs.js"></script> -->
   <script type="text/javascript">
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
    
   </script>