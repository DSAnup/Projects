<?php $this->load->view('admin/head_c');?>
<div class="wrapper">

  <?php
  $this->load->view('admin/leftMenu');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Name
        <small>Employee Name List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="<?= base_url() . 'Control/fixed_asset' ?>">Employee List </a></li> -->

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      
      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Employee Name List</h3>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>phone</th>
                    <th>jobtitle</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($employeenew as $s) {?>
                  <tr>
                    <td><?= ++$i;?></td>
                    <td><?=$s->name?></td>
                    <td><?=$s->phone?></td>
                    <td><?=$s->jobtitle	?></td>
                    <td>
                      <a class="btn btn-sm btn-success" href="<?=base_url().'Update_Control/employee/'.$s->id?>">Update</a>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Update_Control/delete_employeeNew/'.$s->id?>" onclick="return confirm('are you sure?')">Delete</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
<script type="text/javascript">
function if_asm (v) {
  if(v=='asm'){
    $('#zone').css('display','block')
  }else{
    $('#zone').css('display','none')
  }
}
function totalvalue(perpic) {
	var q = $('#quantity').val();
	$('#total').val(q*perpic);
}
function totalvalue2(perpic) {
	var q = $('#pprice').val();
	$('#total').val(q*perpic);
}
</script>