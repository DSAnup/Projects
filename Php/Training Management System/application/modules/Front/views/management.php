<?php

$this->load->view('header');
?>
<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Management</h2>
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
        <?php
        foreach ($query as $k) {
          ?>
          <div class="col-md-2 banner-bottom-grid" style="text-align: center;">
            <p><img style="border-radius: 50%" src="<?=base_url().'management_photo/'.$k->photo?>" width="170" height="170"></p>
            <h4><?=$k->name?></h4>
            <span style="color: #b9bbbf"><?=$k->designation?> </span>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
$this->load->view('footer');
?>