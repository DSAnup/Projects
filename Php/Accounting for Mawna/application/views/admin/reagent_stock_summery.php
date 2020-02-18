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
    Stock Report 
         <small>Stock Report </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?= base_url() . 'Control/admin_list' ?>">Stock Report  </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12" style="color: #79a0e0; text-align:center">
                <h3>DEVICE REAGENT/KITS STOCK STATEMENT</h3>
              </div>
              <table  class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name of Reagent</th>
                    <th>Stock Quantity of Running Item</th>
                    <th>Stock Quantity of Intact Item</th>
                    <th>Posible no of test</th>
                    <th>Date of Expiry of Running Item</th>
                    <th>Date of Expiry of Intact Item</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                   $c=0; foreach ($device as $k) {
                    $running=$ci->Admin_model->get_running_stock($k->id);
                    $runningint = (int)substr($running, 0, 2);
                    $intact=$ci->Admin_model->get_intact_stock($k->id);
                    $run_exp=$ci->Admin_model->get_run_exp_date($k->id);
                    $mx_exp=$ci->Admin_model->get_max_exp($k->id);
                    // print_r(gettype($runningint));
                    ?>
                  <tr>
                    <td><?=++$c?></td>
                    <td><?=$k->name?></td>
                    <td><?=$running?></td>
                    <td><?=$intact?></td>
                    <td><?=($runningint+($intact*$k->box_size))*$k->posible_test?></td>
                    <td><?=$run_exp?></td>
                    <td><?=$mx_exp?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12" style="color: #79a0e0; text-align:center">
                <h3>BIOCHEMISTRY REAGENT/KITS STOCK STATEMENT</h3>
              </div>
              <table  class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name of Reagent</th>
                    <th>Stock Quantity of Running Item</th>
                    <th>Stock Quantity of Intact Item</th>
                    <th>Posible no of test</th>
                    <th>Date of Expiry of Running Item</th>
                    <th>Date of Expiry of Intact Item</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                   $c=0; foreach ($biochemistry as $k) {
                    $running=$ci->Admin_model->get_running_stock($k->id);
                    $runningint = explode(' ', $running);
                    $running2 = $runningint[0];
                    $intact=$ci->Admin_model->get_intact_stock($k->id);
                    $run_exp=$ci->Admin_model->get_run_exp_date($k->id);
                    $mx_exp=$ci->Admin_model->get_max_exp($k->id);
                    // print_r($k->id);
                    ?>
                  <tr>
                    <td><?=++$c?></td>
                    <td><?=$k->name?></td>
                    <td><?=$running?></td>
                    <td><?=$intact?></td>
                    <td><?=($running2+($intact*$k->box_size))*$k->posible_test?></td>
                    <td><?=$run_exp?></td>
                    <td><?=$mx_exp?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12" style="color: #79a0e0; text-align:center">
                <h3>IMMUNOLOGY REAGENT/KITS STOCK STATEMENT</h3>
              </div>
              <table  class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name of Reagent</th>
                    <th>Stock Quantity of Running Item</th>
                    <th>Stock Quantity of Intact Item</th>
                    <th>Posible no of test</th>
                    <th>Date of Expiry of Running Item</th>
                    <th>Date of Expiry of Intact Item</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                   $c=0; foreach ($immunology as $k) {
                    $running=$ci->Admin_model->get_running_stock($k->id);
                    $runningint = explode(' ', $running);
                    $running2 = $runningint[0];
                    $intact=$ci->Admin_model->get_intact_stock($k->id);
                    $run_exp=$ci->Admin_model->get_run_exp_date($k->id);
                    $mx_exp=$ci->Admin_model->get_max_exp($k->id);
                    // echo $running;
                    ?>
                  <tr>
                    <td><?=++$c?></td>
                    <td><?=$k->name?></td>
                    <td><?=$running?></td>
                     <td><?=$intact?></td> 
                    <!-- <td>ehll</td> -->
                    <td><?=($running2+($intact*$k->box_size))*$k->posible_test?></td> 
                    <td><?=$run_exp?></td>
                    <td><?=$mx_exp?></td>
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
<input type="hidden" value="1" id="sl">
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
