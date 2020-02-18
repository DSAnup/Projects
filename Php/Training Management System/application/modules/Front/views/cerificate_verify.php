<?php

$this->load->view('header');
?>
<style type="text/css">
  .btn.sharp {
    border-radius:0;
  }
  .btn {
    border: 0 none;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
  
  .btn:focus, .btn:active:focus, .btn.active:focus {
    outline: 0 none;
  }
  
  .btn-primary {
    background: #0099cc;
    color: #ffffff;
  }
  
  .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
    background: #33a6cc;
  }
  
  .btn-primary:active, .btn-primary.active {
    background: #007299;
    box-shadow: none;
  }
</style>
<div class="main-content">
  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url()?>images/bg/bg3.jpg">
    <div class="container pt-70 pb-20">
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white" style="text-transform: uppercase;">Verify Certificate Easily Here</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="page-teachers-details.html#">Home</a></li>
              <li><a href="page-teachers-details.html#">Pages</a></li>
              <li class="active text-gray-silver">Verification</li>
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
         <form action="<?=base_url().'Front/verification'?>" method="post">
          <strong>Enter Enrollment ID :</strong>
          <input type="text" size="80" name="id">
          <input type="submit" class="btn btn-primary btn-sm sharp" value="Verify" style="margin-bottom: 5px">
        </form>
      </div>
    </div>
  </div>
</section>
</div>

<?php
$this->load->view('footer');
?>