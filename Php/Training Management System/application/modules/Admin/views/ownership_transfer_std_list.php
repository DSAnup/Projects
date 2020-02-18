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
              <i class="fa fa-fw ti-move"></i> MOTOR VEHICLES OWNERSHIP TRANFER CLIENT LIST
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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $ci =& get_instance();
              $ci->load->model('Admin_model');
              $ii=0;
              foreach ($transfer as $e1) {
                $where=array('serial'=>$e1->stdID);
                $where_1=array('id'=>$e1->courseID);
                $where_12=array('id'=>$e1->timeSlot);
                $where_121=array('id'=>$e1->batchID);
                $e=$this->Admin_model->SelectData_1('students','*',$where);
                $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
                ?>
                <tr>
                  <td><?=++$ii?></td>
                  <td><?=$e->serial?></td>
                  <td><?=$e->name?></td>
                  <td><?=$e->email?></td>
                  <td><?=$e->mobile?></td>
                  <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="40" height="43"></td>
                  <td>
                    <?php
                    if($e1->certified=='no'){
                      ?>
                      <a href="<?=base_url().'Admin/client_details_transfer/'.$e1->id?>" class="btn btn-primary">View</a>
                      <a href="<?=base_url().'Admin/transfer_client_edit/'.$e1->id?>" class="btn btn-success">Edit</a>
                      <a href="<?=base_url().'Admin/transfer_client_delete/'.$e1->id?>" class="btn btn-danger">Delete</a>
                      <?php }else{ echo "<b style='color:green'>Certified</b>";} ?>
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

      }
    })
  }
</script>