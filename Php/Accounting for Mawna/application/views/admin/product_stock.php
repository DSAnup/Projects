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
        Product Stock
        <small>Product  Stock</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Product  Stock </a></li>

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
                <h3>Product Stock</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Stock In</th>
                    <th>Stock Out</th>
                    <th>Balance</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                  $ci=&get_instance();
                  $ci->load->model('Admin_model');
                   $i=0; foreach ($product as $s) {
                    $in=$ci->Admin_model->get_product_stock_in($s->id);
                    $out=$ci->Admin_model->get_product_stock_out($s->id);
                    $check = count($ci->Rest_model->SelectData('test_sale','*', array('testID'=>1)));
                    ?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->name?></td>
                    <td><?=$in?></td>
                    <td><?php if($s->id ==2){echo $out + $check;}else{echo $out;}?></td>
                    <td><?php if($s->id ==2){echo $in-$out-$check;}else{echo $in-$out;}?></td>
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