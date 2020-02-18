<?php
$this->load->view('header');
?>
<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Certified Student List</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="page-teachers-details.html#">Home</a></li>
              <li><a href="page-teachers-details.html#">Pages</a></li>
              <li class="active text-gray-silver">Management</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="section-content">
       <div class="panel-body"><?php
         if($e1!=null){
           ?>
           <table class="table table-bordered datatable">
            
            <?php
            $ci =& get_instance();
            $ci->load->model('Admin_model');
            $ii=0;
            $where=array('id'=>$e1->stdID);
            $where_1=array('id'=>$e1->courseID);
            $where_12=array('id'=>$e1->timeSlot);
            $e=$this->Admin_model->SelectData_1('students','*',$where);
            $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
            $time=$this->Admin_model->SelectData_1('time_slots','*',$where_12);
            $where_123=array('id'=>$time->schedule_id);
            $days=$this->Admin_model->SelectData_1('schedule_days','*',$where_123);
            $where_121=array('id'=>$e1->batchID);
            $b=$this->Admin_model->SelectData_1('batch','*',$where_121);
            ?>
            <div class="row">
              <div class="col-md-6">
                <h3><?=$e->name?></h3>
                <h5>Enrollment ID# <?=$e1->id?></h5>
                <h6>Enrollment Date# <?=$e1->date?></h6>
              </div>
              <div class="col-md-6">
                <img src="<?=base_url().'std_photo/'.$e->photo?>" width="100" height="110" style="float: right;">
              </div>
            </div>
            <tr>
              <th>Course Name: </th>
              <td><?=$e2->name?></td>
              <th>Board: </th>
              <td><?=$e1->board?></td>
              <th>Batch: </th>
              <td><?=$b->batch_name?></td>
            </tr>
            <tr>
              <th>Father's Name:</th>
              <td><?=$e->father?></td>
              <th>Mother's Name:</th>
              <td><?=$e->mother?></td>
              <th>Date of Birth:</th>
              <td><?=$e->date_of_birth?></td>
            </tr>
          </table>
          <?php }else{ echo "<h3 style='color:red'>No Certified Student was found !</h3>";} ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$this->load->view('footer');
?>