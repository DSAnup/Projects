<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Student List</h2>
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



  <section>
    <div class="container">
      <table class="table table-bordered dataTables">
        <thead>
          <tr>
            <th>SL</th>
            <th>Course Name</th>
            <th>Name</th>
            <!-- <th>Address</th>
            <th>Email</th>
            <th>Mobile</th> -->
            <th>Photo</th>
          </tr>
        </thead>
        <?php
        $ci =& get_instance();
        $ci->load->model('Admin_model');
        $ii=0;
        foreach ($en as $e1) {
          $where=array('id'=>$e1->stdID);
          $where_1=array('id'=>$e1->courseID);
          $e=$this->Admin_model->SelectData_1('students','*',$where);
          $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
          ?>
          <tr>
            <td><?=++$ii?></td>
            <td><?=$e2->name?></td>
            <td><?=$e->name?></td>
            <!-- <td><?=$e->pr_village.', '.$e->pr_post.', '.$e->pr_upozila.', '.$e->pr_district.', '.$e->pr_zip?></td>
            <td><?=$e->email?></td>
            <td><?=$e->mobile?></td> -->
            <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="40" height="43"></td>
          </tr>

          <?php } ?>
        </table>
      </div>
    </section>
  </div>

  <?php
  $this->load->view('footer');
  ?>