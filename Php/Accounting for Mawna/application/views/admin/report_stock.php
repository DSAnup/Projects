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
    Stock Report 
         <small>Stock Report </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?= base_url() . 'Control/admin_list' ?>">Stock Report  </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive" id="img">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Stock Report</h3>
              </div>
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Product Name & Category</th>
                    <th>Code</th>
                    <th>Opening Qty</th>
                    <th>Receive Qty</th>
                    <th>Total Qty</th>
                    <th>Sale Qty</th>
                    <th>MRP</th>
                    <th>Amount</th>
                    <th>Per piece profit</th>
                    <th>Total Profit</th>
                    <th>Closing Qty</th>
                    <th>Closing Amount -TK</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $ci=&get_instance();
                  $ci->load->model('Admin_model');
                  $i=0; foreach ($product as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->name?></td>
                    <td><?=$s->code?></td>
                    <td><?php echo $open=$ci->Admin_model->opening_stock($s->id)?></td>
                    <td><?php echo $receive=$ci->Admin_model->product_recieve($s->id)?></td>
                    <td><?=$open+$receive?></td>
                    <td><?php echo $sold=$ci->Admin_model->product_sold($s->id)?></td>
                    <td><?=$s->price?></td>
                    <td><?=($open+$receive)*$s->price?></td>
                    <td><?=$s->profit?></td>
                    <td><?=$s->profit*$sold?></td>
                    <td><?=$closing=($open+$receive)-$sold?></td>
                    <td><?=$closing*$s->price?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="panel-footer text-left">
            <a class="btn btn-danger" href="<?=base_url()?>Control/test_sale">Cancel</a>
            <button class="btn btn-info" onclick="jQuery.print('#img')"><span class="fa fa-print"></span></button>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<input type="hidden" value="<?=$ii?>" id="sl">
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
