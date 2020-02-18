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
                                <i class="fa fa-fw ti-move"></i> PENDING LIST
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
                                  <th>ID</th>
                                  <th>Service Name</th>
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Email</th>
                                  <th>Mobile</th>
                                  <th>Photo</th>
                                  <th>Price</th>
                                  <th>Batch</th>
                                  <th>Schedule</th>
                                  <!-- <th>Board</th> -->
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $ci =& get_instance();
                            $ci->load->model('Admin_model');
                            $ii=0;
                            foreach ($en as $e1) {
                                $sd=$e1->stdID;
                                $where=array('serial'=>'$sd');
                                $where_1=array('id'=>$e1->courseID);
                                $where_12=array('id'=>$e1->timeSlot);
                              $e=$this->Admin_model->get_std_1($sd);
                                $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
                                $time=$this->Admin_model->SelectData_1('time_slots','*',$where_12);
                                $where_123=array('id'=>$time->schedule_id);
                                $days=$this->Admin_model->SelectData_1('schedule_days','*',$where_123);
                                
                            ?>
                              <tr>
                                  <td><?=$e->serial?></td>
                                  <td><?php if(isset($e2->name)){ echo $e2->name;}else{ echo $e->courseID;}?></td>
                                  <td><?=$e->name?></td>
                                  <td><?=$e->p_village.', '.$e->p_post.', '.$e->p_upozila.', '.$e->p_district.', '.$e->p_zip?></td>
                                  <td><?=$e->email?></td>
                                  <td><?=$e->mobile?></td>
                                  <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="40" height="43"></td>
                                  <td><input type="text" class="form-control" name="price" id="price_<?=$e1->id?>" placeholder="Enter Price"></td>
                                  <td>
                                      <select class="form-control" onchange="set_approve($(this).val())">
                                          <option>Select batch</option>
                                          <?php
                                            foreach ($batch as $ue) {
                                          ?>
                                          <option value="<?=$ue->id.'_'.$e1->id?>"><?=$ue->batch_name?></option>
                                          <?php } ?>
                                      </select>
                                  </td>
                                  <td>
                                    <?php if(isset($e2->name)){ echo $days->days.' --- '.$time->slot;} ?>
                                  </td>
                                  <!-- <td><?=$e1->board?></td> -->
                                  <td id="td_<?=$e1->id?>">
                                      <a href="<?=base_url().'Admin/approve/'.$e1->id?>" class="btn btn-primary" disabled>Approve</a>
                                      <a href="<?=base_url().'Admin/edit_std/'.$e1->id?>" class="btn btn-success">Edit</a>
                                      <a href="<?=base_url().'Admin/delete_std/'.$e->id?>" class="btn btn-danger">Delete</a>
                                      <a href="<?=base_url().'Admin/confirm/'.$e1->id?>" class="btn btn-success">View</a>
                                  </td>
                              </tr>

                              <?php } ?>
                            </table>
                        </div>
                    </aside>
                    <div id="qn"></div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
                    <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
                    <!-- end of global js -->

                    <!-- begining of page level js -->
                    <!--Sparkline Chart-->
                    <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- end of page level js -->
<script src='<?php echo base_url(); ?>datatables/media/js/jquery.dataTables.min.js'></script>
</body>

</html>
<script type="text/javascript">
    function set_approve(id){
        var i=id.split('_');
        var price=$('#price_'+i[1]).val()
        html='<a href="<?=base_url().'Admin/approve/'?>'+id+'_'+price+'" class="btn btn-primary">Approve</a><a href="<?=base_url().'Admin/edit_std/'?>'+id+'" class="btn btn-success">Edit</a><a href="<?=base_url().'Admin/delete_std/'?>'+id+'" class="btn btn-danger">Delete</a>'
        
        $('#td_'+i[1]).html(html)
    }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script> 