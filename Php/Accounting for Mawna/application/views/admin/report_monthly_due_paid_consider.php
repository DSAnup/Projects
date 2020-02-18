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
                <h3 style="text-align:center">Due-Paid-Consider and Cash Equation Statemant, MDA, <?=date('F-Y')?></h3>
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
                    <th colspan="2">Current Month Net Due</th>
                    <th rowspan="2">Consider</th>
                    <th colspan="2">Current Month Due Paid</th>
                    <th colspan="2">Previous Month Due Paid</th>
                    <th rowspan="2">Consider</th>
                    
                      <?php $p_days=cal_days_in_month(CAL_GREGORIAN, (date('m')-1), date('Y')); $c_days=cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')); ?>
                    
                  </tr>
                  <tr>
                    <th>Date</th>
                    <th>Taka</th>
                    <th>Date</th>
                    <th>Taka</th>
                    <th>Date</th>
                    <th>Taka</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php foreach ($cmd as $key => $value) {?>
                    <tr>
                      <td><?php if($c_days>=$key){ echo date('Y-m').'-'.$key;}?></td>
                      <td><?php if($c_days>=$key){ echo $value;}?></td>
                      <td><?php if($c_days>=$key){echo $cmc[$key];}?></td>
                      <td><?php if($c_days>=$key){ echo date('Y-m').'-'.$key;}?></td>
                      <td><?php if($c_days>=$key){echo $cmdp[$key];}?></td>

                      <td><?php if($p_days>=$key){ echo date('Y').'-'.(date('m')-1).'-'.$key;}?></td>
                      <td><?php if($p_days>=$key){ echo $pmdp[$key];}?></td>
                      <td><?php if($p_days>=$key){echo $pmc[$key];}?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot style="background-color: #79a0e0">
                  <!-- <pre>
                    <?php var_dump($cmdp[8]); ?>
                  </pre> -->
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