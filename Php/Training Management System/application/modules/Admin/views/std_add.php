<?php
$this->load->view('head');
?>
<link rel="stylesheet" type="text/css" href="<?=base_url().'datatables/media/css/jquery.dataTables.min.css'?>">
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  <?php
  $this->load->view('leftmenu');
  ?>
  <!-- Start main-content -->
  <div class="main-content">
    <form action="<?=base_url().'Front/registration'?>" method="post" enctype="multipart/form-data" id="f">
      <div class="col-md-12">
        <div class="col-md-8 col-md-offset-2">
          <h4 class="heading-title">Don't have an Account? Register Now</h4>
          <div class="form-group col-md-6">
            <label>Course</label>
            <select class="form-control" name="courseID" id="courseID" onchange="get_days()">
              <option>Select Course</option>
              <?php
              foreach ($course as $e) {
                ?>
                <option value="<?=$e->id?>"><?=$e->name?></option>
                <?php } ?>
              </select> 
            </div>
            <div class="form-group col-md-6">
              <label>Board</label>
                <select class="form-control" name="board">
                  <option>Select Board</option>
                  <option value="SDTI">SDTI</option>
                  <option value="BTEB">BTEB</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label>Schedule Days</label>
              <span id="days">
                <select class="form-control" disabled>
                  <option>Select Days</option>
                </select>
              </span>
            </div>
            <div class="form-group col-md-6">
              <label>Time Slots</label>
              <span id="slot">
                <select class="form-control" disabled>
                  <option>Select Slot</option>
                </select>
              </span>
            </div>
            <div class="form-group col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-6">
              <label>Father's Name</label>
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
              <label>Mobile</label>
              <input type="text" class="form-control" name="mobile">
            </div>
            <div class="form-group col-md-6">
              <label>Date of Birth</label>
              <input type="date" class="form-control" name="date_of_birth">
            </div>
          </div>
          
          <div class="col-md-8 col-md-offset-2">
            
            <div class="form-group col-md-6">
              <label>Nationality</label>
              <input type="text" class="form-control" name="nationality">
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
       
          <div class="col-md-8 col-md-offset-2">
           
            <div class="heading-line-bottom col-md-12">
              <h4 class="heading-title">Present's Address</h4>
            </div>
            <div class="form-group col-md-6">
              <label>Village/Street</label>
              <input type="text" class="form-control" name="pr_village">
            </div>
            <div class="form-group col-md-6">
              <label>Post</label>
              <input type="text" class="form-control" name="pr_post">
            </div>
            <div class="form-group col-md-6">
              <label>Upzilla</label>
              <input type="text" class="form-control" name="pr_upozila">
            </div>
            <div class="form-group col-md-6">
              <label>District</label>
              <input type="text" class="form-control" name="pr_district">
            </div>
            <div class="form-group col-md-6">
              <label>Zip Code</label>
              <input type="text" class="form-control" name="pr_zip">
            </div>
          </div>
          <div class="col-md-8 col-md-offset-2">
            <h4 class="heading-title">Educational Background</h4>
            <div class="form-group col-md-6">
              <label>Highest Degree</label>
              <input type="text" class="form-control" name="degree">
            </div>
            <div class="form-group col-md-6">
              <label>Institution</label>
              <input type="text" class="form-control" name="institution">
            </div>
            <div class="form-group col-md-6">
              <label>Passing Year</label>
              <input type="text" class="form-control" name="pass_year">
            </div>
            <div class="form-group col-md-6">
              <label>Result</label>
              <input type="text" class="form-control" name="result">
            </div>
          </div>
          <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12">
              <h4 class="heading-title">Upload Your recent Photo</h4>
              <div class="form-group">
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
          </div>
          <!-- end main-content -->
        </form>
      </div>

      <?php
      $this->load->view('footer');
      ?>
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
              <div id="qn"></div>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
              <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
              <!-- end of global js -->

              <!-- begining of page level js -->
              <!--Sparkline Chart-->
              <!--  <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script> -->
<!-- flip --->
<script type="text/javascript" src="vendors/flip/js/jquery.flip.min.js"></script>
<script type="text/javascript" src="vendors/lcswitch/js/lc_switch.min.js"></script>
<!--flot chart-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script> -->
<!--swiper-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script> -->
<!--chartjs-->
<!-- <script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script> -->
<!--nvd3 chart-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script> -->
<!-- end of page level js -->

<script src='<?php echo base_url(); ?>datatables/media/js/jquery.dataTables.min.js'></script>
</body>

</html>
<script type="text/javascript">
  function set_approve(id){
    var i=id.split('_');
    var price=$('#price_'+i[1]).val()
    html='<a href="<?=base_url().'Admin/approve/'?>'+id+'_'+price+'" class="btn btn-primary">Approve</a>'

    $('#td_'+i[1]).html(html)
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>