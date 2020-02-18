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
            <div class="box-body table-responsive">
              <div class="col-md-12">
                <form action="<?=base_url()?>Control/salary_advice" method="post">
                  <table>
                    <tr>
                      <td width="50%"><input type="text" name="date" class="form-control" placeholder="YYYY-MM"></td>
                      <td width="50%"><input type="submit" class="btn btn-primary" value="Search"></td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive" id="img">
              <div class="col-md-12" style="color: #79a0e0">
                <h3 style="text-align:center">Security Fund Balance Sheet, MDA, <?=$dd?></h3>
              </div>
              <style type="text/css">
              th{
                text-align: center;
              }
              td{
                text-align: center;
              }
              </style>
              <?php
              $ci=&get_instance();
              $ci->load->model('Admin_model');
              $ci->load->model('Rest_model');
              $c_days=cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
              ?>
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                  	<th rowspan="2">SL</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">Joining Date</th>
                    <th rowspan="2">SFD Starting Month</th>
                    <th colspan="3">Punishment Amount</th>
                    <th rowspan="2">Reserve</th>
                    <th rowspan="2">Ending Month</th>
                    <th rowspan="2">Monthly Deposit Amount</th>
                    <th rowspan="2">Previous Balance</th>
                    <th rowspan="2">Current Balance</th>
                    <th rowspan="2">Depositor's Signature</th>
                    <th rowspan="2">Withdraw Amount</th>
                    <th rowspan="2">Center Incharge Sign</th>
                  </tr>
                  <tr>
                    <th>Current Month</th>
                    <th>Cumulative Current Amount(indi)</th>
                    <th>SCuA(all)</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $tt=0; $ii=0; foreach ($emp as $e) { ?>

                  <tr>
                    <td><?=++$ii?></td>
                    <td><?php echo $e->name?></td>
                    <td><?php echo $e->join_date?></td>
                    <td><?php echo $e->pf_start?></td>
                    <td>
                      <?php echo $current=$ci->Admin_model->get_current_month_punishment($e->id,$dd); ?>
                    </td>
                    <td>
                      <?php echo $cumulative=$ci->Admin_model->get_cumulative_punishment($e->id,$dd); $pre_punish=$cumulative-$current;?>
                    </td>
                    <td>
                      <?php
                      $withdraw=$ci->Admin_model->get_pf_withdraw($e->id);
                      $d1 = new DateTime($e->pf_start);
                      $d2 = new DateTime(($dd.'-01'));
                      $interval = $d2->diff($d1);
                      $duration=$interval->format('%m');
                      $total=$duration*200;
                      $after_punish=$total-$cumulative;
                      $pre_total=$total-200-$pre_punish;
                      $tt+=$cumulative;
                      ?>
                      -
                    </td>
                    <td>-</td>
                    <td><?=$e->pf_end?></td>
                    
                    <td>200</td>
                    <td><?=$pre_total?></td>
                    <td><?=$after_punish?></td>
                    <td></td>
                    <td><?=$withdraw?></td>
                    <td></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?=$tt?></td>
                    <td><?=$reserve?></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
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