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
                <h3 style="text-align:center">Monthly Payment Bill(A), MDA, <?=date('m,Y')?></h3>
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
                    <th rowspan="2">SL</th>
                    <th rowspan="2">Company Name</th>
                    <th colspan="3">Due Amount</th>
                    <th colspan="2">Paid Amount</th>
                    <th>Due Balance</th>
                  </tr>
                  <tr>
                    <th>PMD</th>
                    <th>CMD</th>
                    <th>TD</th>
                    <th>CK</th>
                    <th>CSH</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $pre_due=0;
                  $cur_due=0;
                  $total_due=0;
                  $ck_paid=0;
                  $csh_paid=0;
                  $total_balance=0;
                  $i=0; foreach ($supplier as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->supplier?></td>
                    <td class="tk">
                      <?php  
                        $id=$s->id;
                        $p=$ci->Admin_model->get_p_month_product_purchase($id);
                        $r=$ci->Admin_model->get_p_month_reagent_purchase($id);
                        $paid=$ci->Admin_model->get_p_month_paid($id);
                        $p_due=($p+$r)-$paid;
                        $pre_due+=$p_due;
                        echo $p_due;
                      ?>
                    </td>
                    <td class="tk">
                      <?php  
                        $id=$s->id;
                        $p=$ci->Admin_model->get_c_month_product_purchase($id);
                        $r=$ci->Admin_model->get_c_month_reagent_purchase($id);
                        $paid=$ci->Admin_model->get_c_month_paid($id);
                        $c_due=($p+$r)-$paid;
                        $cur_due+=$c_due;
                        echo $c_due;
                      ?>
                    </td>
                    <td class="tk"><?php echo $due=$p_due+$c_due; $total_due+=$due; ?></td>
                    <td class="tk">
                      <?php
                      echo $ck=$ci->Admin_model->get_ck_supplier_payment($id);
                      $ck_paid+=$ck;
                      ?>
                    </td>
                    <td class="tk">
                      <?php
                        echo $csh=$ci->Admin_model->get_cash_supplier_payment($id);
                        $csh_paid+=$csh;
                      ?>
                    </td>
                    <td class="tk"><?php echo $balance=$due-($csh+$ck); $total_balance+=$balance;?></td>
                  </tr>
                  <?php } ?>
                  <?php
                    foreach ($category as $k) {
                      $sub=$ci->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$k->id));
                      foreach ($sub as $s) {?>
                        <tr>
                          <td><?=++$i?></td>
                          <td><?=$s->sub_category?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="tk"><?php echo $ck=$ci->Admin_model->get_expense_ck($s->id); $ck_paid+=$ck; ?></td>
                          <td class="tk"><?php echo $csh=$ci->Admin_model->get_expense_csh($s->id); $csh_paid+=$csh; ?></td>
                          <td class="tk"><?php echo $balance=$ck+$csh; $total_balance+=$balance;?></td>
                        </tr>
                      <?php }
                    }
                  ?>
                </tbody>
                <tfoot style="background-color: #79a0e0">
                  <tr>
                    <th colspan="2" style="text-align:right">Total</th>
                    <th style="text-align:right"><?=$pre_due?></th>
                    <th style="text-align:right"><?=$cur_due?></th>
                    <th style="text-align:right"><?=$total_due?></th>
                    <th style="text-align:right"><?=$ck_paid?></th>
                    <th style="text-align:right"><?=$csh_paid?></th>
                    <th style="text-align:right"><?=$total_balance?></th>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align:right">Grand Total</th>
                    <th style="text-align:right" colspan="2"><?=$pre_due+$cur_due?></th>
                    <th style="text-align:right" colspan="3"><?=$csh_paid+$ck_paid+$total_due?></th>
                    <th style="text-align:right"></th>
                  </tr>
                </tfoot>
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