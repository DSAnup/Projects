
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
              <span class="admission_txt">DRIVING LICENSE FORM</span>
            </div>
          </dir>
          <dir class="row">
            <div class="col-md-9 col-xs-9 admission_No">
              <h3>Driving Licence ID : <?php $ids= $this->session->userdata('id'); echo $ids;?></h3>
              <span>Service Name : <?php 
              $se= $this->session->userdata('courseID');
              switch ($se) {
                case 'professional_licence':
                  $ses='PROFESSIONAL DRIVING LICENSE';
                  break;
                  case 'non_professional_licence':
                  $ses='NON-PROFESSIONAL DRIVING LICENSE';
                  break;
                  case 'international_licence':
                  $ses='INTERNATIONAL DRIVING LICENSE PERMIT';
                  break;
              }
              echo $ses;
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
         </dir><hr> 
         <div class="row">
          <div class="col-md-11 from_table">
            <table class="table table-hover table-responsive">
              <tr> 
                <td>Name of The Student: </td><td><?=$this->session->userdata('name');?></td>
              </tr>
              <tr> 
                <td>Date of Birth : </td><td> <?=$this->session->userdata('date_of_birth');?>(Please attatch birth certificate)</td>
              </tr>
              <tr>
                <td>Age: </td>
                <td><?=$this->session->userdata('age');?></td>
              </tr>
              <tr> 
                <td>Father's Name : </td><td><?=$this->session->userdata('father');?></td>
              </tr>
              <tr> 
                <td>Mother's Name : </td><td><?=$this->session->userdata('mother');?></td>
              </tr>
              <tr> 
                <td>E-mail Address : </td><td><?=$this->session->userdata('email');?></td>
              </tr>
              <tr> 
                <td>Mobile No : </td><td><?=$this->session->userdata('mobile');?></td>
              </tr>
              <tr> 
                <td>Blood Group : </td><td><?=$this->session->userdata('blood');?></td>
              </tr>
              <tr> 
                <td>Nationality : </td><td><?=$this->session->userdata('nationality');?></td>
              </tr>
              <tr> 
                <td>Passport / NID No : </td><td><?=$this->session->userdata('passport_no');?></td>
              </tr>
              <tr> 
                <td>Religon : </td><td><?=$this->session->userdata('religion');?></td>
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>Present Address :</caption> 
              <tr>                    
                <td>Villege/Steet : <?=$this->session->userdata('p_village');?></td>
                <td>Post : <?=$this->session->userdata('p_post');?></td>
                <td>Upzilla : <?=$this->session->userdata('p_upozila');?></td>
                <td>District : <?=$this->session->userdata('p_district');?></td>
              </tr>
            </table>
            <table class="table table-bordered table-responsive">
              <caption>Parmanent Address :</caption> 
              <tr>                    
                <td>Villege/Steet : <?=$this->session->userdata('g_village');?></td>
                <td>Post : <?=$this->session->userdata('g_post');?></td>
                <td>Upzilla : <?=$this->session->userdata('g_upozila');?></td>
                <td>District : <?=$this->session->userdata('g_district');?></td>
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>Educational Background :</caption> 
              <tr>                    
                <td>S.S.C/H.S.C : <?=$this->session->userdata('ssc');?></td>
                <td>Heighest Degree : <?=$this->session->userdata('degree');?></td>
              </tr>         
            </table>

             <table class="table table-bordered table-responsive">
              <caption>DRIVING LICENSE INFO::</caption> 
              <tr>                    
                <td>LEARNER DRIVING LICENSE APPLICATION DATE: <?=$this->session->userdata('learn_licence_apply_date');?></td>
                <td>LEARNER DRIVING LICENSE NO : <?=$this->session->userdata('learn_licence_no');?></td>
                <td>LEARNER DRIVING LICENSE ISSUE : <?=$this->session->userdata('learn_licence_issue');?></td>
                <td>LEARNER DRIVING LICENSE EXPIRY DATE : <?=$this->session->userdata('learn_licence_exp');?></td>
                <td>DRIVING LICENSE EXAM DATE : <?=$this->session->userdata('learn_licence_exam_date');?></td>
                <td>RESULT WITH DATE : <?=$this->session->userdata('learn_licence_result_date');?></td>
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>POLICE VERIFICATION ( ONLY for PROFESSIONAL DRIVING) :</caption> 
              <tr>                    
                <td>ISSUE DATE :<?=$this->session->userdata('pv_issu_date');?></td>
                <td>EXPIRY DATE : <?=$this->session->userdata('pv_exp_date');?></td>              
                <td>REMAKRS:<?=$this->session->userdata('pv_remarks');?></td>  
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>PRESENT DRIVING LICENSE INFO (BEFORE SMART DRIVING LICENSE CARD):</caption> 
              <tr>                    
                <td>DRIVING LICENSE NO :<?=$this->session->userdata('pr_dl_no');?></td>
                <td>ISSUE DATE :<?=$this->session->userdata('pr_dl_issu_date');?></td> 
                <td>EXPIRY DATE :<?=$this->session->userdata('pr_dl_exp_date');?></td>
                <td>SMART DL CARD APPROXIMATE DELIVERY DATE :<?=$this->session->userdata('pr_sm_dl_issu_date');?></td> 
                <td>CELLULAR FOR DRIVING LICENSE DELIVERY TEXT FROM BRTA :<?=$this->session->userdata('pr_dl_cellular');?></td>              
              </tr>
            </table>        
            <table class="table table-bordered table-responsive">
              <caption>SMART DRIVING LICENSE CARD INFO:</caption> 
              <tr>                    
                <td>DRIVING LICENSE NO :<?=$this->session->userdata('sm_dl_no');?></td>
                <td>ISSUE DATE :<?=$this->session->userdata('sm_dl_issu_date');?></td> 
                <td>EXPIRY DATE :<?=$this->session->userdata('sm_exp_date');?></td>
                <td>REMARKS:<?=$this->session->userdata('sm_remarks');?></td>             
              </tr>
            </table>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-8"><h4 style="float: left;border-top: 1px solid black;margin-right: 30%;margin-top:10%;"> CLIENT’S SIGNATURE</h4></div>
          <div class="col-md-4"><h4 style="float: left;border-top: 1px solid black;margin-left: 20%;margin-top: 10%;"> ACADEMIC APPROVAL</h4></div>
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