<?php
$this->load->view('front/header');
?>
<section class="contact_section"><!-- start of sign up section -->
	<div class="container">
		<div class="row">
			<div class="pannel_style pannel_style2"><?=$c->name?></div>
			<div class="col-sm-1"></div>
			<div class="col-sm-10"><!-- start of contact form part -->
				<div class="contact_form">
					<img src="<?=base_url().'assets/uploads/'.$c->photo?>" class="img-responsive">
					<hr>
					<div class="col-md-6">
						<p style="text-align: justify;"><?=$c->description?></p>
					</div>
					<div class="col-md-6 embed-responsive embed-responsive-16by9">
						<?php
						if($c->video!==''){
							$url = $c->video;
							preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
							$iddd = $matches[1];
							?>
							<iframe class="embed-responsive-item" id="ytplayer" type="text/html"  src="https://www.youtube.com/embed/<?php echo $iddd ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
							<?php } ?>
						</div>

						
					</div>
					<div class="col-md-12" style="padding-bottom: 20px">
							<?php
							$dser=$this->session->userdata('stdID');
							
							if(isset($dser)){
								if($enroll=='yes'){
								
							?>
							<a href="<?=base_url().'Front/materials/'.$c->id?>" class="btn btn-primary">View Materials</a>
							<?php }else{ ?>
							<a href="<?=base_url().'Front/enroll/'.$c->id?>" class="btn btn-primary">Enroll</a>
							<?php } }else{ echo "<span style='color: red; background:green'>Please Login to get the course materials !";} ?>
						</div>
				</div>
				<div class="col-sm-1"></div>
				<!-- end of signup information -->
			</div>
		</div>
	</section><!-- end of sign up section -->

	<section class="footer_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="foot_top_content">
						<div class="col-sm-4"></div>
						<div class="col-sm-4"></div>
						<div class="col-sm-4"></div>
					</div>
					<div class="foot_bottom_content">
						<div class="col-sm-4">
							<p>All right Recived&copy;<a href="www.youthifreit.com">YOUTHFIREIT</a></p>
						</div>
						<div class="col-sm-8">
							<div class="foot_nav">
								<ul>
									<li><a href="#">Facebook</a></li>
									<li><a href="#">Linkedin</a></li>
									<li><a href="#">Instagram</a></li>
									<li><a href="#">Twitter</a></li>
									<li><a href="#">Behance</a></li>
								</ul>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- end of footer section -->
	<script src="<?=base_url()?>front_assets/js/jquery-3.2.1.js"></script>
	<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script>
</body>
</html>