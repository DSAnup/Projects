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
                                <i class="fa fa-fw ti-move"></i> DUE PAYMENT LIST
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered dataTables">
                            <form action="<?=base_url().'Admin/collection_post'?>" method="post">
                            <tr>
                                <th># Enrollment ID:</th>
                                <td><input type="text" name="enroll_id" class="form-control"  id="enroll_id" onkeyup="get_payment_info($(this).val())"></td>
                                <th>Name:</th>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td id="email"></td>
                                <th>Mobile:</th>
                                <td id="mobile"></td>
                            </tr>
                            <tr>
                                <th>Service Name:</th>
                                <td id="course"></td>
                                <th>Batch:</th>
                                <td id="batch"></td>
                            </tr>
                            <tr>
                                <th>Due Amount:</th>
                                <td id="due"></td>
                                <th>Payment:</th>
                                <td><input type="text" name="amount" class="form-control" placeholder="Enter Amount"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <input type="checkbox" name="fee" value="yes">Course fee &nbsp; &nbsp;<input type="checkbox" name="licence" value="yes">Driving licence fee &nbsp; &nbsp; &nbsp;<input type="checkbox" name="transfer" value="yes">MOTOR DRIVING OWNERSHIP TRANSFER fee
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center"><input type="submit" class="btn btn-success"></td>
                            </tr>
                            </form>
                            </table>
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
    function get_payment_info(id){
        
         var base = '<?php echo base_url() ?>';
                    $.ajax({
                        url: base + 'Admin/get_payment_info',
                        method: 'post',
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function (data) {
                          $('#name').html(data.std_name)
                          $('#email').html(data.email)
                          $('#mobile').html(data.mobile)
                          $('#course').html(data.course_name)
                          $('#batch').html(data.batch)
                          $('#due').html(data.due)
                        }
                    })
    }
</script>