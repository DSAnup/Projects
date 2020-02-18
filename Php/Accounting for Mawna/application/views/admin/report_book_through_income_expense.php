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
        Report
        <small>Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report </a></li>

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
                <h3 style="text-align:center">Book Through Income-Expense- Balance Of Cash Chart ,MDA <?=date('m-Y')?></h3>
              </div>
              <style type="text/css">
              th{
                text-align: center;
              }
              .tk{
                text-align: right;
              }
              </style>
              <?php
                $ci=&get_instance();
                $ci->load->model('Admin_model');
                $ci->load->model('Rest_model');
              ?>
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th rowspan="2">Date</th>
                    <th rowspan="2">Daily Income</th>
                    <th rowspan="2">Cumulative Income</th>
                    <th rowspan="2">Due</th>
                    <th rowspan="2">Due Paid</th>
                    <th colspan="2">Daily Expense</th>
                    <th rowspan="2">Bank Deposit</th>
                    <!--<th rowspan="2">H(P)</th>-->
                    <th rowspan="2">Cash in From Pharmacy</th>
                    <th rowspan="2">Lend</th>
                    <th rowspan="2">Lend Return</th>
                    <th colspan="2">Borrow</th>
                    <th colspan="2">Borrow Paid</th>
                    <th colspan="2">Total</th>
                    <th rowspan="2">Balance</th>
                  </tr>
                  <tr>
                    <th>Cash</th>
                    <th>Cheque</th>
                    <th>Cash</th>
                    <th>Cheque</th>
                    <th>Cash</th>
                    <th>Cheque</th>
                    <th>Cash In</th>
                    <th>Cash Out</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $cu=0; for($i=1; $i<=date('d'); $i++){ ?>
                  <tr>
                    <td><?=$i?></td>
                    <td class="tk"><?php echo $income=$ci->Admin_model->get_total_daily_income($i); ?></td>
                    <td class="tk"><?php echo $cu+=$income; ?></td>
                    <td class="tk"><?php echo $due=$ci->Admin_model->get_total_daily_due($i); ?></td>
                    <td class="tk"><?php echo $due_paid=$ci->Admin_model->get_total_daily_due_paid($i); ?></td>
                    <td class="tk"><?php echo $cash_expense=$ci->Admin_model->get_total_daily_cash_expense($i); ?></td>
                    <td class="tk"><?php echo $ck_expense=$ci->Admin_model->get_total_daily_ck_expense($i); ?></td>
                    <td class="tk"><?php echo $bank_deposit=$ci->Admin_model->get_total_daily_bank_deposit($i); ?></td>
                    <!--<td class="tk"><?php echo $hp=$ci->Admin_model->get_total_daily_president_honorium($i); ?></td>-->
                    <td class="tk"><?php echo $pharmacy=$ci->Admin_model->get_total_daily_pharmacy_cash($i); ?></td>
                    <td class="tk"><?php echo $lend=$ci->Admin_model->get_total_daily_lend($i); ?></td>
                    <td class="tk"><?php echo $lend_return=$ci->Admin_model->get_total_daily_lend_return($i); ?></td>
                    <td class="tk"><?php echo $cash_borrow=$ci->Admin_model->get_total_daily_cash_borrow($i); ?></td>
                    <td class="tk"><?php echo $ck_borrow=$ci->Admin_model->get_total_daily_cheque_borrow($i); ?></td>
                    <td class="tk"><?php echo $cash_borrow_paid=$ci->Admin_model->get_total_daily_cash_borrow_paid($i); ?></td>
                    <td class="tk"><?php echo $ck_borrow_paid=$ci->Admin_model->get_total_daily_cheque_borrow_paid($i); ?></td>
                    <td class="tk"><?=$cash_in=$income+$due_paid+$pharmacy+$lend_return+$cash_borrow+$ck_borrow?></td>
                    <td class="tk"><?=$cash_out=$ck_expense+$cash_expense+$bank_deposit+$lend+$cash_borrow_paid+$ck_borrow_paid?></td>
                    <td class="tk"><?=$cash_in-$cash_out?></td>
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
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
<script type="text/javascript">
function if_asm (v) {
  if(v=='asm'){
    $('#zone').css('display','block')
  }else{
    $('#zone').css('display','none')
  }
}

</script>