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
                <h3 style="text-align:center">Monthly Cash Flow Statement, MDA <?=date('F-Y')?></h3>
              </div>
              <style type="text/css">
              th,td{
                text-align: center;
              }
              .tk{
                text-align: right;
              }
              .n{
                text-align: left;
              }
              </style>
              <?php
              $ci=&get_instance();
              $ci->load->model('Admin_model');
              $ci->load->model('Rest_model');
              ?>

              <?php $exp_cash=0; $exp_ck=0; $exp_cash_pre=0;$exp_ck_pre=0; $i=0; foreach ($category as $k) {?>
                    
                      <?php  $ex_cash=$ci->Admin_model->get_expense_monthly_category_wise_cash($k->id,date('Y-m')); $exp_cash+=$ex_cash;?>
                      <?php  $ex_ck=$ci->Admin_model->get_expense_monthly_category_wise_ck($k->id,date('Y-m')); $exp_ck+=$ex_ck;?>
                      <?php  $ex_cash_pre=$ci->Admin_model->get_expense_monthly_category_wise_cash($k->id,(date('Y')-1).'-'.date('m')); $exp_cash_pre+=$ex_cash_pre;?>
                      <?php  $ex_ck_pre=$ci->Admin_model->get_expense_monthly_category_wise_ck($k->id,(date('Y')-1).'-'.date('m')); $exp_ck_pre+=$ex_ck_pre;?>
                    
                    <?php } ?>
              <div class="col-md-6">
                <table class="table table-bordered table-striped" style="border:1px">
                  <caption style="text-align:center"><h3>CASH IN</h3></caption>
                  <thead style="background-color: #79a0e0">
                    <tr>
                      <th>SL</th>
                      <th>Particular</th>
                      <th>Free</th>
                      <th><?=date('F-Y')?></th>
                      <th><?=date_format(date_create(date('Y').'-'.(date('m')-1)),'F-Y')?></th>
                    </tr>
                  </thead>
                  <tbody id="itembody">
                    <tr>
                      <td>01</td>
                      <td class="n">Product Sale</td>
                      <td><?=$free_product?></td>
                      <td class="tk"><?=$product?></td>
                      <td class="tk"><?=$product_pre?></td>
                    </tr>
                    <tr>
                      <td>02</td>
                      <td class="n">Tests</td>
                      <td><?=$free_test?></td>
                      <td class="tk"><?=$test?></td>
                      <td class="tk"><?=$test_pre?></td>
                    </tr>
                    <tr>
                      <td>03</td>
                      <td class="n">Dr Fee</td>
                      <td></td>
                      <td class="tk"><?=$dr?></td>
                      <td class="tk"><?=$dr_pre?></td>
                    </tr>
                    <tr>
                      <td>04</td>
                      <td class="n">Pharmacy</td>
                      <td></td>
                      <td class="tk"><?=$pharmacy?></td>
                      <td class="tk"><?=$pharmacy_pre?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <th>1 To 4 Total</th>
                      <td></td>
                      <th class="tk"><?=$pharmacy+$product+$test+$dr?></th>
                      <th class="tk"><?=$pharmacy_pre+$product_pre+$test_pre+$dr_pre?></th>
                    </tr>
                    <tr>
                      <td>05</td>
                      <td class="n">Lend Return</td>
                      <td></td>
                      <td class="tk"><?=$lend_return?></td>
                      <td class="tk"><?=$lend_return_pre?></td>
                    </tr>
                    <tr>
                      <td>06</td>
                      <td class="n">Borrow</td>
                      <td></td>
                      <td class="tk"><?=$borrow?></td>
                      <td class="tk"><?=$borrow_pre?></td>
                    </tr>
                    <tr>
                      <td>07</td>
                      <td class="n">Due Paid</td>
                      <td></td>
                      <td class="tk"><?=$due_paid?></td>
                      <td class="tk"><?=$due_paid_pre?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <th>5 To 7 Total</th>
                      <td></td>
                      <th class="tk"><?=$lend_return+$borrow+$due_paid?></th>
                      <th class="tk"><?=$lend_return_pre+$borrow_pre+$due_paid_pre?></th>
                    </tr>
                    <tr>
                      <td>08</td>
                      <td class="n">Opening Balance</td>
                      <td></td>
                      <td class="tk"><?=$opening?></td>
                      <td class="tk"><?=$opening_pre?></td>
                    </tr>
                  </tbody>
                  <tfoot style="background-color: #79a0e0">
                    <tr>
                      <th colspan="3">Total </th>
                      <th class="tk"><?=$tci=$pharmacy+$product+$test+$dr+$lend_return+$borrow+$due_paid+$opening?></th>
                      <th class="tk"><?=$pharmacy_pre+$product_pre+$test_pre+$dr_pre+$lend_return_pre+$borrow_pre+$due_paid_pre+$opening_pre?></th>
                    </tr>
                    <?php 
                      $tco=($supplier_payment_cash+$out_lab_cash+$borrow_paid_cash+$lend+$exp_cash+$supplier_payment_ck+$out_lab_ck+$borrow_paid_ck+$exp_ck);
                     ?>
                    <tr>
                      <th colspan="3">Last Day Balance Total</th>
                      <th class="tk"><?=$ldb=$tci-$tco?></th>
                      <th class="tk"><?=($pharmacy_pre+$product_pre+$test_pre+$dr_pre+$lend_return_pre+$borrow_pre+$due_paid_pre+$opening_pre)-($supplier_payment_cash_pre+$out_lab_cash_pre+$borrow_paid_cash_pre+$lend_pre+$exp_cash_pre+$supplier_payment_ck_pre+$out_lab_ck_pre+$borrow_paid_ck_pre+$exp_ck_pre)?></th>
                    </tr>
                  </tfoot>
                </table>
                <table class="table table-bordered" style="background-color: #79a0e0">
                  <tr >
                    <th>Total Cash In</th>
                    <th>Total Cash Out</th>
                  </tr>
                  <tr>
                    <th><?php if($tci<$tco){ echo $tci.'+'.$ldb.'='.($tci+$ldb);}else{ echo $tci;} ?></th>
                    <th><?php if($tci>$tco){ echo $tco.'+'.$ldb.'='.($tco+$ldb);}else{ echo $tco;} ?></th>
                  </tr>
                  <tr>
                    <th colspan="2">Comment: Both side is equal </th>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                <table class="table table-bordered table-striped" style="border:1px">
                  <caption style="text-align:center"><h3>CASH OUT</h3></caption>
                  <thead style="background-color: #79a0e0">
                    <tr>
                      <th rowspan="2">SL</th>
                      <th rowspan="2">Particular</th>
                      <th colspan="2"><?=date('F-Y')?></th>
                      <th colspan="2"><?=date_format(date_create(date('Y').'-'.(date('m')-1)),'F-Y')?></th>
                    </tr>
                    <tr>
                      <th>Cash</th>
                      <th>CK</th>
                      <th>Cash</th>
                      <th>CK</th>
                    </tr>
                  </thead>
                  <tbody id="itembody">
                    <?php $exp_cash=0; $exp_ck=0; $exp_cash_pre=0;$exp_ck_pre=0; $i=0; foreach ($category as $k) {?>
                    <tr>
                      <td><?=++$i?></td>
                      <td class="n"><?=$k->category?></td>
                      <td><?php echo $ex_cash=$ci->Admin_model->get_expense_monthly_category_wise_cash($k->id,date('Y-m')); $exp_cash+=$ex_cash;?></td>
                      <td><?php echo $ex_ck=$ci->Admin_model->get_expense_monthly_category_wise_ck($k->id,date('Y-m')); $exp_ck+=$ex_ck;?></td>
                      <td><?php echo $ex_cash_pre=$ci->Admin_model->get_expense_monthly_category_wise_cash($k->id,(date('Y')-1).'-'.date('m')); $exp_cash_pre+=$ex_cash_pre;?></td>
                      <td><?php echo $ex_ck_pre=$ci->Admin_model->get_expense_monthly_category_wise_ck($k->id,(date('Y')-1).'-'.date('m')); $exp_ck_pre+=$ex_ck_pre;?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td><?=$i+1?></td>
                      <td class="n">Borrow Paid</td>
                      <td><?=$borrow_paid_cash?></td>
                      <td><?=$borrow_paid_ck?></td>
                      <td><?=$borrow_paid_cash_pre?></td>
                      <td><?=$borrow_paid_ck_pre?></td>
                    </tr>
                    <tr>
                      <td><?=$i+2?></td>
                      <td class="n">Lend</td>
                      <td><?=$lend?></td>
                      <td>0</td>
                      <td><?=$lend_pre?></td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td><?=$i+3?></td>
                      <td class="n">Out Lab Payment</td>
                      <td><?=$out_lab_cash?></td>
                      <td><?=$out_lab_ck?></td>
                      <td><?=$out_lab_cash_pre?></td>
                      <td><?=$out_lab_ck_pre?></td>
                    </tr>
                    <tr>
                      <td><?=$i+4?></td>
                      <td class="n">Supplier Payment</td>
                      <td><?=$supplier_payment_cash?></td>
                      <td><?=$supplier_payment_ck?></td>
                      <td><?=$supplier_payment_cash_pre?></td>
                      <td><?=$supplier_payment_ck_pre?></td>
                    </tr>
                  </tbody>
                  <tfoot style="background-color: #79a0e0">
                    <tr>
                      <th colspan="2">Total</th>
                      <th><?=$c=$supplier_payment_cash+$out_lab_cash+$borrow_paid_cash+$lend+$exp_cash?></th>
                      <th><?=$ck=$supplier_payment_ck+$out_lab_ck+$borrow_paid_ck+$exp_ck?></th>
                      <th><?=$c_pre=$supplier_payment_cash_pre+$out_lab_cash_pre+$borrow_paid_cash_pre+$lend_pre+$exp_cash_pre?></th>
                      <th><?=$ck_pre=$supplier_payment_ck_pre+$out_lab_ck_pre+$borrow_paid_ck_pre+$exp_ck_pre?></th>
                    </tr>
                    <tr>
                      <th colspan="2">Total Cash Out</th>
                      <th class="tk" colspan="2"><?=$c+$ck?></th>
                      <th colspan="2"><?=$c_pre+$ck_pre?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
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