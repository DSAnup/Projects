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
        Import Quizs
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
              <p> Download sample import file <a href="<?= base_url().'uploads/quizupload.csv'?>">Download</a>
                <br>
                <span style="color: red;">*** Lesson Value, Subject Value required field. You need put only value not type to chapter/Lesson/subject name. Answer field, lesson, subject field contain numeric value. List are given bellow. </span>
              </p>
            </div>
            <form action="<?=base_url()?>Admin/uploadCsv2" method="post" enctype="multipart/form-data">
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
      <div class="row">
        <div class="box">
          <div class="box-body">
            <div class="col-md-12">
              <h4>Subject & Lesson / Chapter List (Value)</h4>
              <hr>
              <ul>
                <?php $i=0; foreach($subject as $e){$i++;?>
                <li><?= $e->name; ?> (<?= $e->id; ?>)</li>

                  <ul>
                    <?php 
                          $dd = $this->DS->SelectData('course','*', array('subject'=>$e->id));
                          foreach ($dd as $k) {?>
                    <li><?= $k->name; ?> (<?= $k->id; ?>)</li>
                  <?php }?>
                  </ul>
              <?php }?>
              </ul>
              
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
