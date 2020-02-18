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
            <form action="<?=base_url()?>Control/add_reagent_purchase" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                 <table class="table table-bordered">
                   <thead>
                     <tr>
                       <th>Select Supplier</th>
                       <td colspan="6">
                         <select class="form-control" onchange="get_reagent(this.value)">
                           <option>Select Supplier</option>
                           <?php foreach ($supplier as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->supplier?></option>
                           <?php } ?>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <th>Select Reagent</th>
                       <td colspan="6" id="pr">
                         <select class="form-control" disabled>
                           <option>Select Reagent</option>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <th>SL</th>
                       <th>Reagent Name</th>
                       <!-- <th>Batch ID</th> -->
                       <th>Expire Date</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Total</th>
                       <th width="2%">Action</th>
                     </tr>
                   </thead>
                   <tbody id="b">
                     
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
                <h3>Purchase List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Reagent</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($invoice as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td><?php  foreach ($reagent as $k) {
                      if($s->reagentID==$k->id){
                        echo $k->name;
                      }
                    }?></td>
                    <td><?=$s->price?></td>
                    <td><?=$s->quantity?></td>
                    <td><?=$s->total?></td>
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
function get_reagent_info(id) {
var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_reagent_info", 
    data: {id:id},
    success: function(data){
          var sl=parseInt($('#sl').val())+1
      var ht='<tr id="t_'+sl+'">'
          ht+='<td>'+sl+'</td>'
          ht+='<td>'+data.name+' <input type="hidden" name="reagentID[]" value="'+data.id+'"><input type="hidden" name="supplierID[]" value="'+data.supplierID+'"></td>'
          // ht+='<td><input type="text"  class="form-control" name="batch_id[]" style="text-align:right" ></td>'
          ht+='<td><input type="text"  class="form-control date" placeholder="YYYY-MM-DD" name="expiry_date[]" ></td>'
          ht+='<td><input type="text" readonly class="form-control" id="price_'+sl+'" name="price[]" style="text-align:right" value="'+data.price+'"></td>'
          ht+='<td><input type="text" name="quantity[]" id="quantity_'+sl+'" class="form-control" style="text-align:right" onkeyup="calculate_price('+sl+')" value="0"></td>'
          ht+='<td><input type="text" id="total_'+sl+'" name="total[]" class="form-control" style="text-align:right" onkeyup="calculate_price('+sl+')" readonly value="0"></td>'
          ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test('+sl+')">-</a></td>'
          ht+='</tr>'
          $('#sl').val(sl)
          $('#b').append(ht)
    }
  })
}
function calculate_price(id) {
  var price=parseFloat($('#price_'+id).val())
  var quantity=parseFloat($('#quantity_'+id).val())
  $('#total_'+id).val(price*quantity)
}
function remove_test(id) {
  $('#t_'+id).remove()
}

function get_reagent(id) {
var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_reagent", 
    data: {id:id},
    success: function(data){
      var ht='<select class="form-control" onchange="get_reagent_info(this.value)">'
          ht+='<option>Select Product</option>'
           $.each(data, function(i,v){
              ht+='<option value="'+v.id+'">'+v.name+'</option>'
          })
          ht+='</select>'
          $('#pr').html(ht)
    }
  })
}
</script>
<script>
$( function() {
  $( ".date" ).datepicker({
    dateFormat: "yy-mm-dd"
  });
} );
</script>