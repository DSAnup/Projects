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
                <h3>Pharmacy Total Bill Statement, <?=date('F-Y',strtotime(date('Y').'-'.$m.'-01'))?></h3>
              </div>
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Company Name</th>
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
                  <?php $ci=&get_instance(); $ci->load->model('Rest_model'); $i=0; foreach ($supplier as $k) {
                    $start=date('Y').'-'.$m.'-01';
                    $end=date('Y').'-'.$m.'-31';
                    $payment=$this->Rest_model->SelectDataOrder('supplier_payment','*',array('supplierID'=>$k->id,'date>='=>$start,'date<='=>$end),'id','desc');
                    $recieve=$this->Rest_model->SelectDataOrder('medicine_receive','*',array('supplierID'=>$k->id,'date>='=>$start,'date<='=>$end),'id','desc');
                    ?>
                    <tr>
                      <td rowspan="<?=count($payment)+1?>"><?=++$i;?></td>
                      <td rowspan="<?=count($payment)+1?>"><?=$k->supplier?></td>
                    </tr>
                    <?php $i=0; foreach ($payment as $k) {?>
                    <tr>
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
                    <?php } ?>
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
