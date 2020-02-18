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
                            <div class="panel" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw ti-move"></i> Add Image
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw ti-angle-up clickable"></i>
                                        <i class="fa fa-fw ti-close removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?=base_url().'Admin/add_gallery'?>" method="post" role="form" enctype="multipart/form-data">

                                        <div class="form-group">
                                         <label for="input-text" class="col-sm-2 control-label">Category : </label>
                                         <div class="col-sm-10">
                                            <select class="form-control" name="category">
                                                <option>Select category</option>
                                                <option value="Photos">Photos</option>
                                                <option value="Campus">Campus</option>
                                                <option value="Students">Students</option>
                                                <option value="photo">Student's Activity</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-text" class="col-sm-2 control-label">Images : </label>
                                        <div class="col-sm-10">
                                            <input type="file" name="userfile[]" multiple class="alert alert-info"id="input-21">

                                        </div>
                                        <label for="input-text" class="col-sm-2 control-label"> </label>
                                        <div class="col-sm-10">

                                            <!-- <a href="#" class="col-xs-12 btn btn-primary btn-load btn-md">Submit</a> -->
                                            <input type="Submit" name="" class="col-xs-12 btn btn-primary btn-load btn-md">
                                        </div>
                                    </div>                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw ti-move"></i> Gallery
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                    <i class="fa fa-fw ti-close removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <h3>Photos</h3>
                                    <?php
                                    foreach ($photo as $e) {
                                        ?>
                                        <div class="col-sm-2 col-md-1" style="text-align: center; margin: 3px">
                                            <img src="<?=base_url().'gallery/'.$e->photo?>" width="100" height="120"><br><a href="<?=base_url().'Admin/delete_gallery/'.$e->id?>">Delete</a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <h3>Campus</h3>
                                        <?php
                                        foreach ($campus as $e1) {
                                            ?>
                                            <div class="col-sm-2 col-md-1" style="text-align: center; margin: 3px">
                                                <img src="<?=base_url().'gallery/'.$e1->photo?>" width="100" height="120"><br><a href="<?=base_url().'Admin/delete_gallery/'.$e1->id?>">Delete</a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>Students</h3>
                                            <?php
                                            foreach ($student as $e12) {
                                                ?>
                                                <div class="col-sm-2 col-md-1" style="text-align: center; margin: 3px">
                                                    <img src="<?=base_url().'gallery/'.$e12->photo?>" width="100" height="120"><br><a href="<?=base_url().'Admin/delete_gallery/'.$e12->id?>">Delete</a>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-12">
                                            <h3>Student's Work</h3>
                                            <?php
                                            foreach ($std_work as $e1211) {
                                                ?>
                                                <div class="col-sm-2 col-md-1" style="text-align: center; margin: 3px">
                                                    <img src="<?=base_url().'gallery/'.$e1211->photo?>" width="100" height="120"><br><a href="<?=base_url().'Admin/delete_std_work/'.$e1211->id?>">Delete</a>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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