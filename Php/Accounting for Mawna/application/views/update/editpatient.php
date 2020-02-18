<?php $this->load->view('admin/head_c');?>
<link rel="stylesheet" href="<?= base_url().'admin_file/patient/'?>css/style.css">
    <!-- google_fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
<div class="wrapper">

  <?php
  $this->load->view('admin/leftMenu');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Patinet Info.
        <!-- <small>Fixed Product Name List</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="<?= base_url() . 'Control/fixed_asset' ?>">Fixed Product List </a></li> -->

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?=base_url()?>Update_Control/updateNewPatient" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $pn->id;?>">
        <div class="row">
          <div class="col-md-4">
            <div class="patient_photo">
          <input type="file" name="image" accept="image/*">
              <img src="<?= base_url().'uploads/patients/'.$pn->image?>" alt="">
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="main_heading">
              <h2>Registration Form</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="general_info">
              <p>Date & Time: <input type="date" name="date" value="<?= $pn->date?>" disabled></p>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-lg-12 well">
            
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Name of Patient:</label>
                    <input type="text" class="form-control" name="patientName" required value="<?= $pn->patientName?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Age:</label>
                    <input type="text" class="form-control" name="age" id="age" value="<?= $pn->age?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Sex:</label>
                     <select name="sex" id="sex">
                      <option value=""></option>
                      <option value="Male" <?php if($pn->sex == 'Male'){echo "selected";}?>>Male</option>
                      <option value="Female" <?php if($pn->sex == 'Female'){echo "selected";}?>>Female</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Father/Husband's Name:</label>
                    <input type="text" class="form-control"  name="fName" value="<?= $pn->fName?>">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Mother's Name:</label>
                    <input type="text" class="form-control"  name="mName" value="<?= $pn->mName?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Present Address:</label>
                    <input type="text" class="form-control"  name="preAddress" value="<?= $pn->preAddress?>">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Permanent Address:</label>
                    <input type="text" class="form-control"  name="perAddress" value="<?= $pn->perAddress?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Mobile (1):</label>
                    <input type="text"  class="form-control"  name="mob1" value="<?= $pn->mob1?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Mobile (2) /TNT:</label>
                    <input type="text"  class="form-control"  name="mob2" value="<?= $pn->mob2?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Email:</label>
                    <input type="text"  class="form-control"  name="email" value="<?= $pn->email?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Pulse (min):</label>
                    <input type="text"  class="form-control" value="" name="pulse" value="<?= $pn->pulse?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label style="display: block;">Pulse Condition:</label>
                    <label class="checkbox-inline"><input type="radio" name="pulseCon" value="1" <?php if($pn->pulseCon == 1){echo "checked";}?>>Regular</label>
                    <label class="checkbox-inline"><input type="radio" name="pulseCon" value="2" <?php if($pn->pulseCon == 2){echo "checked";}?>>Iregular</label>
                    
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>BP (mmhg):</label>
                    <input type="text"  class="form-control" value=""  name="bp"  value="<?= $pn->bp?>">
                  </div>
                </div>
                
                <div class="row">
                  
                  <div class="col-sm-3 form-group">
                    <label style="display: block;">Weight Status (on the basis of BMI): </label>
                    <input type="text"  class="form-control"  name="bmiStatus" id="bmiStatus"  value="<?= $pn->bmiStatus?>" readonly>
                    <p>Normal/Over weight/Obese/Under Weight</p>
