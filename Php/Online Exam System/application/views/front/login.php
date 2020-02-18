<?php
$this->load->view('front/header');
?>
  	<section class="signin_section"><!-- start of signIn section -->
  		<div class="container">
  			<div class="row">
  				<div class="pannel_style pannel_style2">SignIn</div>
  				<div class="col-sm-4"></div>
  				<div class="col-sm-4"><!-- start of signin form part -->
  					<div class="contact_form">
  						 <form class="form-horizontal" action="<?=base_url().'Front/login_check'?>" method="post">
  						 <?php 
  						 $e=$this->session->flashdata('login');
  						 if(isset($e)){
  						 ?>
							<div class="alert alert-danger">
  <?php
  
  echo $e;
  ?>
</div>
<?php } ?>
							<div class="form-group">
							  <label class="control-label col-sm-2 label_style" for="mail">Mail:</label>
							  <div class="col-sm-10">          
								<input type="text" class="form-control" id="mail" placeholder="Enter Mail Address" name="email" required>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-sm-2 label_style" for="Password">Password:</label>
							  <div class="col-sm-10">          
								<input type="password" class="form-control" id="Password" placeholder="Enter password" name="password" required>
							  </div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2 label_style" for="Password"></label>
								<div class="col-sm-10 sub_button">
							  		<input type="submit" value="submit" id="" name="">
							  	</div>
								  <div class="col-sm-10 for_pass">
									<a href="#">Forget Password</a>
								  </div>
							</div>
						  </form>
  					</div>
  				</div><!-- end of signin part -->
  				<div class="col-sm-4"></div>
  			</div>
  		</div>
  	</section><!-- end of signin section -->
  	
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