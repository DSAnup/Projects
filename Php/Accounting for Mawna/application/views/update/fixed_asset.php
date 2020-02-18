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
        Fixed Product
        <small>Fixed Product List</small>
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
              <h3>Add Fixed Product </h3>
            </div>
            <form action="<?=base_url()?>Update_Control/add_fixed_asset" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                    <div class="form-group">
                    <label>Fixed Asset</label>
                    <select class="form-control" name="assetId" onchange="findasset(this.value)" required>
                      <option value="">Select Fixed Asset</option>
                      <?php foreach ($fixedassetname as $k) {?>
                      <option value="<?=$k->id?>" <?php if(isset($edit)){ if($edit->assetId==$k->id){ echo "selected";}} ?>><?=$k->faName?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="<?php if(isset($edit)){ echo @$edit->date;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" id="quantity" onkeyup="totalvalue2(this.value)" class="form-control " value="<?php if(isset($edit)){ echo @$edit->quantity;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Per Pcs Price</label>
                    <input type="number" name="ppicamount"  id="pprice" onkeyup="totalvalue(this.value)" class="form-control " value="<?php if(isset($edit)){ echo @$edit->ppicamount;}?>" >
                  </div>
                  <div class="form-group">
                    <label>Total Amount</label>
                    <input type="number" name="amount" class="form-control " readonly id="total" value="<?php if(isset($edit)){ echo @$edit->amount;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Bought By</label>
                    <input type="text" name="buy" class="form-control" value="<?php if(isset($edit)){ echo @$edit->buy;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Bought From</label>
                    <input type="text" name="boughtFrom" class="form-control" value="<?php if(isset($edit)){ echo @$edit->boughtFrom;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?php if(isset($edit)){ echo @$edit->address;}?>" >
                  </div>
                  <div class="form-group">
                    <label>Invoice No</label>
                    <input type="text" name="invoiceNo" class="form-control" value="<?php if(isset($edit)){ echo @$edit->invoiceNo;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Comments</label>
                    <textarea class="form-control ckeditor" name="comments" ><?php if(isset($edit)){ echo @$edit->comments;}?></textarea>
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
                <h3>Fixed Asset List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Asset Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Buyer</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($fixed_asset as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <?php foreach ($fixedassetname as $k) {if($s->assetId==$k->id){?>
                      <td><?= $k->faName;?></td>
                      <?php } }?>
                    <td><?=$s->quantity?></td>
                    <td><?= $s->amount;?></td>
                    <td><?=$s->date	?></td>
                    <td><?=$s->buy?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/fixed_asset/'.$s->id?>">Update</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_fixed_asset/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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