<!--                     <label class="checkbox-inline"><input type="radio" name="indoor-outdoor">Normal</label>
                    <label class="checkbox-inline"><input type="radio" name="indoor-outdoor">Over weight</label>
                    <label class="checkbox-inline"><input type="radio" name="indoor-outdoor">Obese</label>
                    <label class="checkbox-inline"><input type="radio" name="indoor-outdoor">Under Weight</label> -->
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>Standard Body Weight (SBW):</label>
                    <input type="text"  class="form-control" name="sbw" id="sbw"  value="<?= $pn->sbw?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>.</label>
                    <input type="text"  class="form-control" name="sbw2" id="sbw2"  value="<?= $pn->sbw2?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>.</label>
                    <input type="text"  class="form-control" name="sbw3" id="sbw3"  value="<?= $pn->sbw3?>" readonly>
                  </div>
                </div>
                <div class="row">
                   <div class="col-sm-6 form-group">
                    <label>Weight (WT) KG :</label>
                     <input type="text"  class="form-control" name="weight" id="weight" value="<?= $pn->weight?>">
                
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>Height (HT) Feet-Inches :</label>
                     <input type="text"  class="form-control" name="heightfeet" id="heightfeet" value="<?= $pn->heightfeet?>">
                
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>Meter</label>
                     <input type="text"  class="form-control" name="heightmeter"  value="<?= $pn->heightmeter?>" id="heightmeter" readonly>
                
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2 form-group">
                    <label>BMI (kg/m2):</label>
                     <input type="text"  class="form-control" name="bmi"  value="<?= $pn->bmi?>" id="bmi" readonly>
                 <!--    <select name="cars" style="width: 100%;">
                      <option value="volvo">KG</option>
                      <option value="saab">m2</option>
                      
                    </select> -->
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>Temperature (&#8457;):</label>
                    <input type="text"  class="form-control" name="temp"  value="<?= $pn->temp?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>Respiration (min):</label>
                    <input type="text"  class="form-control" name="resp"  value="<?= $pn->resp?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>Anaemia:</label>
                    <input type="text"  class="form-control" name="anemia"  value="<?= $pn->anemia?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>Oedema:</label>
                    <input type="text"  class="form-control" name="oedema"  value="<?= $pn->oedema?>">
                  </div>
                  <div class="col-sm-1 form-group">
                    <label>Heart:</label>
                    <input type="text"  class="form-control" name="heart"  value="<?= $pn->heart?>">
                  </div>
                  <div class="col-sm-1 form-group">
                    <label>Lungs:</label>
                    <input type="text"  class="form-control" name="lungs"  value="<?= $pn->lungs?>">
                  </div>
                </div>
                
                <div class="row">
                  
                  <div class="col-sm-2 form-group">
                    <label style="display: block;">Eye/Vision:</label>
                    <label class="checkbox-inline"><input type="radio" name="eye" id="eye1" value="1" <?php if($pn->eye == 1){echo "checked";}?>>Intact</label>
                    <label class="checkbox-inline"><input type="radio" name="eye" id="eye2" value="2" <?php if($pn->eye == 2){echo "checked";}?>>Impaired</label>
                 <!--    <label style="padding-left: 20px;" class="checkbox-inline">Impaired</label> -->
                  </div>
                   <div class="col-sm-3 form-group">
                    <label style="display: block;">.</label>
                    <input type="text" class="form-control"  name="eyeStatus"  id="eyeStatus" value="<?= $pn->eyeStatus?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label style="display: block;">Fundoscopy</label>
                    <label class="checkbox-inline"><input type="radio" name="funduscopy"  value="1" <?php if($pn->funduscopy == 1){echo "checked";}?>>Normal</label>
                    <label class="checkbox-inline"><input type="radio" name="funduscopy"  value="2" <?php if($pn->funduscopy == 2){echo "checked";}?>>Abnormal</label>
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Grade:</label>
                    <select name="funduStatus">
                      <option value="">Select a Grade</option>
                      <option value="1" <?php if($pn->funduStatus == 1){echo "selected";}?>>Grade-1</option>
                      <option value="2" <?php if($pn->funduStatus == 2){echo "selected";}?>>Grade-2</option>
                      <option value="3" <?php if($pn->funduStatus == 3){echo "selected";}?>>Grade-3</option>
                      <option value="4" <?php if($pn->funduStatus == 4){echo "selected";}?>>Grade-4</option>
                    </select>
                  </div>
                  
                </div>
                <div class="row">
                  
                </div>
                <h3>Nervous System:</h3>
                
                <div class="row">
                  
                  <div class="col-sm-6 form-group">
                    <label style="padding-right: 7px;">Diabetic Peripheral Neuropathy (DPN):</label>
                    <label class="checkbox-inline"><input type="radio" name="dpn"  value="1" <?php if($pn->dpn == 1){echo "checked";}?>>Present</label>
                    <label class="checkbox-inline"><input type="radio" name="dpn"  value="2" <?php if($pn->dpn == 2){echo "checked";}?>>Absent</label>
                    
                  </div>
                  <div class="col-sm-6 form-group">
                    <label style="padding-right: 7px;">Diabetic Autonomic Neuropathy (DAN):</label>
                    <label class="checkbox-inline"><input type="radio" name="dan" value="1" <?php if($pn->dan == 1){echo "checked";}?>>Present</label>
                    <label class="checkbox-inline"><input type="radio" name="dan" value="2" <?php if($pn->dan == 2){echo "checked";}?>>Absent</label>
                    
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-sm-6 form-group">
                    <label style="padding-right: 7px;">Diabetic Nephropathy:</label>
                    <label class="checkbox-inline"><input type="radio" name="dneph" value="1" <?php if($pn->dneph == 1){echo "checked";}?>>Present</label>
                    <label class="checkbox-inline"><input type="radio" name="dneph" value="2" <?php if($pn->dneph == 2){echo "checked";}?>>Absent</label>
                    
                  </div>
                  <div class="col-sm-6 form-group">
                    <label style="padding-right: 7px;">Liver Functions:</label>
                    <label class="checkbox-inline"><input type="radio" name="liver" value="1" <?php if($pn->liver == 1){echo "checked";}?>>Normal</label>
                    <label class="checkbox-inline"><input type="radio" name="liver" value="2" <?php if($pn->liver == 2){echo "checked";}?>>Impaired</label>
                    <label class="checkbox-inline"><input type="radio" name="liver" value="3" <?php if($pn->liver == 3){echo "checked";}?>>Fatty Change in Liver</label>
                    
                  </div>
                </div>
                <h3>Investigations:</h3>
                
                <div class="row">
                  <div class="col-sm-2 form-group">
                    <label style="display: block;">FBS (mmol/L):</label>
                    <input type="text"  class="form-control"  value="<?= $pn->fbs?>" name="fbs">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>2hAg (mmol/L):</label>
                    <input type="text"  class="form-control"  value="<?= $pn->hag?>" name="hag">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>2hAgBFS (mmol/L):</label>
                    <input type="text"  class="form-control"  value="<?= $pn->hagbfs?>" name="hagbfs">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>HBA1c:</label>
                    <input type="text"  class="form-control" name="hbac"  value="<?= $pn->hbac?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>S.Creatinine (mmol/L):</label>
                    <input type="text"  class="form-control"   value="<?= $pn->screatinine?>" name="screatinine">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>SGPT (mg/dl):</label>
                    <input type="text"  class="form-control"   value="<?= $pn->sgpt?>" name="sgpt">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-sm-2 form-group">
                    <label>T.Cholesterol (mg/dl):</label>
                    <input type="text"  class="form-control"   value="<?= $pn->tchole?>" name="tchole">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>HDL (mg/dl):</label>
                    <input type="text"  class="form-control"   value="<?= $pn->hdl?>" name="hdl">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>LDL (mg/dl):</label>
                    <input type="text"  class="form-control"   value="<?= $pn->ldl?>" name="ldl">
                  </div>
                   <div class="col-sm-2 form-group">
                    <label>TG (mg/dl):</label>
                    <input type="text"  class="form-control"   value="<?= $pn->tg?>" name="tg">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>HB:</label>
                    <input type="text"  class="form-control" name="hb"  value="<?= $pn->hb?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>ESR:</label>
                    <input type="text"  class="form-control" name="esr"  value="<?= $pn->esr?>">
                  </div>
                
                </div>
                <div class="row">
                    <div class="col-sm-2 form-group">
                    <label>TC:</label>
                    <input type="text"  class="form-control" name="tc"  value="<?= $pn->tc?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>DC:</label>
                    <input type="text"  class="form-control" width="50px;" name="dc"  value="<?= $pn->dc?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>.</label>
                    <input type="text"  class="form-control" width="50px;" name="dc2"  value="<?= $pn->dc2?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>.</label>
                    <input type="text"  class="form-control" width="50px;" name="dc3"  value="<?= $pn->dc3?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>.</label>
                    <input type="text"  class="form-control" width="50px;" name="dc4"  value="<?= $pn->dc4?>">
                  </div>
                  <div class="col-sm-2 form-group">
                    <label>.</label>
                    <input type="text"  class="form-control" width="50px;" name="dc5"  value="<?= $pn->dc5?>">
                  </div>
                  
            
                </div>

                <div class="row">
                        <div class="col-sm-4 form-group">
                    <label style="display: block;">Blood Group:</label>
                    <select name="bloodGroup">
                      <option value="">Select Blood Group</option>
                      <option value="A+" <?php if($pn->bloodGroup == "A+"){echo "selected";}?>>A+</option>
                      <option value="O+" <?php if($pn->bloodGroup == "O+"){echo "selected";}?>>O+</option>
                      <option value="B+" <?php if($pn->bloodGroup == "B+"){echo "selected";}?>>B+</option>
                      <option value="AB+" <?php if($pn->bloodGroup == "AB+"){echo "selected";}?>>AB+</option>
                      <option value="A-" <?php if($pn->bloodGroup == "A-"){echo "selected";}?>>A-</option>
                      <option value="O-" <?php if($pn->bloodGroup == "O-"){echo "selected";}?>>O-</option>
                      <option value="B-" <?php if($pn->bloodGroup == "B-"){echo "selected";}?>>B-</option>
                      <option value="AB-" <?php if($pn->bloodGroup == "AB-"){echo "selected";}?>>AB-</option>


                    </select>     
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Hbsag:</label>
                    <input type="text"  class="form-control"  name="hbsag" value="<?= $pn->hbsag?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>TSH:</label>
                    <input type="text"  class="form-control"  name="tsh" value="<?= $pn->tsh?>">
                  </div>
                </div>
                <h3>Urine:</h3>
                
                <div class="row">
                  <div class="col-sm-3 form-group">
                    <label>Sugar:</label>
                    <input type="text"  class="form-control" name="sugar" value="<?= $pn->sugar?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>A/B:</label>
                    <input type="text"  class="form-control" name="aOrb" value="<?= $pn->aOrb?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>P/C:</label>
                    <input type="text"  class="form-control" name="pByc" value="<?= $pn->pByc?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>C/S:</label>
                    <input type="text"  class="form-control" name="cBys" value="<?= $pn->cBys?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3 form-group">
                    <label>Umalb:</label>
                    <input type="text"  class="form-control" name="umalb" value="<?= $pn->umalb?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>ECG:</label>
                    <input type="text"  class="form-control" name="ecg" value="<?= $pn->ecg?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>CXR:</label>
                    <input type="text"  class="form-control" name="cxr" value="<?= $pn->cxr?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>USG:</label>
                    <input type="text"  class="form-control" name="usg" value="<?= $pn->usg?>">
                  </div>
                </div>
                <h3>Patient History</h3>
                
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Family History of DM:</label>
                    <input type="text"  class="form-control" name="fHistoryDr" value="<?= $pn->fHistoryDr?>">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Past Medical History:</label>
                    <input type="text"  class="form-control" name="pmhistory" value="<?= $pn->pmhistory?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Past Surgical History:</label>
                    <input type="text"  class="form-control" name="pSurHistory" value="<?= $pn->pSurHistory?>">
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Drug History (C & P):</label>
                    <input type="text"  class="form-control" name="drugHistory" value="<?= $pn->drugHistory?>">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-sm-6 form-group">
                    <label style="display: block;">Patient Category:</label>
                    <label class="checkbox-inline"><input type="radio" name="patCat" <?php if($pn->patCat == 1){echo "checked";}?> value="1">Newly Diagnosed of DM at MDA</label>
                    <label class="checkbox-inline"><input type="radio" name="patCat" <?php if($pn->patCat == 2){echo "checked";}?> value="2">Old Diabetic Patient</label>
                    
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Diabetic Type:</label>
                    <select name="diabetic">
                      <option value="Type-1 IDDM" <?php if($pn->diabetic == "Type-1 IDDM"){echo "selected";}?>>Type-1 IDDM</option>
                      <option value="Type-2 IDDM" <?php if($pn->diabetic == "Type-2 IDDM"){echo "selected";}?>>Type-2 IDDM</option>
                    </select>
                  </div>
                  
                </div>
                <h3>Diabetics Complitation</h3>
                <p>Treatment History:</p>
                <div class="row">
                  <div class="col-sm-3 form-group">
                    <label>Institution:</label>
                    <input type="text"  class="form-control" name="institution" value="<?= $pn->institution?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>Doctor's Name:</label>
                    <input type="text"  class="form-control" name="dName" value="<?= $pn->dName?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>Regular Follow Up Habit:</label>
                    <input type="text"  class="form-control" name="regHabit" value="<?= $pn->regHabit?>">
                  </div>
                  <div class="col-sm-3 form-group">
                    <label>Last Date of Follow Up:</label>
                    <!-- <div class='input-group date' id='datetimepicker1'> -->
                      <input type='date' name="lastFollow" value="<?= $pn->lastFollow?>" class="form-control" />
                      <!-- <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span> -->
                    <!-- </div> -->
                  </div>
                </div>
                
                <div class="row">
                  
                  <div class="col-sm-6 form-group">
                    <label style="display: block;">Current Situation of Diabetics:</label>
                    <label class="checkbox-inline"><input type="radio" name="currentS" <?php if($pn->currentS == 1){echo "checked";}?> value="1">Controlled</label>
                    <label class="checkbox-inline"><input type="radio" name="currentS" <?php if($pn->currentS == 2){echo "checked";}?> value="2">Uncontrolled</label>
                    
                  </div>
                  <div class="col-sm-3 form-group">
                    <label style="display: block;">Patient Reg Type:</label>
                    <select name="patReg" required="required" disabled="disabled">
                      <option value="1" <?php if($pn->patReg == 1){echo "selected";}?>>GRN</option>
                      <option value="2" <?php if($pn->patReg == 2){echo "selected";}?>>MRN</option>
                      <option value="3" <?php if($pn->patReg == 3){echo "selected";}?>>PRN</option>
                    </select>                    
                  </div>
                    <div class="col-sm-3 form-group">
                    <label style="display: block;">.</label>
                    <select name="type">
                      <option value="1" <?php if($pn->type == 1){echo "selected";}?>>M</option>
                      <option value="2" <?php if($pn->type == 2){echo "selected";}?>>O</option>
                    </select>                    
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-sm-4 form-group">
                    <label>Reference: </label>
                    <input type="text"  class="form-control" name="ref"  value="<?= $pn->ref?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>Ordered By Doctor:</label>
                    <input type="text"  class="form-control" name="orByDr"  value="<?= $pn->orByDr?>">
                  </div>
                  <div class="col-sm-4 form-group">
                    <label>First Visited Doctor  at MDA: </label>
                    <input type="text"  class="form-control" name="firstmda"  value="<?= $pn->firstmda?>">
                  </div>
                  
                </div>
                <div class="row">
                  
                  <div class="col-sm-12 form-group">
                    <label>Diagnosis:</label>
                    <textarea class="form-control ckeditor" name="diagnosis" >
                      <?= $pn->diagnosis?>
                    </textarea>
                    
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-sm-12 form-group">
                    <label style="padding-right: 7px;">About MDA Overall Managment:</label>
                    <label class="checkbox-inline"><input type="radio" name="mdaoveral" value="1" <?php if($pn->mdaoveral == 1){echo "checked";}?>>Worst</label>
                    <label class="checkbox-inline"><input type="radio" name="mdaoveral" value="2" <?php if($pn->mdaoveral == 2){echo "checked";}?>>Bad</label>
                    <label class="checkbox-inline"><input type="radio" name="mdaoveral" value="3" <?php if($pn->mdaoveral == 3){echo "checked";}?>>Good</label>
                    <label class="checkbox-inline"><input type="radio" name="mdaoveral" value="4" <?php if($pn->mdaoveral == 4){echo "checked";}?>>Very Good</label>
                    <label class="checkbox-inline"><input type="radio" name="mdaoveral" value="5" <?php if($pn->mdaoveral == 5){echo "checked";}?>>Excellent</label>
                    
                  </div>
                </div>
                
                <button type="submit" class="btn btn-lg btn-info" >Submit</button>
              </div>
            
          </div>
        </div>
      </form>
      
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(function () {
    $('#datetimepicker1').datetimepicker();
    });
    </script> -->
    
<?php $this->load->view('admin/footer_c');?>

<script>
  $(document).ready(function(){
    var i = 1;
    $('#sbw, #sbw2').keyup(function(){
      var sbw = $("#sbw").val();
      var sbw2 = $("#sbw2").val();
      var sbw3 = (parseFloat(sbw) + parseFloat(sbw2)) / 2;
      $("#sbw3").val(sbw3);
      
      // alert($("#bmiStatus").val());
    });
    $('#heightfeet, #weight').keyup(function(){
      var heightfeet = $("#heightfeet").val();
      var heightmeter = parseFloat(heightfeet)*0.3048;
      $("#heightmeter").val(heightmeter);
      var weight = $("#weight").val();
      var bmi = parseFloat(weight)/(parseFloat(heightmeter)**2);
      $("#bmi").val(bmi);
      var sex = $("#sex").val();
      if(sex == 'Male' && bmi >= 20 && bmi <=25){
        $("#bmiStatus").val('Normal');
      }
      if(sex == 'Male' && bmi >= 25 && bmi <=30){
        $("#bmiStatus").val('Over');
      }
      if(sex == 'Male' && bmi > 30){
        $("#bmiStatus").val('Obese');
      }
      if(sex == 'Male' && bmi < 20){
        $("#bmiStatus").val('Under');
      }
      if(sex == 'Female' && bmi >= 19 && bmi <=24){
        $("#bmiStatus").val('Normal');
      }
      if(sex == 'Female' && bmi >= 24 && bmi <=29){
        $("#bmiStatus").val('Over');
      }
      if(sex == 'Female' && bmi > 29){
        $("#bmiStatus").val('Obese');
      }
      if(sex == 'Female' && bmi < 19){
        $("#bmiStatus").val('Under');
      }
    });
  });
</script>