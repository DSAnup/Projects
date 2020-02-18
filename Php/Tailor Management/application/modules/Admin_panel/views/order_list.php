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
                    Customer List
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer' ?>">Add Customer </a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer_list' ?>"> Customer List</a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Invoice ID</th>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>Total</th>
                                                    <th>Discount</th>
                                                    <th>Grand Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($order_list as $s) {?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->invoice_number  ?></td>
                                                  <td><?= $s->cust_number?></td>
                                                  <td><?= $s->name;?></td>
                                                  <td><?= $s->total;?></td>
                                                  <td><?= $s->discount;?></td>
                                                  <td><?= $s->grand_total;?></td>
                                                  <td>
                                                    <a href="<?=base_url().'Admin_panel/ShoppingCart/print_order_group/'.$s->id?>" class="btn btn-warning" target="_blank"><i class="fa fa-file-pdf-o"></i> 
                                                    <?php 
                                                    $ci = & get_instance();
                                                    $ci->load->model('Rest_model');
                                                    $userID = $this->session->userdata('userID');
                                                    $dd= $this->Rest_model->SelectData_1('admin_waps','*',array('type'=>'1','id'=>$userID));
                                                    $ddd= $this->Rest_model->SelectData_1('admin_waps','*',array('permission'=>'1','id'=>$userID));

                                                    if($dd==true || $ddd== true){
                                                      ?>
                                                     <a href="<?=base_url().'Admin_panel/ShoppingCart/del_order_group/'.$s->id?>" class="btn btn-danger " onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i>
                                                    <?php }?>
                                                    </td>
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