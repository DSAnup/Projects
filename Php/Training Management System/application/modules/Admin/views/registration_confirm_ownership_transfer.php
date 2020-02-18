
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
                            <i class="fa fa-fw ti-move"></i> Registation
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removepanel clickable"></i>
                        </span>
                    </div>
                    <?php
                    $ci =& get_instance();
                    $ci->load->model('Admin_model');
                    $id=$this->session->userdata('courseID');
                    ?> 
 <section>
    <div class="container">
    
      <span> <a href="#" onclick="jQuery.print('#report')" class="btn btn-primary">Print</a></span>
      <div class="section-content" id="report">

        <dir class="row">
        <img style="float: left;" src="<?=base_url().'images/BADC_title.png'?>"  height='100'>
          <div class="col-md-12 col-xs-12 form">
            <address><h3>Head Office, Elanbari, Dhaka</h3></address>
            </div>
          </dir>
          <dir class="row">
            <div class="col-md-12 col-xs-12 form">
              <span class="admission_txt">VEHICLES OWNERSHIP TRANSFER FORM</span>
            </div>
          </dir>
          <dir class="row">
            <div class="col-md-9 col-xs-9 admission_No">
              <h3>Admission serial No : <?php $ids= $this->session->userdata('id'); echo $ids;?></h3>
              <span>Service Name : <?php 
              echo 'MOTOR VEHICLES OWNERSHIP TRANFER';
              $price= $this->session->userdata('price');
              ?></span><br> 
              <span>Date : <?=date('d/m/Y')?> </span><br>
              <span>Payment : <?=$price?> Tk</span>                    
            </div>
            <div class="col-md-2 col-xs-2 form">
              <h3>
               <img id="from_pic" src="<?=base_url().'std_photo/'.$this->session->userdata('photo');?>" >
             </h3>

           </div>
         </dir>
         <div class="row">
          <div class="col-md-11 from_table">
            <table class="table table-hover table-responsive">
              <tr> 
                <th>Name of The Student: </th><td><?=$this->session->userdata('name');?></td>
              </tr>
              <tr> 
                <th>Date of Birth : </th><td> <?=$this->session->userdata('date_of_birth');?>(Please attatch birth certificate)</td>
              </tr>
              <tr>
                <th>Age: </th>
                <td><?=$this->session->userdata('age');?></td>
              </tr>
              <tr> 
                <th>Father's Name : </th><td><?=$this->session->userdata('father');?></td>
              </tr>
              <tr> 
                <th>Mother's Name : </th><td><?=$this->session->userdata('mother');?></td>
              </tr>
              <tr> 
                <th>E-mail Address : </th><td><?=$this->session->userdata('email');?></td>
              </tr>
              <tr> 
                <th>Mobile No : </th><td><?=$this->session->userdata('mobile');?></td>
              </tr>
              <tr> 
                <th>Blood Group : </th><td><?=$this->session->userdata('blood');?></td>
              </tr>
              <tr> 
                <th>Nationality : </th><td><?=$this->session->userdata('nationality');?></td>
              </tr>
              <tr> 
                <th>Passport / NID No : </th><td><?=$this->session->userdata('passport_no');?></td>
              </tr>
              <tr> 
                <th>Religon : </th><td><?=$this->session->userdata('religion');?></td>
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>Present Address :</caption> 
              <tr>                    
                <th>Villege/Steet : </th><td><?=$this->session->userdata('p_village');?></td>
                <th>Post : </th><td><?=$this->session->userdata('p_post');?></td>
                <th>Upzilla : </th><td><?=$this->session->userdata('p_upozila');?></td>
                <th>District : </th><td><?=$this->session->userdata('p_district');?></td>
              </tr>
            </table>
            <table class="table table-bordered table-responsive">
              <caption>Parmanent Address :</caption> 
              <tr>                    
                <th>Villege/Steet : </th><td><?=$this->session->userdata('g_village');?></td>
                <th>Post : </th><td><?=$this->session->userdata('g_post');?></td>
                <th>Upzilla : </th><td><?=$this->session->userdata('g_upozila');?></td>
                <th>District : </th><td><?=$this->session->userdata('g_district');?></td>
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>Educational Background :</caption> 
              <tr>                    
                <th>S.S.C/H.S.C : </th><td><?=$this->session->userdata('ssc');?></td>
                <th>Heighest Degree : </th><td><?=$this->session->userdata('degree');?></td>
              </tr>         
            </table>

             <table class="table table-bordered table-responsive">
              <caption>VEHICLES INFO:</caption> 
              <tr>                    
                <th>VEHICLES CATEGORY: </th><td><?=$this->session->userdata('vehicle_category');?></td>
                <th>VEHICLES REGISTRATION NO : </th><td><?=$this->session->userdata('veh_reg_no');?></td>
                <th>TAX TOKEN EXPIRY DATE : </th><td><?=$this->session->userdata('veh_tax_exp_date');?></td>
              </tr>
              <tr>                    
                <th>FITNESS EXPIRY DATE : </th><td><?=$this->session->userdata('veh_fitness_date');?></td>
                <th>INSURANCE EXPIRY DATE : </th><td><?=$this->session->userdata('veh_ins_exp_date');?></td>
                <th>ENGINE NO : </th><td><?=$this->session->userdata('veh_eng_no');?></td>
              </tr>
              <tr>                    
                <th>CHASIS NO : </th><td><?=$this->session->userdata('veh_chasis_no');?></td>
                <th>ACCIDENTAL HISTORY : </th><td colspan="3"><?=$this->session->userdata('veh_accident_history');?></td>
              </tr>
            </table>
            <table class="table table-bordered table-responsive">
              <caption>VEHICLES OWNERSHIP INFO:</caption> 
              <tr>                    
                <th>APPLICATION DATE: </th><td><?=$this->session->userdata('veh_app_date');?></td>
                <th>TEMPORARY R/C ISSUE/EXPIRY DATE : </th><td><?=$this->session->userdata('veh_tmp_rc');?></td>
              </tr>
              <tr>                    
                <th>BIOMETRIC PHOTO & FINGERPRINT DATE : </th><td><?=$this->session->userdata('veh_bio_date');?></td>
                <th>DATE OF VEHICLES R/C DELIVERY : </th><td><?=$this->session->userdata('veh_rc_date');?></td>
              </tr>
              </table>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-8"><h4 style="float: left;border-top: 1px solid black;margin-right: 30%;margin-top:3%;"> CLIENT’S SIGNATURE</h4></div>
          <div class="col-md-4"><h4 style="float: left;border-top: 1px solid black;margin-left: 20%;margin-top: 3%;"> ACADEMIC APPROVAL</h4></div>
        </div>
		<div class="col-lg-12" style="text-align:center">
		<hr>
<span >Powered By: <img src="<?=base_url()."admins/img/logo.png"?>" width="50"> YouthFireIT.com</span>		
      </div>
	  </div>
    </div>
  </section>
</div>
</div></div></aside></div>
<script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
<style type="text/css">
  
  .form{
  text-align: center;

}

.admission_No{
  float : left;
  font-size : 20px;
}
#from_pic{
  max-height : 200px;
  max-width : 200px;
  float : right;
  border: 1px solid black;

}
.admission_txt{
  border: 2px solid #a1a1a1;
    padding: 10px 40px; 
    background: #dddddd;
    max-width: 300px;
    border-radius: 25px;
  font-size : 25px;
  
}
.from_table{
  font-size : 20px;
}
/*table, th, td {
  
    border: 1px solid black;
    border-collapse: collapse;
}*/
table{
  width : 100%;
}

</style>
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
<script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
</html>