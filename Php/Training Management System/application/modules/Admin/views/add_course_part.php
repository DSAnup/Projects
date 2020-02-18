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
                                <i class="fa fa-fw ti-move"></i> ADD COURSE PARTS
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?=base_url().'Admin/add_coruse_part_post'?>" method="post" role="form" enctype="multipart/form-data">
                                <table class="table table-bordered dataTables" id="paa">
                                    <tr>
                                        <th width="70px">Course </th>
                                        <td>
                                            <select class="form-control" name="course_id">
                                                <option>Select Course</option>
                                                <?php
                                                foreach ($course as $e) {
                                                    ?>
                                                    <option value="<?=$e->id?>"><?=$e->name?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Head Title</th>
                                            <td><input type="text" class="form-control" name="head"></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Parts</th>
                                            <td><textarea class="form-control" name="parts[]" rows="5"></textarea></td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table table-bordered dataTables">
                                        <tr>
                                            <th width="70px"><a href="#" onclick="appendItem()" class="btn btn-sm btn-primary">+</a></th>
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
                        <script type="text/javascript" src="<?=base_url()?>DataTables-1.10.9/jquery.dataTables.min.js"></script>
                    </body>

                    </html>
                    <script type="text/javascript">
                    var i=0;
                        function appendItem(){
                            var html='<tr id="t'+i+'">'
                                html+='<th width="70px">Parts</th>'
                                html+='<td><textarea class="form-control" name="parts[]" rows="5"></textarea></td>'
                                html+='<th><a href="#" onclick="RemoveItem('+i+')" class="btn btn-sm btn-danger">-</a></th>'
                                html+='</tr>'
                                $('#paa').append(html)
                        }
                        function RemoveItem(id){
                            $('#t'+id).remove()
                        }
                    </script>