<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Admission Form</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li><a href="#">Apply</a></li>
              <li class="active text-gray-silver">admission</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php
$ci =& get_instance();
$ci->load->model('Front_model');
$id=$this->session->userdata('courseID');
$where=array('id'=>$id);
$d=$ci->Front_model->SelectData_1('course','*',$where);
$slot_id=$this->session->userdata('slot');
$where1=array('id'=>$slot_id);
$da=$ci->Front_model->SelectData_1('time_slots','*',$where1);
$where12=array('id'=>$da->schedule_id);
$dat=$ci->Front_model->SelectData_1('schedule_days','*',$where12);
?>
  <section>
    <div class="container">
      <span> <a href="#" onclick="jQuery.print('#report')" class="btn btn-primary">Print</a></span>
      <div class="section-content" id="report">

        <dir class="row">
          <div class="col-md-2 col-xs-2">
            <img src="<?=base_url()?>front_asset/images/logo.png" class="img-responsive">
          </div>
          <div class="col-md-10 col-xs-10 form">
            <h2>Skill Development Training Institute</h2>
            <address>House#08 (2nd Floor),Sumon Plaza,<br> Senpara,Parbota,Begum Rukeya Sharoni,<br> Mirpur-10, Dhaka-1216,Bangladesh.<br>
              Contact : +880-1711-045 669, +880-1713-197 241. e-mail : info@sdtibd.com</address>
            </div>
          </dir>
          <dir class="row">
            <div class="col-md-12 col-xs-12 form">
              <span class="admission_txt">Admission Form</span>

            </div>
          </dir>
          <dir class="row">
            <div class="col-md-10 col-xs-10 admission_No">
              <h3>Admission serial No : <?php $ids= $this->session->userdata('id'); echo $ids;?></h3>
              <span>Course Name : <?=$d->name?></span><br>
              <span>Schedule Days : <?=$dat->days?></span><br>
              <span>Board : <?=$this->session->userdata('board');?></span><br>
              <span>Time Slot : <?=$da->slot?></span>                      
            </div>
            <div class="col-md-2 col-xs-2 form">
              <h3>
               <img src="<?=base_url().'std_photo/'.$this->session->userdata('photo');?>">
             </h3>

           </div>
         </dir><hr>

         <div class="row">
          <div class="col-md-12 from_table">
            <table class="table table-responsive">
              <tr> 
                <td>Name of The Student: </td><td><?=$this->session->userdata('name');?></td>
              </tr>
              <tr> 
                <td>Date of Birth : </td><td> <?=$this->session->userdata('date_of_birth');?>(Please attatch birth certificate)</td>
              </tr>
              <tr> 
                <td>Father's Name : </td><td><?=$this->session->userdata('father');?></td>
              </tr>
              <tr> 
                <td>Mother's Name : </td><td><?=$this->session->userdata('mother');?></td>
              <tr> 
                <td>E-mail Address : </td><td><?=$this->session->userdata('email');?></td>
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
                <td>Religon : </td><td><?=$this->session->userdata('religion');?></td>
              </tr>
            </table>
            <table>
              <caption>Present Address :</caption> 
              <tr>                    
                <td>Villege/Steet : <?=$this->session->userdata('pr_village');?></td>
                <td>Post : <?=$this->session->userdata('pr_post');?></td>
                <td>Upzilla : <?=$this->session->userdata('pr_upozila');?></td>
                <td>District : <?=$this->session->userdata('pr_district');?></td>
                <td>Zip code : <?=$this->session->userdata('pr_zip');?></td>
                
              </tr>
            </table>
            <table>
              <caption>Highest Degree :</caption> 
              <tr>                    
                <td>Degree : <?=$this->session->userdata('degree');?></td>
                <td>Institute : <?=$this->session->userdata('institution');?></td>
                <td>Passing Year : <?=$this->session->userdata('pass_year');?></td>
                <td>Result : <?=$this->session->userdata('result');?></td>

              </tr>
            </table>


          </div>
        </div>        
      </div>
    </div>
  </section>
</div>
<script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
<?php
$this->load->view('footer');
?>