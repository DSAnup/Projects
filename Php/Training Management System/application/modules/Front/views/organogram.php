<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Organogram</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="page-teachers-details.html#">Home</a></li>
              <li><a href="page-teachers-details.html#">Pages</a></li>
              <li class="active text-gray-silver">Organogram</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section>
    <div class="container">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="<?=base_url().'images/org.pdf'?>"
   width="400px" height="1000px" ></iframe>



        </div>
      </div>
    </section>
  </div>

  <?php
  $this->load->view('footer');
  ?>