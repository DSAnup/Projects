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
        Fixed Product Number
        <small>Fixed Product Number </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="<?= base_url() . 'Control/fixed_asset' ?>">Fixed Product List </a></li> -->

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
                <h3>Fixed Asset Number List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Asset Name</th>
                    <th>Asset Number</th>
                    
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($fxassetnumber as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <?php foreach ($fixedassetname as $k) {if($s->assetId==$k->id){?>
                      <td><?= $k->faName;?></td>
                      
                    <td><?php echo strtoupper(substr($k->faName, 0, 2)).'000'.$s->assetNumber?></td>
                    <?php } }?>
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
function totalvalue(perpic) {
	var q = $('#quantity').val();
	$('#total').val(q*perpic);
}
function totalvalue2(perpic) {
	var q = $('#pprice').val();
	$('#total').val(q*perpic);
}
</script>