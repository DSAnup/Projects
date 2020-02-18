<?php

$this->load->view('header');
?>

<div class="main-content">

  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">

      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">Career</h2>
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
        <table class="table table-bordered">
        <?php
        $i=0;
        foreach ($e as $k) {
        ?>
          <tr>
            <th style="width: 200px">SL NO:</th>
            <td><?=++$i?></td>
          </tr>
          <tr>
            <th style="width: 200px">Post Title</th>
            <td><?=$k->post?></td>
          </tr>
          <tr>
            <th style="width: 200px">Publish Date</th>
            <td><?=$k->date?></td>
          </tr>
          <tr>
            <th style="width: 200px">Vacancy</th>
            <td><?=$k->vacancy?></td>
          </tr>
          <tr>
            <th style="width: 200px">Details</th>
            <td><?=$k->details?></td>
          </tr>
          <?php } ?>
        </table>
        </div>
      </div>
    </section>
  </div>

  <?php
  $this->load->view('footer');
  ?>