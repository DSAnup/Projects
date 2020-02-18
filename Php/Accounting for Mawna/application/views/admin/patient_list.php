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
        Patient
        <small>Patient List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Patient List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Add Patient </h3>
            </div>
            <form action="<?=base_url()?>Control/add_patient" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <?php if(isset($edit)){ ?>
                  <input type="hidden" name="id" value="<?=$edit->id?>">
                  <?php } ?>
                  <tr>
                    <th>Name</th>
                    <td><input type="text" class="form-control" name="name" value="<?=@$edit->name?>"  required="required"></td>
                    <th>Age</th>
                    <td colspan="2"><input type="text" class="form-control" name="age" value="<?=@$edit->age?>"></td>
                  </tr>
                  <tr>
                    <th>Father Name</th>
                    <td><input type="text" class="form-control" name="father" value="<?=@$edit->father?>"></td>
                    <th>Mother Name</th>
                    <td colspan="2"><input type="text" class="form-control" name="mother" value="<?=@$edit->mother?>"></td>
                  </tr>
                  <tr>
                    <th>Husband</th>
                    <td><input type="text" class="form-control" name="husband" value="<?=@$edit->husband?>"></td>
                    <th>Present Address</th>
                    <td colspan="2"><input type="text" class="form-control" name="present_address" value="<?=@$edit->present_address?>"></td>
                  </tr>
                  <tr>
                    <th>Permanent Address</th>
                    <td><input type="text" class="form-control" name="permanent_address" value="<?=@$edit->permanent_address?>"></td>
                    <th> Blood Group</th>
                    <td colspan="2"><input type="text" class="form-control" name="blood_group" value="<?=@$edit->blood_group?>"></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><input type="text" class="form-control" name="phone" value="<?=@$edit->phone?>"  required="required"></td>
                    <th>BP</th>
                    <td colspan="2"><input type="text" class="form-control" name="bp" value="<?=@$edit->bp?>"></td>
                  </tr>
                  <tr>
                    <th>Sex</th>
                    <td colspan="3">
                      <select class="form-control" name="sex">
                        <option>Select Sex</option>
                        <option value="Male"  <?php if(@$edit->sex=="Male"){echo "selected";}?>>Male</option>
                        <option value="Female" <?php if(@$edit->sex=="Female"){echo "selected";}?>>Female</option>
                        <option value="Others" <?php if(@$edit->sex=="Others"){echo "selected";}?>>Others</option>
                      </select>
                      <!-- <input type="text" class="form-control" name="sex" value="<?=@$edit->sex?>"> -->
                    </td>
                    
                  </tr>
                  <tr>
                    <tr>
                      <th>Weight</th>
                      <td><input type="text" class="form-control" name="weight" value="<?=@$edit->weight?>"></td>
                      <th>Height</th>
                      <td colspan="2"><input type="text" class="form-control" name="height" value="<?=@$edit->height?>"></td>
                    </tr>
                    <tr>
                      <th>BMI Status</th>
                      <td ><input type="text" class="form-control" name="bmi" value="<?=@$edit->bmi?>"></td>
                      <th>Diet Chart</th>
                      <td ><input type="text" class="form-control" name="diet_chart" value="<?=@$edit->diet_chart?>"></td>
                    </tr>
                    <tr>
                        <th colspan="4">Diagonosed/known medical history(present,past with duration including complications):</th>
                    </tr>
                    <tr>
                      <th>Medical History Past</th>
                      <td ><input type="text" class="form-control" name="m_history_past" value="<?=@$edit->m_history_past?>"></td>
                      <th>Medical History Present</th>
                      <td ><input type="text" class="form-control" name="m_history_present" value="<?=@$edit->m_history_present?>"></td>
                    </tr>
                    <tr>
                        <th colspan="4">Past treatment history(name of doctor, name of hospital/clinic,name of medicines,controlled/uncontrolled ):</th>
                    </tr>
                    <tr>
                      <th>Name of Doctor</th>
                      <td ><input type="text" class="form-control" name="t_history_doctor" value="<?=@$edit->t_history_doctor?>"></td>
                      <th>Name of Hospital/ Clinic</th>
                      <td ><input type="text" class="form-control" name="t_history_clinic" value="<?=@$edit->t_history_clinic?>"></td>
                    </tr>
                    <tr>
                      <th>Name of Medicine</th>
                      <td ><input type="text" class="form-control" name="t_history_medicine" value="<?=@$edit->t_history_medicine?>"></td>
                      <th>History Status</th>
                      <td ><input type="text" class="form-control" name="t_history_status" value="<?=@$edit->t_history_status?>"></td>
                    </tr>
                    <tr>
                      <th>Family History</th>
                      <td ><input type="text" class="form-control" name="family_history" value="<?=@$edit->family_history?>"></td>
                      <th>Regular follow up habit (present)</th>
                      <td ><input type="text" class="form-control" name="follow_up_present" value="<?=@$edit->follow_up_present?>"></td>
                    </tr>
                    <tr>
                      <th>Regular follow up habit (past)</th>
                      <td ><input type="text" class="form-control" name="follow_up_past" value="<?=@$edit->follow_up_past?>"></td>
                      <th>Reference</th>
                      <td ><input type="text" class="form-control" name="reference" value="<?=@$edit->reference?>"></td>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <td colspan="3">
                      <select name="type" class="form-control">
                        <option>Select an Type</option>
                        <option value="1"  <?php if(@$edit->type ==1){echo "Selected";}?>>MDA registerd(Book) patient's profile</option>
                        <option value="2" <?php if(@$edit->type ==2){echo "Selected";}?>>MDA marketing registered(Computer) patient's profile</option>
                        <option value="3" <?php if(@$edit->type ==3){echo "Selected";}?>>MDA non-registered(Prescription) patient's profile</option>
                      </select>
                    </td>
                    </tr>
                    <tr>
                      <th>Photo</th>
                      <td><input type="file" class="form-control" name="photo" ></td>
                      <?php if(isset($edit)){ ?>
                      <td><img src="<?= base_url().'uploads/'.$edit->photo?>"></td>
                      <?php }?>
                      <th>Registration Id</th>
                      <td ><input type="text" class="form-control" name="regisId" value="<?=@$edit->regisId?>"  required="required"></td>
                    </tr>

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
                  <h3>Patient List</h3>
                </div>
                <table id="example1" class="table table-bordered table-striped" border="1">
                  <thead style="background-color: #79a0e0">
                    <tr>
                      <th>SL</th>
                      <th>Patient</th>
                      <th>Phone</th>
                      <th>Registration Id</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody id="itembody">
                    <?php $i=0; foreach ($patient as $s) {?>
                    <tr>
                      <td><?= ++$i;?></td>
                      <td><?=$s->name?></td>
                      <td><?=$s->phone?></td>
                      <td><?=$s->regisId?></td>
                      <td><?=$s->present_address?></td>
                      <td>
                        <a class="btn btn-sm btn-success" href="<?=base_url().'Control/patient_list/'.$s->id?>">Edit</a> | <a class="btn btn-sm btn-success" href="<?=base_url().'Control/patient_view/'.$s->id?>">View</a>
                        <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_patient/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
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