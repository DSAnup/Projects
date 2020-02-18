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
                                <i class="fa fa-fw ti-move"></i> ADD COURSE
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?=base_url().'Admin/add_coruse_post'?>" method="post" role="form" enctype="multipart/form-data">
                                <table class="table table-bordered dataTables">
                                    <tr>
                                        <th width="70px">Course Category</th>
                                        <td>
                                            <select class="form-control" name="category">
                                                <option>Select Category</option>
                                                <?php
                                                foreach ($category as $e) {
                                                    ?>
                                                    <option value="<?=$e->id?>"><?=$e->category?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Name</th>
                                            <td><input type="text" class="form-control" name="name"></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Duration</th>
                                            <td><input type="text" class="form-control" name="duration"></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Description</th>
                                            <td><textarea class="form-control" name="description" rows="5"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Photo</th>
                                            <td><input type="file" class="form-control" name="userfile"></td>
                                        </tr>
                                        <!-- <tr>
                                            <th width="70px">Schedule <br><a href="#" class="btn btn-success" onclick="append_schedule()">+</a></th>
                                            <td>
                                                <table class="table table-bordered" id="sh">
                                                    <tr id="r0">
                                                        <th>Days</th>
                                                        <td><input type="text" name="Enter Days" class="form-control"></td>
                                                        <th>Time Slot</th>
                                                        <td><input type="text" name="Enter Time slot " class="form-control"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <th width="70px"></th>
                                            <td align="center"><input type="submit" value="Submit" class="btn btn-success"></td>
                                        </tr>
                                    </table>
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
<script type="text/javascript">
var i=0;
    function append_schedule(){
        i+=1;
        var html='<tr id="r'+i+'">'
            html+='<th>Days</th>'
            html+='<td><input type="text" name="Enter Days" class="form-control"></td>'
            html+='<th>Time Slot</th>'
            html+='<td><input type="text" name="Enter Time slot " class="form-control"></td>'
            html+='</tr>'
            $('#sh').append(html)
    }
</script>
                    </html>