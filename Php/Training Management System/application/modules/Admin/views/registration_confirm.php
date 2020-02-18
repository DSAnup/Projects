
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
                    $where=array('id'=>$sql->courseID);
                    $d=$ci->Admin_model->SelectData_1('course','*',$where);
                    $slot_id=$this->session->userdata('slot');
                    $where1=array('id'=>$slot_id);
                    $da=$ci->Admin_model->SelectData_1('time_slots','*',$where1);
                    @$where12=array('id'=>$da->schedule_id);
                    $dat=$ci->Admin_model->SelectData_1('schedule_days','*',$where12);
                    ?> 
 <section>
    <div class="container">
    
      <span> <a href="#" onclick="jQuery.print('#report')" class="btn btn-primary">Print</a></span>
      <div class="section-content" id="report">

        <dir class="row">
        <img style="float: left;" src="<?=base_url().'images/BADC_title.png'?>"  height='100'><br>
          <div class="col-md-12 col-xs-12 form row">
            <address><h3>Head Office, Elanbari, Dhaka</h3></address>
            </div>
          </dir>
          <dir class="row">
            <div class="col-md-12 col-xs-12 form">
              <span class="admission_txt">Admission Form</span>


            </div>
          </dir>
          <dir class="row">
            <div class="col-md-9 col-xs-9 admission_No">
              <h3>Admission serial No : <?php $ids= $sql->serial; echo $ids;?></h3>
              <h3>Enrollment No : <?php $ids1= $sql->enroll_id; echo $ids1;?></h3>
              <span>Service Name : <?php if(isset($d->name)){ echo $d->name;}else{ $se= $sql->courseID; echo $se;}?></span><br>
              <?php  if(isset($d->name)){ ?>
              <span>Schedule Days : <?=$sql->days?></span><br>
              <!-- <span>Board : <?=$this->session->flashdata('board');?></span><br> -->
              <span>Time Slot : <?=$sql->slot?></span> <br>
              <?php } ?>
              <!-- <span>Service Fee : </span><br>
              <span>Admission Payment : </span> <br>  
              <span>Dues : </span> <br>   -->                     
            </div>
            <div class="col-md-2 col-xs-2 form">
              <h3>
               <img id="from_pic" src="<?=base_url().'std_photo/'.$sql->photo;?>" >
             </h3>

           </div>
         </dir><hr> 
         <div class="row">
          <div class="col-md-11 from_table">
            <table class="table table-bordered table-responsive">
              <tr> 
                <td>Name of The Student: </td><td><?=$sql->name;?></td>
              </tr>
              <tr> 
                <td>Date of Birth : </td><td> <?=$sql->date_of_birth;?> (Please attatch birth certificate)</td>
              </tr>
              <tr> 
                <td>Age : </td><td> <?=$sql->age;?></td>
              </tr>
              <tr> 
                <td>Father's Name : </td><td><?=$sql->father;?></td>
              </tr>
              <tr> 
                <td>Mother's Name : </td><td><?=$sql->mother;?></td>
              </tr>
              <tr> 
                <td>E-mail Address : </td><td><?=$sql->email;?></td>
              </tr>
              <tr> 
                <td>Mobile No : </td><td><?=$sql->mobile;?></td>
              </tr>
              <tr> 
                <td>Blood Group : </td><td><?=$sql->blood;?></td>
              </tr>
              <tr> 
                <td>Nationality : </td><td><?=$sql->nationality;?></td>
              </tr>
              <tr> 
                <td>Pasport / NID No : </td><td><?=$sql->passport_no;?></td>
              </tr>
              <tr> 
                <td>Religon : </td><td><?=$sql->religion;?></td>
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>Present Address :</caption> 
              <tr>                    
                <td>Villege/Steet : <?=$sql->p_village;?></td>
                <td>Post : <?=$sql->p_post;?></td>
                <td>Upzilla : <?=$sql->p_upozila;?></td>
                <td>District : <?=$sql->p_district;?></td>          
              </tr>
              </table>
              <table class="table table-bordered table-responsive">
               <caption>Parmanent Address :</caption> 
              <tr>                    
                <td>Villege/Steet : <?=$sql->g_village;?></td>
                <td>Post : <?=$sql->g_post;?></td>
                <td>Upzilla : <?=$sql->g_upozila;?></td>
                <td>District : <?=$sql->g_district;?></td>           
                
              </tr>
            </table>
             <table class="table table-bordered table-responsive">
              <caption>Education Background:</caption> 
              <tr>             
                <td>SSC/HSC : <?=$sql->ssc;?></td>
                 <td>Heighest Degree : <?=$sql->degree;?></td>     
                
              </tr>         
            </table>
                
              <h4> Remark :-</h4>
              <span><?=$sql->remarks;?></span> 
              <h4> NOTE :-</h4>
              <span>1.  COURSE MUST BE COMPLETE WITHIN 3 MONTHS .</span><br>
              <span>2.  STUDENT MUST APPLY FOR LEARNER DL WHILE ADMISSION </span>         
 
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-8"><h4 style="float: left;border-top: 1px solid black;margin-right: 30%;margin-top:10%;"> STUDENT’S SIGNATURE</h4></div>
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