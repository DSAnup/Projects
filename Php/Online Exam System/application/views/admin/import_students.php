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
        Import Students
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Admin/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12">
              <p> Download sample import file <a href="<?= base_url().'uploads/studentcsv.csv'?>">Download</a>
                <br>
                <span style="color: red;">*** Username, Password and User email is required field. </span>
              </p>
            </div>
            <form action="<?=base_url()?>Admin/uploadCsv" method="post" enctype="multipart/form-data">
              <div class="col-xs-12 col-md-12">
                <div class="col-md-10 col-md-offset-1">
                    
                  <div class="form-group">
                    <label>Upload CSV</label>
                    <input type="file" name="csvfile" class="form-control" accept=".csv">
                  </div>
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
