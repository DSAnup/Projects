<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url().'admin_file/'?>patientview/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url().'admin_file/'?>patientview/css/style.css">
    <!-- google_fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <title>Patient Profile </title>
    <style type="text/css">
    p{
        line-height: 1;
    }
      @media print {
        @page { margin: 0; }
        body { margin: 1.6cm; }
        #click {display: none;}
        #footer{display: none;}
      }
     
    
    </style>
</head>

<body>

    <body>
        <div class="container" style="margin-top: 30px;background: #3333;padding: 20px 20px;" id="example1">
          <a href="javascript:void(0)" onclick="window.print('#example1')"  id="click">Print</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="main_heading">
                        <h2>Patient Registration and  Profile Form </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="general_info">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Registration Type</strong></p>
                                <p><strong>Date & Time</strong></p>
                                <p><strong>Registered By</strong></p>
                                <p><strong>Data Collected By</strong></p>
                                <p><strong>Previous Registration Type</strong></p>
                                <p><strong>Registration Requesting Doctor’s</strong></p>
                                <p><strong>First Visited Doctor at MDA</strong></p>
                                <p><strong>Referred by</strong></p>
                            </div>
                            <div class="col-md-6">
                                <p>: <?php if($p->patReg ==1){echo "GRN";}elseif($p->patReg == 2){echo "MRN";}else{echo "PRN";}?></p>
                                <p>: <?php echo $date = date('d/M/Y', strtotime($p->date));?></p>
                                <p>: <?php foreach($employee as $e){if($e->id == $p->regBy){echo $e->name;}}?></p>
                                <p>: <?php foreach($employee as $e){if($e->id == $p->dcollect){echo $e->name;}}?></p>
                                <p>: <?php if($p->previousreg ==1){echo "GRN";}elseif($p->previousreg == 2){echo "MRN";}elseif($p->previousreg ==3){echo "PRN";}else{echo "None";}?></p>
                                <p>: <?php foreach($dr_list as $e){if($e->id == $p->orByDr){echo $e->name;}}?></p>
                                <p>: <?php foreach($dr_list as $e){if($e->id == $p->firstmda){echo $e->name;}}?></p>
                                <p>: <?= $p->ref ;?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="patient_photo">
                        <?php if(!empty($p->image)){?><img src="<?= base_url().'uploads/patients/'.$p->image?>" alt="">
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-12">
                    <table class="table main_table">
                        <tbody style="border: 1px solid#3333;">
                            <tr>
                                <td><?php echo ucfirst($p->sex);?></td>
                                <td><?php 
                                      if($p->grnNum != 0){echo "GRN";}
                                      if($p->mrnNum != 0){echo "MRN";}
                                      if($p->prnNum != 0){echo "PRN";}
                                  ?>  </td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td colspan="2"><?php 
                                    if($p->grnNum != 0){echo $p->grnNum;}
                                    if($p->mrnNum != 0){echo $p->mrnNum;}
                                    if($p->prnNum != 0){echo $p->prnNum;}
                                ?> </td>
                                
                                <td>-</td>
                                <?php $date = date('Y', strtotime($p->date));
                                  $a = array_map('intval', str_split($date));
                                  $date2 = date('m', strtotime($p->date));
                                  $b = array_map('intval', str_split($date2));
                                  
                                ?>
                                <?php foreach($a as $bs){?>
                                <td><?= $bs;?></td>
                                <?php }?>
                                <td>-</td>
                                <?php foreach($b as $b){?>
                                <td><?= $b;?></td>
                                <?php }?>
                                <td>-</td>
                                <td>0</td>
                                <td>0</td>
                                <td>
                                  <?php 
                                    if($p->grnMNum != 0){echo $p->grnMNum;}
                                    if($p->mrnMNum != 0){echo $p->mrnMNum;}
                                    if($p->prnMNum != 0){echo $p->prnMNum;}
                                ?>
                                </td>
                            </tr>
                            <!-- <tr style="border: 1px solid#3333;">
                                <td>RF</td>
                                <td>MRN</td>
                                <td>-</td>
                                <td>1</td>
                                <td>3</td>
                                <td>0</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="s_heading" style="display: block;">Backgruond Features:</h4>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Name of Patient</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->patientName ;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Patient Age</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->age ;?> Years</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Patient Sex</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->sex ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6" ><!----if Sex is Female---->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Pregnant Status</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->pregnant ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Father/Husband's Name</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fName ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Mother's Name</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->mName ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Religion</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->religion ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Present Address</strong></p>
                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->preAddress ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Permanent Address</strong></p>
                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->perAddress ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Mobile (1)</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->mob1 ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Mobile (2)/ T&T</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->mob2 ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Email</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->email ;?></span></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Nationality</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->nationality ;?></span></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>NID Number</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->nid ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Education Level</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->edulevel ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Occupation</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->occupation ;?></span></p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Economic Status</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ecoStatus ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Physical Activity</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->physicalAct ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong> HB Vaccination Status</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->hbVaccination ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-4">
                            <p><strong>Other Vaccination Status</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->otherVaccination ;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h4 class="s_heading">Pationt History</h4>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Family History of DM</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fHistoryDr ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If positive then to whom</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dmWhom ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Past medical history with date/duration</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->pmhistory ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Past Surgical History with date/duration</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->pSurHistory ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Past Drug History with dose and Duration</strong></p>
                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->drugHistory ;?></span></p>
                        </div>
                    </div>
                </div>
                  <div class="col-md-12" >
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Present Drug History with dose and Duration</strong></p>
                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->presentdrugHistory ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Past Treatment History (Institution)</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->specificname ;?> (Insitute Name) </span></p><!---Institute name will be in barcket beside insitute type---->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Last Visited Doctor’s Name</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ldocName ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Past History of Acute Complications</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->accuteCoplications ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Managed at</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->manageAt ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Personal History</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->personalHistory ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Regular Follow-up Habit</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->followUp ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4" >
                            <p><strong>Last Three Dates of Follow up</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->followUpDate1 ;?>, <?= $p->followUpDate2 ;?>, <?= $p->followUpDate3 ;?>  </span></p><!---Three dates will be separted by comma--->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetes Status</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->diabeticStatus ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Patient Category</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?php if($p->patCat == 1){echo "Newly Diagnosed DM/IGT at MDA";}elseif($p->patCat == 2){echo "Old Diabetic Patient";}?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Duration of DM</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->durationDm ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Features of DM</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->featureDm ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Other Autoimmune Diseases</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->oAutoimmune ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Present</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->oAutoimmunePresent ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>History of Allergy </strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:  <?= $p->allergyHistory ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>if Positive then to Which</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p><span>:<?= $p->allergyHistoryPresent ;?> </span></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <h4 class="s_heading">Physical Examination Findings:</h4>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Pulse Rate</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->pulse ;?> min</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Pulse Rhythm</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->pulseCon ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>BP: Left:Sitting/Lying; Above</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bpsittingLeftH ;?> mmHg</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>BP: Left:Sitting/Lying; Below</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bpsittingLeft ;?> mmHg</span></p>
                        </div>
                    </div>
                </div> <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Left Standing: Above</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bpLeftstandingH ;?> mmHg</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Left Standing: Below</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bpLeftstanding ;?> mmHg</span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Left Standing: High</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bpLeftstandingH ;?> mmHg</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Left Standing: Low</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bpLeftstanding ;?> mmHg</span></p>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-6">
                  <div class="row">
                        <div class="col-md-4">
                            <p><strong>Postural Hypertension(Left)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->leftsittingsystolic ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                        <div class="col-md-4">
                            <p><strong>Postural Hypertension(Right)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->leftsittingdiastolic ;?> </span></p>
                        </div>
                    </div>
                </div>
                
          
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Weight</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->weight ;?> kg</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Height</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->heightfeet;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>BMI</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bmi ;?> KG/m2</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>WHO Classification</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->whoclass ;?></span></p>
                        </div>
                    </div>
                </div>
              <!---  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Waist & Hip</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->waist ;?> cm & <?= $p->hip ;?> cm</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Waist Status</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->waiststatus ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Waist Hip Ratio Status</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->waisthip ;?> </span></p>
                        </div>
                    </div>
                </div>--->
                 <div class="col-md-6" >
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diet Chart</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dietchart ;?> Kcal</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Should Follow Diet Chart</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dietchartnew ;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Standard Body Weight (Lowest)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p>: <span><?= $p->sbw ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Standard Body Weight (Highest)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p>: <span><?= $p->sbw2 ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Standard Body Weight (Average)</strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p>: <span><?= $p->sbw3 ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Weight Status (on the basis of BMI)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bmiStatus ;?></span></p>
                        </div>
                    </div>
                </div>
                <!---WHO--->
                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Central or visceral obesity stayus on the basis of</strong> </p>

                        </div>
                        <div class="col-md-4">
                            <p><strong>1. Waist circumference(WC)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->whoclass ;?></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>2. Waist-Hip radio(WHR)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->waisthip ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Temperature</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->temp ;?> (F)</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Respiration</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->resp ;?> (min)</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Anaemia</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>:  <?= $p->anemia ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Anaemia if present</strong></p>

                        </div>
                        <div class="col-md-8" >
                            <p><span>: Required I/V Iron Sucrose : <?= $p->anemiapresent ;?> - (<?= $p->ironrequirement ;?> mg) and Ampoule no:  <?= $p->ampoleNo ;?> </span></p><!---- Required I/V Iron Sucrose/100---->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Oedema</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->oedema ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Oedema if present</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->oedemapresent ;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Heart</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->heart ;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Heart if Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->heartAbnormal ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lungs</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->lungs ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lungs if Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->lungAbnormal ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Eye/Vision (Left)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->leftEye ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>if impaired</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->leftEyeAcuity ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Visual Acuity</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->evisualleft ;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Eye/Vision (Right)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->rightEye ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>if impaired</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->rightEyeAcuity ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Visual Acuity</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->evisualright ;?></span></p>
                        </div>
                    </div>
                </div>


    
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Fundoscopy (Left)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->funduscopy ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fundsleft ;?></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Fundoscopy (Right)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->funduscopyRight ;?></span></p>
                        </div>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fundsright ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetic Retinopathy(DR) Left</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->retinopathyLeft ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetic Retinopathy(DR) Right</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->retinopathyRight ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetic Peripheral Neuropathy (DPN)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dpn ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>if Present</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dpnPresent ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>Diabetic Autonomic Neuropathy(DAN)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dan ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>If Present</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->danPresent ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetic Nephropathy Kidney Diseases</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dneph ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>if Present then stage of CKD on the basis of eGFR</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dnephPresent ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Liver Function(SGPT)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->liversgpt ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Fatty Change in Liver</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->liver ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Foot Examination (ADPP:Left)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->padpLeft ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>Foot Examination (ADPP:Right)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->padpRight ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Foot Ulcer (Left)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fUlcerLeft ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Foot Ulcer (Right)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fUlcerRight ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Gangrene  (Left)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->gangreneLeft ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Gangrene  (Right)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->gangreneRight ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Joint deformtry (Left)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->jDeformtryLeft ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Joint deformtry(Right)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->jDeformtryRight ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Amputation (Left)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->amputationLeft ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Amputation (Right)</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->amputationRight ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Skin Diabetic dermopathy (Left leg)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dermopathyLeft ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Skin Diabetic dermopathy (Right leg)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dermopathyRight ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lipoatrophy</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->lipotripsy ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lipohypertrophy</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->lipohypertrophy ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Bullous lesion</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bullous ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Abscess</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->abscess ;?> </span></p>
                        </div>
                    </div>
                </div>

               <!--  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Blood Pressure (BP)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: 60-80 min</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Intact</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: Yes/No</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Impaired</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: xxxx</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Normal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: Yes/No</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: Yes/No</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Grade</strong> </p>
                        </div>
                        <div class="col-md-8">
                            <p><span>: Grade-1</span></p>
                        </div>
                    </div>
                </div>
 -->


                <div class="col-md-12">
                    <h4 class="s_heading">Investigations Finding</h4>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Previous tests results with Date</strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->pastresult ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Current test results with Date</strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>:  <?= $p->presentresult ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h6>Blood Sugar </h6>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>FBS: </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->fbs ;?> mmol/L</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>2hAg</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>:  <?= $p->hag ;?> mmol/L</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>2hABF</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->habf ;?> mmol/L</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>RBS</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->rbs ;?> mmol/L</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>HbA1C</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>:  <?= $p->hbac ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h6>Kidney Function:</h6>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>S.creatinine: </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>:  <?= $p->screatinine ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                  <div class="col-md-6" ><!-------88.4*S.creatinine(mg/dl)---->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>S.creatinine (micromol/L)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->screatininemicro ;?> micromol/L </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Blood Urea</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bloodUrea ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6" style="background="red"><!---root(height in cm * weight in cm /3600)----->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>BSA</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bsa ;?>m<sup>2</sup> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>eGFR</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->eGFR ;?> </span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6" ><!----eGFR*BSA/1.73----->
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Real eGFR</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>:  <?= $p->realegfr ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>S. Calcium</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->scalcium ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>S. Uric Acid</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->uricAcid ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>S. Electrolytes</strong> </p>
                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->na ;?> </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h6>Liver Function:</h6>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">

                            <p><strong>SGPT: </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->sgpt ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>SGOT</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->sgot ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                 <!-- <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>S.Albumin</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?> gm/L</span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>S.Prilirubin</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Prothrombin time</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?> Second</span></p>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lipid Profile (T.Cholesterol)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->tchole ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lipid Profile (HDL)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->hdl ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lipid Profile (LDL)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ldl ;?> mg/dl</span></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Lipid Profile (TG)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->tg ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>CBC/FBC:Hb </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->hb ;?> mg/dl</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>CBC/FBC (ESR)</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->esr ;?> mm in 1st hour,</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>TC</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->tc ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>DC:N</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dcN ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>L</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dcL ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>M</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dcM ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>E</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dcE ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>B</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dcB ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>TPC</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->dcTpc ;?></span></p>
                        </div>
                    </div>
                </div>
                 <!-- <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>MBC</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>MCHC</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Hct</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>PBF Findings</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ref ;?></span></p>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Blood Group</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->bloodGroup ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>HBsAg</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->hbsag ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Thyroid Function</strong> </p>
                        </div>
                        <div class="col-md-10">
                            <p><span>:  TSH:(<?= $p->tsh ;?>IU/L), FT4:(<?= $p->ft4 ;?>),FT3:(<?= $p->ft3 ;?>), Anti TPOAb:(<?= $p->tpoab ;?>)</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Urine</strong> </p>
                        </div>
                        <div class="col-md-10">
                            <p><span>: Sugar:(<?= $p->sugar ;?>), Alb:(<?= $p->alb ;?>),P/C:(<?= $p->pByc ;?>), C/S: (<?= $p->cBys ;?>), uMalb:(<?= $p->umalb ;?>), RBC: (<?= $p->rbc ;?>), Keton body: (<?= $p->keton ;?>), others: (<?= $p->urineOthers ;?>)</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>ECG </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ecg ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ecgAbnormal ;?></span></p>
                        </div>
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>CXR </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->cxr ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->usg ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>USG </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->usg ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Abnormal</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->usgAbnormal ;?></span></p>
                        </div>
                    </div>
                </div>

                 <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Others</strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->ucgOthers ;?></span></p>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <h4>Diagnosis</h4>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetic</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->diabeticType ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>If Diabetic</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->ifdiabetic ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Diabetic/Pre Diabetic</strong></p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->prediabetic ;?></span></p>
                        </div>
                    </div>
                </div>
               <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Diabetic Complications</strong></p>

                        </div>
                        <div class="col-md-10">
                            <p><span>:<?= $p->diabeticComplications ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Risk Factors for DM</strong></p>

                        </div>
                        <div class="col-md-10">
                            <p><span>:<?= $p->rFactorDM ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Other Co-morbidities</strong></p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->oComorbidities ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="s_heading">Treatment</h4>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Recommended Diet Chart No: </strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: Diet Chart (<?= $p->dietchart ;?>), Kcal:(<?= $p->kcal ;?>), Page No:(<?= $p->pageNo ;?>)</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Exercise : </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: Exercize: <?= $p->excersize ;?> Per Week:(<?= $p->excersize ;?> days)</span></p>
                        </div>
                    </div>
                </div>
               <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Medicine with Doses: </strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->medicineDose ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Next Follow-up Date : </strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->nfollowUpDate ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Next Follow-up Advice: </strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->followUpAdvice ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Referred to</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->refferedby ;?></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>About MDA Overall Managment</strong> </p>

                        </div>
                        <div class="col-md-8">
                            <p><span>: <?= $p->mdaoveral ;?></span></p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-2">
                            <p><strong>Comment</strong> </p>

                        </div>
                        <div class="col-md-10">
                            <p><span>: <?= $p->advices ;?></span></p>
                        </div>
                    </div>
                </div>
                 


            </div>

        </div>
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url().'admin_file/'?>patientview/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url().'admin_file/'?>patientview/js/popper.min.js"></script>
    <script src="<?= base_url().'admin_file/'?>patientview/js/bootstrap.min.js"></script>
</body>

</html>