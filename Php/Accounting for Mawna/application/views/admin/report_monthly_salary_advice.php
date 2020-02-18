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
                <h3 style="text-align:center">Salary Advice Note, MDA, <?=$dd?></h3>
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
                  	<th>SL</th>
                    <th>Name</th>
                    <th>IFIC Bank Salary Account Number</th>
                    <th>Salary Amount</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $ii=0; foreach ($emp as $e) { 
                    $t_off=0;$absent=0;$attend=0;$own=0;$other=0;$exchange=0;$additional=0;
                    $bonus=$ci->Rest_model->SelectData_1('bonus','*',array('date'=>$dd,'empID'=>$e->id));
                    $adv=$ci->Rest_model->SelectData('widthdrawal','*',array('status'=>1,'empID'=>$e->id,'type'=>'salary'));
                    $advance=0;
                    foreach ($adv as $a) {
                    	$advance+=$a->amount;
                    }
                    $pf=$ci->Rest_model->SelectData('widthdrawal','*',array('status'=>1,'empID'=>$e->id,'type'=>'pf'));
                    $pf_withdraw=0;
                    foreach ($pf as $p) {
                    	$pf_withdraw+=$p->amount;
                    }
                    ?>
                  <tr>
                    <?php for ($i=1; $i <=$c_days ; $i++) { 
                      $text_day=date("D", strtotime($dd.'-'.$i));
                      $off=explode('-', $e->off_day);
                      if(in_array($text_day, $off)){
                        $t_off+=1;
                      }
                      $ie=sprintf('%02d',$i);
                      $date=$dd.'-'.$ie;
                      $entry=$ci->Rest_model->SelectData_1('attendance','*',array('empID'=>$e->id,'date'=>$date));
                      if(isset($entry)){
                      $attend+=1;
                      if($entry->type=='own'){
                        $own+=1;
                      }elseif ($entry->type=='other') {
                        $other+=1;
                      }elseif ($entry->type=='exchange') {
                        $exchange+=1;
                      }else{
                        $additional+=1;
                      }
                    }else{
                      $absent+=1;
                    }
                    } ?>
                    <td><?=++$ii?></td>
                    <td><?php echo $e->name?></td>
                    <td><?=$e->bank?></td>
                    <?php $e->off_day?>
                    <?php $t_working_day=$c_days-$t_off?>
                    <?php $own?>
                    <?php $t_working_day-$own?>
                    <?php $other?>
                    <?php $exchange?>
                    <?php if($attend>$t_working_day){  $attend-$t_working_day;}else{  0;}?>
                    <?php $additional?>
                    <?php $attend?>
                    <?php $abs=$t_working_day-$attend?>
                    <?php $e->salary?>
                    <?php $per_day=round(($e->salary)/$t_working_day,2)?>
                    <?php $bonus_added=@$bonus->amount+0?>
               
                      <?php $curdate=strtotime($dd.'-01');
                      $mydate=strtotime($e->pf_end);
                      if($curdate < $mydate)
                      {
                          $pf=200;
                      }else{  $pf=0;} ?>    
                    <td><?=((((($e->salary)-($abs*$per_day))-$advance)-$pf_withdraw)-$pf)+$bonus_added?></td>  
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