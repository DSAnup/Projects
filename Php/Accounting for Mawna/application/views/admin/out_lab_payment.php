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
    Invoice 
         <small>New Invoice </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?= base_url() . 'Control/admin_list' ?>">New Invoice  </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Create Invoice </h3>
            </div>
            <form action="<?=base_url()?>Control/add_out_lab_payment_submit" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                 <table class="table table-bordered">
                   <thead>
                     <tr>
                       <th>Select Lab</th>
                       <td colspan="6">
                         <select class="form-control" onchange="get_lab_info(this.value)">
                           <option>Select Lab</option>
                           <?php foreach ($lab as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->name?></option>
                           <?php } ?>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <th>SL</th>
                       <th>Lab Name</th>
                       <th>Payable</th>
                       <th>Cash</th>
                       <th>Cheque</th>
                       <th>Due</th>
                       <th width="2%">Action</th>
                     </tr>
                   </thead>
                   <tbody id="b">
                     <?php if(isset($edit)){  ?>
                    <tr id="t_1">
                      <td>1</td>
                      <td>
                      <?php foreach ($lab as $k) {
                        if($k->id==$edit->labID){
                          echo $k->name;
                        }
                      } ?>
                       <input type="hidden" name="labID[]" value="<?=$edit->labID?>"></td>
                      <td><input type="text" readonly class="form-control" id="due_1" style="text-align:right" value="<?=$due?>"></td>
                      <td><input type="text" name="cash[]" id="cash_1" class="form-control" style="text-align:right" onkeyup="calculate_price(1)" value="<?=$edit->cash?>"></td>
                      <td><input type="text" name="cheque[]" id="ck_1" class="form-control" style="text-align:right" onkeyup="calculate_price(1)" value="<?=$edit->cheque?>"></td>
                      <td><input type="text" id="cd_1" class="form-control" style="text-align:right" onkeyup="calculate_price(1)" readonly value="<?=$due-($edit->cash+$edit->cheque)?>"></td>
                      <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test(1)">-</a></td>
                    </tr>
                     <?php } ?>
                   </tbody>
                 </table>
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
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
                <h3>Payment List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Lab</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($payments as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td><?php  foreach ($lab as $k) {
                      if($s->labID==$k->id){
                        echo $k->name;
                      }
                    }?></td>
                    <td><?=$s->cash+$s->cheque?></td>
                    <td>
                      <!-- <a class="btn btn-sm btn-primary" href="<?=base_url().'Control/out_lab_payment/'.$s->id?>">Edit</a> -->
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_out_lab_test_invoice/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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
<input type="hidden" value="1" id="sl">
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
<script type="text/javascript">
function get_lab_info(id) {
var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_lab_info", 
    data: {id:id},
    success: function(data){
          var sl=parseInt($('#sl').val())+1
      var ht='<tr id="t_'+sl+'">'
          ht+='<td>'+sl+'</td>'
          ht+='<td>'+data.name+' <input type="hidden" name="labID[]" value="'+data.id+'"></td>'
          ht+='<td><input type="text" readonly class="form-control" id="due_'+sl+'" style="text-align:right" value="'+data.due+'"></td>'
          ht+='<td><input type="text" name="cash[]" id="cash_'+sl+'" class="form-control" style="text-align:right" onkeyup="calculate_price('+sl+')" value="0"></td>'
          ht+='<td><input type="text" name="cheque[]" id="ck_'+sl+'" class="form-control" style="text-align:right" onkeyup="calculate_price('+sl+')" value="0"></td>'
          ht+='<td><input type="text" id="cd_'+sl+'" class="form-control" style="text-align:right" onkeyup="calculate_price('+sl+')" readonly value="0"></td>'
          ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test('+sl+')">-</a></td>'
          ht+='</tr>'
          $('#sl').val(sl)
          $('#b').append(ht)
    }
  })
}
function calculate_price(id) {
  var due=parseFloat($('#due_'+id).val())
  var cash=parseFloat($('#cash_'+id).val())
  var ck=parseFloat($('#ck_'+id).val())
  $('#cd_'+id).val(due-(cash+ck))
}
function remove_test(id) {
  $('#t_'+id).remove()
  calculate_price()
}
function calculate_due(v) {
  var g=parseFloat($('#grand_total').val())
  var d=g-v;
  $('#due').val(d)
}
</script>