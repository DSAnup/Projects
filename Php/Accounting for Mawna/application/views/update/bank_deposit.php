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
        Bank Deposit
        <small>Bank Deposit List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Bank Deposit </h3>
            </div>
            <form action="<?=base_url()?>Update_Control/add_bank_deposit" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                  
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="date" class="form-control date" value="<?php if(isset($edit)){ echo @$edit->date;} else{ echo date('Y-m-d'); }?>">
                  </div>
                  <div class="form-group">
                      <label>Deposit</label>
                      <input type="text" name="amount" class="form-control" value="<?=@$edit->amount?>">
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
                <h3>Bank Deposit List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($bank_deposit as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $s->amount;?></td>
                    <td><?= $s->date;?></td> 
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/bank_deposit/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_bank_deposit/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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