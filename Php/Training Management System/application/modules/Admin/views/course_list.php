<?php
$this->load->view('head');
?>
<link rel="stylesheet" type="text/css" href="<?=base_url().'datatables/media/css/jquery.dataTables.min.css'?>">
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php
        $this->load->view('leftmenu');
        ?>
        <aside class="right-side">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw ti-move"></i>  COURSE LIST
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                  <th>Name</th>
                                  <th>Duration</th>
                                  <th>Description</th>
                                  <th>Photo</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $ii=0;
                            foreach ($course as $e) {
                            ?>
                              <tr>
                              <td><?=++$ii?></td>
                                  <td><?=$e->name?></td>
                                  <td><?=$e->duration?></td>
                                  <td><?=$e->description?></td>
                                  <td><img src="<?=base_url().'course_photo/'.$e->photo?>" width="40" height="43"></td>
                                  <td><a href="<?=base_url().'Admin/view_course/'.$e->id?>">View</a> / <a href="<?=base_url().'Admin/edit_course/'.$e->id?>">Edit</a> / <a href="<?=base_url().'Admin/delete_course/'.$e->id?>">Delete</a></td>
                              </tr>

                              <?php } ?>
                            </table>
                        </div>
                    </aside>
                    <div id="qn"></div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
                    <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
                    <!-- end of global js -->

                    <!-- begining of page level js -->
                    <!--Sparkline Chart-->
                    <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- flip --->
<script type="text/javascript" src="vendors/flip/js/jquery.flip.min.js"></script>
<script type="text/javascript" src="vendors/lcswitch/js/lc_switch.min.js"></script>
<!--flot chart-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script> -->
<!--swiper-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script> -->
<!--chartjs-->
<!-- <script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script> -->
<!--nvd3 chart-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script> -->
<!-- page specific plugin scripts -->
       <!--  <script src="<?php echo base_url() ?>dist/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/jquery.dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/extensions/buttons/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/extensions/buttons/buttons.flash.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/extensions/buttons/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/extensions/buttons/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/extensions/buttons/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url() ?>dist/js/dataTables/extensions/select/dataTables.select.min.js"></script> -->
<!-- end of page level js -->
<script src='<?php echo base_url(); ?>datatables/media/js/jquery.dataTables.min.js'></script>
</body>

</html>
<script type="text/javascript">
            $(document).ready(function () {
                var base = '<?php echo base_url() ?>';
                $('.example').DataTable({
                    responsive: true,
                    sort: false
                });

            })

        </script>
        <script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>