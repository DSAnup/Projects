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
                <form action="<?=base_url()?>Control/attendance_report" method="post">
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
                <h3 style="text-align:center">Office Staff's Entry - Exit Time Schedule, MDA, <?=$dd?></h3>
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
                    <th rowspan="2">Name & Designation</th>
                    <th rowspan="2">Date</th>
                    <?php for ($i=1; $i <=$c_days ; $i++) { 
                      echo "<th>".$i."</th>";
                      
                    } ?>
                    <th rowspan="2"> <span style="writing-mode: tb-rl;">T.Working Day</span></th>
                    <th rowspan="2"> <span style="writing-mode: tb-rl;">Adv.S</span></th>
                    <th rowspan="2"> <span style="writing-mode: tb-rl;">Present</span></th>
                    <th rowspan="2"> <span style="writing-mode: tb-rl;">Not Present</span></th>
                  </tr>
                  <tr>
                    <?php for ($i=1; $i <=$c_days ; $i++) { 
                      echo "<th>".date("D", strtotime($dd.'-'.$i))."</th>";
                    } ?>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php foreach ($emp as $e) { $t_off=0;$absent=0;$attend=0;?>
                  <tr>
                    <td rowspan="2"><?=$e->name.'<br>'.$e->designation?></td>
                    <td style="background: #abb0ba; color:#fff">Entry Time</td>
                    <?php for ($i=1; $i <=$c_days ; $i++) { 
                      $text_day=date("D", strtotime($dd.'-'.$i));
                      if($text_day==$e->off_day){
                        $t_off+=1;
                      }
                      $ie=sprintf('%02d',$i);
                      $date=$dd.'-'.$ie;
                      $entry=$ci->Rest_model->SelectData_1('attendance','*',array('empID'=>$e->id,'date'=>$date));
                      if(isset($entry)){
                      echo "<td>".@$entry->in_time."</td>";
                      $attend+=1;
                    }else{
                      echo "<td style='color:red'>A</td>";
                      $absent+=1;
                    }
                    } ?>
                    <td rowspan="2"><?=$t_working_day=$c_days-$t_off?></td>
                    <td rowspan="2"><?php if($attend>$t_working_day){ echo $attend-$t_working_day;}?></td>
                    <td rowspan="2"><?=$attend?></td>
                    <td rowspan="2"><?=$t_working_day-$attend?></td>
                  </tr>
                  <tr>
                    <td style="background: #e1e7f2; color:#fff">Exit Time</td>
                    <?php for ($i=1; $i <=$c_days ; $i++) { 
                      $ie=sprintf('%02d',$i);
                      $date=$dd.'-'.$ie;
                      $entry=$ci->Rest_model->SelectData_1('attendance','*',array('empID'=>$e->id,'date'=>$date));
                       if(isset($entry)){
                      echo "<td>".@$entry->in_time."</td>";
                    }else{
                      echo "<td style='color:red'>A</td>";
                    }
                    } ?>
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