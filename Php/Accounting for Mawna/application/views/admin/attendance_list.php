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
        Add Attendance
        <small>Attendance List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Add Attendance </a></li>

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
                <h3>Employee List</h3>
              </div>
              <form action="<?=base_url()?>Control/add_attendance" method="post">
              <table class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php $i=0; foreach ($emp as $k) {?>
                    <tr>
                      <td><?=++$i?></td>
                      <td><?=$k->name?></td>
                      <td><input type="time" name="in_time[]" class="form-control"><input type="hidden" name="empID[]" value="<?=$k->id?>"></td>
                      <td><input type="time" name="out_time[]" class="form-control"></td>
                      <td>
                        <select name="type[]" class="form-control">
                          <option value="own">Own Working Day</option>
                          <option value="other">Other's Working Day</option>
                          <option value="exchange">Exchange Working Day</option>
                          <option value="additional">Additional Working Day</option>
                        </select>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3"><input type="reset" value="Reset" class="btn btn-block btn-danger"></td>
                    <td colspan="2"><input type="submit" value="Submit" class="btn btn-block btn-success"></td>
                  </tr>
                </tfoot>
              </table>
            </form>
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
</script>