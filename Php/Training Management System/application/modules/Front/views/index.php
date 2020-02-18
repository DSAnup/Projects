<?php

$this->load->view('header');
?>
<!-- Start main-content -->
<div class="main-content">

  <!-- Section: home -->
  <section id="home">
   <div class="container-fluid p-0">

    <!-- Slider Revolution Start -->
    <div class="rev_slider_wrapper">
     <div class="rev_slider" data-version="5.0">
      <ul>
        <?php
        foreach ($slider as $s) {

         if($s->position==1){
          ?>
          <!-- SLIDE 1 -->
          <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?=base_url().'sliders/'.$s->photo?>" data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
           <!-- MAIN IMAGE -->
           <img src="<?=base_url().'sliders/'.$s->photo?>"  alt=""  data-bgposition="center 10%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
           <!-- LAYERS -->

           <!-- LAYER NR. 1 -->
           <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway"
           id="rs-1-layer-1"

           data-x="['left']"
           data-hoffset="['30']"
           data-y="['middle']"
           data-voffset="['-110']" 
           data-fontsize="['100']"
           data-lineheight="['110']"
           data-width="none"
           data-height="none"
           data-whitespace="nowrap"
           data-transform_idle="o:1;s:500"
           data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
           data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
           data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
           data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
           data-start="1000" 
           data-splitin="none" 
           data-splitout="none" 
           data-responsive_offset="on"
           style="z-index: 7; white-space: nowrap; font-weight:700;"><?=$s->main_caption?>
         </div>

         <!-- LAYER NR. 2 -->
         <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-left-theme-color-2-6px pl-20 pr-20"
         id="rs-1-layer-2"

         data-x="['left']"
         data-hoffset="['35']"
         data-y="['middle']"
         data-voffset="['-25']" 
         data-fontsize="['35']"
         data-lineheight="['54']"
         data-width="none"
         data-height="none"
         data-whitespace="nowrap"
         data-transform_idle="o:1;s:500"
         data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
         data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
         data-start="1000" 
         data-splitin="none" 
         data-splitout="none" 
         data-responsive_offset="on"
         style="z-index: 7; white-space: nowrap; font-weight:600;"><?=$s->sub_caption?>
       </div>

       <!-- LAYER NR. 3 -->
       <div class="tp-caption tp-resizeme text-white" 
       id="rs-1-layer-3"

       data-x="['left']"
       data-hoffset="['35']"
       data-y="['middle']"
       data-voffset="['35']"
       data-fontsize="['16']"
       data-lineheight="['28']"
       data-width="none"
       data-height="none"
       data-whitespace="nowrap"
       data-transform_idle="o:1;s:500"
       data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
       data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
       data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
       data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
       data-start="1400" 
       data-splitin="none" 
       data-splitout="none" 
       data-responsive_offset="on"
       style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;"><?=$s->description?>
     </div>

     <!-- LAYER NR. 4 -->
     <div class="tp-caption tp-resizeme" 
     id="rs-1-layer-4"

     data-x="['left']"
     data-hoffset="['35']"
     data-y="['middle']"
     data-voffset="['100']"
     data-width="none"
     data-height="none"
     data-whitespace="nowrap"
     data-transform_idle="o:1;"
     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
     data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
     data-start="1400" 
     data-splitin="none" 
     data-splitout="none" 
     data-responsive_offset="on"
     style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-flat btn-theme-colored border-left-theme-color-2-6px pl-20 pr-20" href="index-mp-layout2.html#">View Details</a> 
   </div>
 </li>
 <?php }elseif ($s->position==2) {?>
 <!-- SLIDE 2 -->
 <li data-index="rs-2" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?=base_url().'sliders/'.$s->photo?>" data-rotate="0" data-saveperformance="off" data-title="Slide 2" data-description="">
   <!-- MAIN IMAGE -->
   <img src="<?=base_url().'sliders/'.$s->photo?>"  alt=""  data-bgposition="center 40%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
   <!-- LAYERS -->

   <!-- LAYER NR. 1 -->
   <div class="tp-caption tp-resizeme text-uppercase  bg-dark-transparent-5 text-white font-raleway border-left-theme-color-2-6px border-right-theme-color-2-6px pl-30 pr-30"
   id="rs-2-layer-1"

   data-x="['center']"
   data-hoffset="['0']"
   data-y="['middle']"
   data-voffset="['-90']" 
   data-fontsize="['28']"
   data-lineheight="['54']"
   data-width="none"
   data-height="none"
   data-whitespace="nowrap"
   data-transform_idle="o:1;s:500"
   data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
   data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
   data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
   data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
   data-start="1000" 
   data-splitin="none" 
   data-splitout="none" 
   data-responsive_offset="on"
   style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;"><?=$s->main_caption?>
 </div>

 <!-- LAYER NR. 2 -->
 <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
 id="rs-2-layer-2"

 data-x="['center']"
 data-hoffset="['0']"
 data-y="['middle']"
 data-voffset="['-20']"
 data-fontsize="['48']"
 data-lineheight="['70']"
 data-width="none"
 data-height="none"
 data-whitespace="nowrap"
 data-transform_idle="o:1;s:500"
 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
 data-start="1000" 
 data-splitin="none" 
 data-splitout="none" 
 data-responsive_offset="on"
 style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;"><?=$s->sub_caption?>
</div>

<!-- LAYER NR. 3 -->
<div class="tp-caption tp-resizeme text-white text-center" 
id="rs-2-layer-3"

data-x="['center']"
data-hoffset="['0']"
data-y="['middle']"
data-voffset="['50']"
data-fontsize="['16']"
data-lineheight="['28']"
data-width="none"
data-height="none"
data-whitespace="nowrap"
data-transform_idle="o:1;s:500"
data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
data-start="1400" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on"
style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;"><?=$s->description?>
</div>

<!-- LAYER NR. 4 -->
<div class="tp-caption tp-resizeme" 
id="rs-2-layer-4"

data-x="['center']"
data-hoffset="['0']"
data-y="['middle']"
data-voffset="['115']"
data-width="none"
data-height="none"
data-whitespace="nowrap"
data-transform_idle="o:1;"
data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
data-start="1400" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on"
style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-default btn-circled btn-transparent pl-20 pr-20" href="index-mp-layout2.html#">Apply Now</a> 
</div>
</li>
<?php }elseif ($s->position==3) {?>
<!-- SLIDE 3 -->
<li data-index="rs-3" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?=base_url().'sliders/'.$s->photo?>" data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-description="">
 <!-- MAIN IMAGE -->
 <img src="<?=base_url().'sliders/'.$s->photo?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
 <!-- LAYERS -->

 <!-- LAYER NR. 1 -->
 <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-right-theme-color-2-6px pr-20 pl-20"
 id="rs-3-layer-1"

 data-x="['right']"
 data-hoffset="['30']"
 data-y="['middle']"
 data-voffset="['-90']" 
 data-fontsize="['64']"
 data-lineheight="['72']"
 data-width="none"
 data-height="none"
 data-whitespace="nowrap"
 data-transform_idle="o:1;s:500"
 data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
 data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
 data-start="1000" 
 data-splitin="none" 
 data-splitout="none" 
 data-responsive_offset="on"
 style="z-index: 7; white-space: nowrap; font-weight:600;"><?=$s->main_caption?>
</div>

<!-- LAYER NR. 2 -->
<div class="tp-caption tp-resizeme text-uppercase bg-dark-transparent-6 text-white font-raleway pl-20 pr-20"
id="rs-3-layer-2"

data-x="['right']"
data-hoffset="['35']"
data-y="['middle']"
data-voffset="['-25']" 
data-fontsize="['32']"
data-lineheight="['54']"
data-width="none"
data-height="none"
data-whitespace="nowrap"
data-transform_idle="o:1;s:500"
data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
data-start="1000" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on"
style="z-index: 7; white-space: nowrap; font-weight:600;"><?=$s->sub_caption?>
</div>

<!-- LAYER NR. 3 -->
<div class="tp-caption tp-resizeme text-white text-right" 
id="rs-3-layer-3"

data-x="['right']"
data-hoffset="['35']"
data-y="['middle']"
data-voffset="['30']"
data-fontsize="['16']"
data-lineheight="['28']"
data-width="none"
data-height="none"
data-whitespace="nowrap"
data-transform_idle="o:1;s:500"
data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
data-start="1400" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on"
style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;"><?=$s->description?>
</div>

<!-- LAYER NR. 4 -->
<div class="tp-caption tp-resizeme" 
id="rs-3-layer-4"

data-x="['right']"
data-hoffset="['35']"
data-y="['middle']"
data-voffset="['95']"
data-width="none"
data-height="none"
data-whitespace="nowrap"
data-transform_idle="o:1;"
data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
data-start="1400" 
data-splitin="none" 
data-splitout="none" 
data-responsive_offset="on"
style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-lg btn-flat btn-theme-colored btn-theme-colored border-right-theme-color-2-6px pl-20 pr-20" href="index-mp-layout2.html#">Apply Now</a> 
</div>
</li>
<?php } } ?>
</ul>
</div>
<!-- end .rev_slider -->
</div>
<!-- end .rev_slider_wrapper -->
<script>
  $(document).ready(function (e) {
   $(".rev_slider").revolution({
    sliderType: "standard",
    sliderLayout: "auto",
    dottedOverlay: "none",
    delay: 5000,
    navigation: {
     keyboardNavigation: "off",
     keyboard_direction: "horizontal",
     mouseScrollNavigation: "off",
     onHoverStop: "off",
     touch: {
      touchenabled: "on",
      swipe_threshold: 75,
      swipe_min_touches: 1,
      swipe_direction: "horizontal",
      drag_block_vertical: false
    },
    arrows: {
      style: "zeus",
      enable: true,
      hide_onmobile: true,
      hide_under: 600,
      hide_onleave: true,
      hide_delay: 200,
      hide_delay_mobile: 1200,
      tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
      left: {
       h_align: "left",
       v_align: "center",
       h_offset: 30,
       v_offset: 0
     },
     right: {
       h_align: "right",
       v_align: "center",
       h_offset: 30,
       v_offset: 0
     }
   },
   bullets: {
     enable: true,
     hide_onmobile: true,
     hide_under: 600,
     style: "metis",
     hide_onleave: true,
     hide_delay: 200,
     hide_delay_mobile: 1200,
     direction: "horizontal",
     h_align: "center",
     v_align: "bottom",
     h_offset: 0,
     v_offset: 30,
     space: 5,
     tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
   }
 },
 responsiveLevels: [1240, 1024, 778],
 visibilityLevels: [1240, 1024, 778],
 gridwidth: [1170, 1024, 778, 480],
 gridheight: [650, 768, 960, 720],
 lazyType: "none",
 parallax: {
   origo: "slidercenter",
   speed: 1000,
   levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
   type: "scroll"
 },
 shadow: 0,
 spinner: "off",
 stopLoop: "on",
 stopAfterLoops: 0,
 stopAtSlide: -1,
 shuffle: "off",
 autoHeight: "off",
 fullScreenAutoWidth: "off",
 fullScreenAlignForce: "off",
 fullScreenOffsetContainer: "",
 fullScreenOffset: "0",
 hideThumbsOnMobile: "off",
 hideSliderAtLimit: 0,
 hideCaptionAtLimit: 0,
 hideAllCaptionAtLilmit: 0,
 debugMode: false,
 fallbacks: {
   simplifyAll: "off",
   nextSlideOnWindowFocus: "off",
   disableFocusListener: false,
 }
});
 });
