<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Teachers Details</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li class="active text-gray-silver">Trainer</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section> 
    <div class="container">
      <div class="section-content">
        <div class="row">
          <div class="col-md-4">
            <div class="thumb">
              <img src="<?=base_url()?>trainers/<?=$trainer->photo?>" alt="">
            </div>
          </div>
          <div class="col-md-8">
            <h4 class="name font-24 mt-0 mb-0"><?=$trainer->name?></h4>
            <h5 class="mt-5 text-theme-color-2"><?=$trainer->designation?></h5>
            <p><?=$trainer->description?></p>
            <ul class="styled-icons icon-dark icon-theme-colored icon-sm mt-15 mb-0">
              <?php
              $ci =& get_instance();
              $where=array('trainerID'=>$trainer->id);
              $links=$ci->rest->SelectData('social_link', '*', $where);
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
                <h4 class="line-bottom">About Me:</h4>
                <div class="volunteer-address">
                  <ul>
                    <li>
                      <div class="bg-light media border-bottom p-15 mb-20">
                        <div class="media-left">
                          <i class="pe-7s-pen text-theme-colored font-24 mt-5"></i>
                        </div>
                        <div class="media-body">
                          <h5 class="mt-0 mb-0">Experiences:</h5>
                          <p><?=$trainer->experience?></p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="bg-light media border-bottom p-15 mb-20">
                        <div class="media-left">
                          <i class="fa fa-map-marker text-theme-colored font-24 mt-5"></i>
                        </div>
                        <div class="media-body">
                          <h5 class="mt-0 mb-0">Address:</h5>
                          <p><?=$trainer->address?></p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="bg-light media border-bottom p-15">
                        <div class="media-left">
                          <i class="fa fa-phone text-theme-colored font-24 mt-5"></i>
                        </div>
                        <div class="media-body">
                          <h5 class="mt-0 mb-0">Contact:</h5>
                          <p><?=$trainer->contact?></p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>

    <?php
    $this->load->view('footer');
    ?>