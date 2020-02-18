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
        Report
        <small>Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <form action="<?=base_url()?>Control/add_punishment" method="post">
            <div class="box-body table-responsive" id="img">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Security Fund Punishment</h3>
              </div>
              <style type="text/css">
              th{
                text-align: center;
              }
              td{
                text-align: center;
              }
              </style>
              
              <table class="table table-bordered table-striped" border="1">
                <tr>
                  <th>Employee</th>
                  <td>
                    <select name="empID" class="form-control">
                      <option>Select Employee</option>
                      <?php foreach ($emp as $k){?>
                      <option value="<?=$k->id?>"><?=$k->name?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <th>Date</th>
                  <td><input type="text" class="form-control date" name="date"></td>
                </tr>
                <tr>
                  <th>Amount</th>
                  <td colspan="3"><input type="text" name="amount" class="form-control"></td>
                </tr>
              </table>
              
            </div>
            <div class="panel-footer text-left">
              <input type="submit" class="btn btn-block btn-success" value="Submit">
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="box">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12" style="color: #79a0e0">
                <h3>Security Fund Punishment List</h3>
              </div>
              <table class="table table-bordered" id="example1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th>SL</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0; foreach ($pun as $k) {?>
                  <tr>
                    <td><?=++$i?></td>
                    <td>
                      <?php foreach ($emp as $e) {
                        if($k->empID==$e->id){
                          echo $e->name;
                        }
                      } ?>
                    </td>
                    <td><?=$k->date?></td>
                    <td><?=$k->amount?></td>
                    <td>
                      <a class="btn btn-sm btn-danger" href="<?=base_url().'Control/delete_punishment/'.$k->id?>" onclick="return confirm('are you sure?')">Delete</a>
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

</script>