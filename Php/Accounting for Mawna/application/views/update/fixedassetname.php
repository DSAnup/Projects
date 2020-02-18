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
        Fixed Product Name
        <small>Fixed Product Name List</small>
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
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Fixed Product Name </h3>
            </div>
            <form action="<?=base_url()?>Update_Control/add_fixedassetname" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <div class="form-group">
                    <label>Asset Name</label>
                    <input type="text" name="faName" class="form-control" value="<?php if(isset($edit)){ echo @$edit->faName;}?>" required>
                  </div>
                  <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Fixed Asset Name List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Asset Name</th>
                    <th>Quantity</th>
                    <th>Last Update</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($fixedassetname as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->faName?></td>
                    <td><?=$s->quantity?></td>
                    <td><?=$s->date	?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/fixedassetname/'.$s->id?>">Update</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_fixedassetname/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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
function totalvalue(perpic) {
	var q = $('#quantity').val();
	$('#total').val(q*perpic);
}
function totalvalue2(perpic) {
	var q = $('#pprice').val();
	$('#total').val(q*perpic);
}
</script>