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
        Supplier Payment
        <small>Supplier  Payment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Supplier  Payment </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
                <h3><?=$s->supplier?></h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date of product Entry</th>
                    <th>Invoice No</th>
                    <th>Credit Due amount(Taka)</th>
                    <th>Date of cheque payment</th>
                    <th>Bank Cheque Name & No </th>
                    <th>Handover to</th>
                    <th>Delivered By</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($payment as $k) {?>
                  <tr>
                    <td><?=++$i;?></td>
                    <td>
                      <?php foreach ($recieve as $r) {
                        if($r->invoice_no==$k->invoice_no){
                          echo $r->date;
                        }
                      } ?>
                    </td>
                    <td><?=$k->invoice_no?></td>
                    <td>
                      <?php foreach ($recieve as $r) {
                        if($r->invoice_no==$k->invoice_no){
                          echo $r->amount;
                        }
                      } ?>
                    </td>
                    <td><?=$k->date?></td>
                    <td><?=$k->cheque_no?></td>
                    <td><?=$k->handover_to?></td>
                    <td><?=$k->deliver_by?></td>
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