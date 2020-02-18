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
        Medicine Receive
        <small>Medicine Receive</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Medicine Receive </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Receive </h3>
            </div>
            <form action="<?=base_url()?>Control/add_medicine_receive" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control" name="supplierID">
                      <option>Select Supplier</option>
                      <?php foreach ($supplier as $key) {?>
                      <option value="<?=$key->id?>" <?php if($key->id==@$edit->supplierID){ echo "selected";} ?>><?=$key->supplier?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="<?php if(isset($edit)){ echo @$edit->date;}?>">
                  </div>
                  <div class="form-group">
                    <label>Invoice No</label>
                    <input type="text" name="invoice_no" class="form-control" value="<?php if(isset($edit)){ echo @$edit->invoice_no;}?>">
                  </div>
                  <!-- <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" class="form-control" value="<?php if(isset($edit)){ echo @$edit->product_name;}?>">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="qty" class="form-control" value="<?php if(isset($edit)){ echo @$edit->qty;}?>">
                  </div>
                  <div class="form-group">
                    <label>Price per Product</label>
                    <input type="text" name="price" class="form-control" value="<?php if(isset($edit)){ echo @$edit->price;}?>">
                  </div> -->
                  <div class="form-group">
                    <label>Total Amount per Invoice</label>
                    <input type="text" name="amount" class="form-control" value="<?php if(isset($edit)){ echo @$edit->amount;}?>">
                  </div>
                  <input type="hidden" name="due" class="form-control" value="<?php if(isset($edit)){ echo @$edit->due;}?>">
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
                <h3>Receive List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>Date</th>
                    <th>Name of Company</th>
                    <th>Invoice No</th>
                    <th>Name of Product</th>
                    <th>Qty</th>
                    <th>Tk per Item</th>
                    <th>Total Tk per Invoice</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($medicine as $s) {?>
                  <tr>
                    <td><?=$s->date?></td>
                    <td><?php foreach ($supplier as $k) {
                      if($k->id==$s->supplierID){ echo $k->supplier;}
                    }?></td>
                    <td><?=$s->invoice_no?></td>
                    <td><?=$s->product_name?></td>
                    <td><?=$s->qty?></td>
                    <td><?=$s->price?></td>
                    <td><?=$s->amount?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/medicine_receive/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_medicine_receive/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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