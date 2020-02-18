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
                                        <i class="fa fa-fw ti-move"></i> Batch List
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw ti-angle-up clickable"></i>
                                        <i class="fa fa-fw ti-close removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
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
                                            <form class="form-horizontal" action="<?=base_url().'Admin/add_batch'?>" method="post" role="form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="input-text" class="col-sm-2 control-label">Course Name :</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="courseID">
                                                            <option>Select Course</option>
                                                            <?php
                                                            foreach ($course as $e) {
                                                                ?>
                                                                <option value="<?=$e->id?>"><?=$e->name?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-text" class="col-sm-2 control-label">Batch Name:
                                                            <a href="#" class="btn btn-primary" onclick="aaddItem()">+</a>
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="batch_name[]" class="form-control" id="input-text" placeholder="Batch Name " required>
                                                        </div>
                                                    </div>
                                                    <span id="item"></span>
                                                    <div class="form-group">

                                                        <label for="input-text" class="col-sm-2 control-label"> </label>
                                                        <div class="col-sm-10">
                                                            <input type="Submit" name="" class="col-xs-12 btn btn-primary btn-load btn-md">
                                                        </div>
                                                    </div>                  
                                                </form>
                                            </div>
                                        </div>


                                    </div>
</div>
                                    <table class="table table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Course Name</th>
                                                <th>Batch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            $ci =& get_instance();
                                            $ci->load->model('Admin_model');
                                            foreach ($course as $c) {
                                                ?>
                                                <tr>
                                                    <td><?=++$i?></td>
                                                    <td><?=$c->name?></td>
                                                    <td>
                                                        <table class="table table-bordered">
                                                            <?php
                                                            $where=array('courseID'=>$c->id);
                                                            $ba=$ci->Admin_model->SelectData('batch','*',$where);
                                                            foreach ($ba as $s) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?=$s->batch_name?>
                                                                    </td>
                                                                    <td>

                                                                    <a href="<?=base_url().'Admin/delete_batch/'.$s->id?>" style="color: red">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                

                                                                <?php } ?>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script> -->
<!--swiper-->
<!-- <script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script -->>
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
 i=1;
 function aaddItem(){
    html='<div class="form-group" id="'+i+'">'
    html+='<label for="input-text" class="col-sm-2 control-label">'
    html+='<a href="#" class="btn btn-danger" onclick="removeItem('+i+')">-</a>--:'+i
    html+='</label>'
    html+='<div class="col-sm-10">'
    html+='<input type="text" name="batch_name[]" class="form-control" id="input-text" placeholder="Batch Name " required>'
    html+='</div>'
    html+='</div>'
    $('#item').append(html)
    i+=1;
}
function removeItem(id)
{
    $('#'+id).remove()
    i-=1
}
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>