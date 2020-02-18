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
                                <i class="fa fa-fw ti-move"></i> SERVICE NEWS LIST
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                        <table class="table table-bordered">
                        <form action="<?=base_url().'Admin/add_service_news_post'?>" method="post" enctype="multipart/form-data">
                            <tr>
                                <th>Service category</th>
                                <td>
                                    <select class="form-control" name="service_type">
                                        <option>Select category</option>
                                        <?php 
                                            foreach ($type as $k) {
                                        ?>
                                            <option value="<?=$k->id?>"><?=$k->service?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Headline</th>
                                <td><input type="text" name="head" class="form-control" placeholder="Headline"></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea class="form-control" rows="6" name="news"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                    <input type="file" name="photo" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" value="Submit" class="btn btn-primary"></td>
                            </tr>
                            </form>
                        </table>
                            <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                  <th>SL</th>
                                  <th>News Headline</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $ii=0;
                            foreach ($service as $e) {
                            ?>
                              <tr>
                                  <td><?=++$ii?></td>
                                  <td><?=$e->head?></td>
                                  <td>
                                  <a href="<?=base_url().'Admin/view_service_news/'.$e->id?>" >View</a> / 
                                  <a href="<?=base_url().'Admin/edit_service_news/'.$e->id?>" >Edit</a> / 
                                      <a href="<?=base_url().'Admin/delete_service_news/'.$e->id?>" style="color: red">Delete</a>
                                  </td>
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
<!-- end of page level js -->
<script src='<?php echo base_url(); ?>datatables/media/js/jquery.dataTables.min.js'></script>
</body>

</html>
<script type="text/javascript">
    function set_approve(id){
        var i=id.split('_');
        var price=$('#price_'+i[1]).val()
        html='<a href="<?=base_url().'Admin/approve/'?>'+id+'_'+price+'" class="btn btn-primary">Approve</a>'
        
        $('#td_'+i[1]).html(html)
    }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>