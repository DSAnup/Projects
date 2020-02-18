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
                <h3 style="text-align:center">Reception Statement, MDA, <?=date('m-Y')?></h3>
              </div>
              <style type="text/css">
              th{
                text-align: center;
              }
              td{
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
                    <th rowspan="2">recpt. total</th>
                    <th rowspan="2">D</th>
                    <th rowspan="2">C</th>
                    <th rowspan="2">DIS</th>
                    <th rowspan="2">DP</th>
                    <th rowspan="2">TI</th>
                    <th rowspan="2">TC</th>
                    <th rowspan="2">F</th>
                    <th rowspan="2">BS</th>
                    <th rowspan="2">GP</th>
                    <th rowspan="2">DF</th>
                    <?php foreach ($test as $k) {
                      echo '<th rowspan="2">'.$k->name.'</th>';
                    } ?>
                    <th colspan="2">ACPPRTV </th>
                    <th rowspan="2">SIPV </th>
                    <th colspan="2">LPTV </th>
                    <th colspan="4">EXP & CKO</th>
                    <th colspan="3">Pt.No. </th>
                    <th rowspan="2">CHO</th>
                  </tr>
                  <tr>
                    <th>C</th>
                    <th>D</th>
                    <th>C</th>
                    <th>D</th>
                    <th>RCE</th>
                    <th>MCE</th>
                    <th>TCE</th>
                    <th>TCKO</th>
                    <th>OP</th>
                    <th>NP</th>
                    <th>ORCN</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $cu=0; for($i=1; $i<=date('d'); $i++){ ?>
                  <tr>
                    <td style="text-align:center"><?=$i?></td>
                    <td>
                      <?php
                        echo $bt=$ci->Admin_model->get_book_total($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $due=$ci->Admin_model->get_book_total_due($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $consider=$ci->Admin_model->get_book_total_consider($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $dis=$ci->Admin_model->get_book_total_dis($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $due_paid=$ci->Admin_model->get_book_total_due_paid($i);
                      ?>
                    </td>
                    <td><?=$ti=$bt-($due+$consider+$dis)?></td>
                    <td><?=$tc=$ti+$due_paid?></td>
                    <td>
                      <?php
                        echo $free=$ci->Admin_model->get_book_total_free_product($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $bs=$ci->Admin_model->get_book_total_book_sale($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $gp=$ci->Admin_model->get_book_total_glucose_sale($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $df=$ci->Admin_model->get_book_total_dr_fee($i);
                      ?>
                    </td>
                    <?php foreach ($test as $k1) {
                      echo "<td>".$t_no=$ci->Admin_model->get_book_total_test_no($i,$k1->id)."</td>";
                    } ?>
                    <td>
                      <?php
                        echo $medicine_c=$ci->Admin_model->get_book_total_medicine_cash($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $medicine_d=$ci->Admin_model->get_book_total_medicine_due($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $short_item=$ci->Admin_model->get_book_total_short_item($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $lab_purchase=$ci->Admin_model->get_book_total_lab_purchase($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $lab_due=$ci->Admin_model->get_book_total_lab_due($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $rce=$ci->Admin_model->get_book_total_rce($i);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $mce=$ci->Admin_model->get_book_total_mce($i);
                      ?>
                    </td>
                    <td><?=$tce=$rce+$mce?></td>
                    <td></td>
                    <td>
                      <?php
                        echo $op=$ci->Admin_model->get_book_total_pt_no($i,'op');
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $np=$ci->Admin_model->get_book_total_pt_no($i,'np');
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $orcn=$ci->Admin_model->get_book_total_pt_no($i,'orcn');
                      ?>
                    </td>
                    <td><?=($tc+$df)-($tce+$lab_purchase+$short_item+$medicine_c)?></td>
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