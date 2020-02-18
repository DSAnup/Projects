<?php $this->load->view('head');
$this->load->view('leftMenu');?>
    <div class="wrapper">

        <<!-- ?php
        $this->load->view('leftMenu');
        ?> -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Add New User
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/user' ?>">Add user </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/add_user" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>

                                            <div class="form-group">
                                              <label>Status :</label><br>
                                              <label class="switch">
                                                <input type="hidden" name="status" value="0" class="form-control">
                                                <input type="checkbox" name="status" value="1" class="form-control">
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
                                              <option value="1">Admin</option>
                                            <?php }?>
                                              <option value="2">User</option>
                                            </select>
                                            
                                          </div>
                                          
                                            <div class="form-group">
                                                <label></label>
                                                <input type="submit" class="btn btn-primary btn-block" value="Add User">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        </div>
                      </div>
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            <h3>User List</h3>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th width="5%">SL</th>
                                                    <th width="10%">Name</th>
                                                    <th width="15%">Email</th>
                                                    <th width="15%">Status</th>
                                                    <th width="25%">Last Login</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($adm as $s) {?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->name;?></td>
                                                  <td><?= $s->email;?></td>
                                                  <td><?php
                                                  if ($s->status == 1) {
                                                    ?>
                                                    <span class="label label-success">Active</span>
                                                    <?php
                                                  } else {
                                                    ?>
                                                    <span class="label label-danger">Inactive</span>   
                                                    <?php
                                                  }
                                                  ?></span>
                                                  </label></td>
                                                  <td><?= $s->lastlogin;?></td>
                                                  <td><a href="<?=base_url().'Admin_panel/edit_user/'.$s->id?>">Edit |<a href="<?=base_url().'Admin_panel/delete_user/'.$s->id?>" onclick="return confirm('are you sure?')" style="color:red">Delete</a></td>
                                              </tr>
                                              <?php } ?>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
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
