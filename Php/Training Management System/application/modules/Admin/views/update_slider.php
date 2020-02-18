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
                              
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel" style="display: <?php if($this->session->userdata('update')=='yes'){echo 'none';} ?>">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw ti-move"></i> Add Slider
                                        </h3>
                                        <span class="pull-right">
                                            <i class="fa fa-fw ti-angle-up clickable"></i>
                                            <i class="fa fa-fw ti-close removepanel clickable"></i>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" action="<?=base_url().'Admin/add_slider'?>" method="post" role="form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Main Caption :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="main_caption" class="form-control" id="input-text" placeholder="Your Main Caption Here" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Sub Caption :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sub_caption" class="form-control" id="input-text" placeholder="Your Sub Caption Here" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Details :
                                                </label>
                                                <div class="col-sm-10 col-md-10">
                                                    <textarea rows="4" name="description" class="form-control resize_vertical"
                                                    placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Slide Style :
                                                </label>
                                                <div class="col-sm-10 col-md-10">
                                                    <select class="form-control" name="position">
                                                        <option>Select Style</option>
                                                        <option value="1">First</option>
                                                        <option value="2">Second</option>
                                                        <option value="3">Third</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Images : </label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="userfile" class="alert alert-info"id="input-21">

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
                                <?php
                                $se=$this->session->userdata('update');
                                if(isset($se)){
                                    $s='yes';
                                }else{
                                    $s='no';
                                }

                                ?>
                                <div style="display: <?php if($s=='no'){ echo 'none'; } ?>">
                                    <div class="panel" >
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="fa fa-fw ti-move"></i> Edit Slider
                                            </h3>
                                            <span class="pull-right">
                                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                                            </span>
                                        </div>
                                        <form class="form-horizontal" action="<?=base_url().'Admin/update_slider'?>" method="post" role="form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php if(isset($q)){ echo $q->id;}?>">
                                                <label for="input-text" class="col-sm-2 control-label">Main Caption :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="main_caption" class="form-control" id="input-text" placeholder="Your Main Caption Here" required value="<?php if(isset($q)){ echo $q->main_caption;}?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Sub Caption :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="sub_caption" class="form-control" id="input-text" placeholder="Your Sub Caption Here" required value="<?php if(isset($q)){echo $q->sub_caption;}?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Details :
                                                </label>
                                                <div class="col-sm-10 col-md-10">
                                                    <textarea rows="4" name="description" class="form-control resize_vertical"
                                                    placeholder="Description"><?php if(isset($q)){ echo $q->description;}?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Slide Style :
                                                </label>
                                                <div class="col-sm-10 col-md-10">
                                                    <select class="form-control" name="position">
                                                        <option>Select Position</option>
                                                        <option value="1" <?php if(isset($q)){ if($q->position==1){ echo 'selected';}} ?>>First</option>
                                                        <option value="2" <?php if(isset($q)){ if($q->position==2){ echo 'selected';}} ?>>Second</option>
                                                        <option value="3" <?php if(isset($q)){ if($q->position==3){ echo 'selected';}} ?>>Third</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Images : </label>
                                                <div class="col-sm-10">
                                                    <img src="<?php if(isset($q)){ echo base_url().'sliders/'.$q->photo; }?>" height="70" width="80">
                                                    <input type="file" name="userfile" class="alert alert-info"id="input-21">

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