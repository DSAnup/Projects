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
                               <span> <a href="javascript:void(0)" onclick="jQuery.print('#report')" class="btn btn-primary">Print</a></span>
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div style="background: #f5f7f4 !important" id="report">
                        <div class="panel-body" style="text-align: center;background: url('<?=base_url()?>images/certificate3.png') !important; background-repeat: no-repeat !important;background-size: contain !important;">
                        
                        <h1>
                        <img src="<?=base_url().'images/BADC_title.png'?>"  height='100'>
                        </h1>
                        <address><strong>Sheltec Sterra,Office: 206(3rd Floor),236 New Elephant Road, Dhaka-1205<br>Hotline: 09678771247</strong></address>
                        <h2>CERTIFICATE OF COMPLETION DRIVING COURSE</h2>
                        <div class="col-md-12 main_body">
                        <input type="text" name="id" style="text-align: center;" onkeyup="get_certificate_info(this.value)">
                       <h4 style="border: none; padding-left: 110px !important"><span style="font-size: 25px" id="name">-------------------------------</span><br>
                       THIS IS TO CERTIFY, THAT THE PERSON NAME ABOVE HAS SUCCESSFULLY COMPLETED
                <span style="font-size: 25px" id="course">------------------------------------- </span>
                  <!-- <h4 class="for">for&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</h4> -->                         
                 COURSE COMPLETION DATE: <span style="font-size: 25px" id="date">--------------------------------------</span>
FROM BDTA,
HEAD OFFICE, ELANBARI, DHAKA.
</h4>
                  <br><br><h4 style="border: none;"><span style="border-top: 1px solid black;">Received by</span><span style="border-top: 1px solid black; float: right;">Received by</span></h4>
                  
                  </div>
                  </div>
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
    function get_certificate_info(id){
      var base = '<?php echo base_url() ?>';
                    $.ajax({
                        url: base + 'Admin/get_certificate_info',
                        method: 'post',
                        dataType: "json",
                        data: {
                            id: id
                        },
                        success: function (data) {
                          $('#name').html(data.std_name)
                          $('#course').html(data.course_name)
                          $('#date').html(data.finish_date)
                          
                        }
                    })
    }
</script>