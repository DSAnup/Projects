<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Notice Board</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="page-teachers-details.html#">Home</a></li>
              <li><a href="page-teachers-details.html#">Pages</a></li>
              <li class="active text-gray-silver">Page Title</li>
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
       <table class="table table-bordered">
         <tr>
           <th>Name</th>
           <td><?=$this->session->userdata('name');?></td>
           <th>Father's Name</th>
           <td><?=$this->session->userdata('father');?></td>
           <th>Mother's Name</th>
           <td><?=$this->session->userdata('mother');?></td>
         </tr>
         <tr>
           <th>E-mail</th>
           <td><?=$this->session->userdata('email');?></td>
           <th>Mobile</th>
           <td><?=$this->session->userdata('mobile');?></td>
           <th>Date of Birth</th>
           <td><?=$this->session->userdata('date_of_birth');?></td>
         </tr>
         <tr>
           <th>Nationality</th>
           <td><?=$this->session->userdata('nationality');?></td>
           <th>religion</th>
           <td><?=$this->session->userdata('religion');?></td>
           <th>Blood Group</th>
           <td><?=$this->session->userdata('blood');?></td>
         </tr>
         <tr>
           <th>Village/Street</th>
           <td><?=$this->session->userdata('pr_village');?></td>
           <th>Post</th>
           <td><?=$this->session->userdata('pr_post');?></td>
           <th>Upozila</th>
           <td><?=$this->session->userdata('pr_upozila');?></td>
         </tr>
         <tr>
           <th>District</th>
           <td><?=$this->session->userdata('pr_district');?></td>
           <th>Zip</th>
           <td><?=$this->session->userdata('pr_zip');?></td>
           <th></th>
           <td></td>
         </tr>
         <tr>
           <th>Degree</th>
           <td><?=$this->session->userdata('degree');?></td>
           <th>Institution</th>
           <td><?=$this->session->userdata('institution');?></td>
           <th>Passing Year</th>
           <td><?=$this->session->userdata('pass_year');?></td>
         </tr>
         <tr>
         <th>Board</th>
           <td><?=$this->session->userdata('board');?></td>
           <th>Schedule Days</th>
           <td><?=$dat->days?></td>
           <th>Time Slot</th>
           <td><?=$da->slot?></td>
           
         </tr>
         <tr>
           <th>Result</th>
           <td><?=$this->session->userdata('result');?></td>
           <th><img src="<?=base_url().'std_photo/'.$this->session->userdata('photo');?>"></th>
           <td></td>
           <th>
             Course
           </th>
           <td><?=$d->name?></td>
         </tr>
       </table>
        
        </div>
      </div>
    </section>
  </div>
<script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
  <?php
  $this->load->view('footer');
  ?>