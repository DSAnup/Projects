<?php
$this->load->view('head');
?>
<style type="text/css">
    .icon_style{
        background-color: #d7efa0;
    }
    .icon_style:hover{
        background-color: #4286f4;
        color: #fff;
    }



</style>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php
$this->load->view('leftmenu');
    ?>
    <aside class="right-side">

        <section class="content-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                    <div class="header-element">
                        <h3><small><i class="menu-icon ti-desktop"></i> &nbsp; Dashboard</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-2 col-md-6 col-sm-7 col-xs-4">
                    <div class="header-object">
                        <span class="option-search pull-right hidden-xs">
                            <span class="search-wrapper">
                                <input type="text" placeholder="Search here"><i class="ti-search"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </section>



        <section class="content">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/1.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>3752</b></h3>
                                <p>Daily Visits</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span id="loadspark-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                <i class="ti-shopping-cart text-success"></i>
                            </div>
                            <div class="text-right">
                                <h3><b id="widget_count3">3251</b></h3>
                                <p>Sales status</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span class="linechart" id="salesspark-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                <i class="ti-thumb-up text-danger"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>1532</b></h3>
                                <p>Hits</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span id="visitsspark-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="flip">
                        <div class="widget-bg-color-icon card-box front">
                            <div class="bg-icon pull-left">
                                <i class="ti-user text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>1252</b></h3>
                                <p>Subscribers</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-bg-color-icon card-box back">
                            <div class="text-center">
                                <span id="subscribers-chart"></span>
                                <hr>
                                <p>Check summary</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--Icon bar start -->
               
                <a href="<?=base_url()?>/Admin/course/course">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/10.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Course List</b></h3>
                                <p>Find All Courses</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a>
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <a href="<?=base_url()?>/Admin/std_list/std">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                 <img src="<?=base_url()?>images/icons/9.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Student List</b></h3>
                                <p>Click see all students</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a>
                <!--Icon bar end-->
                <!--Icon bar start -->
                <a href="<?=base_url()?>/Admin/paid_fees/fee">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/11.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>collected Fees</b></h3>
                                <p>All collected fees list</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a>
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <a href="<?=base_url()?>/Admin/trainers/trainer">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/12.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Trainer List</b></h3>
                                <p>List of all Trainer</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a>
                <!--Icon bar end-->
                <!--Icon bar start -->
                <!--  <a href="http://localhost/sdti25-04-2017/Admin/service_news/service">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/13.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Service News</b></h3>
                                <p>Service News here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a> -->
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <!-- <a href="http://localhost/sdti25-04-2017/Admin/gallery/gl">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/14.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>All Images (Gallery)</b></h3>
                                <p>All images here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a> -->
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <!-- <a href="http://localhost/sdti25-04-2017/Admin/notice_list/n">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/15.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Notice Board</b></h3>
                                <p>Latest News here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a> -->
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <!-- <a href="http://localhost/sdti25-04-2017/Admin/person_list/manager">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/16.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Person List</b></h3>
                                <p>Total Mamagement list here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a> -->
                <!--Icon bar end-->
                <!--Icon bar start -->
                <!--  <a href="http://localhost/sdti25-04-2017/Admin/workshop/w">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/17.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Workshop</b></h3>
                                <p>Service News here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a> -->
                <!--Icon bar end-->
                <!--Icon bar start -->
                <!--  <a href="http://localhost/sdti25-04-2017/Admin/job_list/job">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/18.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Job Place</b></h3>
                                <p>Job Circular here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a> -->
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <a href="<?=base_url()?>/Admin/front/id">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/19.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>ID Card</b></h3>
                                <p>ID card ganerate</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a>
                <!--Icon bar end-->
                <!--Icon bar start -->
                 <a href="<?=base_url()?>/Admin/db_backup/db">
                <div class="col-sm-6 col-md-6 col-lg-3 ">
                    <div class="flip ">
                        <div class="widget-bg-color-icon card-box front icon_style">
                            <div class="bg-icon pull-left">
                                <img src="<?=base_url()?>images/icons/20.png" class="img-responsive" alt="work">
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b>Backup</b></h3>
                                <p>Data backup here</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>                    
                    </div>
                </div>
                </a>
                <!--Icon bar end-->
            </div>
                        <!-- /#right -->
            <div class="background-overlay"></div>
        </section>
        <!-- /.content --> </aside>
    <!-- /.right-side --> </div>
<!-- ./wrapper -->
<!-- global js -->
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