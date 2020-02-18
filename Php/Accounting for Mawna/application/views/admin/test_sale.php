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
            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add New Patient</button>
            <form action="<?=base_url()?>Control/add_test_taken" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                 <table class="table table-bordered">
                   <thead id="pp">
                     <tr>
                       <th>Patient</th>
                       <td>
                         <!-- <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="patientID">
                           <option>Select Patient</option>
                           <?php foreach ($patient as $k) {?>
                           <option value="<?=$k->id?>" <?php if($k->id==@$edit[0]->patientID){ echo "selected";} ?>><?=$k->name?> | <?=$k->regisId?> | <?=$k->phone?></option>
                           <?php } ?>
                         </select> -->
                         <select data-placeholder="Choose a Product..." class="chosen-select form-control" tabindex="2" name="patientID">
                           <option>Select Patient</option>
                           <?php foreach ($patient as $k) {?>
                           <option value="<?=$k->id?>" <?php if($k->id==@$edit[0]->patientID){ echo "selected";} ?>><?=$k->patientName?> | <?php if($k->grnNum !=0){echo "GRN-000".$k->grnNum;}?><?php if($k->mrnNum !=0){echo "MRN-000".$k->mrnNum;}?><?php if($k->prnNum !=0){echo "PRN-000".$k->prnNum;}?> | <?=$k->mob1?></option>
                           <?php } ?>
                         </select>
                       </td>
                       <th></th> 
                       <td colspan="2">
                         <select class="form-control" name="reference" required>
                           <option>Select Reference</option>
                           <?php foreach ($dr as $k) {?>
                           <option value="<?=$k->id?>" <?php if($k->id==@$edit[0]->reference){ echo "selected";} ?>><?=$k->name?></option>
                           <?php } ?>
                           <option value="outdoor" <?php if('outdoor'==@$edit[0]->reference){ echo "selected";} ?>>Out Door Dr</option>
                           <option value="self" <?php if('self'==@$edit[0]->reference){ echo "selected";} ?>>Self Patient</option>
                         </select>
                       </td> 
                     </tr>
                   </thead>
                   <tr>
                     <th>Select Test</th>
                     <td colspan="4">
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
                     <th>MDA Price</th>
                     <th>Regular Price</th>
                     <th>Type</th>
                     <th width="2%">Action</th>
                   </tr>
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
                            <input type="hidden" name="testID[]" value="<?=$k->testID?>" id="testID_<?=$i?>">
                          </td>
                          <td colspan="2"><input type="text" readonly name="price[]" class="form-control price" style="text-align:right" value="<?=$k->price?>" id="price_<?=$i?>"></td>
                          <td>Free <input type="checkbox" <?php if($k->type=='free'){ echo "checked";} ?> value="free" id="free_<?=$i?>" name="type[]" onchange="calculate_free(<?=$i?>)">
                          <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test(<?=$i++?>)">-</a></td>
                        </tr>
                        <?php } $ii=$i-1; }else{ $ii=0;}  ?>
                      </tbody>
                      <tfoot>
                       <tr>
                         <th colspan="2" style="text-align:right">Sub Total</th>
                         <td colspan="2"><input id="sub_total" class="form-control" name="sub_total" readonly value="<?php if(isset($edit)){ echo $edit[0]->sub_total;}else{ echo '0';} ?>" style="text-align:right"></td>
                         <td></td>
                       </tr>
                       <tr>
                        <th colspan="2" style="text-align:right">Discount</th>
                        <td colspan="2"><input id="discount" class="form-control" name="discount" onkeyup="calculate_price()"  value="<?php if(isset($edit)){ echo $edit[0]->discount;}else{ echo '0';} ?>" style="text-align:right"></td>
                        <td></td>
                      </tr>
                      <tr>
                       <th colspan="2" style="text-align:right">Consider</th>
                       <td colspan="2"><input id="consider" class="form-control" name="consider" onkeyup="calculate_price()"  value="<?php if(isset($edit)){ echo $edit[0]->consider;}else{ echo '0';} ?>" style="text-align:right"></td>
                       <td></td>
                     </tr>
                     <tr>
                       <th colspan="2" style="text-align:right">Grand Total</th>
                       <td colspan="2"><input id="grand_total" class="form-control" name="grand_total" readonly value="<?php if(isset($edit)){ echo $edit[0]->grand_total;}else{ echo '0';} ?>" style="text-align:right"></td>
                       <td></td>
                     </tr>
                     <tr>
                      <th colspan="2" style="text-align:right">Paid</th>
                      <td colspan="2"><input id="paid" class="form-control" name="paid" required  onkeyup="calculate_due(this.value)"  value="<?php if(isset($edit)){ echo $edit[0]->paid;}else{ echo '0';} ?>" style="text-align:right"></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th colspan="2" style="text-align:right">Due</th>
                      <td colspan="2"><input id="due" class="form-control" name="due" readonly  value="<?php if(isset($edit)){ echo $edit[0]->due;}else{ echo '0';} ?>" style="text-align:right"></td>
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
                  <th>Patient Name</th>
                  <th>Sub Total</th>
                  <th>Discount</th>
                  <th>Consider</th>
                  <th>Grand Total</th>
                  <th>Due</th>
                  <th>Date </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="itembody">
                <?php $i=0; foreach ($test_sale as $s) {?>
                <tr>
                  <td><?= ++$i;?></td>
                  <td>
                    <?php foreach ($patient as $k) {
                      if($k->id==$s->patientID){
                        echo $k->patientName;
                      }
                    } ?>
                  </td>
                  <td><?=$s->sub_total?></td>
                  <td><?=$s->discount;?></td>
                  <td><?=$s->consider?></td>
                  <td><?=$s->grand_total?></td>
                  <td><?=$s->due?></td>
                  <td><?=$s->date?></td>
                  <td>
                    <!-- <a class="btn btn-sm btn-success" href="<?=base_url().'Control/invoice2/'.$s->invoice_id?>">POS Invoice Previous</a> -->
                    <a class="btn btn-sm btn-success" href="<?=base_url().'Control/invoice/'.$s->invoice_id?>">POS Invoice New</a>
                    <!-- <a class="btn btn-sm btn-info" href="<?=base_url().'Control/generateReports/'.$s->invoice_id?>">Generate Reports</a>
                    <a class="btn btn-sm btn-primary" href="<?=base_url().'Control/invoice_full/'.$s->invoice_id?>">Full Invoice</a> -->
                    <a class="btn btn-sm btn-success" href="<?=base_url().'Control/test_sale/'.$s->invoice_id?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_test_invoice/'.$s->invoice_id?>" onclick="return confirm('are you sure?')">Delete</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                  <tr>
                    <th colspan="2" style="text-align:right">Grand Total:</th>
                    <th><?= $testsaleSub->sub_total;?></th>
                    <th><?= $testsaleDis->discount;?></th>
                    <th><?= $testsaleCon->consider;?></th>
                    <th><?= $testsaleGrand->grand_total;?></th>
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
      ht+='<td>'+data.name+' <input type="hidden" name="testID[]" value="'+data.id+'" id="testID_'+sl+'"></td>'
      ht+='<td><input type="text" readonly name="price[]" id="price_'+sl+'" class="form-control price" style="text-align:right" value="'+data.price+'"></td>'
      ht+='<td><input type="text" readonly  class="form-control " style="text-align:right" value="'+data.regular_price+'"></td>'
      ht+='<td>Free <input type="checkbox" value="free" id="free_'+sl+'" name="type[]" onchange="calculate_free('+sl+')">'
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
  var pp=price-discount
  var consider=parseFloat($('#consider').val())
  var grand_total=pp-consider
  $('#grand_total').val(grand_total)
  $('#due').val(grand_total)
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
function add_new_patient() {
  var ht='<tr>'
  ht+='<th>Name</th>'
  ht+='<td><input type="text" class="form-control" name="name"></td>'
  ht+='<th>Age</th>'
  ht+='<td colspan="2"><input type="text" class="form-control" name="age"></td>'
  ht+='</tr>'
  ht+='<tr>'
  ht+='<th>Phone</th>'
  ht+='<td><input type="text" class="form-control" name="phone"></td>'
  ht+='<th>Reference</th>'
  ht+='<td colspan="2"><input type="text" class="form-control" name="reference"></td>'
  ht+='</tr>'
  ht+='<tr>'
  ht+='<tr>'
  ht+='<th>Weight</th>'
  ht+='<td><input type="text" class="form-control" name="weight"></td>'
  ht+='<th>Height</th>'
  ht+='<td colspan="2"><input type="text" class="form-control" name="height"></td>'
  ht+='</tr>'
  ht+='<tr>'
  ht+='<th>BP</th>'
  ht+='<td ><input type="text" class="form-control" name="bp"></td>'
  ht+='<th>Address</th>'
  ht+='<td ><input type="text" class="form-control" name="address"></td>'
  ht+='</tr>'

  $('#pp').html(ht)
}
function calculate_free(id) {
  var checkbox = document.getElementById("free_"+id);
  if(checkbox.checked == true){
    $('#price_'+id).val(0.00)
    calculate_price()
  }else{
    var testID=$('#testID_'+id).val()
    var base='<?php echo base_url() ?>';
    $.ajax({
      type:'post',
      dataType: "json",
      url: base+"Control/get_test_info", 
      data: {id:testID},
      success: function(data){
        // var sl=parseInt($('#sl').val())+1
        // var ht='<tr id="t_'+sl+'">'
        var ht='<td>'+id+'</td>'
        ht+='<td>'+data.name+' <input type="hidden" name="testID[]" value="'+data.id+'" id="testID_'+id+'"></td>'
        ht+='<td><input type="text" readonly name="price[]" id="price_'+id+'" class="form-control price" style="text-align:right" value="'+data.price+'"></td>'
        ht+='<td>Free <input type="checkbox" value="free" id="free_'+id+'" name="type[]" onchange="calculate_free('+id+')">'
        ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_test('+id+')">-</a></td>'
        // ht+='</tr>'
        $('#t_'+id).html(ht)
        calculate_price()
      }
    })
  }
}
</script>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Patient</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url()?>Update_Control/addNewPatient2" method="post" enctype="multipart/form-data">
          <div class="col-xs-12 col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="patientName" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" class="form-control">
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="mob1" class="form-control" required="required">
              </div>
              <div class="form-group">
                <label>Present Address</label>
                <input type="text" name="preAddress" class="form-control">
              </div>
              <div class="form-group">
                <label style="display: block;">Patient Reg Type:</label>
                    <select name="patReg" required="required" class="form-control">
                      <option value="1">GRN</option>
                      <option value="2">MRN</option>
                      <option value="3">PRN</option>
                    </select>
              </div>
              <div class="form-group">
                <label></label>
                <input type="submit" class="btn btn-primary btn-block" value="Add Patient">
              </div>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>