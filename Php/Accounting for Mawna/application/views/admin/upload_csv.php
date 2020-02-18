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
        Upload CSV
        <small>Upload CSV</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>">Upload CSV </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12" style="color: #79a0e0">
              <h3>Upload CSV </h3>
              <?php $msg=$this->session->flashdata('msg'); if(isset($msg)){echo "<h4>".$msg."</h4>";} ?>
            </div>
            <form action="<?=base_url()?>Control/csvPost" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Seelct File</th>
                      <td><input type="file" name="csv" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-md-10 col-md-offset-1">
                  
                  <div class="form-group">
                    <label></label>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
