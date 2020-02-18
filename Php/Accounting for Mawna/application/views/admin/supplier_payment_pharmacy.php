<?php $this->load->view('admin/head_c');?>
<div class="wrapper">

  <?php
  $this->load->view('admin/leftMenu');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
        <small>Supplier List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Supplier List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Supplier</h3>
            </div>
            <form action="<?=base_url()?>Control/add_supplier_payment" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control" name="supplierID" id="supplierID">>
                           <option>Select Supplier</option>
                           <?php foreach ($supplier as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->supplier?></option>
                           <?php } ?>
                         </select>
                  </div>
                  <div class="form-group">
                    <label>Invoice No</label>
                    <input type="text" onkeyup="get_supplier_due_info(this.value)" name="invoice_no" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Due</label>
                    <input type="text" id="due" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Cheque</label>
                    <input type="text" id="cheque" class="form-control" value="0" onkeyup="calculate_due()" name="cheque">
                  </div>
                  <div class="form-group">
                    <label>Balance Due</label>
                    <input type="text" id="balance" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Cheque No</label>
                    <input type="text" id="cheque_no" name="cheque_no" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Cheque handover to</label>
                    <input type="text" id="handover_to" name="handover_to" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label>Delivered By</label>
                    <input type="text" id="deliver_by" name="deliver_by" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Supplier Payment List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Supplier</th>
                    <th>Date</th>
                    <th>Cash</th>
                    <th>Cheque</th>
                    <th>Cheque No</th>
                    <th>Handover to</th>
                    <th>Delivered By</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($payment as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?php  foreach ($supplier as $k) {
                      if($k->id==$s->supplierID){
                        echo $k->supplier;
                      }
                    } ?></td>
                    <td><?=$s->date?></td>
                    <td><?=$s->cash?></td>
                    <td><?=$s->cheque?></td>
                    <td><?=$s->cheque_no?></td>
                    <td><?=$s->handover_to?></td>
                    <td><?=$s->deliver_by?></td>
                    <td>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_supplier_payment/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
<script type="text/javascript">
function get_supplier_due_info(id) {
var base='<?php echo base_url() ?>';
var supplierID=$('#supplierID').val()
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_supplier_due_info_pharmacy", 
    data: {invoice_id:id,supplierID:supplierID},
    success: function(data){
      $('#due').val(data)
    }
  })
}
function calculate_due () {
  var due=$('#due').val()
  // var cash=parseFloat($('#cash').val())
  var cheque=parseFloat($('#cheque').val())
  $('#balance').val(due-(cheque))
}
</script>