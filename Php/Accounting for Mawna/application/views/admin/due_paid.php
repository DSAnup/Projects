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
        Due
        <small>Due List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Due List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Collect Due</h3>
            </div>
            <form action="<?=base_url()?>Control/add_due_paid" method="post" enctype="multipart/form-data">
              <?php 
              $te=0;
              $pr=0; 
              $p=0;
              foreach ($product as $s) { $pr+=$s->due;}
              foreach ($test as $s) { $te+=$s->due;}
              foreach ($paid as $s) { $p+=$s->amount;}
              $total_due=$te+$pr-$p;
                ?>
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1"> 
                <div class="form-group">
                    <label>Patient</label>
                    <select name="patientID" class="form-control"  onchange="getval(this.value);">
                      <option>Select Patient</option>
                      <?php foreach ($patient as $p) {?>
                          <option value="<?=$p->id?>"><?=$p->patientName?></option>
                      <?php } ?>
                    </select>
                  </div>  
                  <div class="form-group">
                    <label>Total Due</label>
                    <input type="text" id="due" class="form-control" value="<?=$total_due?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Collected Amount</label>
                    <input type="text" id="collectam" class="form-control" name="amount">
                  </div>
                  <div class="form-group">
                    <label></label>
                    <input type="submit" id="enter" class="btn btn-primary btn-block" value="Submit" disabled="true">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" >
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Due Paid List</h3>
              </div>
              <table id="example_1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $total=0; $i=0; foreach ($paid as $s) { $total+=$s->amount;?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td><?=$s->amount?></td>
                    <td>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_due_paid/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="2" style="text-align:right">Total=</th>
                    <th><?=$total?></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>

              <div class="col-md-6" >
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Product Sale Due</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Invoice ID</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $total=0; $i=0; foreach ($product as $s) { $total+=$s->due;?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td><?=$s->invoice_id?></td>
                    <td><?=$s->due?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3" style="text-align:right">Total=</th>
                    <th><?=$total?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="col-md-6" >
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Test Sale Due</h3>
              </div>
              <table id="example_2" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Invoice ID</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $total=0; $i=0; foreach ($test as $s) { $total+=$s->due;?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td><?=$s->invoice_id?></td>
                    <td><?=$s->due?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3" style="text-align:right">Total=</th>
                    <th><?=$total?></th>
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
function get_supplier_due_info(id) {
var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_supplier_due_info", 
    data: {id:id},
    success: function(data){
      $('#due').val(data)
    }
  })
}
function calculate_due () {
  var due=$('#due').val()
  var cash=parseFloat($('#cash').val())
  var cheque=parseFloat($('#cheque').val())
  $('#balance').val(due-(cash+cheque))
}
function getval(id)
{
    var base='<?php echo base_url() ?>';
  $.ajax({
    type:'post',
    dataType: "json",
    url: base+"Control/get_patient_due_info", 
    data: {id:id},
    success: function(data){
      // alert(data);
       $('#due').val(data)
      if (data > 0) {
          $("#enter").prop('disabled',false)//use prop()
        }else{
          $("#enter").prop('disabled',true)//use prop()
        }
    }
  })
  
}
$('#collectam').keyup(function(){
  var coll = parseFloat($('#collectam').val())
  var due = parseFloat($('#due').val())
  if(coll > due){
    alert("Sorry, Collected money must be less than due.")
    $('#collectam').val("")
  }
})
</script>