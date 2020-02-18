<?php
$this->load->view('head');
?>
<link rel="stylesheet" type="text/css" href="<?=base_url().'datatables/media/css/jquery.dataTables.min.css'?>">
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
                                <i class="fa fa-fw ti-move"></i> ADD TESTIMONIAL
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="<?=base_url().'Admin/add_testimonial_post'?>" method="post" role="form" enctype="multipart/form-data">
                                <table class="table table-bordered dataTables">
                                  
                                        <tr>
                                            <th width="70px">Name</th>
                                            <td><input type="text" class="form-control" name="name"></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Designation</th>
                                            <td><input type="text" class="form-control" name="designation"></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Photo</th>
                                            <td><input type="file" class="form-control" name="photo"></td>
                                        </tr>
                                        <tr>
                                            <th width="70px">Message</th>
                                            <td>
                                                <textarea name="msg" cols="5" rows="5" class="form-control"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="70px"></th>
                                            <td align="center"><input type="submit" value="Submit" class="btn btn-success"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                            <div class="panel-body">
                            <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                  <th>Name</th>
                                  <th>Designation</th>
                                  <th>Message</th>
                                  <th>Photo</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=0;
                            foreach ($query as $k) {
                            ?>
                            <tr>
                                <td><?=++$i?></td>
                                <td><?=$k->name?></td>
                                <td><?=$k->designation?></td>
                                <td><?=$k->msg?></td>
                                <td><img src="<?=base_url().'testimonial_photo/'.$k->photo?>" width="50" height="55"></td>
                                <td>
                                    <a href="<?=base_url().'Admin/edit_testimonial/'.$k->id?>">Edit</a> / 
                                    <a href="<?=base_url().'Admin/delete_testimonial/'.$k->id?>" style="color: red">Delete</a> / 
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </table>
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
                       <!--  <script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script> -->
                        <script src='<?php echo base_url(); ?>datatables/media/js/jquery.dataTables.min.js'></script>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable').DataTable();
  } );
</script>
                    </html>