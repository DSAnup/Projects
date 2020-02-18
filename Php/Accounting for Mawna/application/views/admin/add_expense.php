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
        Expense
        <small>Expense List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Expense List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Expense </h3>
            </div>
            <form action="<?=base_url()?>Control/add_expense_submit" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" onchange="get_sub_category(this.value)">
                      <option>Select Category</option>
                      <?php foreach ($category as $k) {?>
                      <option value="<?=$k->id?>" <?php  if(@$edit->c_id==$k->id){ echo "selected";} ?>><?=$k->category?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sub Category</label>
                    <span id="sub_span">
                    <select class="form-control" readonly>
                      <option>Select Sub Category</option>
                      <?php if(isset($edit)){ foreach ($sub_category as $k) {?>
                      <option value="<?=$k->id?>" <?php  if(@$edit->sub_categoryID==$k->id){ echo "selected";} ?>><?=$k->sub_category?></option>
                      <?php } } ?>
                    </select>
                  </span>
                  </div>
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <div class="form-group">
                    <h4>Paid</h4>
                    <div class="col-md-6">
                      <label>Cash</label>
                      <input type="text" name="cash" class="form-control" value="<?=@$edit->cash?>">
                    </div>
                    <div class="col-md-6 ">
                      <label>Cheque</label>
                      <input type="text" name="cheque" class="form-control" value="<?=@$edit->cheque?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" class="form-control date" value="<?php if(isset($edit)){ echo @$edit->date;} else{ echo date('Y-m-d'); }?>">
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
                <h3>Expense List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    
                    <th>Cash Paid</th>
                    <th>Cheque Paid</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($expense as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->category?></td>
                    <td><?=$s->sub_category?></td>
                    <td><?= $s->cash;?></td>
                    <td><?= $s->cheque;?></td>
                    <td><?php echo (int)$s->cash + (int)$s->cheque;?></td> 
                    <td><?= $s->date;?></td> 
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/add_expense/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_expense/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
            <tr>
                <th colspan="3" style="text-align:right">Grand Total:</th>
                <th><?= $expenseCashSum->cash;?></th>
                <th><?= $expensechequeSum->cheque;?></th>
                <th><?= $expenseCashSum->cash + $expensechequeSum->cheque;?></th>
            </tr>
        </tfoot>
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
function get_sub_category (id) {
  var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_sub_category", 
    data: {id:id},
    success: function(data){
      var ht='<select name="sub_categoryID" class="form-control">'
      ht+='<option value="">Select Sub Category</option>'
      $.each(data, function(idx, obj) {
        ht+='<option value="'+obj.id+'">'+obj.sub_category+'</option>'
      });
      ht+='</select>'
      $('#sub_span').html(ht)
    }
  })
}
</script>