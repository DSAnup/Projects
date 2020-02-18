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
        <small>Fixed Product Management</small>
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
              <h3>Fixed Asset Management</h3>
            </div>
            <form action="<?=base_url()?>Update_Control/add_fixed_asset_adj" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <div class="form-group">
                    <label>Fixed Asset</label>
                    <select class="form-control" name="assetId" onchange="findasset(this.value)" required>
                      <option value="">Select Fixed Asset</option>
                      <?php foreach ($fixed_asset as $k) {?>
                      <option value="<?=$k->id?>" <?php if(isset($edit)){ if($edit->assetId==$k->id){ echo "selected";}} ?>><?= $k->asset?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="<?php if(isset($edit)){ echo @$edit->date;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Causes</label>
                    <input type="text" name="cause" class="form-control" value="<?php if(isset($edit)){ echo @$edit->cause;}?>" required>
                  </div>
                  <div class="form-group" id="actualquantity">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="aquantity" id="aquantity" onkeyup="totalvalue2(this.value)" class="form-control " value="<?php if(isset($edit)){ echo @$edit->aquantity;}?>" required>
                  </div>
                  <div class="form-group">
                    <label>Handle By</label>
                    <input type="text" name="handleBy" class="form-control" value="<?php if(isset($edit)){ echo @$edit->handleBy;}?>" required>
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
      
      
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
<script type="text/javascript">

  function findasset(id){
    // alert(id);
     $.ajax({
              url:'<?= base_url()?>Update_Control/view_fixed_asset',
              type: 'post',
              dataType: 'json',
              data: {val: id},
              success: function(data){
                html = '<label>Quantity Remain</label><input type="number" name="totalquantity" id="totalquantity"  class="form-control " value="'+data.quantity+'" readonly>'
                    $('#actualquantity').html(html)
              }

            })

  }
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
	var qq = $('#totalquantity').val();
  // alert(qq)
	if(perpic>qq){
    alert('Please enter bellow quantity of quantity remain.')
    $('#aquantity').val('')
  }
}
</script>