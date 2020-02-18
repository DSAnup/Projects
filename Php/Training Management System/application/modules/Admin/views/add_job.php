<?php
$this->load->view('head');
?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php
        $this->load->view('leftmenu');
        ?>
        <aside class="right-side">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw ti-move"></i> ADD NOTICE
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="<?=base_url().'Admin/job_post'?>" method="post">
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label">Post Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="post" class="form-control" id="input-text" placeholder="Add Title  Here" required>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label">Vacancy</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="vacancy" class="form-control" id="input-text" placeholder="Add Title  Here" required>
                                    </div>
                                </div>                                            
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Description
                                    </label>
                                    <div class="col-sm-10 col-md-10">
                                        <textarea rows="8" name="details" class="form-control resize_vertical" placeholder="Description"></textarea>
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label"> </label>
                                    <div class="col-sm-10">
                                    
                                        <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-md"
                                        data-loading-text="Saving Notice" value="Submit">
                                    </div>
                                </div>                              
                                
                             
                            </form>
                            </div>
                        </aside>
                        <div id="qn"></div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
                        <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script>
                        <script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
                        <script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script>
                    </body>

                    </html>