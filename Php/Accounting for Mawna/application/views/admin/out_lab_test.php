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
            <form action="<?=base_url()?>Control/add_out_lab_test_taken" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                 <table class="table table-bordered">
                   <thead>
                     <tr>
                       <th>Select Lab</th>
                       <td >
                         <select class="form-control" name="labID">
                           <option>Select Lab</option>
                           <?php foreach ($lab as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->name?></option>
                           <?php } ?>
                         </select>
                       </td>
                       <th>Patient</th>
                       <td colspan="2">
                         <select class="form-control" name="patientID">
                           <option>Select Patient</option>
                           <?php foreach ($patient as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->patientName?></option>
                           <?php } ?>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <th>Select Test</th>
                       <td colspan="4">
                         <!-- <select class="form-control" onchange="get_test_info(this.value)">
                           <option>Select Test</option>
                           <?php foreach ($test as $k) {?>
                            <option value="<?=$k->id?>"><?=$k->name?></option>
                           <?php } ?>
                         </select> -->
                              <input type="text" list="languages" onchange="get_test_info(this.value)" class="form-control" id="tests">
                       <datalist id="languages" >
                         <?php foreach ($test as $k) {?>
                         <option value="<?=$k->id?>"><?=$k->name?></option>
                         <?php } ?>
</datalist>
                       </td>
                     </tr>
                     <tr>
                       <th>SL</th>
                       <th>Test Name</th>
                       <th>Price</th>
                       <th></th>
                       <th width="2%">Action</th>
                     </tr>
                   </thead>
                   <tbody id="b">
                     <?php if(isset($edit)){
                      $i=1;
                      foreach ($edit as $k) {
                      ?>
                      <tr id="t_<?=$i?>">
                        <td><?=$i?></td>
                        <td>
                          <?php foreach ($test as $e) {
                            if($e->id==$k->testID){
                              echo $e->name;
                            }
                          } ?>
                          <input type="hidden" name="testID[]" value="<?=$k->testID?>">
                        </td>
                        <td colspan="2"><input type="text" readonly name="price[]" class="form-control price" style="text-align:right" value="<?=$k->price?>"></td>
                        <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test(<?=$i++?>)">-</a></td>
                      </tr>
                      <?php } $ii=$i-1; }else{ $ii=0;}  ?>
                   </tbody>
                   <tfoot>
                     <tr>
                       <th colspan="2" style="text-align:right"> Total</th>
                       <td colspan="2"><input id="sub_total" class="form-control" name="total" readonly value="<?php if(isset($edit)){ echo $edit[0]->sub_total;}else{ echo '0';} ?>" style="text-align:right"></td>
                       <td></td>
                     </tr>
                   </tfoot>
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
                    <th>Date</th>
                    <th>Lab</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($invoice as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td><?php  foreach ($lab as $k) {
                      if($s->labID==$k->id){
                        echo $k->name;
                      }
                    }?></td>
                    <td><?=$s->total?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="<?=base_url().'Control/invoice/'.$s->invoice_id?>">View</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_out_lab_test_invoice/'.$s->invoice_id?>" onclick="return confirm('are you sure?')">Delete</a>
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
function if_asm (v) {
  if(v=='asm'){
    $('#zone').css('display','block')
  }else{
    $('#zone').css('display','none')
  }
}
function get_test_info(id) {
var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_test_info", 
    data: {id:id},
    success: function(data){
          var sl=parseInt($('#sl').val())+1
      var ht='<tr id="t_'+sl+'">'
          ht+='<td>'+sl+'</td>'
          ht+='<td>'+data.name+' <input type="hidden" name="testID[]" value="'+data.id+'"></td>'
          ht+='<td colspan="2"><input type="text" name="price[]" onkeyup="calculate_price()" class="form-control price" style="text-align:right" value="'+data.price+'"></td>'
          ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test('+sl+')">-</a></td>'
          ht+='</tr>'
          $('#sl').val(sl)
          $('#b').append(ht)
          calculate_price()
          $('#tests').val('')
    }
  })
}
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
</script>