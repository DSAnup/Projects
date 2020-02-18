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

                <div class="col-md-12" >
                
                    <div class="panel" >
                        <div class="panel-heading">
                            <h3 class="panel-title">
                               <span> <a href="#" onclick="jQuery.print('#report')" class="btn btn-primary">Print</a></span>
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body" style="text-align: center;" id="report">
                        <h1>
                        <!-- <img src="<?=base_url().'images/logo2.png'?>" width="90" height="90" style="float: left;"> -->
                        <!-- <span style="text-transform: uppercase;">Bangladesh Driving Training Academy</span> -->
                        <img src="<?=base_url().'images/BADC_title.png'?>"  height='100'>
                        </h1>
                        <h3>Head Office, Elanbari, Dhaka</h3>
                        <h2>Fees Collection Receipt</h2>
                        <div class="col-md-12 main_body">
                        <b style="float: left;"># Reciept No: BDTA017<?=$p_id?> &nbsp; &nbsp; # Enrollment ID:<?=$enroll_id?></b>
                        <b style="float: right;">Date: <?=$date?></b><br>
                           <!--  <table class="table table-bordered dataTables">
                            <form action="<?=base_url().'Admin/collection_post'?>" method="post">
                            <tr>
                                <th># Enrollment ID:</th>
                                <td><?=$en_id?></td>
                                <th>Name:</th>
                                <td><?=$std->name?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?=$std->email?></td>
                                <th>Mobile:</th>
                                <td><?=$std->mobile?></td>
                            </tr>
                            <tr>
                                <th>Course Name:</th>
                                <td><?=$course->name?></td>
                                <th>Batch:</th>
                                <td><?=$batch->batch_name?></td>
                            </tr>
                            <tr>
                                
                                <th>Payment:</th>
                                <td><?=$amount?>TK</td>
                                <th>Due Amount:</th>
                                <td><?=$due?>Tk</td>
                            </tr>
                             <tr>
                                
                                <th>Remark:</th>
                                <td colspan="3"></td>
                                
                            </tr>
                            <tr>
                                
                               
                                <td>Course: <?=$amount?>TK</td>                                
                                <td>Driving licence : <?=$due?>Tk</td>                                
                                <td colspan="2">MOTOR DRIVING OWNERSHIP TRANSFER : <?=$due?>Tk</td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align: left; padding-right: 100px; padding-top: 100px;border-top: 1px solid black;"><span style="border-top: 1px solid black;">Student sign</span> </th>
                                <th colspan="2" style="text-align: right;padding-top: 100px; border-top: 1px solid black;"><span style="border-top: 1px solid black;">Recieved By</span></th>
                            </tr>
                            </form>
                            </table>
 -->


                
                  <h4>Received form : &nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 25px"> <?=$std->name?></span>&nbsp; &nbsp; &nbsp; &nbsp; The amount of.&nbsp; &nbsp; &nbsp; &nbsp;<span style="font-size: 25px">&nbsp; &nbsp; &nbsp; &nbsp;<?=$amount?>TK</span></h4>
                  <!-- <h4 class="for">for&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</h4> -->                         
                  <h4>for : &nbsp;<?php if(isset($course->name)){ echo $course->name;}else{ echo $std->courseID;}?> &nbsp; &nbsp; &nbsp; CELLULAR : <?=$std->cellular?>&nbsp;</h4>
                  <h4>Payment Amount : &nbsp; &nbsp; &nbsp; &nbsp; <?=$amount?>TK &nbsp; &nbsp; &nbsp; &nbsp;</h4>
                  <h4>Blance Due : &nbsp; &nbsp; &nbsp; &nbsp;   <?=$due?>Tk     &nbsp; &nbsp; &nbsp; &nbsp;</h4>
                  <h4>Remark : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h4>
                  <h4><input type="checkbox" <?php if($fee=='yes'){ echo "checked disabled";}else{ echo "disabled";} ?>>Course fee &nbsp; &nbsp;<input type="checkbox" <?php if($licence=='yes'){ echo "checked disabled";}else{ echo "disabled";} ?>>Driving licence fee &nbsp; &nbsp; &nbsp;<input type="checkbox" <?php if($transfer=='yes'){ echo "checked disabled";}else{ echo "disabled";} ?>>MOTOR DRIVING OWNERSHIP TRANSFER fee</h4><br><br><br><br>
                  <h4 style="float: right;border-top: 1px solid black;">Received by</h4>
                </div>


<style type="text/css">.main_body h4{
  border-bottom: 1px solid black;
  border-style:dashed;
  border-top: none;
  border-left: none;
  border-right: none;
  text-align: left;
}
.for{
  border-bottom: 1px solid black !important;
  border-style:dashed;
  border-top: none;
  border-left: none;
  border-right: none;
}</style>












<span style="float: left">Powered By: <img src="<?=base_url()."admins/img/logo.png"?>" width="50"> YouthFireIT.com</span>

                        </div>
                    </aside>
                    <div id="qn"></div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
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