<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white"><?=$type->service?></h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li><a href="#">Services</a></li>
              <li class="active text-gray-silver"><?=$type->service?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-lighter">
      <div class="container">
        <div class="row">
<?php 
foreach ($news as $n) {
?>
          <div class="col-md-12">
          <h2 style="text-transform: uppercase;"><?=$n->head?></h2>
            <img class="pull-left mr-15 thumbnail" src="<?=base_url().'service_files/'.$n->photo?>" alt="" width="400" height="300">
            <p style="text-align: justify;"><?=$n->news?></p>
            <div class="separator separator-rouned">
              <i class="fa fa-cog fa-spin"></i>
            </div>
        </div>
        <?php } ?>
      </div>
    </section>
  </div>

  <?php
  $this->load->view('footer');
  ?>