<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Student's Work</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="page-teachers-details.html#">Home</a></li>
              <li><a href="page-teachers-details.html#">Gallery</a></li>
              <!-- <li class="active text-gray-silver">Page Title</li> -->
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Works Filter -->
          <div class="portfolio-filter font-alt align-center">
            <a href="page-gallery-4col.html#" class="active" data-filter="*">All</a>
          </div>
          <!-- End Works Filter -->

          <!-- Portfolio Gallery Grid -->
          <div id="grid" class="gallery-isotope grid-4 gutter clearfix">
            <!-- Portfolio Item Start -->
            <?php
            foreach ($gallery as $e) {
            ?>
            <div class="gallery-item <?=$e->category?>">
              <div class="thumb">
                <img class="img-fullwidth" src="<?=base_url().'gallery/'.$e->photo?>" alt="project" height="150">
                <div class="overlay-shade"></div>
                <div class="icons-holder">
                  <div class="icons-holder-inner">
                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                      <a data-lightbox="image" href="<?=base_url().'gallery/'.$e->photo?>"><i class="fa fa-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- End Portfolio Gallery Grid -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$this->load->view('footer');
?>