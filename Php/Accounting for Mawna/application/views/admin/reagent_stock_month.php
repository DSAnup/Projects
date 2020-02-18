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
                <h3>MDA, Lab. Reporting Statement - <?=date('Y')?></h3>
              </div>
              <table  class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>Month</th>
                    <?php foreach ($reagent as $k) {?>
                    <th><?=$k->name?></th>
                    <?php } 
                    $ci=&get_instance();
                    $ci->load->model('Admin_model');
                    ?>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php for($i=1;$i<=12;$i++){ ?>
                  <tr>
                    <th width="5%"><?php $monthNum  = $i;
                    echo $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));?></th>
                    <?php foreach ($reagent as $k) {
                      // echo "<pre>";
                      // print_r($k->id);
                      $st=$ci->Admin_model->get_stock_monthly($k->id,$i);
                      // var_dump($st);
                      echo "<td>".$st."</td>";
                    } ?> 
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
