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
                            <i class="fa fa-fw ti-move"></i> Workshop List
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
                                    <th>Seminar Topics</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Trainer</th>
                                    <th>Start Date</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                foreach($query as $q){
                                    ?>
                                    <tr>
                                        <td><?=++$i?></td>
                                        <td><?=$q->name?></td>
                                        <td><?=$q->duration?></td>
                                        <td><?=$q->price?></td>
                                        <td><?=$q->trainer?></td>
                                        <td><?=$q->date?></td>
                                        <td><?=$q->details?></td>
                                        <td>
                                            <a href="<?=base_url().'Admin/edit_workshop/'.$q->id?>">Edit</a> / <a href="<?=base_url().'Admin/delete_workshop/'.$q->id?>"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                            <form class="form-horizontal" action="<?=base_url().'Admin/add_workshop'?>" method="post" role="form" enctype="multipart/form-data">

                              <div class="form-group">
                                <label for="input-text" class="col-sm-2 control-label">Name :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="input-text" placeholder="Input Your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">
                                    Details :
                                </label>
                                <div class="col-sm-10 col-md-10">
                                    <textarea name="details" rows="4" class="form-control resize_vertical"
                                    placeholder="Datails Here"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-text" class="col-sm-2 control-label">Trainer :</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="trainer">
                                        <option>Select Trainer</option>
                                        <?php
                                        foreach ($trainer as $t) {
                                            ?>
                                            <option value="<?=$t->id?>"><?=$t->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label">Duration :</label>
                                    <div class="col-sm-10">

                                        <input type="text" name="duration" class="form-control pull-right" id="date-range0" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label">Date :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="date" class="form-control" id="datetime1" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label">Price :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="price" class="form-control" id="datetime1" placeholder="Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-text" class="col-sm-2 control-label"> </label>
                                    <div class="col-sm-10">

                                                    <!-- <a href="#" class="col-xs-12 btn btn-primary btn-load btn-md"
                                                    data-loading-text="Changing Password...">Submit</a> -->
                                                    <input type="Submit" name="" class="col-xs-12 btn btn-primary btn-load btn-" value="Submit">
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
                                                <i class="fa fa-fw ti-move"></i> Edit Workshop
                                            </h3>
                                            <span class="pull-right">
                                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                                            </span>
                                        </div>
                                        <form class="form-horizontal" action="<?=base_url().'Admin/update_workshop'?>" method="post" role="form" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php if (isset($q)) {
                                                echo $q->id;
                                            } ?>">
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Name :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="<?php if(isset($q)){ echo $q->name; } ?>" name="name" id="input-text" placeholder="Input Your Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">
                                                    Details :
                                                </label>
                                                <div class="col-sm-10 col-md-10">
                                                    <textarea name="details" rows="4" class="form-control resize_vertical"
                                                    placeholder="Datails Here"><?php if(isset($q)){ echo $q->details;} ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input-text" class="col-sm-2 control-label">Trainer :</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="trainer">
                                                        <option>Select Trainer</option>
                                                        <?php
                                                        foreach ($trainer as $t) {
                                                            ?>
                                                            <option value="<?=$t->id?>" <?php if(isset($q)){ if($q->t_id==$t->id){ echo 'selected';}} ?>><?=$t->name?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-text" class="col-sm-2 control-label">Duration :</label>
                                                    <div class="col-sm-10">

                                                        <input type="text" name="duration" class="form-control pull-right" id="date-range0" value="<?php if(isset($q)){ echo $q->duration;} ?>" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-text" class="col-sm-2 control-label">Date :</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="date" value="<?php if(isset($q)){ echo $q->date;} ?>" class="form-control" id="datetime1" placeholder="Date">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-text" class="col-sm-2 control-label">Price :</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="price" value="<?php if(isset($q)){ echo $q->price;} ?>" class="form-control" id="datetime1" placeholder="Price">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-text" class="col-sm-2 control-label"> </label>
                                                    <div class="col-sm-10">

                                                    <!-- <a href="#" class="col-xs-12 btn btn-primary btn-load btn-md"
                                                    data-loading-text="Changing Password...">Submit</a> -->
                                                    <input type="Submit" name="" class="col-xs-12 btn btn-primary btn-load btn-" value="Submit">
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
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>