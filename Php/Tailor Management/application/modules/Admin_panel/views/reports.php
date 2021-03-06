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
                    Reports
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/reports' ?>">Add Service </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/generate_report" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Starting Date</label>
                                                <input type="date" name="date1" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="date" name="date2" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label></label>
                                                <input type="submit" class="btn btn-primary btn-block" value="Generate Reports">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
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