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
                    Add New Customer
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer' ?>">Add Customer </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/add_customer" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>                                         
                                          <div class="form-group">
                                            <label>Gender</label>
                                            <select name="sex" class="form-control">
                                              <option>Select Gender</option>
                                              <option value="0">Male</option>
                                              <option value="1">Female</option>
                                            </select>
                                            
                                          </div>
                                            <div class="form-group">
                                                <label>Photo</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" class="form-control ckeditor"></textarea>
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
                                            <h3>Customer List</h3>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Images</th>
                                                    <th>Measurment</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($customer as $s) {?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->cust_number?></td>
                                                  <td><?= $s->name;?></td>
                                                  <td><?= $s->phone;?></td>
                                                  <td><?php if($s->image == '' && $s->sex=='0'){?>
                                                    <img src="<?= base_url().'uploads/'.'noman.gif'?>" style="height: 50px; width: 80px;">            
                                                  <?php }elseif($s->image == '' && $s->sex=='1'){?>
                                                    <img src="<?= base_url().'uploads/'.'nowoman.jpg'?>" style="height: 50px; width: 80px;"> 
                                                  <?php }else{?>
                                                  <img src="<?= base_url().'uploads/customer/'.$s->image?>" style="height: 50px; width: 80px;">
                                                 <?php }?> 
                                                </td>
                                                  <td><a href="<?=base_url().'Admin_panel/add_measurement/'.$s->id?>" class="btn btn-info"><i class="fa fa-plus"></i> Measurement</td>
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
