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
       <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th>SL</th>
              <th>Course Name</th>
              <th>Name</th>
              <th>Board</th>
              <th>Batch</th>
              <th>Photo</th>
            </tr>
          </thead>
          <?php
          $ci =& get_instance();
          $ci->load->model('Admin_model');
          $ii=0;
          foreach ($en1 as $e1) {
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
            <tr>
              <td><?=++$ii?></td>
              <td><?=$e2->name?></td>
              <td><?=$e->name?></td>
              <td><?=$e1->board?></td>
              <td><?=$b->batch_name?></td>
              <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="100" height="110"></td>

            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$this->load->view('footer');
?>