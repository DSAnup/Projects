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
        Patient Visiting Statement
        <small>Patient Visiting Statement</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Patient Visiting Statement </a></li>

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
                <h3>Patient Visiting Statement <?=date('F-Y')?></h3>
              </div>
              <table  class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <?php $c=(count($dr)*2)+2; ?>
                    <th colspan="<?=$c?>" style="text-align:center">Number of Patient Visiting</th>
                    <th colspan="<?=$c?>" style="text-align:center">Association Income Statement</th>
                  </tr>
                  <tr>
                    <th rowspan="2" width="2%">Date</th>
                    <?php foreach ($dr as $k) {
                      echo "<th colspan='2' style='text-align:center'>".$k->name."</th>";
                    } ?>
                    <th rowspan="2" style='text-align:center'>Self</th>
                    <th rowspan="2" style='text-align:center'>Date</th>
                    <?php foreach ($dr as $k) {
                      echo "<th colspan='2' style='text-align:center'>".$k->name."</th>";
                    } ?>
                    <th rowspan="2" style='text-align:center'>Self</th>
                  </tr>
                  <tr>
                    <?php foreach ($dr as $k) {
                      echo "<td style='text-align:center'>NP</td><td>OP</td>";
                    } ?>
                    <?php foreach ($dr as $k) {
                      echo "<td style='text-align:center'>NP</td><td>OP</td>";
                    } ?>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                   $i=0; for($i=1;$i<=date('d');$i++) {?>
                  <tr>
                    <td><?= date('Y-m').'-'.$i;?></td>
                    <?php foreach ($dr as $k) {
                      $np=$ci->Admin_model->get_total_patinet('np',$i,$k->id);
                      $op=$ci->Admin_model->get_total_patinet('op',$i,$k->id);
                      echo "<td>".count($np)."</td>";
                      echo "<td>".count($op)."</td>";
                    } ?>
                    <td>
                      <?php $ocrn=$ci->Admin_model->get_total_patinet('ocrn',$i,$k->id); echo count($ocrn); ?>
                    </td>
                    <td><?= date('Y-m').'-'.$i;?></td>
                    <?php foreach ($dr as $k) {
                      $np=$ci->Admin_model->get_total_patinet('np',$i,$k->id);
                      $op=$ci->Admin_model->get_total_patinet('op',$i,$k->id);
                      $np_taka=0;
                      foreach ($np as $oo) {
                        $np_taka+=$oo->amount;
                      }
                      $op_taka=0;
                      foreach ($op as $oo) {
                        $op_taka+=$oo->amount;
                      }
                      echo "<td>".$np_taka."</td>";
                      echo "<td>".$op_taka."</td>";
                    } ?>
                    <td>
                      <?php $ocrn=$ci->Admin_model->get_total_patinet('ocrn',$i,$k->id);$ocrn_taka=0;
                      foreach ($ocrn as $oo) {
                        $ocrn_taka+=$oo->amount;
                      } echo $ocrn_taka; ?>
                    </td>
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