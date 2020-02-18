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
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw ti-move"></i> SERVICE NEWS LIST
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                        <table class="table table-bordered">
                        <form action="<?=base_url().'Admin/edit_service_news_post'?>" method="post" enctype="multipart/form-data">
                            <tr>
                                <th>Service category</th>
                                <td>
                                    <select class="form-control" name="service_type">
                                        <option>Select category</option>
                                        <?php 
                                            foreach ($type as $k) {
                                        ?>
                                            <option value="<?=$k->id?>" <?php if($k->id==$news->service_type){ echo "selected";} ?>><?=$k->service?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Headline</th>
                                <input type="hidden" name="id" value="<?=$news->id?>">
                                <td><input type="text" value="<?=$news->head?>" name="head" class="form-control" placeholder="Headline"></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea class="form-control" rows="6" name="news"><?=$news->news?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td>
                                <img src="<?=base_url().'service_files/'.$news->photo?>" width="100" height="100">
                                    <input type="file" name="photo" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" value="Submit" class="btn btn-primary"></td>
                            </tr>
                            </form>
                        
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
<script type="text/javascript">
    function set_approve(id){
        var i=id.split('_');
        var price=$('#price_'+i[1]).val()
        html='<a href="<?=base_url().'Admin/approve/'?>'+id+'_'+price+'" class="btn btn-primary">Approve</a>'
        
        $('#td_'+i[1]).html(html)
    }
</script>