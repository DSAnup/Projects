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
              <i class="fa fa-fw ti-move"></i> EDIT STUDENT PROFILE
            </h3>
            <span class="pull-right">
              <i class="fa fa-fw ti-angle-up clickable"></i>
              <i class="fa fa-fw ti-close removepanel clickable"></i>
            </span>
          </div>
          <div class="panel-body">
            <!-- Start main-content -->
            <div class="main-content">
              <form action="<?=base_url().'Admin/edit_std_post'?>" method="post" enctype="multipart/form-data" id="f">
                <div class="col-md-12">
                  <div class="col-md-12">
                  <div class="form-group col-md-6">
                        <label>Student ID</label>
                        <!-- <div class="input-group"> -->
                          <!-- <div class="input-group-addon">ST</div> -->
                          <input type="text" disabled class="form-control" name="serial" value="<?=$query->serial?>">
                        <!-- </div> -->
                      </div>
                      <div class="form-group col-md-6">
                        <label>Registration ID</label>
                        <!-- <div class="input-group"> -->
                          <!-- <div class="input-group-addon">EN</div> -->
                          <input type="text" disabled class="form-control" name="enroll_id" value="<?=$query->enroll_id?>">
                        <!-- </div> -->
                      </div>
                    <div class="form-group col-md-6">
                      <label>Course</label>
                      <input type="hidden" name="std_id" value="<?=$query->std_id?>">
                      <input type="hidden" name="en_id" value="<?=$query->en_id?>">
                      <select class="form-control" name="courseID" id="courseID" onchange="get_days()">
                        <option>Select Course</option>
                        <?php
                        foreach ($course as $e) {
                          ?>
                          <option value="<?=$e->id?>" <?php if($query->courseID==$e->id){ echo "selected";} ?>><?=$e->name?></option>
                          <?php } ?>
                        </select> 
                      </div>
                      <div class="form-group col-md-6">
                        <label>Schedule Days</label>
                        <span id="days">
                          <select class="form-control" disabled>
                            <option><?=$query->days?></option>
                          </select>
                        </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Time Slots</label>
                        <span id="slot">
                        <input type="hidden" name="slot" value="<?=$query->timeSlot?>">
                          <select class="form-control" disabled>
                            <option><?=$query->slot?></option>
                          </select>
                        </span>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" value="<?=$query->std_name?>" class="form-control" name="name">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Father's Name</label>
                        <input type="text" value="<?=$query->father?>" class="form-control" name="father">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Mother's Name</label>
                        <input type="text" value="<?=$query->mother?>" class="form-control" name="mother">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="email" value="<?=$query->email?>" class="form-control" name="email">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Cellular</label>
                        <input type="text" value="<?=$query->mobile?>" class="form-control" name="mobile">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date of Birth</label>
                        <input type="date" value="<?=$query->date_of_birth?>" class="form-control" name="date_of_birth">
                      </div>
                       <div class="form-group col-md-6">
                        <label>Age</label>
                        <input type="text" value="<?=$query->age?>" class="form-control" name="age">
                      </div>
                    </div>

                    <div class="col-md-12">

                      <div class="form-group col-md-6">
                        <label>Nationality</label>
                        <input type="text" value="<?=$query->nationality?>" class="form-control" name="nationality">
                      </div>
                      <div class="form-group col-md-6">
                        <label>PASSPORT / NID NUMBER:</label>
                        <input type="text" value="<?=$query->passport_no?>" class="form-control" name="passport_no">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Religion</label>
                        <input type="text" value="<?=$query->religion?>" class="form-control" name="religion">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Blood Group</label>
                        <select class="form-control" name="blood">
                          <option>Select Blood Group</option>
                          <option value="A+" <?php if($query->blood=='A+'){ echo "selected";} ?>>A+</option>
                          <option value="A-" <?php if($query->blood=='A-'){ echo "selected";} ?>>A-</option>
                          <option value="B+" <?php if($query->blood=='B+'){ echo "selected";} ?>>B+</option>
                          <option value="B-" <?php if($query->blood=='B-'){ echo "selected";} ?>>B-</option>
                          <option value="O+" <?php if($query->blood=='O+'){ echo "selected";} ?>>O+</option>
                          <option value="O-" <?php if($query->blood=='O-'){ echo "selected";} ?>>O-</option>
                          <option value="AB+" <?php if($query->blood=='AB+'){ echo "selected";} ?>>AB+</option>
                          <option value="AB-" <?php if($query->blood=='AB-'){ echo "selected";} ?>>AB-</option>
                        </select> 
                      </div>
                    </div>

                    <div class="col-md-12">

                      <div class="heading-line-bottom col-md-12">
                        <h4 class="heading-title">Present's Address</h4>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Village/Street</label>
                        <input type="text" value="<?=$query->p_village?>" class="form-control" name="p_village">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Post</label>
                        <input type="text" class="form-control" value="<?=$query->p_post?>" name="p_post">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Upzilla</label>
                        <input type="text" class="form-control" value="<?=$query->p_upozila?>" name="p_upozila">
                      </div>
                      <div class="form-group col-md-6">
                        <label>District</label>
                        <input type="text" class="form-control" value="<?=$query->p_district?>" name="p_district">
                      </div>                      
                    </div>
                     <div class="col-md-12">

                      <div class="heading-line-bottom col-md-12">
                        <h4 class="heading-title">Parmanent's Address</h4>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Village/Street</label>
                        <input type="text" value="<?=$query->g_village?>" class="form-control" name="g_village">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Post</label>
                        <input type="text" class="form-control" value="<?=$query->g_post?>" name="g_post">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Upzilla</label>
                        <input type="text" class="form-control" value="<?=$query->g_upozila?>" name="g_upozila">
                      </div>
                      <div class="form-group col-md-6">
                        <label>District</label>
                        <input type="text" class="form-control" value="<?=$query->g_district?>" name="g_district">
                      </div>                      
                    </div>
                    <div class="col-md-12">
                      <h4 class="heading-title">Educational Background</h4>
                      <div class="form-group col-md-6">
                        <label>SSC/HSC</label>
                        <input type="text" value="<?=$query->ssc?>" class="form-control" name="ssc">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Highest Degree</label>
                        <input type="text" value="<?=$query->degree?>" class="form-control" name="degree">
                      </div>                      
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <h4 class="heading-title">Upload Your recent Photo</h4>
                        <div class="form-group">
                          <img src="<?=base_url().'std_photo/'.$query->photo?>" height="100" width="90">
                          <label for="exampleInputFile">Upload Picture</label>
                          <input type="file" id="exampleInputFile" name="userfile">
                          <p class="help-block">Picture size 300x300 .</p>
                        </div>

                        <div class="form-group">
                          <!-- <a class="btn btn-default" onclick="submit()">Register Now</a> -->
                          <input type="submit" value="Edit">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end main-content -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    </script>