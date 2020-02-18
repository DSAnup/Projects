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
              <img src="<?=base_url().'images/empty.jpeg'?>" class="img-responsive">
              <h3 class="text-theme-colored line-bottom text-theme-colored"></h3>
              <!-- <h4 class="mt-0"><span class="text-theme-color-2">Price :</span> $420</h4>
                <ul class="review_text list-inline">
                  <li>
                    <div class="star-rating" title="Rated 4.50 out of 5"><span style="width: 90%;">4.50</span></div>
                  </li>
                </ul> -->

                <p style="text-align: justify;"></p>
                
                <!-- <h4 class="line-bottom mt-20 mb-20 text-theme-colored">All Course Contents</h4> -->
                
                <ul id="myTab" class="nav nav-tabs boot-tabs">
                  
                  </ul>
                  <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in " id="tab">
                        <table class="table table-bordered"> 
                          <tr>
                            <td class="text-center font-16 font-weight-600 bg-theme-color-2 text-white" colspan="4">Course Parts</td>
                          </tr>
                          <tr> <th style="text-align: center;">SL</th> <th style="text-align: center;">Parts</th></tr>
                          <tbody>
                              <tr>
                                <td align="center"></td>
                                <td></td>

                              </tr>
                           
                            </tbody> 
                          </table>
                        </div>
                       

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4">
                    <div class="sidebar sidebar-left mt-sm-30 ml-40">
                      <div class="widget">
                        <h4 class="widget-title line-bottom">Courses <span class="text-theme-color-2">List</span></h4>
                        <div class="services-list">
                          <ul class="list list-border angle-double-right">
                          <li>No Course Has Been Found !</li>
                            </ul>
                          </div>
                        </div>
                        <div class="widget">
                          <!-- <h4 class="widget-title line-bottom">Opening <span class="text-theme-color-2">Hours</span></h4> -->
                          <!-- <div class="opening-hours">
                            <ul class="list-border">
                              <li class="clearfix"> <span> Mon - Tues :  </span>
                                <div class="value pull-right"> 6.00 am - 10.00 pm </div>
                              </li>
                              <li class="clearfix"> <span> Wednes - Thurs :</span>
                                <div class="value pull-right"> 8.00 am - 6.00 pm </div>
                              </li>
                              <li class="clearfix"> <span> Fri : </span>
                                <div class="value pull-right"> 3.00 pm - 8.00 pm </div>
                              </li>
                              <li class="clearfix"> <span> Sun : </span>
                                <div class="value pull-right"> Colosed </div>
                              </li>
                            </ul>
                          </div> -->
                        </div>
                        <div class="widget">
                          <h4 class="widget-title line-bottom">Quick <span class="text-theme-color-2">Contact</span></h4>
                          <form id="quick_contact_form_sidebar" name="footer_quick_contact_form" class="quick-contact-form" action="includes/quickcontact.htm" method="post">
                            <div class="form-group">
                              <input name="form_email" class="form-control" type="text" required="" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                              <textarea name="form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                              <input name="form_botcheck" class="form-control" type="hidden" value="" />
                              <button type="submit" class="btn btn-theme-colored btn-flat btn-xs btn-quick-contact text-white pt-5 pb-5" data-loading-text="Please wait...">Send Message</button>
                            </div>
                          </form>

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