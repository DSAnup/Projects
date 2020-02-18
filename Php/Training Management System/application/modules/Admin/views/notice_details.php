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
                            <h1><?=$notice->title?></h1>
                            <em>Published On: <strong><?=$notice->date?></strong></em>
                            <hr>
                            <?php
                            if ($notice->file!=='') {
                                ?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="<?=base_url().'notice_files/'.$notice->file?>" class="embed-responsive-item"  frameborder="0"></iframe>
                                </div>
                                <?php } ?>
                                <p style="text-align: justify"><?=$notice->description?></p>
                                <?php
                                if ($notice->photo!=='') {
                                    ?>
                                    <img src="<?=base_url().'notice_files/'.$notice->photo?>" >
                                    <?php } ?>
                                    
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