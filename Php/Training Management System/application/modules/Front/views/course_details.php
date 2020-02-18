<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white"><?=$category->category?></h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li><a href="#">Training</a></li>
              <li class="active text-gray-silver"><?=$category->category?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Start main-content -->
  <div class="main-content">


    <!-- Section: Blog -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              <img src="<?=base_url().'course_photo/'.$course->photo?>" class="img-responsive">
              <h3 class="text-theme-colored  text-theme-colored"><?=$course->name?></h3>
              <h4 class="text-theme-colored line-bottom text-theme-colored">Duration: <?=$course->duration?></h4>
              <!-- <h4 class="mt-0"><span class="text-theme-color-2">Price :</span> $420</h4>
                <ul class="review_text list-inline">
                  <li>
                    <div class="star-rating" title="Rated 4.50 out of 5"><span style="width: 90%;">4.50</span></div>
                  </li>
                </ul> -->

                <p style="text-align: justify;"><?=$course->description?></p>
                <?php
                if($heads!=null){
                  ?>
                  <h4 class="line-bottom mt-20 mb-20 text-theme-colored">All Course Contents</h4>
                  <?php } ?>
                  <ul id="myTab" class="nav nav-tabs boot-tabs">
                    <?php
                    $ci =&get_instance();
                    $ci->load->model('Admin/Admin_model');
                    $ii=0;
                    foreach ($heads as $k) {
                      $ii+=1;
                      ?>
                      <li <?php if($ii==1){ echo  'class="active"';} ?>><a href="#tab<?=$k->id?>" data-toggle="tab"><?=$k->head?></a></li>
                      <?php } ?>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <?php 
                      $iii=0;
                      foreach ($heads as $k1) {
                        $iii+=1;
                        $he=$k1->id;
                        $where=array('head_id'=>$he);
                        $parts=$ci->Admin_model->SelectData('course_parts','*',$where);

                        ?>

                        <div class="tab-pane fade in <?php if($iii==1){ echo  'active';} ?>" id="tab<?=$k1->id?>">
                          <table class="table table-bordered"> 
                            <tr>
                              <td class="text-center font-16 font-weight-600 bg-theme-color-2 text-white" colspan="4">Course Parts</td>
                            </tr>
                            <tr> <th style="text-align: center;">SL</th> <th style="text-align: center;">Parts</th></tr>
                            <tbody> 
                              <?php
                              foreach ($parts as $ke) {
                                ?>
                                <tr>
                                  <td align="center"><?=$iii++?></td>
                                  <td><?=$ke->parts?></td>

                                </tr>
                                <?php } ?>
                              </tbody> 
                            </table>
                          </div>
                          <?php } ?>

                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <div class="sidebar sidebar-left mt-sm-30 ml-40">
                        <div class="widget">
                          <h4 class="widget-title line-bottom">Courses <span class="text-theme-color-2">List</span></h4>
                          <div class="services-list">
                            <ul class="list list-border angle-double-right">
                              <?php
                              foreach ($courses as $cu) {

                                ?>
                                <li <?php if($id==$cu->id){ echo 'class="active"';}?>><a href="<?=base_url().'course_details/'.$cu->id.'_'.$cu->category?>"><?=$cu->name?></a></li>
                                <?php } ?>
                              </ul>
                            </div>
                          </div>
                          <div class="widget">
                            <h4 class="widget-title line-bottom">Opening <span class="text-theme-color-2">Hours</span></h4>
                            <div class="opening-hours">
                             <table class="table table-bordered">
                              <?php
                              $id=$course->id;
                              $where=array('course_id'=>$id);
                              $dd=$this->Admin_model->SelectData('schedule_days','*',$where);
                              foreach ($dd as $s) {
                                $ids=$s->id;
                                $where_1=array('schedule_id'=>$ids);
                                $dds=$this->Admin_model->SelectData('time_slots','*',$where_1);
                                $count=count($dds);
                                ?>
                                <tr>
                                  <th rowspan="<?=$count+1?>">
                                    <?=$s->days?>
                                  </th>
                                </tr>

                                <?php
                                foreach ($dds as $k) {
                                  ?>
                                  <tr>
                                    <td><?=$k->slot?></td>
                                  </tr>
                                  <?php } ?>

                                  <?php } ?>
                                </table>
                              </div>
                            </div>
                            

                              <!-- Quick Contact Form Validation-->
                              <script type="text/javascript">
                                $("#quick_contact_form_sidebar").validate({
                                  submitHandler: function(form) {
                                    var form_btn = $(form).find('button[type="submit"]');
                                    var form_result_div = '#form-result';
                                    $(form_result_div).remove();
                                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                                    var form_btn_old_msg = form_btn.html();
                                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                                    $(form).ajaxSubmit({
                                      dataType:  'json',
                                      success: function(data) {
                                        if( data.status == 'true' ) {
                                          $(form).find('.form-control').val('');
                                        }
                                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                                        $(form_result_div).html(data.message).fadeIn('slow');
                                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                      }
                                    });
                                  }
                                });
                              </script>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <!-- end main-content -->


              </div>

              <?php
              $this->load->view('footer');
              ?>