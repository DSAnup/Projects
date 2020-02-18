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
                            <i class="fa fa-fw ti-move"></i> ADD COURSE SCHEDULE
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removepanel clickable"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="<?=base_url().'Admin/add_slot_post'?>" method="post" role="form" enctype="multipart/form-data">
                            <table class="table table-bordered dataTables">
                                <tr>
                                    <th width="70px">Course </th>
                                    <td>
                                        <select class="form-control" name="course_id" disabled>
                                            <option>Select Course</option>
                                            <?php
                                            foreach ($course as $e) {
                                                ?>
                                                <option value="<?=$e->id?>" <?php if($e->id==$days->course_id){ echo "selected";} ?>><?=$e->name?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th width="70px">Day(s)</th>
                                        <input type="hidden" name="days_id" value="<?=$days->id?>">
                                        <td><input type="text" disabled name="days" value="<?=$days->days?>" class="form-control" placeholder="Enter Days Here"></td>
                                    </tr>
                                    <tr>
                                        <th>Time Slot<br><a href="#" class="btn btn-success" onclick="append_schedule()">+</a></th>
                                        <td>
                                            <table class="table table-bordered" id="sh">
                                                <tr id="r0">
                                                    <td><input type="text" name="slot[]" class="form-control" placeholder="Enter Time Slots Here"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="70px"></th>
                                        <td align="center"><input type="submit" value="Submit" class="btn btn-success"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw ti-move"></i> COURSE SCHEDULE
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?=base_url().'Admin/add_schedule'?>" method="post" role="form" enctype="multipart/form-data">
                                <table class="table table-bordered dataTables">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Course Name</th>
                                            <th>Days</th>
                                            <th>Time Slots</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                        $ci =& get_instance();
                                        $ci->load->model('Admin_model');
                                        $i=0;
                                        foreach ($course as $v) {
                                            ?>
                                            <tr>
                                                <td><?=++$i?></td>
                                                <td><?=$v->name?></td>
                                                <td colspan="3">
                                                    <table class="table table-bordered">
                                                        <?php
                                                        $id=$v->id;
                                                        $where=array('course_id'=>$id);
                                                        $dd=$this->Admin_model->SelectData('schedule_days','*',$where);
                                                        foreach ($dd as $s) {
                                                            $ids=$s->id;
                                                            $where_1=array('schedule_id'=>$ids);
                                                            $dds=$this->Admin_model->SelectData('time_slots','*',$where_1);
                                                            $count=count($dds);
                                                            ?>
                                                            <tr>
                                                                <th rowspan="<?=$count+1?>">
                                                                <?=$s->days?><br>
                                                                    <a href="<?=base_url().'Admin/delete_days/'.$s->id?>" style="color: red">Delete</a> / <a href="<?=base_url().'Admin/add_slot/'.$s->id?>" style="color: green">ADD SLOT</a>
                                                                </th>
                                                            </tr>

                                                            <?php
                                                            foreach ($dds as $k) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$k->slot?></td>
                                                                    <td>
                                                                        <a href="<?=base_url().'Admin/edit_time_slot/'.$k->id?>">Edit  </a> / 
                                                                        <a href="<?=base_url().'Admin/delete_time_slot/'.$k->id?>" style="color: red">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                
                                                                <?php } ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>   
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                <script type="text/javascript">
                    var i=0;
                    function append_schedule(){
                        i+=1;
                        var html='<tr id="r'+i+'">'
                        html+='<td><input type="text" name="slot[]" class="form-control" placeholder="Enter Time Slots Here"></td>'
                        html+='</tr>'
                        $('#sh').append(html)
                    }
                </script>
                </html>