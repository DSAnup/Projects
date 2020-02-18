<!doctype html>
<html lang="en">

<head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url().'admin_file/employee/'?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url().'admin_file/employee/'?>css/normalize.css">
    <link rel="stylesheet" href="<?= base_url().'admin_file/employee/'?>css/style.css">
    <script src="<?= base_url() . 'admin_file/admin/' ?>plugins/ckeditor/ckeditor.js"></script>

    <!-- Google_fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,700i" rel="stylesheet">

    <title>Staff Job Profile</title>
</head>

<body>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="application_form_top">
                                <h2>Job Profile of Staff of MDA</h2>
                                <h2>Mawna, Sreepur, Gazipur.</h2>
                                <h2>Data should be filled up by office authority</h2>
                            </div>
                            <a href="<?= base_url()?>">Back To Dashboard</a>
                        </div>
                    </div>
                    <div class="top_underline">
                        <img src="images/top_underline.png" alt="">
                    </div>
                    <form action="<?=base_url()?>Update_Control/addNewEmployee" method="post" class="form-group" enctype="multipart/form-data">
                        <h4>Background Description:</h4>
                        <?php if(isset($edit)){ ?>
                        <input type="hidden" name="id" value="<?=$edit->id?>">
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name of Employee:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?=@$edit->name?>" autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile No:</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?=@$edit->phone?>"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Father/Husband's Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="<?=@$edit->fname?>"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mother's Name:</label>
                                    <input type="text" name="mname" value="<?=@$edit->mname?>" class="form-control" id="mname"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Present Address With Contact No:</label>
                                    <input type="text" class="form-control" id="paddress" name="paddress" value="<?=@$edit->paddress?>"   autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Permanent Address:</label>
                                    <input type="text" class="form-control" id="peraddress" name="peraddress" value="<?=@$edit->peraddress?>"   autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date of Birth:</label>
                                    <input type="date" name="dofb" value="<?=@$edit->dofb?>"  class="form-control" id="dofb">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NID/Birth Reg No:</label>
                                    <input type="text" name="nid" value="<?=@$edit->nid?>"  class="form-control" id="nid"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;">Blood Group:</label>
                                    <select name="blood" style="width: 100%;">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+" <?php  if(@$edit->blood=="A+"){ echo "selected";} ?>>A+</option>
                                        <option value="A-" <?php  if(@$edit->blood=="A-"){ echo "selected";} ?>>A-</option>
                                        <option value="AB+" <?php  if(@$edit->blood=="AB+"){ echo "selected";} ?>>AB+</option>
                                        <option value="AB-" <?php  if(@$edit->blood=="AB-"){ echo "selected";} ?>>AB-</option>
                                        <option value="B+" <?php  if(@$edit->blood=="B+"){ echo "selected";} ?>>B+</option>
                                        <option value="B-" <?  if(@$edit->blood=="B-"){ echo "selected";} ?>>B+</option>
                                        <option value="O+" <?php  if(@$edit->blood=="O+"){ echo "selected";} ?>>O+</option>
                                        <option value="O-" <?php  if(@$edit->blood=="A+"){ echo "selected";} ?>>O-</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Contact No (Family):</label>
                                    <input type="text" value="<?=@$edit->fphone?>" name="fphone"  class="form-control" id="fphone"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">E-Mail Address:</label>
                                    <input type="text" name="email" value="<?=@$edit->email?>"  class="form-control" id="email"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Joining Date:</label>
                                    <input type="date" name="jod" value="<?=@$edit->jod?>"  class="form-control" id="jod"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;">EPI including Anti-HBV Vaccination:</label>
                                    <select name="epihbv" style="width: 100%;">
                                        <option value="Full_Course" <?php  if(@$edit->epihbv=="Full_Course"){ echo "selected";} ?>>Taken (Full Course)</option>
                                        <option value="uncompleted" <?php  if(@$edit->epihbv=="uncompleted"){ echo "selected";} ?>>Taken (Uncompleted)</option>
                                        <option value="not_taken" <?php  if(@$edit->epihbv=="not_taken"){ echo "selected";} ?>>Not Taken</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Time of Last Dose Taken (HBV):</label>
                                    <input type="date" name="hbvdate" value="<?=@$edit->hbvdate?>"  class="form-control" id="hbvdate">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Office ID No:</label>
                                    <input type="text" name="officeid" value="<?=@$edit->officeid?>"  class="form-control" id="officeid"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Recommended By:</label>
                                    <input type="text" name="recom" value="<?=@$edit->recom?>"  class="form-control" id="recom"  autofocus autocomplete="on">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;">Approved By:</label>
                                    <select name="approved_by" style="width: 100%;">
                                        <option value="Chairman" <?php  if(@$edit->approved_by=="Chairman"){ echo "selected";} ?>>Chairman</option>
                                        <option value="Managing" <?php  if(@$edit->approved_by=="Managing"){ echo "selected";} ?>>Managing Director</option>
                                        <option value="Manager" <?php  if(@$edit->approved_by=="Manager"){ echo "selected";} ?>>Manager</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Circular Date:</label>
                                    <input type="date" name="circular_date" value="<?=@$circular_date->cash?>"  class="form-control" id="circular_date">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <h4>Employment type, status, salary, B/A No. and office hour duration:-</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Criteria</th>
                                                <th>Internship Period (2-8 weeks) Salary 25-50%</th>
                                                <th>Temporary Joining Period (06 months) Salary 50-100%</th>
                                                <th>Permanent Joining Period (03 years) Salary 100% to increment add on contract renewal</th>
                                                <th style="border-right: none;width: 150px;">
                                                    <p style="position: absolute;top: 0;padding-left: 35px;">Employment Status</p>
                                                </th>
                                                <th style="border-left: none;"></th>
                                                <th style="width: 150px;">Office Working hour</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Period</td>
                                                <td>
                                                    <input type="text" name="internperiod" value="<?=@$edit->internperiod?>" class="form-control" id="internperiod">

                                                </td>
                                                <td>
                                                  <input type="text" name="tempperiod" value="<?=@$edit->tempperiod?>" class="form-control" id="tempperiod">
                                                </td>
                                                <td>
                                                  <input type="text" name="permperiod" value="<?=@$edit->permperiod?>" class="form-control" id="permperiod">
                                                </td>
                                                <td>
                                                    <select name="empstatus1" style="width: 100%;">
                                                        <option value="Full Time" <?php  if(@$edit->empstatus1=="Full Time"){ echo "selected";} ?>> Full time</option>
                                                        <option value="part_time" <?php  if(@$edit->empstatus1=="part_time"){ echo "selected";} ?>>Part time</option>

                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="empstatus2" style="width: 140px;">
                                                        <option value="regular" <?php  if(@$edit->empstatus2=="regular"){ echo "selected";} ?>> Reguler</option>
                                                        <option value="weekly" <?php  if(@$edit->empstatus2=="weekly"){ echo "selected";} ?>>Holiday/weekly</option>
                                                        <option value="on_demand" <?php  if(@$edit->empstatus2=="on_demand"){ echo "selected";} ?>>On-demand</option>

                                                    </select>

                                                </td>
                                                <td>
                                                    <input type="text" name="periodhour" value="<?=@$edit->periodhour?>"  class="form-control" id="periodhour">

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 150px;">Monthly Consolidated salary or honorarium</td>
                                                <td>
                                                  <input type="text" name="internsalary" value="<?=@$edit->internsalary?>" class="form-control" id="internsalary">

                                                </td>
                                                <td>
                                                  <input type="text" name="tempsalary" value="<?=@$edit->tempsalary?>" class="form-control" id="tempsalary">
                                                </td>
                                                <td>
                                                  <input type="text" name="persalary" value="<?=@$edit->persalary?>" class="form-control" id="persalary">
                                                </td>
                                                <td>
                                                    N/A
                                                </td>
                                                <td>
                                                  N/A
                                                </td>
                                                <td>
                                                    N/A
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Salary A/C No. and Bank Name</td>
                                                <td style="border-right: 0;">
                                                    <p style="position: absolute;">
                                                        <input style="width: 160%;" type="text" name="bankac" value="<?=@$edit->bankac?>"  class="form-control" id="department" width="160%" placeholder="Bank A/C Number"  autofocus autocomplete="on">
                                                    </p>
                                                </td>
                                                <td style="border-right: 0;border-left: 0;"></td>
                                                <td style="border-right: 0;">
                                                    <p style="position: absolute;">
                                                        <input style="width: 260%;" name="bankame" value="<?=@$edit->bankame?>"  type="text" class="form-control" id="department" placeholder="Bank Name and Address"  autofocus autocomplete="on">
                                                    </p>
                                                </td>

                                                <td style="border-right: 0;border-left: 0;"></td>
                                                <td style="border-right: 0;border-left: 0;"></td>
                                                <td style="border-left: 0;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;">Job Title:</label>
                                    <input type="text" name="jobtitle" value="<?=@$edit->jobtitle?>"  class="form-control" id="circular_date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;">Department:</label>
                                    <select name="department" style="width: 100%;">
                                        <option value="general" <?php  if(@$edit->department=="general"){ echo "selected";} ?>>General</option>
                                        <option value="admin" <?php  if(@$edit->department=="admin"){ echo "selected";} ?>>Admin</option>
                                        <option value="marketing" <?php  if(@$edit->department=="marketing"){ echo "selected";} ?>>Marketing</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block;">Reports to or Liable to:</label>
                                    <select name="reportsto" style="width: 100%;">
                                        <option value="chairman" <?php  if(@$edit->reportsto=="chairman"){ echo "selected";} ?>>Chairman</option>
                                        <option value="md" <?php  if(@$edit->reportsto=="md"){ echo "selected";} ?>>Managing Director</option>
                                        <option value="manager" <?php  if(@$edit->reportsto=="manager"){ echo "selected";} ?>>Manager</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <h4>Job Gradation by permanent salary amount:</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <table class="table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>A</th>
                                                <th>B</th>
                                                <th>C</th>
                                                <th>D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <!-- <label style="display: block;">EPI including Anti-HBV Vaccination:</label> -->
                                                    <input type="text" name="salarya" value="<?=@$edit->salarya?>"  class="form-control" id="salarya">
                                                </td>
                                                <td>
                                                    <input type="text" name="salaryb" value="<?=@$edit->salaryb?>"  class="form-control" id="salaryb">

                                                </td>
                                                <td>
                                                    <input type="text" name="salaryc" value="<?=@$edit->salaryc?>"  class="form-control" id="salaryc">

                                                </td>
                                                <td>
                                                    <input type="text" name="salaryd" value="<?=@$edit->salaryd?>"  class="form-control" id="salaryd">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <h4>Primary duties and responsibility:</h4>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">

                                    <textarea rows="4" name="primaryduties" class="form-control ckeditor"  cols="100">
                                        <?=@$edit->primaryduties?>
                                    </textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <h4>Secondary or additional duties and responsibility:</h4>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea rows="4" name="addduties" class="form-control ckeditor"  cols="100">
                                        <?=@$edit->addduties?>  
                                    </textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <h4>Skills and abilities on:</h4>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Good attitude and behavior </td>
                                                <td>Solid Communication and interpersonal relationship skills </td>
                                                <td>Strong critical and analytical and analytical thinking skills </td>
                                                <td>Excellient leadership abilities </td>
                                                <td>Abilities to take intelligent decision or to work under pressure </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="attitude" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->attitude=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->attitude=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="communication" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->communication=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->communication=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="analytics" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->analytics=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->analytics=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="leadership" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->leadership=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->leadership=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="pressure" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->pressure=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->pressure=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Good Judgment ability</td>
                                                <td>Initiative or Creative power</td>
                                                <td>Credibility, Realiability, Dependability and Flexibility</td>
                                                <td>Language Skills </td>
                                                <td>Computer knowladge </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <select name="judgement" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->judgement=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->judgement=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="power" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->power=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->power=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="flexibility" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->flexibility=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->flexibility=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="language" style="width: 100%;">
                                                        <option value="Bangla" <?php  if(@$edit->language=="Bangla"){ echo "selected";} ?>>Bangla</option>
                                                        <option value="English" <?php  if(@$edit->language=="English"){ echo "selected";} ?>>English</option>
                                                        <option value="Others" <?php  if(@$edit->language=="Others"){ echo "selected";} ?>>Others</option>
                                                    </select>
                                                </td>
                                                <td>

                                                    <select name="computer" style="width: 100%;">
                                                        <option value="1" <?php  if(@$edit->computer=="1"){ echo "selected";} ?>>Beginner</option>
                                                        <option value="2" <?php  if(@$edit->computer=="2"){ echo "selected";} ?>>MS Word</option>
                                                        <option value="3" <?php  if(@$edit->computer=="3"){ echo "selected";} ?>>Excel</option>
                                                        <option value="4" <?php  if(@$edit->computer=="4"){ echo "selected";} ?>>Power Point</option>
                                                        <option value="5" <?php  if(@$edit->computer=="5"){ echo "selected";} ?>>Graphics Design</option>
                                                        <option value="6" <?php  if(@$edit->computer=="6"){ echo "selected";} ?>>Internet Browsing</option>
                                                        <option value="7" <?php  if(@$edit->computer=="7"){ echo "selected";} ?>>Social Networking</option>
                                                        <option value="8" <?php  if(@$edit->computer=="8"){ echo "selected";} ?>>All</option>
                                                        <option value="9" <?php  if(@$edit->computer=="9"){ echo "selected";} ?>>Nothing</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Overall skills on own work-field</td>
                                                <td>Administrative, chain of commanding or official knowledge </td>
                                                <td>Driving ability </td>
                                                <td>Spiritual and cultural believe and activity </td>
                                                <td>Others</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                  <select name="work_field" style="width: 100%;">
                                                        <option value="1" <?php  if(@$edit->work_field=="1"){ echo "selected";} ?>>Good</option>
                                                        <option value="2" <?php  if(@$edit->work_field=="2"){ echo "selected";} ?>>Better</option>
                                                        <option value="3" <?php  if(@$edit->work_field=="3"){ echo "selected";} ?>>Best</option>
                                                    </select>
                                                </td>
                                                <td>
                                                  <select name="official_know" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->official_know=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->official_know=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>
                                                  <select name="driving" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->driving=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->driving=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>
                                                  <select name="spiritual" style="width: 100%;">
                                                        <option value="0" <?php  if(@$edit->spiritual=="0"){ echo "selected";} ?>>Present</option>
                                                        <option value="1" <?php  if(@$edit->spiritual=="1"){ echo "selected";} ?>>Absent</option>
                                                    </select>
                                                </td>
                                                <td>
                                                  <input type="text" name="otherskills" value="<?=@$edit->otherskills?>"  class="form-control" id="circular_date">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <h4>Educational Qualification:</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Exam/ Certificate</th>
                                                <th>Name of Institute</th>
                                                <th>Passing Year</th>
                                                <th>Board</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="exam1" value="<?=@$edit->exam1?>"  class="form-control" id="exam1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="institution1" value="<?=@$edit->institution1?>"  class="form-control" id="institution1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year1" value="<?=@$edit->passing_year1?>"  class="form-control" id="passing_year1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="board1" value="<?=@$edit->board1?>"  class="form-control" id="board1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="result1" value="<?=@$edit->result1?>"  class="form-control" id="result1"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="exam2" value="<?=@$edit->exam2?>"  class="form-control" id="exam2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="institution2" value="<?=@$edit->institution2?>"  class="form-control" id="institution2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year2" value="<?=@$edit->passing_year2?>"  class="form-control" id="passing_year2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="board2" value="<?=@$edit->board2?>"  class="form-control" id="board2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="result2" value="<?=@$edit->result2?>"  class="form-control" id="result2"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="exam3" value="<?=@$edit->exam3?>"  class="form-control" id="exam3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="institution3" value="<?=@$edit->institution3?>"  class="form-control" id="institution3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year3" value="<?=@$edit->passing_year3?>"  class="form-control" id="passing_year3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="board3" value="<?=@$edit->board3?>"  class="form-control" id="board3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="result3" value="<?=@$edit->result3?>"  class="form-control" id="result3"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="exam4" value="<?=@$edit->exam4?>"  class="form-control" id="exam4"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="institution4" value="<?=@$edit->institution4?>"  class="form-control" id="institution4"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="passing_year4" value="<?=@$edit->passing_year4?>"  class="form-control" id="passing_year4"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="board4" value="<?=@$edit->board4?>"  class="form-control" id="board4"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="result4" value="<?=@$edit->result4?>"  class="form-control" id="result4"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <h4>Traning:</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>SL/No</th> -->
                                                <th>Name of Training</th>
                                                <th>Name of Institute</th>
                                                <th>Duration</th>
                                                <th>Year</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <td>
                                                    <input type="text" class="form-control" id="last_name" name="name" value="<?=@$edit->cash?>"  autofocus autocomplete="on">
                                                </td> -->
                                                <td>
                                                    <input type="text" name="train1" value="<?=@$edit->train1?>" class="form-control" id="train1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="trainins1" value="<?=@$edit->trainins1?>" class="form-control" id="trainins1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tduration1" value="<?=@$edit->tduration1?>" class="form-control" id="tduration1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tyear1" value="<?=@$edit->tyear1?>" class="form-control" id="tyear1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tremark1" value="<?=@$edit->tremark1?>" class="form-control" id="tremark1"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" name="train2" value="<?=@$edit->train2?>" class="form-control" id="train2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="trainins2" value="<?=@$edit->trainins2?>" class="form-control" id="trainins2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tduration2" value="<?=@$edit->tduration2?>" class="form-control" id="tduration2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tyear2" value="<?=@$edit->tyear2?>" class="form-control" id="tyear2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tremark2" value="<?=@$edit->tremark2?>" class="form-control" id="tremark2"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- <td>
                                                    <input type="text" name="name" value="<?=@$edit->cash?>"  class="form-control" id="last_name"  autofocus autocomplete="on">
                                                </td> -->
                                                <td>
                                                    <input type="text" name="train3" value="<?=@$edit->train3?>"  class="form-control" id="train3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="trainins3" value="<?=@$edit->trainins3?>"  class="form-control" id="trainins3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tduration3" value="<?=@$edit->tduration3?>" class="form-control" id="tduration3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tyear3" value="<?=@$edit->tyear3?>"  class="form-control" id="tyear3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="tremark3" value="<?=@$edit->tremark3?>"  class="form-control" id="tremark3"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="academic_info_tb">
                                    <h4>Work Experiences:</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>SL/No</th> -->
                                                <th>Name/ Type of work</th>
                                                <th>Designation</th>
                                                <th>Name of Institute with address & contct no</th>
                                                <th>Duration</th>
                                                <th>Year</th>
                                                <th>Salary Status</th>
                                                <th>Cause of Resignation or Termination</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- <td>
                                                    <input type="text" name="name" value="<?=@$edit->cash?>"  class="form-control" id="last_name"  autofocus autocomplete="on">
                                                </td> -->
                                                <td>
                                                    <input type="text" name="wname1" value="<?=@$edit->wname1?>"  class="form-control" id="wname1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wdesig1" value="<?=@$edit->wdesig1?>"  class="form-control" id="wdesig1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="winst1" value="<?=@$edit->winst1?>"  class="form-control" id="winst1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wduration1" value="<?=@$edit->wduration1?>"  class="form-control" id="wduration1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wyear1" value="<?=@$edit->wyear1?>"  class="form-control" id="wyear1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wsalary1" value="<?=@$edit->wsalary1?>"  class="form-control" id="wsalary1"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wresign1" value="<?=@$edit->wresign1?>"  class="form-control" id="wresign1"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- <td>
                                                    <input type="text" name="name" value="<?=@$edit->cash?>" class="form-control" id="last_name"  autofocus autocomplete="on">
                                                </td> -->
                                                <td>
                                                    <input type="text" name="wname2" value="<?=@$edit->wname2?>" class="form-control" id="wname2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wdesig2" value="<?=@$edit->wdesig2?>" class="form-control" id="wdesig2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="winst2" value="<?=@$edit->winst2?>" class="form-control" id="winst2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wduration2" value="<?=@$edit->wduration2?>" class="form-control" id="wduration2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wyear2" value="<?=@$edit->wyear2?>" class="form-control" id="wyear2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wsalary2" value="<?=@$edit->wsalary2?>" class="form-control" id="wsalary2"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wresign2" value="<?=@$edit->wresign2?>" class="form-control" id="wresign2"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                            <tr>
                                                <!-- <td>
                                                    <input type="text" name="name" value="<?=@$edit->cash?>" class="form-control" id="last_name"  autofocus autocomplete="on">
                                                </td> -->
                                                <td>
                                                    <input type="text" name="wname3" value="<?=@$edit->wname3?>" class="form-control" id="wname3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wdesig3" value="<?=@$edit->wdesig3?>" class="form-control" id="wdesig3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="winst3" value="<?=@$edit->winst3?>" class="form-control" id="winst3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wduration3" value="<?=@$edit->wduration3?>" class="form-control" id="wduration3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wyear3" value="<?=@$edit->wyear3?>" class="form-control" id="wyear3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wsalary3" value="<?=@$edit->wsalary3?>" class="form-control" id="wsalary3"  autofocus autocomplete="on">
                                                </td>
                                                <td>
                                                    <input type="text" name="wresign3" value="<?=@$edit->wresign3?>" class="form-control" id="wresign3"  autofocus autocomplete="on">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>NB. By name of God?Allah, I solemnly pledge that all information those are imputed here is alright and truth. For any falsity I must be accountable and any punishment should be appropriate for me by current MDSWT/MDA rules or ICT Act </p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 70px;">
                            <div class="col-md-6">
                                <p>Authority Signature</p>
                            </div>
                            <div class="col-md-6">
                                <p>Employee Signature</p>
                            </div>
                        </div>
                    <div class="submit_btn">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- /container -->
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>