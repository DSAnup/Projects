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
              <table class="table table-bordered table-striped" style="border:1px">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th rowspan="3">Date</th>
                    <?php  foreach ($ex_category as $k) {
                      $sub=$ci->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$k->id));
                      $n=count($sub)*2;
                      ?>
                      <th colspan="<?=$n?>"><?=$k->category?></th>
                    <?php } ?>
                    <th colspan="<?=count($supplier)*2 ?>">Lab Reagent+Kits & Others </th>
                    <th colspan="<?=count($lab)*2 ?>">Out Lab</th>
                    <th rowspan="2">Lend</th>
                    <th rowspan="2" colspan="2">BP</th>
                    <th rowspan="2" colspan="2">Daily Total expense & co </th>
                  </tr>
                  <tr>
                    <?php  foreach ($ex_category as $k) {
                      $sub=$ci->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$k->id));
                      foreach ($sub as $e) {
                      ?>
                      <th colspan="2"><?=$e->sub_category?></th>
                    <?php } } ?>
                    <?php foreach ($supplier as $s) {?>
                      <th colspan="2"><?=$s->supplier?></th>
                    <?php } ?>
                    
                    <?php foreach ($lab as $s) {?>
                      <th colspan="2"><?=$s->name?></th>
                    <?php } ?>
                  </tr>
                  <tr>
                    <?php  foreach ($ex_category as $k) {
                      $sub=$ci->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$k->id));
                      foreach ($sub as $e) {
                      ?>
                      <th>CK</th>
                      <th>CSH</th>
                    <?php } } ?>
                    <?php foreach ($supplier as $s) {?>
                      <th>Due</th>
                      <th>Paid Ck</th>
                    <?php } ?>
                    <?php foreach ($lab as $s) {?>
                      <th>Due</th>
                      <th>Paid Ck</th>
                    <?php } ?>
                    <th>CSH</th>
                    <th>Due</th>
                    <th>CSH/CK</th>
                    <th>CSH</th>
                    <th>CK</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $cu=0; $su_cash=0; $su_ck=0; for($i=1; $i<=date('d'); $i++){ ?>
                  <tr>
                    <td><?=$i?></td>
                    <?php $gnd_cash=0; $gnd_ck=0; foreach ($ex_category as $k) {
                      $sub_cash=0;
                      $gnd_cash+=$sub_cash;
                      $sub=$ci->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$k->id));
                      foreach ($sub as $e) {
                      ?>
                      <td>
                        <?php 
                        $ck=$ci->Admin_model->get_date_wise_ck_expense($i,$e->id);
                        $gnd_ck+=$ck;
                        echo $ck;
                         ?>
                      </td>
                      <td>
                        <?php 
                        $csh=$ci->Admin_model->get_date_wise_csh_expense($i,$e->id);
                        $gnd_cash+=$csh;
                        echo $csh;
                         ?>
                      </td>
                    <?php } } ?>
                    <?php foreach ($supplier as $s) {?>
                      <td>
                        <?php 
                        $due=$ci->Admin_model->get_date_wise_supplier_due($i,$s->id);
                        echo $due;
                         ?>
                      </td>
                      <td>
                        <?php 
                        $paid=$ci->Admin_model->get_date_wise_supplier_paid($i,$s->id);
                        $gnd_ck+=$paid;
                        echo $paid;
                         ?>
                      </td>
                    <?php } ?>
                    <?php foreach ($lab as $s) {?>
                    <td>
                      <?php 
                        $due=$ci->Admin_model->get_date_wise_lab_due($i,$s->id);
                        echo $due;
                         ?>
                       </td>
                       <td>
                      <?php 
                        $paid=$ci->Admin_model->get_date_wise_lab_paid($i,$s->id);
                        $gnd_ck+=$paid;
                        echo $paid;
                         ?>
                       </td>
                    <?php } ?>
                    <td>
                      <?php 
                        $lend=$ci->Admin_model->get_date_wise_lend($i);
                        $gnd_cash+=$lend;
                        echo $lend;
                         ?>
                       </td>
                       <td>
                      <?php 
                        $borrow_due=$ci->Admin_model->get_date_wise_borrow_due($i);
                        echo $borrow_due;
                         ?>
                       </td>
                       <td>
                      <?php 
                        $borrow_paid=$ci->Admin_model->get_date_wise_borrow_paid($i);
                        $gnd_cash+=$borrow_paid;
                        echo $borrow_paid;
                        $su_cash+=$gnd_cash;
                        $su_ck+=$gnd_ck;
                         ?>
                       </td>
                       <th><?=$gnd_cash?></th>
                       <th><?=$gnd_ck?></th>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot style="background-color: #79a0e0">
                  <tr>
                    <th>Total</th>
                    <?php  
                    
                    foreach ($ex_category as $k) {
                      $sub=$ci->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$k->id));
                      foreach ($sub as $e) {
                      ?>
                      <th>
                        <?php 
                        $ck_ex=0; for($i=1; $i<=date('d'); $i++){
                        $ck_ex+=$ci->Admin_model->get_date_wise_ck_expense($i,$e->id);
                      }
                        echo $ck_ex;
                         ?>
                      </th>
                      <th>
                        <?php 
                        $csh_ex=0; for($i=1; $i<=date('d'); $i++){
                        $csh_ex+=$ci->Admin_model->get_date_wise_csh_expense($i,$e->id);
                      }
                        echo $csh_ex;
                         ?>
                      </th>
                    <?php } } ?>
                    <?php foreach ($supplier as $s) {?>
                      <th>
                        <?php 
                        $d=0; for($i=1; $i<=date('d'); $i++){
                        $d+=$ci->Admin_model->get_date_wise_supplier_due($i,$s->id);
                      }
                        echo $d;
                         ?>
                      </th>
                      <th>
                        <?php 
                        $d=0; for($i=1; $i<=date('d'); $i++){
                        $d+=$ci->Admin_model->get_date_wise_supplier_paid($i,$s->id);
                      }
                        echo $d;
                         ?>
                      </th>

                    <?php } ?>
                    <?php foreach ($lab as $s) {?>
                      <th>
                      <?php 
                      $due=0; for($i=1; $i<=date('d'); $i++){
                        $due+=$ci->Admin_model->get_date_wise_lab_due($i,$s->id);
                      }
                        echo $due;
                         ?>
                       </th>
                       <th>
                      <?php 
                      $paid=0; for($i=1; $i<=date('d'); $i++){
                        $paid+=$ci->Admin_model->get_date_wise_lab_paid($i,$s->id);
                      }
                        echo $paid;
                         ?>
                       </th>
                      <?php } ?>
                      <th>
                      <?php 
                      $lend=0; for($i=1; $i<=date('d'); $i++){
                        $lend+=$ci->Admin_model->get_date_wise_lend($i);
                      }
                        echo $lend;
                         ?>
                       </th>
                       <th>
                      <?php 
                      $borrow_due=0; for($i=1; $i<=date('d'); $i++){
                        $borrow_due+=$ci->Admin_model->get_date_wise_borrow_due($i);
                      }
                        echo $borrow_due;
                         ?>
                       </th>
                       <th>
                      <?php 
                      $borrow_paid=0; for($i=1; $i<=date('d'); $i++){
                        $borrow_paid+=$ci->Admin_model->get_date_wise_borrow_paid($i);
                      }
                        echo $borrow_paid;
                         ?>
                       </th>
                       <th><?=$su_cash?></th>
                       <th><?=$su_ck?></th>
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