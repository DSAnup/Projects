<?php
$this->load->view('head');
?>
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
                                <i class="fa fa-fw ti-move"></i> COURSE DETAILS
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                        <h2>Course Name: <?=$course->name?></h2>
                        <h3>Duration Of Course: <?=$course->duration?></h3>
                        <img src="<?=base_url().'course_photo/'.$course->photo?>" width="140" height="143">
                        <p style="text-align: justify-all;"><?=$course->description?></p>
                            <table class="table table-bordered dataTables">
                            <tr>
                                <th style="text-align: center;">SL NO</th>
                                <th style="text-align: center;">NANE OF PARTS</th>
                                <th style="text-align: center;">ACTION</th>
                            </tr>
                            <?php
                            $ci =&get_instance();
                            $ci->load->model('Admin_model');
                            $ii=0;
                            foreach ($heads as $k) {
                                $he=$k->id;
                                $where=array('head_id'=>$he);
                                $parts=$ci->Admin_model->SelectData('course_parts','*',$where);
                               
                            ?>
                              <tr style="background: #c7d4e8">
                                  <th colspan="3" style="text-align: center;"><?=$k->head?></th>
                              </tr>
                              <?php
                              foreach ($parts as $ke) {
                              ?>
                              <tr>
                                  <td align="center"><?=++$ii?></td>
                                  <td><?=$ke->parts?></td>
                                  <td align="center">
                                  <a href="<?=base_url().'Admin/edit_parts/'.$ke->id.'_'.$course->id?>">Edit</a> / 
                                  <a href="<?=base_url().'Admin/delete_parts/'.$ke->id.'_'.$course->id?>" style="color: red">Delete</a>
                                  </td>
                              </tr>
                              <?php }} ?>
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
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
<!--swiper-->
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script>
<!--chartjs-->
<script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script>
<!--nvd3 chart-->
<script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script>
<!-- end of page level js -->

</body>

</html>