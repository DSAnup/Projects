<?php $this->load->view('head');
$this->load->view('leftMenu');?>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Update User Information
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/user' ?>">Add user </a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/edit_user' ?>">Update user </a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/update_user" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="id" value="<?= $adm->id?>">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="<?= $adm->name?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" value="<?= $adm->email?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" value="<?= $adm->password?>">
                                            </div>
                                            <div class="form-group">
                                              <label>Status :</label><br>
                                              <label class="switch">
                                                <input type="hidden" name="status" value="0" class="form-control">
                                                <input type="checkbox" name="status" value="1" <?php if($adm->status == '1'){echo "checked";}?> class="form-control">
                                                <span class="slider round"></span>
                                              </label>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label>Type</label>
                                            <select name="type" class="form-control">
                                              <option>Select User Type</option>
                                              <?php 
                                              $ci = & get_instance();
                                              $ci->load->model('Rest_model');
                                              $userID = $this->session->userdata('userID');
                                              $dd= $this->Rest_model->SelectData_1('admin_waps','*',array('permission'=>'1','id'=>$userID));

                                              if($dd==true){
                                                ?>
                                              <option value="1" <?php if($adm->type == '1'){echo "selected";}?>>Admin</option>
                                            <?php }?>
                                              <option value="2" <?php if($adm->type == '2'){echo "selected";}?>>User</option>
                                            </select>
                                            
                                          </div>
                                            <div class="form-group">
                                                <label></label>
                                                <input type="submit" class="btn btn-primary btn-block" value="Update User">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        
                  </section>
                  <!-- /.content -->
              </div>

          </div>
          <!-- ./wrapper -->

          <?php
$this->load->view('footer');
?>