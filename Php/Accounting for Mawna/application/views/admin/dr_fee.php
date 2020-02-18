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
        Doctor Fee
        <small>Doctor Fee List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Doctor Fee List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Doctor's Fee </h3>
            </div>
            <form action="<?=base_url()?>Control/add_dr_fee" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <thead id="pp">
                    <tr>
                      <th>Patient</th>
                      <td>
                        <select name="patient" class="form-control">
                      <option>Select Patient</option>
                      <?php foreach ($patient as $p) {?>
                        <option value="<?=$p->id?>" <?php if(@$edit->patient==$p->id){ echo "selected";} ?>><?=$p->patientName?></option>
                    <?php   } ?>
                    </select>
                  </td>
                  <td>
                    <!-- <a href="javascript:void(0)" onclick="add_new_patient()" class="btn btn-primary">Create Patient</a> -->
                  </td>
                    </tr>
                  </thead>
                  <?php if(isset($edit)){ ?>
                    <input type="hidden" name="id" value="<?=$edit->id?>">
                    <?php } ?>
                  <tbody>
                    <tr>
                      <th>Doctor</th>
                      <td>
                        <select class="form-control" name="drID">
                      <option>Select Doctor</option>
                      <?php foreach ($dr as $k) {?>
                      <option value="<?=$k->id?>" <?php if(@$edit->drID==$k->id){ echo "selected";} ?>><?=$k->name?></option>
                      <?php } ?>
                    </select>
                      </td>
                     
                    </tr>
                    <tr>
                       <th>Patient Type</th>
                    <td>
                      <select class="form-control" name="type">
                      <option>Select Type</option>
                      <option value="op" <?php if(@$edit->type=='op'){ echo "selected";} ?>>Old Patient</option>
                      <option value="np" <?php if(@$edit->type=='np'){ echo "selected";} ?>>New Patient</option>
                      <option value="orcn" <?php if(@$edit->type=='ocrn'){ echo "selected";} ?>>OCRN/Self Patient</option>
                    </select>
                    </td>
                    </tr>
                    <tr>
                    <th>Amount</th>
                    <td>
                      <input type="text" name="amount" class="form-control" value="<?php if(isset($edit)){ echo @$edit->amount;}?>">
                    </td>
                  </tr>
                  </tbody>
                </table>
                <div class="col-md-10 col-md-offset-1">
                  
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
                <h3>Doctor List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Patient</th>
                    <th>Patient Type</th>
                    <th>Doctor</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($fee as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->date?></td>
                    <td>
                      <?php foreach ($patient as $p) {
                        if($p->id==$s->patient){
                          echo $p->patientName;
                        }
                      } ?>
                    </td>
                    <td style="text-transform:uppercase"><?=$s->type?></td>
                    <td>
                      <?php foreach ($dr as $k) {
                        if($k->id==$s->drID){
                          echo $k->name;
                        }
                      } ?>
                    </td>
                    <td><?=$s->amount?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Control/dr_fee/'.$s->id?>">Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_dr_fee/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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
</script>