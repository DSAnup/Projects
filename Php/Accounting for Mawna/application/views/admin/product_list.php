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
        Product
        <small>Product List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Product List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Product </h3>
            </div>
            <form action="<?=base_url()?>Control/add_product" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control" name="supplierID">
                      <option>Select Supplier</option>
                      <?php foreach ($supplier as $k) {?>
                      <option value="<?=$k->id?>" <?php if(isset($edit)){ if($edit->supplierID==$k->id){ echo "selected";}} ?>><?=$k->supplier?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php if(isset($edit)){ echo @$edit->name;}?>">
                  </div>
                  <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" value="<?php if(isset($edit)){ echo @$edit->code;}?>">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control " value="<?php if(isset($edit)){ echo @$edit->price;}?>">
                  </div>
                  <div class="form-group">
                    <label>Per Piece Profit</label>
                    <input type="text" name="profit" class="form-control " value="<?php if(isset($edit)){ echo @$edit->profit;}?>">
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
                <h3>Product List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Per Piece Profit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($product as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->name?></td>
                    <td><?=$s->price?></td>
                    <td><?= $s->profit;?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/product_list/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_product/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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