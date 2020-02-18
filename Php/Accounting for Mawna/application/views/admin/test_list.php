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
        Test
        <small>Test List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Test List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Test </h3>
            </div>
            <form action="<?=base_url()?>Control/add_test" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                 
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php if(isset($edit)){ echo @$edit->name;}?>">
                  </div>
                  <div class="form-group">
                    <label>MDA Price</label>
                    <input type="text" name="price" class="form-control " value="<?php if(isset($edit)){ echo @$edit->price;}?>">
                  </div>
                  <div class="form-group">
                    <label>Regular Price</label>
                    <input type="text" name="regular_price" class="form-control " value="<?php if(isset($edit)){ echo @$edit->regualr_price;}?>">
                  </div>
                  <div class="form-group">
                    <label>Discount</label>
                    <input type="text" name="discount" class="form-control " value="<?php if(isset($edit)){ echo @$edit->discount;}?>">
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
                <h3>Test List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>MDA Price</th>
                    <th>Regular Price</th>
                    <th>Discount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($test as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->name?></td>
                    <td><?=$s->price?></td>
                    <td><?=$s->regular_price?></td>
                    <td><?= $s->discount;?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/test_list/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_test/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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