</script>
<!-- Slider Revolution Ends -->

</div>
</section>
<!-- Section: Client Say -->
<section class="divider parallax layer-overlay overlay-theme-colored-9 mt-10" data-background-ratio="0.5" data-bg-img="<?=base_url()?>images/bg/bg2.jpg">
 <div class="container-fluid pt-60 pb-60">
  <div class="row">
   <div class="col-md-12 col-md-offset-0">

    <div class="owl-carousel-1col" data-dots="true">
     <?php
     foreach ($workshop as $w) {
      ?>
      <div class="item">
        <div class="col-md-12 col-sm-12">
         <div class="panel panel-primary">
          <div class="panel-heading">Upcoming Seminar</div>
          <div class="panel-body">
           <div class="col-md-9">
            <div class="col-md-6 topics ">
             <div class="meet-doctors">
              <h2 class="text-uppercase mt-0 line-height-1">Seminar <span class="text-theme-colored">Topics</span></h2>

              <h4><?=$w->name?></h4>
            </div>

          </div>
          <div class="col-md-6 date_time">
            <div class="meet-doctors">
             <h2 class="text-uppercase mt-0 line-height-1">Course <span class="text-theme-colored">Duration</span></h2>

             <h4><?=$w->duration?></h4>
             <h4>Date: <?php echo date("jS F, Y", strtotime($w->date)); ?></h4>
           </div>

         </div>
         <br>
         <div class="col-md-12">
           <div class="meet-doctors">
            <h2 class="text-uppercase mt-0 line-height-1">Courses <span class="text-theme-colored">Details</span></h2>

            <p><?=$w->details?></p>
          </div>

        </div>
        <div class="col-md-12 text-center">
          <!-- <a class="btn btn-theme-colored btn-lg text-center flip" href="registration.html">Apply Now</a> -->
        </div>
      </div>
      <?php
      $where = array('id' =>$w->trainer);
      $wheres = array('trainerID' =>$w->trainer);
      $ci =& get_instance();
      $train=$ci->rest->SelectData_1('trainer','*',$where);
      $link=$ci->rest->SelectData('social_link','*',$wheres);
      ?>
      <div class="col-md-3 trainer">
        <div class="team team_trainer">
         <div class="thumb"><img class="img-fullwidth" src="<?=base_url().'trainers/'.$train->photo?>" alt=""></div>
         <div class="content border-1px p-15 bg-light clearfix">
          <h4 class="name text-theme-color-2 mt-0"><?=$train->name?> - <small>Trainer</small></h4>
          <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
           <?php 
           foreach ($link as $e) {
             if($e->icon=='facebook'){     
              ?>
              <li><a href="<?=$e->link?>"><i class="fa fa-facebook"></i></a></li>
              <?php }elseif ($e->icon=='twitter') {?>
              <li><a href="<?=$e->link?>"><i class="fa fa-twitter"></i></a></li>
              <?php }elseif ($e->icon=='google') {?>
              <li><a href="<?=$e->link?>"><i class="fa fa-google-plus"></i></a></li>
              <?php }} ?>
            </ul>
            <a class="btn btn-theme-colored btn-sm text-center flip" href="<?=base_url().'trainer/'.$train->id?>">view details</a>
          </div>
        </div> 
      </div>
    </div>
  </div>

</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</section>
<!-- Section:about-->
<section>
 <div class="container pb-60">
  <div class="section-content">
   <div class="row">
    <div class="col-md-8">
     <div class="meet-doctors">
      <h2 class="text-uppercase mt-0 line-height-1">Welcome To <span class="text-theme-colored">SDTI</span></h2>
      <h6 class="text-uppercase letter-space-5 line-bottom title font-playfair text-uppercase">Dazzlig For Future</h6>
      <p>Cum sociis natoque penatibus et ultrices volutpat. Nullam wisi ultricies a, gravida vitae, dapibus risus ante sodales lectus.Cum sociis natoque penatibus et ultrices volutpat. Nullam wisi ultricies a, gravida vitae, dapibus risus ante sodales lectus</p>
    </div>
    <div class="row mb-sm-30">
      <div class="col-sm-6 col-md-6">
       <div class="icon-box p-0 mb-20">
        <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-sm pull-left sm-pull-none flip" href="index-mp-layout2.html#">
         <i class="pe-7s-scissors text-white"></i>
       </a>
       <div class="ml-70 ml-sm-0">
         <h5 class="icon-box-title mt-10 text-uppercase letter-space-2 mb-10">Well decorated Lab</h5>
         <p class="text-gray">Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet.</p>
       </div>
     </div>
   </div>
   <div class="col-sm-6 col-md-6">
     <div class="icon-box p-0 mb-20">
      <a class="icon bg-theme-color-2 icon-circled icon-border-effect effect-circle icon-sm pull-left sm-pull-none flip" href="index-mp-layout2.html#">
       <i class="pe-7s-pen text-white"></i>
     </a>
     <div class="ml-70 ml-sm-0">
       <h5 class="icon-box-title mt-10 text-uppercase letter-space-2 mb-10">Latest Syllabus </h5>
       <p class="text-gray">Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet.</p>
     </div>
   </div>
 </div>
 <div class="col-sm-6 col-md-6">
   <div class="icon-box p-0 mb-20">
    <a class="icon bg-theme-color-2 icon-circled icon-border-effect effect-circle icon-sm pull-left sm-pull-none flip" href="index-mp-layout2.html#">
     <i class="pe-7s-tools text-white"></i>
   </a>
   <div class="ml-70 ml-sm-0">
     <h5 class="icon-box-title mt-10 text-uppercase letter-space-2 mb-10">Flixible Shedule </h5>
     <p class="text-gray">Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet.</p>
   </div>
 </div>
</div>
<div class="col-sm-6 col-md-6">
 <div class="icon-box p-0 mb-20">
  <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-sm pull-left sm-pull-none flip" href="index-mp-layout2.html#">
   <i class="pe-7s-vector text-white"></i>
 </a>
 <div class="ml-70 ml-sm-0">
   <h5 class="icon-box-title mt-10 text-uppercase letter-space-2 mb-10">Experienced Trainer</h5>
   <p class="text-gray">Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet.</p>
 </div>
</div>
</div>
<div class="col-sm-6 col-md-6">
 <div class="icon-box p-0">
  <a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-sm pull-left sm-pull-none flip" href="index-mp-layout2.html#">
   <i class="pe-7s-phone text-white"></i>
 </a>
 <div class="ml-70 ml-sm-0">
   <h5 class="icon-box-title mt-10 text-uppercase letter-space-2 mb-10">Job Placement</h5>
   <p class="text-gray">Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet.</p>
 </div>
</div>
</div>
<div class="col-sm-6 col-md-6">
 <div class="icon-box p-0">
  <a class="icon bg-theme-color-2 icon-circled icon-border-effect effect-circle icon-sm pull-left sm-pull-none flip" href="index-mp-layout2.html#">
   <i class="pe-7s-light text-white"></i>
 </a>
 <div class="ml-70 ml-sm-0">
   <h5 class="icon-box-title mt-10 text-uppercase letter-space-2 mb-10">Forward Location</h5>
   <p class="text-gray">Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet.</p>
 </div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
  <div class="p-30 mt-0 bg-theme-colored">
   <h3 class="title-pattern mt-0"><span class="text-white">Notice <span class="text-theme-color-2">Update</span></span></h3>
   <!-- Appilication Form Start-->
   <ul class="list-group" style="padding: 0px">
     <li class="list-group-item"  style="padding: 0px"><marquee direction="up" scrolldelay="200" onmouseover="this.stop();" onmouseout="this.start();">
       <ul class="list-group"  style="padding: 0px">

         <?php
         foreach ($notice as $e) {
           ?>
           <li class="list-group-item" ><a href="<?=base_url().'notice/'.$e->id?>"><?=$e->title?></a></li>
           <?php } ?>

         </ul></marquee>
       </li>
     </ul>
     <!-- Application Form End-->

     <!-- Application Form Validation Start-->
     <script type="text/javascript">
      $("#reservation_form").validate({
       submitHandler: function (form) {
        var form_btn = $(form).find('button[type="submit"]');
        var form_result_div = '#form-result';
        $(form_result_div).remove();
        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
        var form_btn_old_msg = form_btn.html();
        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
        $(form).ajaxSubmit({
         dataType: 'json',
         success: function (data) {
          if (data.status == 'true') {
           $(form).find('.form-control').val('');
         }
         form_btn.prop('disabled', false).html(form_btn_old_msg);
         $(form_result_div).html(data.message).fadeIn('slow');
         setTimeout(function () {
           $(form_result_div).fadeOut('slow')
         }, 6000);
       }
     });
      }
    });
  </script>
  <!-- Application Form Validation Start -->
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Section: COURSES -->
<section class="bg-lighter">
 <div class="container pb-40">
  <div class="section-title mb-0">
   <div class="row">
    <div class="col-md-8">
     <h2 class="text-uppercase font-28 line-bottom mt-0 line-height-1">Our <span class="text-theme-color-2 font-weight-400">COURSES</span></h2>
     <h4 class="pb-20">Our Latest Courses </h4>
   </div>
 </div>
</div>
<div class="section-content">
  <div class="row">
    <?php 
    foreach ($course as $co) {
      ?>
      <div class="col-sm-6 col-md-3" >
        <div class="service-block bg-white" style="min-height: 500px">
         <div class="thumb"> <img alt="featured project" src="<?=base_url().'course_photo/'.$co->photo?>" class="img-fullwidth" height="150">
         </div>
         <div class="content text-left flip p-25 pt-0">
          <h4 class=" mb-10"><?=$co->name?></h4>
          <h5 class="line-bottom"><?=$co->duration?></h5>
          <p style="text-align: justify;"><?=mb_substr($co->description,0,172,"utf-8")?></p>
          <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="<?=base_url().'course_details/'.$co->id.'_'.$co->category?>">view details</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
</div>
</section>

<!-- Section: Why Choose Us -->
<section id="event">
 <div class="container">
  <div class="section-content">
   <div class="row">
    <div class="col-md-5"> 
     <img src="images/photos/1.jpg" class="img-fullwidth" alt="">
   </div>
   <div class="col-md-7 pb-sm-20">
     <h3 class="title line-bottom mb-20 font-28 mt-0 line-height-1">Admit  <span class="text-theme-color-2 font-weight-400">and Certified With</span> BTEB</h3>
     <p class="mb-20">The Cweren Law Firm is a recognized leader in landlord tenant representation throughout Texas.The largests professional property management companies the region.The largest professional property management companies is a recognized leader in landlord tenant representation throughout Texas</p>
     <a class="btn btn-theme-colored btn-sm text-center flip" href="<?=base_url().'Front/certifiedList'?>">Certified Student's List</a>
     <a class="btn btn-theme-colored btn-sm text-center flip" href="http://www.bteb.gov.bd/">BTEB</a>
     <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
      <div class="icon-box text-center pl-0 pr-0 mb-0">
       <a href="index-mp-layout2.html#" class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-md">
        <i class="pe-7s-phone text-white"></i>
      </a>
      <h5 class="icon-box-title mt-15 mb-10 letter-space-4 text-uppercase"><strong>Responsive</strong></h5>
    </div>
  </div>
  <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
   <div class="icon-box text-center pl-0 pr-0 mb-0">
    <a href="index-mp-layout2.html#" class="icon bg-theme-color-2 icon-circled icon-border-effect effect-circle icon-md">
     <i class="pe-7s-pen text-white"></i>
   </a>
   <h5 class="icon-box-title mt-15 mb-10 letter-space-4 text-uppercase"><strong>validation</strong></h5>
 </div>
</div>
<div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
 <div class="icon-box text-center pl-0 pr-0 mb-0">
  <a href="index-mp-layout2.html#" class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-md">
   <i class="pe-7s-light text-white"></i>
 </a>
 <h5 class="icon-box-title mt-15 mb-0 letter-space-4 text-uppercase"><strong>CERTIFICATION</strong></h5>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Divider: Funfact -->
<section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="images/bg/bg2.jpg" data-parallax-ratio="0.7">
 <div class="container">
  <div class="row">
   <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
    <div class="funfact text-center">
     <i class="pe-7s-smile mt-5 text-theme-color-2"></i>
     <h2 data-animation-duration="2000" data-value="5248" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
     <h5 class="text-white text-uppercase mb-0">Happy Students</h5>
   </div>
 </div>
 <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
   <div class="funfact text-center">
    <i class="pe-7s-note2 mt-5 text-theme-color-2"></i>
    <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
    <h5 class="text-white text-uppercase mb-0">Our Courses</h5>
  </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
 <div class="funfact text-center">
  <i class="pe-7s-users mt-5 text-theme-color-2"></i>
  <h2 data-animation-duration="2000" data-value="248" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
  <h5 class="text-white text-uppercase mb-0">Our Teachers</h5>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
 <div class="funfact text-center">
  <i class="pe-7s-cup mt-5 text-theme-color-2"></i>
  <h2 data-animation-duration="2000" data-value="24" class="animate-number text-white mt-0 font-38 font-weight-500">0</h2>
  <h5 class="text-white text-uppercase mb-0">Awards Won</h5>
</div>
</div>
</div>
</div>
</section>

<!-- Section: team -->
<section>
 <div class="container pt-60">
  <div class="section-title mb-0">
   <div class="row">
    <div class="col-md-8">
     <h2 class="mt-0 text-uppercase font-28 line-bottom">Our <span class="text-theme-color-2 font-weight-400">Teachers</span></h2>

   </div>
 </div>
</div>
<div class="section-content">
  <div class="row multi-row-clearfix">
    <?php 
    $ci =& get_instance();
    foreach ($trainer as $t) {
      $where=array('trainerID'=>$t->id);
      $links=$ci->rest->SelectData('social_link', '*', $where);
      ?>
      <div class="col-sm-6 col-md-3 mb-sm-30 sm-text-center">
        <div class="team" style="min-height:600px">
         <div class="thumb"><img class="img-fullwidth" src="<?=base_url().'trainers/'.$t->photo?>" alt=""></div>
         <div class="content border-1px p-15 bg-light clearfix">
          <h4 class="name text-theme-color-2 mt-0"><?=$t->name?> - <small><?=$t->designation?></small></h4>
          <p class="mb-20"><?=substr($t->description,0,70)?></p>
          <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-left flip">
            <?php
            foreach ($links as $li) {
              if($li->icon=='facebook'){  
                ?>
                <li><a href="<?=$li->link?>"><i class="fa fa-facebook"></i></a></li>
                <?php }elseif ($li->icon=='twitter') {?>
                <li><a href="<?=$li->link?>"><i class="fa fa-twitter"></i></a></li>
                <?php }elseif ($li->icon=='google') {?>
                <li><a href="<?=$li->link?>"><i class="fa fa-google-plus"></i></a></li>
                <?php } } ?>
              </ul>
              <a class="btn btn-theme-colored btn-sm pull-right flip" href="<?=base_url().'trainer/'.$t->id?>">view details</a>
            </div>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>
  </div>
</section>

<!-- Section: Gallery-->
<section class="bg-lighter">
 <div class="container pt-60">
  <div class="section-title mb-0">
   <div class="row">
    <div class="col-md-8">
     <h2 class="mt-0 text-uppercase font-28 line-bottom">Our <span class="text-theme-color-2 font-weight-400">Gallery</span></h2>
     <h4 class="pb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
   </div>
 </div>
</div>
<div class="section-content">
  <div class="row">
   <div class="col-md-12">

    <!-- Portfolio Gallery Grid -->
    <div id="grid" class="gallery-isotope grid-4 gutter clearfix">

      <?php
      foreach ($gallery as $g) {
        ?>
        <div class="gallery-item select3">
         <div class="thumb">
          <img class="img-fullwidth" src="<?=base_url().'gallery/'.$g->photo?>"" alt="project" height="150" width="140">
          <div class="overlay-shade"></div>
          <div class="icons-holder">
           <div class="icons-holder-inner">
            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
             <a data-lightbox="image" href="<?=base_url().'gallery/'.$g->photo?>"><i class="fa fa-plus"></i></a>

           </div>
         </div>
       </div>
     </div>
   </div>
   <?php } ?>
   <!-- Portfolio Item End -->

 </div>
 <!-- End Portfolio Gallery Grid -->
</div>
</div>
</div>
</div>
</section>

<!-- Section: Client Say -->
<section class="divider parallax layer-overlay overlay-theme-colored-9" data-background-ratio="0.5" data-bg-img="images/bg/bg2.jpg">
 <div class="container pt-60 pb-60">
  <div class="row">
   <div class="col-md-8 col-md-offset-2">
    <h2 class="line-bottom-center text-gray-lightgray text-center mt-0 mb-30">Our Happy Students say</h2>
    <div class="owl-carousel-1col" data-dots="true">
<?php
foreach ($test as $te) {
?>
     <div class="item">
      <div class="testimonial-wrapper text-center">
       <div class="thumb"><img class="img-circle" alt="" src="<?=base_url().'testimonial_photo/'.$te->photo?>"></div>
       <div class="content pt-10">
        <p class="font-15 text-white"><em><?=$te->msg?></em></p>
        <i class="fa fa-quote-right font-36 mt-10 text-gray-lightgray"></i>
        <h4 class="author text-theme-color-2 mb-0"><?=$te->name?></h4>
        <h6 class="title text-white mt-0 mb-15"><?=$te->designation?></h6>
      </div>
    </div>
  </div>
<?php } ?>
</div>
</div>
</div>
</div>
</section>

<!-- Section: blog -->

<!-- Divider: Call To Action -->
<section class="bg-theme-color-2">
 <div class="container pt-10 pb-20">
  <div class="row">
   <div class="call-to-action">
    <div class="col-md-6">
     <h3 class="mt-5 mb-5 text-white vertical-align-middle"><i class="pe-7s-mail mr-10 font-48 vertical-align-middle"></i> SUBSCRIBE TO OUR NEWSLETTER</h3>
   </div>
   <div class="col-md-6">
     <!-- Mailchimp Subscription Form Starts Here -->
     <form id="mailchimp-subscription-form" class="newsletter-form mt-10">
      <div class="input-group">
       <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-call">
       <span class="input-group-btn">
        <button data-height="45px" class="btn bg-theme-colored text-white btn-xs m-0 font-14" type="submit">Subscribe</button>
      </span>
    </div>
  </form>
  <!-- Mailchimp Subscription Form Validation-->
  <script type="text/javascript">
   $('#mailchimp-subscription-form').ajaxChimp({
    callback: mailChimpCallBack,
    url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
  });

   function mailChimpCallBack(resp) {
                                            // Hide any previous response text
                                            var $mailchimpform = $('#mailchimp-subscription-form'),
                                            $response = '';
                                            $mailchimpform.children(".alert").remove();
                                            if (resp.result === 'success') {
                                             $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                                           } else if (resp.result === 'error') {
                                             $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                                           }
                                           $mailchimpform.prepend($response);
                                         }
                                       </script>
                                       <!-- Mailchimp Subscription Form Ends Here -->
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </section>

                             <!-- end main-content -->
                           </div>

                           <?php
                           $this->load->view('footer');
                           ?>