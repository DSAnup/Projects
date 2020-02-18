<?php
$this->load->view('head');
?>
<link rel="stylesheet" type="text/css" href="<?=base_url().'datatables/media/css/jquery.dataTables.min.css'?>">
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  <?php
  $this->load->view('leftmenu');
  ?>
  <aside class="right-side">

    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-fw ti-move"></i> Current Student List
            </h3>
            <span class="pull-right">
              <i class="fa fa-fw ti-angle-up clickable"></i>
              <i class="fa fa-fw ti-close removepanel clickable"></i>
            </span>
          </div>
          <div class="panel-body table-responsive">
            
              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>STD ID</th>
                    <th>EN ID</th>
                    <th>Service Name</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Batch</th>
                    <th>Photo</th>
                    <th>Finish Date</th>
                    <th>Certificate ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                $ci =& get_instance();
                $ci->load->model('Admin_model');
                $ii=0;
                foreach ($en as $e1) {
                  $where=array('serial'=>$e1->stdID);
                  $where_1=array('id'=>$e1->courseID);
                  $where_12=array('id'=>$e1->timeSlot);
                  $where_121=array('id'=>$e1->batchID);
                  $e=$this->Admin_model->SelectData_1('students','*',$where);
                  $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
                  $time=$this->Admin_model->SelectData_1('time_slots','*',$where_12);
                  $where_123=array('id'=>$time->schedule_id);
                  $days=$this->Admin_model->SelectData_1('schedule_days','*',$where_123);
                  $b=$this->Admin_model->SelectData_1('batch','*',$where_121);
                  ?>
                  <tr>
                    <td><?=++$ii?></td>
                    <td><?=$e->serial?></td>
                    <td><?=$e1->enroll_id?></td>
                    <td><?php if(isset($e2->name)){ echo $e2->name;}else{ echo $e->courseID;}?></td>
                    <td><?=$e->name?></td>
                    <!-- <td><?=$e->p_village.', '.$e->p_post.', '.$e->p_upozila.', '.$e->p_district?></td> -->
                    <td><?=$e->email?></td>
                    <td><?=$e->mobile?></td>
                    <!-- <td>
                      <?php if(isset($e2->name)){ echo $days->days.' --- '.$time->slot;} ?>
                    </td> -->
                    
                    <td><?=@$b->batch_name?></td>
                    <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="40" height="43"></td>
                    <td><input type="date" id="<?='d_'.$e1->id?>"></td>
                    <td><input type="text" id="<?='id_'.$e1->id?>"></td>
                    <td>
                      <?php
                      if($e1->certified=='no'){
                        ?>
                        <a href="#" class="btn btn-primary" onclick="mark_as_certified(<?=$e1->id?>)">Mark as Certified</a>

                        <?php }else{ echo "<b style='color:green'>Certified</b>";} ?>
                        <a href="<?=base_url().'Admin/confirm/'.$e1->id?>" class="btn btn-success">View</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
                </div>
                <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-fw ti-move"></i> Certified Student List
            </h3>
            <span class="pull-right">
              <i class="fa fa-fw ti-angle-up clickable"></i>
              <i class="fa fa-fw ti-close removepanel clickable"></i>
            </span>
          </div>
          <div class="panel-body table-responsive">
              <h4><strong></strong></h4>
              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Certificate ID</th>
                    <th>STD ID</th>
                    <th>EN ID</th>
                    <th>Finish Date</th>
                    <th>Course Name</th>
                    <th>Name</th>
                    <!-- <th>Address</th> -->
                    <th>Email</th>
                    <th>Mobile</th>
                    <!-- <th>Schedule</th> -->
                    <!-- <th>Board</th> -->
                    <th>Batch</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                $ci =& get_instance();
                $ci->load->model('Admin_model');
                $ii=0;
                foreach ($en1 as $e1) {
                  $sd=$e1->stdID;
$where=array('serial'=>'$sd');
$e=$this->Admin_model->get_std_1($sd);
                  // $where=array('serial'=>$e1->stdID);
                  $where_1=array('id'=>$e1->courseID);
                  $where_12=array('id'=>$e1->timeSlot);
                  // $e=$this->Admin_model->SelectData_1('students','*',$where);
                  $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
                  $time=$this->Admin_model->SelectData_1('time_slots','*',$where_12);
                  $where_123=array('id'=>$time->schedule_id);
                  $days=$this->Admin_model->SelectData_1('schedule_days','*',$where_123);
                  $where_121=array('id'=>$e1->batchID);
                  $b=$this->Admin_model->SelectData_1('batch','*',$where_121);
                  ?>
                  <tr>
                    <td><?=++$ii?></td>
                    <td><?=$e1->certificate_id?></td>
                    <td><?=$e->serial?></td>
                    <td><?=$e1->enroll_id?></td>
                    <td><?=$e1->finish_date?></td>
                    <td><?php if(isset($e2->name)){ echo $e2->name;}else{ echo $e->courseID;}?></td>
                    <td><?=$e->name?></td>
                    <td><?=$e->email?></td>
                    <td><?=$e->mobile?></td>
                    <td><?=@$b->batch_name?></td>
                    <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="40" height="43"></td>
                    <td>
                      <?php
                      if($e1->certified=='no'){
                        ?>
                        <a href="<?=base_url().'Admin/mark_as_certified/'.$e1->id?>" class="btn btn-primary">Mark as Certified</a>
                        <?php }else{ echo "<b style='color:green'>Certified</b>";} ?>
                      </td>
                      <td>
                        <a href="<?=base_url().'Admin/certified_print/'.$e1->id?>" class="btn btn-primary"> Print</a>
                        <a href="<?=base_url().'Admin/confirm/'.$e1->id?>" class="btn btn-success">View</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
                </div>
                </div>
                </div>
              </aside>
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
  function mark_as_certified(id){
    var d=$('#d_'+id).val();
    var c_id=$('#id_'+id).val();
    var base = '<?php echo base_url() ?>';
                    $.ajax({
                        url: base + 'Admin/mark_as_certified',
                        method: 'post',
                        data: {
                            id: id,
                            date: d,
                            c_id: c_id
                        },
                        success: function (data) {
                          window.location.assign("<?=base_url().'Admin/std_list/std'?>")
                        }
                    })
  }
</script>