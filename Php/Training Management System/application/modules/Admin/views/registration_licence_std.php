<?php
$this->load->view('head');
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <?php
  $this->load->view('leftmenu');
  ?>
  <aside class="right-side">
<style type="text/css">
  label{
    text-transform: uppercase;
  }
</style>
    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-fw ti-move"></i> Registation
            </h3>
            <span class="pull-right">
              <i class="fa fa-fw ti-angle-up clickable"></i>
              <i class="fa fa-fw ti-close removepanel clickable"></i>
            </span>
          </div>

          <dir class="row">
            <div class="col-md-12 col-xs-12 form">
            <img  src="<?=base_url().'images/BADC_title.png'?>"  height='100'>
              <address><h3>Head Office, Elanbari, Dhaka</h3></address>
              </div>
            </dir>
            <dir class="row">
            <div class="col-md-12 col-xs-12 form" >
                <span class="admission_txt">Driving Licence Form</span>


                <form action="<?=base_url().'Admin/driving_registration'?>" method="post" enctype="multipart/form-data" id="f">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <h4 class="heading-title">Please Fill up with carefully.</h4>
                      <span id="frm">
                      <div class="form-group col-md-6">
                        <label>Student ID</label>
                        <div class="input-group">
                          <div class="input-group-addon">STD</div>
                          <input type="text" class="form-control" id="std_id" onkeyup="get_std(this.value)">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>LICENCE ID</label>
                        <div class="input-group">
                          <div class="input-group-addon">DL</div>
                          <input type="text" class="form-control" name="serial">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Services</label>
                        <select class="form-control" name="courseID" id="courseID">
                          <option>Select Service</option>
                            <option value="professional_licence">1.PROFESSIONAL DRIVING LICENSE</option>
                            <option value="non_professional_licence">2.NON – PROFESSIONAL DRIVING LICENSE</option>
                            <option value="international_licence">3.INTERNATIONAL DRIVING LICENSE PERMIT</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Student's Name</label>
                          <input type="text" class="form-control" name="name" id="name" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Father's Name/ Husband Name</label>
                          <input type="text" class="form-control" name="father" id="father" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Mother's Name</label>
                          <input type="text" class="form-control" name="mother" id="mother" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Email Address</label>
                          <input type="email" class="form-control" name="email" id="email" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Cellular</label>
                          <input type="text" class="form-control" name="mobile" id="mobile" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Age</label>
                          <input type="text" class="form-control" name="age" id="age" readonly>
                        </div>
                      </div>

                      <div class="col-md-12">

                        <div class="form-group col-md-6">
                          <label>Nationality</label>
                          <input type="text" class="form-control" name="nationality" id="nationality" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>PASSPORT / NID NUMBER:</label>
                          <input type="text" class="form-control" name="passport_no" id="passport_no" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Religion</label>
                          <input type="text" class="form-control" name="religion" id="religion" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Blood Group</label>
                          <select class="form-control" name="blood">
                            <option>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                          </select> 
                        </div>
                      </div>

                      <div class="col-md-12">

                        <div class="heading-line-bottom col-md-12">
                          <h4 class="heading-title">Present Address</h4>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Village/Street</label>
                          <input type="text" class="form-control" name="p_village" id="p_village" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Post</label>
                          <input type="text" class="form-control" name="p_post" id="p_post" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Upzilla</label>
                          <input type="text" class="form-control" name="p_upozila" id="p_upozila" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>District</label>
                          <input type="text" class="form-control" name="p_district" id="p_district" readonly>
                        </div>     
                      </div>
                      <div class="col-md-12">

                        <div class="heading-line-bottom col-md-12">
                          <h4 class="heading-title">Pramanent Address</h4>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Village/Street</label>
                          <input type="text" class="form-control" name="g_village" id="g_village" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Post</label>
                          <input type="text" class="form-control" name="g_post" id="g_post" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Upzilla</label>
                          <input type="text" class="form-control" name="g_upozila" id="g_upozila" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>District</label>
                          <input type="text" class="form-control" name="g_district" id="g_district" readonly>
                        </div>     
                      </div>
                      <div class="col-md-12">
                        <h4 class="heading-title">Educational Background</h4>
                        <div class="form-group col-md-6">
                          <label>S.S.C & H.S.C</label>
                          <input type="text" class="form-control" name="ssc" id="ssc" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label>HIGHEST DEGREE</label>
                          <input type="text" class="form-control" name="degree" id="degree" readonly>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4 class="heading-title">DRIVING LICENSE INFO:</h4>
                        <div class="form-group col-md-6">
                          <label>LEARNER DRIVING LICENSE APPLICATION DATE. </label>
                          <input type="text" class="form-control" name="learn_licence_apply_date">
                        </div>
                        <div class="form-group col-md-6">
                          <label>LEARNER DRIVING LICENSE NO:</label>
                          <input type="text" class="form-control" name="learn_licence_no">
                        </div>
                        <div class="form-group col-md-6">
                          <label>LEARNER DRIVING LICENSE ISSUE DATE:</label>
                          <input type="date" class="form-control" name="learn_licence_issue">
                        </div>
                        <div class="form-group col-md-6">
                          <label>LEARNER DRIVING LICENSE EXPIRY DATE :</label>
                          <input type="date" class="form-control" name="learn_licence_exp">
                        </div>
                        <div class="form-group col-md-6">
                          <label>DRIVING LICENSE EXAM DATE : </label>
                          <input type="date" class="form-control" name="learn_licence_exam_date">
                        </div>
                        <div class="form-group col-md-6">
                          <label>RESULT WITH DATE: </label>
                          <input type="text" class="form-control" name="learn_licence_result_date">
                        </div>
                      </div>
                      <div class="col-md-12">
                       <h4 class="heading-title">POLICE VERIFICATION ( ONLY for PROFESSIONAL DRIVING):</h4>
                       <div class="form-group col-md-6"> 
                        <label>ISSUE DATE :</label>
                        <input type="date" class="form-control" name="pv_issu_date">
                      </div>
                      <div class="form-group col-md-6">
                        <label>EXPIRY DATE :</label>
                        <input type="date" class="form-control" name="pv_exp_date">
                      </div>
                      <div class="form-group col-md-12">
                        <label>REMARKS :</label>
                        <textarea class="form-control" name="pv_remarks"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                     <h4 class="heading-title">TEMPORARY DRIVING LICENSE INFO (BEFORE SMART DRIVING LICENSE CARD): </h4>
                     <div class="form-group col-md-6">
                      <label>DRIVING LICENSE NO :</label>
                      <input type="text" class="form-control" name="pr_dl_no">
                    </div>
                    <div class="form-group col-md-6"> 
                      <label>ISSUE DATE :</label>
                      <input type="date" class="form-control" name="pr_dl_issu_date">
                    </div>
                    <div class="form-group col-md-6">
                      <label>EXPIRY DATE :</label>
                      <input type="date" class="form-control" name="pr_dl_exp_date">
                    </div>
                    <div class="form-group col-md-6"> 
                      <label>SMART DL CARD APPROXIMATE DELIVERY DATE:</label>
                      <input type="date" class="form-control" name="pr_sm_dl_issu_date">
                    </div>
                    <div class="form-group col-md-6"> 
                      <label>CELLULAR FOR DRIVING LICENSE DELIVERY TEXT FROM BRTA:</label>
                      <input type="text" class="form-control" name="pr_dl_cellular">
                    </div>
                  </div>
                  <div class="col-md-12">
                       <h4 class="heading-title">SMART DRIVING LICENSE CARD INFO:</h4>
                       <div class="form-group col-md-6"> 
                        <label>DRIVING LICENSE NO :</label>
                        <input type="text" class="form-control" name="sm_dl_no">
                      </div>
                       <div class="form-group col-md-6"> 
                        <label>ISSUE DATE :</label>
                        <input type="date" class="form-control" name="sm_dl_issu_date">
                      </div>
                      <div class="form-group col-md-6">
                        <label>EXPIRY DATE :</label>
                        <input type="date" class="form-control" name="sm_exp_date">
                      </div>
                      <div class="form-group col-md-12">
                        <label>REMARKS :</label>
                        <textarea class="form-control" name="sm_remarks"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                       <h4 class="heading-title">PAYMENT INFO:</h4>
                       <div class="form-group col-md-12"> 
                        <label>amount :</label>
                        <input type="text" class="form-control" name="price">
                      </div>
                    </div>
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <h4 class="heading-title">Your recent Photo</h4>
                      <div class="form-group">
                        <label for="exampleInputFile">Picture</label>
                        <span id="im"></span>
                        <input type="hidden" name="photo" id="ph">
                        <p class="help-block">Picture size 300x300 .</p>
                      </div>
                      <div class="checkbox">
                        <label id="t">
                          <input type="checkbox" name="term" id="term" value="ok">
                          I read all terms and condition. </label>
                        </div>
                        
                        <div class="form-group">
                          <a class="btn btn-default" onclick="submit()">Register Now</a>
                        </div>
                      </div>
                    </div>
                    </span>
                  </div>
                  <!-- end main-content -->
                </form>
              </div>

              <script type="text/javascript">
                function submit(){
                  var term=$('#term:checked').val();
                  if(term=='ok'){
                    $('#f').submit();
                  }else{
                    $('#t').css('color','red')
                  }
                }
                function get_batch(){
                  var courseID=$('#courseID').val();
                  var base = '<?php echo base_url() ?>';
                  $.ajax({
                    url: base + 'Front/get_batch',
                    method: 'post',
                    data: {
                      id: courseID
                    },
                    success: function (data) {
                      $('#batch').html(data);
                    }
                  })
                }
                function get_days(){
                  var courseID=$('#courseID').val();
                  if(courseID=='Driving licence' || courseID=='MOTOR DRIVING OWNERSHIP TRANSFER'){
                      $('.t').css('display','none');
                      $('#tmslot').html('<input type="hidden" name="slot" value="18">')
                  }else{
                  var base = '<?php echo base_url() ?>';
                  $.ajax({
                    url: base + 'Front/get_days',
                    method: 'post',
                    data: {
                      id: courseID
                    },
                    success: function (data) {
                      $('#days').html(data);
                    }
                  })
                }
                }
                function get_slot(){
                  var daysID=$('#daysID').val();
                  var base = '<?php echo base_url() ?>';
                  $.ajax({
                    url: base + 'Front/get_slot',
                    method: 'post',
                    data: {
                      id: daysID
                    },
                    success: function (data) {
                      $('#slot').html(data);
                    }
                  })
                }

                function select_type(v){
                    $('#frm').html('<h1>OK</h1>')
                }

                function get_std(id){
                  
                  var base = '<?php echo base_url() ?>';
                  $.ajax({
                    url: base + 'Admin/get_std_for_licence',
                    method: 'post',
                    dataType: "json",
                    data: {
                      id: 'STD'+id
                    },
                    success: function (data) {
                      $('#name').val(data.name)
                      $('#father').val(data.father)
                      $('#mother').val(data.mother)
                      $('#email').val(data.email)
                      $('#mobile').val(data.mobile)
                      $('#date_of_birth').val(data.date_of_birth)
                      $('#age').val(data.age)
                      $('#nationality').val(data.nationality)
                      $('#passport_no').val(data.passport_no)
                      $('#religion').val(data.religion)
                      $('#p_village').val(data.p_village)
                      $('#p_post').val(data.p_post)
                      $('#p_upozila').val(data.p_upozila)
                      $('#p_district').val(data.p_district)
                      $('#g_village').val(data.g_village)
                      $('#g_post').val(data.g_post)
                      $('#g_upozila').val(data.g_upozila)
                      $('#g_district').val(data.g_district)
                      $('#ssc').val(data.ssc)
                      $('#degree').val(data.degree)
                      $('#ph').val(data.photo)
                      $('#im').html('<img src="<?=base_url().'std_photo/'?>'+data.photo+'" width="100" height="100">')
                    }
                  })
                }
              </script>





            </aside>
            <div id="qn"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
            <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script>
            <script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
            <script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script>
          </body>
          <script type="text/javascript">
            var i=0;
            function append_schedule(){
              i+=1;
              var html='<tr id="r'+i+'">'
              html+='<th>Days</th>'
              html+='<td><input type="text" name="Enter Days" class="form-control"></td>'
              html+='<th>Time Slot</th>'
              html+='<td><input type="text" name="Enter Time slot " class="form-control"></td>'
              html+='</tr>'
              $('#sh').append(html)
            }
          </script>
          </html>
          <style type="text/css">

            .form{
              text-align: center;

            }

            .admission_No{
              float : left;
              font-size : 20px;
            }
            #from_pic{
              max-height : 200px;
              max-width : 200px;
              float : right;
              border: 1px solid black;

            }
            .admission_txt{
              border: 2px solid #a1a1a1;
              padding: 10px 40px; 
              background: #dddddd;
              max-width: 300px;
              border-radius: 25px;
              font-size : 25px;

            }


          </style>