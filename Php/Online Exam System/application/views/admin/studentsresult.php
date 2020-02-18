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
         Students Result
        <small>Students Result</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Admin/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="<?= base_url() . 'Admin/admin_list' ?>">Add Admin </a></li> -->

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
                <?php if($this->session->flashdata('item') || $this->session->flashdata('item2')){?>  
                <p style="background-color:powderblue; color: green; text-align:center; padding:3px; font-size: 12px;"><?php echo $this->session->flashdata('item'); ?></p><br>
                <p style="background-color:powderblue; color: green; text-align:center; padding:3px; font-size: 12px;"><?php echo $this->session->flashdata('item2'); ?></p>
                <?php }?>
              </div>
              <table id="example1" class="table table-bordered table-striped" border="1">
                <thead style="background-color: #79a0e0">
                  <tr>
                    <th width="5%">SL</th>
                    <th width="20%">Name</th>
                    <th width="20%">Course / Lesson</th>
                    <th width="10%">Date</th>
                    <th width="30%">Action</th>
                  </tr>
                </thead>
                <tbody id="itembody">
                  <?php
                    $i=0;
                        foreach ($enrollment as $k) {
                    ?>
                    <tr>
                        <td><?=++$i?></td>
                        <td><?php
                          foreach($studentup as $sp){
                            if($k->std_id == $sp->id){
                              echo $sp->username;
                            }
                          }
                        ?></td>
                        <td><?php
                          foreach($course as $c){
                            if($k->course_id == $c->id){
                              echo $c->name;
                            }
                          }
                        ?></td>
                        <td><?= $k->date; ?></td>
                        <td>
                            <a href="<?=base_url().'Admin/result2/'.$k->enroll_id?>" class="btn btn-primary">View Result</a> 
                            <?php
                            if ($k->published=='') {
                            ?><span>
                            <a href="<?=base_url().'Admin/publish/'.$k->enroll_id?>" class="btn btn-primary">Publish Result</a></span>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-success">Published</a>
                            <?php } ?><span>
                            <a href="<?=base_url().'Admin/reset/'.$k->enroll_id?>" class="btn btn-danger">Reset</a></span>
                            <?php
                            if ($k->published!='') {
                            ?><span>
                              <?php if($k->mailstatus == 0){?>
                            <a href="<?=base_url().'Admin/send/'.$k->enroll_id?>" class="btn btn-info">Send Email</a></span>
                          <?php }else{?>
                            <a href="<?=base_url().'Admin/send/'.$k->enroll_id?>" class="btn btn-info">Resend</a></span>
                          <?php } }?>
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
