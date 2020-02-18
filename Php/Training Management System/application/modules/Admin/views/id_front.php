<?php
$this->load->view('head');
?>
<style type="text/css">
        .student-detailes h5 {
    text-align: center;
    background: #F0614D !important;
    font-weight: 800;
}
    </style>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php
        $this->load->view('leftmenu');
        ?>
        <aside class="right-side">

            <div class="row">
                        <a href="#" onclick="jQuery.print('#report')" class="btn btn-primary">Print</a>
                           <section class="section-padding" id="report">
                    <?php
                        $i=0;
                          foreach ($d as $ids){
                            ?>
                                   
                <div class="col-xs-6" >
                    <div class="id-card" style="margin-bottom: 40px;border: 2px solid#1D1F21;height: 430px; ">
                        <div class="logo-c-name" style="float: left;padding-top: 5px; padding-left: 2px;"> <img src="<?=base_url().'admins/'?>assets/image/logo.jpg" alt="" >
                            <h5 style="float: right;padding-left: 0px;color: #5dba2e !important; padding-left: 4px">Skill Development & Technical Institute</h5> 
                        </div>
                        <div class="id-name" style="text-align: center;margin-bottom: 8px">
                            <h4>ID CARD</h4> <img src="<?=base_url().'std_photo/'.$ids->photo?>" alt="" height ='120' width = '100'> 
                        </div>
                        <div class="student-detailes" style="font-size: 14px;padding-left: 8px"><b>
                            <span>Name:<?=$ids->name?></span><br>
                            <!--<span>Fathers Name:<?=$ids->father?></span><br>-->
                            <!--<span>Mother Name:<?=$ids->mother?></span><br>-->
                            <span>Course Name:<?=$ids->name?></span><br>
                            <span>Roll: <?=$ids->roll?></span><br>
                            <span>Course Start: </span><br>
                            <span>Date of Birth: <?=$ids->date_of_birth?></span><br></b>
                            <h5 style="-webkit-print-color-adjust:exact;">Card No: <?=$ids->roll?></h5> 
                        </div>
                    </div>
                </div>
                <?php }?>
    </section>
    
                            <!-- </div> -->
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
                        <script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
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