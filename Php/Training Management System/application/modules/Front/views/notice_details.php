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



  <section>
    <div class="container">
      <div class="section-content">
        <h1><?=$notice->title?></h1>
        <em>Published On: <strong><?=$notice->date?></strong></em>
        <hr>
        <?php
        if ($notice->file!=='') {
        ?>
        <div class="embed-responsive embed-responsive-16by9">
        <iframe src="<?=base_url().'notice_files/'.$notice->file?>" class="embed-responsive-item"  frameborder="0"></iframe>
        </div>
        <?php } ?>
        <p style="text-align: justify"><?=$notice->description?></p>
        <?php
        if ($notice->photo!=='') {
        ?>
        <img src="<?=base_url().'notice_files/'.$notice->photo?>" >
        <?php } ?>
        
        </div>
      </div>
    </section>
  </div>

  <?php
  $this->load->view('footer');
  ?>