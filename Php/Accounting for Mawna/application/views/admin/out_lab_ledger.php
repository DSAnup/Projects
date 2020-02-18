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
    Out Lab Ledger 
         <small>Out Lab  Ledger </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?= base_url() . 'Control/admin_list' ?>">Out Lab  Ledger  </a></li>

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
                <h3>Out Lab  Ledger</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th rowspan="2">SL</th>
                    <th rowspan="2">Lab</th>
                    <th rowspan="2">Due</th>
                    <th colspan="2" style="text-align:center">Paid</th>
                    <th rowspan="2">Balance Due</th>
                  </tr>
                  <tr>
                    <th>Cash</th>
                    <th>Cheque</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                   $i=0; foreach ($lab as $s) {
                    $sale=$ci->Admin_model->get_out_lab_test($s->id);
                    $pay_cash=$ci->Admin_model->get_out_lab_payment_cash($s->id);
                    $pay_cheque=$ci->Admin_model->get_out_lab_payment_cheque($s->id);
                    ?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->name?></td>
                    <td><?=$sale?></td>
                    <td><?=$pay_cash?></td>
                    <td><?=$pay_cheque?></td>
                    <td><?=$sale-($pay_cheque+$pay_cash)?></td>
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
<input type="hidden" value="1" id="sl">
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
