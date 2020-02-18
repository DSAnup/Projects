<?php
$this->load->view('head');
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <?php
  $this->load->view('leftmenu');
  ?>
  <aside class="right-side">

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
              <img src="<?=base_url().'images/BADC_title.png'?>"  height='100'>
              <address><h3>Head Office, Elanbari, Dhaka</h3></address>
            </div>
          </dir>
          <dir class="row">
            <div class="col-md-12 col-xs-12 form" >
              <span class="admission_txt">Admission Form</span>

<input type="hidden" id="check">
              <form action="<?=base_url().'Admin/registration'?>" method="post" enctype="multipart/form-data" id="f">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <h4 class="heading-title">Please Fill up with carefully.</h4>
                    <span id="frm">
                      <div class="form-group col-md-6">
                        <label>Student ID</label>
                        <div class="input-group">
                          <div class="input-group-addon">STD</div>
                          <input type="text" class="form-control" name="serial" id="serial" onkeyup="get_std_id(this.value)">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Registration ID</label>
                        <div class="input-group">
                          <div class="input-group-addon">EN</div>
                          <input type="text" class="form-control" name="enroll_id" id="enroll_id" onkeyup="get_en_id(this.value)">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Courses</label>
                        <select class="form-control" name="courseID" id="courseID" onchange="get_days()">
                          <option>Select Course</option>
                          <?php
                          foreach ($course as $e) {
                            ?>
                            <option value="<?=$e->id?>"><?=$e->name?></option>
                            <?php } ?>
                          </select>
                          <span id="tmslot"></span> 
                        </div>
                        <div class="form-group col-md-6 t">
                          <label>Schedule Days</label>
                          <span id="days">
                            <select class="form-control" disabled>
                              <option>Select Days</option>
                            </select>
                          </span>
                        </div>
                        <div class="form-group col-md-6 t">
                          <label>Time Slots</label>
                          <span id="slot">
                            <select class="form-control" disabled>
                              <option>Select Slot</option>
                            </select>
                          </span>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Student's Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Father's Name/ Husband Name</label>
                          <input type="text" class="form-control" name="father">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Mother's Name</label>
                          <input type="text" class="form-control" name="mother">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Email Address</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Cellular</label>
                          <input type="text" class="form-control" name="mobile">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Date of Birth</label>
                          <input type="date" class="form-control" name="date_of_birth">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Age</label>
                          <input type="text" class="form-control" name="age">
                        </div>
                      </div>

                      <div class="col-md-12">

                        <div class="form-group col-md-6">
                          <label>Nationality</label>
                          <input type="text" class="form-control" name="nationality">
                        </div>
                        <div class="form-group col-md-6">
                          <label>PASSPORT / NID NUMBER:</label>
                          <input type="text" class="form-control" name="passport_no">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Religion</label>
                          <input type="text" class="form-control" name="religion">
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
                          <input type="text" class="form-control" name="p_village">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Post</label>
                          <input type="text" class="form-control" name="p_post">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Upzilla</label>
                          <input type="text" class="form-control" name="p_upozila">
                        </div>
                        <div class="form-group col-md-6">
                          <label>District</label>
                          <input type="text" class="form-control" name="p_district">
                        </div>     
                      </div>
                      <div class="col-md-12">

                        <div class="heading-line-bottom col-md-12">
                          <h4 class="heading-title">Pramanent Address</h4>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Village/Street</label>
                          <input type="text" class="form-control" name="g_village">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Post</label>
                          <input type="text" class="form-control" name="g_post">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Upzilla</label>
                          <input type="text" class="form-control" name="g_upozila">
                        </div>
                        <div class="form-group col-md-6">
                          <label>District</label>
                          <input type="text" class="form-control" name="g_district">
                        </div>     
                      </div>
                      <div class="col-md-12">
                        <h4 class="heading-title">Educational Background</h4>
                        <div class="form-group col-md-6">
                          <label>S.S.C & H.S.C</label>
                          <input type="text" class="form-control" name="ssc">
                        </div>
                        <div class="form-group col-md-6">
                          <label>HIGHEST DEGREE</label>
                          <input type="text" class="form-control" name="degree">
                        </div>
                        <div class="form-group col-md-12">
                          <label>Remarks</label>
                          <textarea class="form-control" name="remarks"></textarea>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="col-md-12">
                          <h4 class="heading-title">Upload Your recent Photo</h4>
                          <div class="form-group" style="text-align: center;">
                            <label for="exampleInputFile">Upload Picture</label>
                            <input type="file" id="exampleInputFile" name="userfile">
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
                    var ch=$('#check').val()
                    if(term=='ok'){
                      if(ch=='ok'){
                        $('#f').submit();
                      }else{
                        $('html, body').animate({ scrollTop: 0 }, 'fast');
                      }                      
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
                  function get_std_id(id){

                    var base = '<?php echo base_url() ?>';
                    $.ajax({
                      url: base + 'Admin/get_duplicate_std',
                      method: 'post',
                      data: {
                        id: 'STD'+id
                      },
                      success: function (data) {
                        if(data=='error'){
                          $('#serial').css('border','1px solid red')
                        }else{
                          $('#serial').css('border','1px solid gray')
                        }
                        $('#check').val(data);
                      }
                    })
                  }
                  function get_en_id(id){

                    var base = '<?php echo base_url() ?>';
                    $.ajax({
                      url: base + 'Admin/get_duplicate_en',
                      method: 'post',
                      data: {
                        id: id
                      },
                      success: function (data) {
                        if(data=='error'){
                          $('#enroll_id').css('border','1px solid red')
                        }else{
                          $('#enroll_id').css('border','1px solid gray')
                        }
                        $('#check').val(data);
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