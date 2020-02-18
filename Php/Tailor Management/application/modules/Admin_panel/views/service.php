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
                    Add New Style / Services
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/service' ?>">Add Service </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/add_serviceservice" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label>Stock</label>
                                                <input type="text" name="stock" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Buying Price</label>
                                                <input type="text" name="buyprice" class="form-control">
                                            </div> -->
                                            <div class="form-group">
                                                <label></label>
                                                <input type="submit" class="btn btn-primary btn-block" value="Add Service">
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
                                            <h3>Style List</h3>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <!-- <th>Stock</th>
                                                    <th>Name</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $i=0; foreach ($service as $s) {?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->name?></td>
                                                  
                                                  <td><a href="<?=base_url().'Admin_panel/edit_serivce/'.$s->id?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</td>
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
<!-- <script type="text/javascript">
  $('#example1').dataTable( {
  "searching": true
} );
</script> -->