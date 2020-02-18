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
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Reagent Stock Report</h3>
              </div>
              <table  class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Reagent</th>
                    <th>Opening Stock</th>
                    <?php for($i=1;$i<=date('d');$i++){ ?>
                    <th colspan="2"><?=$i.'-'.date('m-Y')?></th>
                    <?php } ?>
                    <th>Total Stock</th>
                  </tr>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <?php for($i=1;$i<=date('d');$i++){ ?>
                    <th>Stock In</th>
                    <th>Stock Out</th>
                    <?php } ?>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                  $c=0; foreach ($reagent as $k) {?>
                  <tr>
                    <td><?=++$c?></td>
                    <td><?=$k->name?></td>
                    <td><?php echo $open=$ci->Admin_model->reagent_opening_stock($k->id)?></td>
                    <?php for($i=1;$i<=date('d');$i++){ $d=date('Y-m').'-'.$i; ?>
                    <td><?=$in=$ci->Admin_model->reagent_stock_in($k->id,$d)?></td>
                    <td><?=$out=round($ci->Admin_model->reagent_stock_out($k->id,$d)/$k->box_size,2)?></td> 
                    <!-- <td>test</td> -->
                    <?php } ?>
                    <!-- <td><?=$ci->Admin_model->reagent_stock($k->id)?></td> -->
                    <td><?=$in+$open-$out?></td>
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
