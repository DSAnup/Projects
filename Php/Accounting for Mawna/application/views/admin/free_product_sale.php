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
            <form action="<?=base_url()?>Control/add_free_product_sale" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                 <table class="table table-bordered">
                   <thead>
                     <tr>
                       <th>Patient Name</th>
                       <td colspan="5"><input type="text" name="patient_name" class="form-control" value="<?php if(isset($edit)){ echo @$edit[0]->patient_name;}?>"></td>
                       
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td colspan="5"><textarea name="address" class="form-control"><?php if(isset($edit)){ echo @$edit[0]->address;}?></textarea></td>
                     </tr>
                     <tr>
                       <th>Select Product</th>
                       <td colspan="5">
                         <select class="form-control" onchange="get_product_info(this.value)">>
                           <option>Select Product</option>
                           <?php foreach ($product as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->name?></option>
                           <?php } ?>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <th>SL</th>
                       <th>Product Name</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Total</th>
                       <th width="2%">Action</th>
                     </tr>
                   </thead>
                   <tbody id="b">
                     
                      
                   </tbody>
                   <?php  $ii=0;  ?>
                   
                 </table>
                    <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit[0]->invoice_id?>">
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
                <h3>Invoice List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Invoice No</th>
                    <th>Date</th>
                    <th>Patient Name</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($invoice as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->invoice_id?></td>
                    <td><?=$s->date?></td>
                    <td><?=$s->patient_name?></td>
                    <td><?=$s->total?></td>
                    <td>
                      <!-- <a class="btn btn-sm btn-primary" href="<?=base_url().'Control/invoice/'.$s->invoice_id?>">View</a> -->
                      <!-- <a class="btn btn-sm btn-success" href="<?=base_url().'Control/test_sale/'.$s->invoice_id?>">Edit</a> -->
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_free_invoice/'.$s->invoice_id?>" onclick="return confirm('are you sure?')">Delete</a>
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
<input type="hidden" value="<?=$ii?>" id="sl">
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
<script type="text/javascript">

function calculate_price() {
  var price=0;
  $('.price').each(function(){
    var p=parseFloat($(this).val())
    price+=p
  })
  $('#sub_total').val(price)
  var discount=parseFloat($('#discount').val())
  var pp=price-(price*discount)/100
  var consider=parseFloat($('#consider').val())
  var grand_total=pp-consider
  $('#grand_total').val(grand_total)
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

function get_product_info(id) {
var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_product_info", 
    data: {id:id},
    success: function(data){
      var sl=parseInt($('#sl').val())+1
      var ht='<tr id="t_'+sl+'">'
          ht+='<td>'+sl+'</td>'
          ht+='<td><input type="hidden" name="productID[]" value="'+data.id+'">'+data.name+'</td>'
          ht+='<td><input type="text" readonly id="price_'+sl+'" name="price[]" class="form-control" style="text-align:right" value="'+data.price+'"></td>'
          ht+='<td><input type="text"  name="qty[]" id="quantity_'+sl+'" onkeyup="calculate_price_1('+sl+')" class="form-control" style="text-align:right"></td>'
          ht+='<td><input type="text" readonly id="total_'+sl+'" name="total[]" class="form-control price" style="text-align:right"></td>'
          ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test('+sl+')">-</a></td>'
          ht+='</tr>'
          $('#sl').val(sl)
          $('#b').append(ht)
    }
  })
}
function calculate_price_1(id){
  var qty=$('#quantity_'+id).val()
  var p=$('#price_'+id).val()
  total=qty*p
  $('#total_'+id).val(total)
  calculate_price()
}
</script>