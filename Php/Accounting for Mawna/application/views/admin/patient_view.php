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
        <small>Patient View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/patient_list' ?>">Patient List </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>View Patient </h3>
            </div>
                <table class="table table-bordered">
                  <tr>
                    <th>Registration Number</th>
                    <td colspan="3"><?= $edit->regisId?></td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td><?= $edit->name?></td>
                    <th>Age</th>
                    <td colspan="2"><?=$edit->age?></td>
                  </tr>
                  <tr>
                    <th>Father Name</th>
                    <td><?= $edit->father?></td>
                    <th>Mother Name</th>
                    <td colspan="2"><?= $edit->mother?></td>
                  </tr>
                  <tr>
                    <th>Husband</th>
                    <td><?= $edit->husband?></td>
                    <th>Present Address</th>
                    <td colspan="2"><?= $edit->present_address?></td>
                  </tr>
                  <tr>
                    <th>Permanent Address</th>
                    <td><?= $edit->permanent_address?></td>
                    <th> Blood Group</th>
                    <td colspan="2"><?= $edit->blood_group?></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><?= $edit->phone?></td>
                    <th>BP</th>
                    <td colspan="2"><?= $edit->bp?></td>
                  </tr>
                  <tr>
                    <tr>
                      <th>Weight</th>
                      <td><?= $edit->weight?></td>
                      <th>Height</th>
                      <td colspan="2"><?= $edit->height?></td>
                    </tr>
                    <tr>
                      <th>BMI Status</th>
                      <td ><?= $edit->bmi?></td>
                      <th>Diet Chart</th>
                      <td ><?= $edit->diet_chart?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Diagonosed/known medical history(present,past with duration including complications):</th>
                    </tr>
                    <tr>
                      <th>Medical History Past</th>
                      <td ><?= $edit->m_history_past?></td>
                      <th>Medical History Present</th>
                      <td ><?= $edit->m_history_present?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Past treatment history(name of doctor, name of hospital/clinic,name of medicines,controlled/uncontrolled ):</th>
                    </tr>
                    <tr>
                      <th>Name of Doctor</th>
                      <td ><?= $edit->t_history_doctor?></td>
                      <th>Name of Hospital/ Clinic</th>
                      <td ><?= $edit->t_history_clinic?></td>
                    </tr>
                    <tr>
                      <th>Name of Medicine</th>
                      <td ><?= $edit->t_history_medicine?></td>
                      <th>History Status</th>
                      <td ><?= $edit->t_history_status?></td>
                    </tr>
                    <tr>
                      <th>Family History</th>
                      <td ><?= $edit->family_history?></td>
                      <th>Regular follow up habit (present)</th>
                      <td ><?= $edit->follow_up_present?></td>
                    </tr>
                    <tr>
                      <th>Regular follow up habit (past)</th>
                      <td ><?= $edit->follow_up_past?></td>
                      <th>Reference</th>
                      <td ><?= $edit->reference?></td>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <td colspan="3">
                        <?php if($edit->type ==1){echo "MDA registerd(Book) patient's profile";}
                        elseif ($edit->type ==2) {
                          echo "MDA marketing registered(Computer) patient's profile";
                        }elseif ($edit->type ==3) {
                          echo "MDA non-registered(Prescription) patient's profile";
                        }else{echo "None";}
                        ?>
                    </td>
                    </tr>
                    <tr>
                      <th>Photo</th>
                      <!-- <td><input type="file" class="form-control" name="photo" ></td> -->
                      <?php if($edit->photo==''){ ?>
                        <td>No Image Available</td>
                        
                     <?php } else{ ?>
                      <td><img src="<?= base_url().'uploads/'.$edit->photo?>"></td>
                      <?php }?>
                    </tr>

                  </table>
                </div>
              </form>
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