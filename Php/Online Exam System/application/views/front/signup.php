<?php
$this->load->view('front/header');
?>
<section class="contact_section"><!-- start of sign up section -->
	<div class="container">
		<div class="row">
			<div class="pannel_style pannel_style2">Sign Up Form</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-6"><!-- start of contact form part -->
				<div class="contact_form">
				<form class="form-horizontal" method="post" action="<?=base_url().'Front/signup_post'?>" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="name">Name:</label>
							<div class="col-sm-10">          
								<input type="text" class="form-control" id="name" placeholder="Your name here" name="name" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="name">Address:</label>
							<div class="col-sm-10">          
								<input type="text" class="form-control" id="name" placeholder="Like Block C, Road No 5, Banasree, Dhaka" name="address" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="name">Phone Number:</label>
							<div class="col-sm-10">          
								<input type="text" class="form-control" id="name" placeholder="01977117300" name="phone" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="mail">E-Mail:</label>
							<div class="col-sm-10">          
								<input type="email" class="form-control" id="mail" placeholder="info@youthfireit.com" name="email" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="name">Gender:</label>
							<div class="col-sm-10">          
								<input type="radio" name="gender" value="male" checked> Male<br>
								<input type="radio" name="gender" value="female"> Female<br>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="name">Birth Date:</label>
							<div class="col-sm-10">          
								<input type="date" class="form-control" id="date" placeholder="Enter Name" name="dob" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="name">School/Collage/University/Institute:</label>
							<div class="col-sm-10">          
								<input type="text" class="form-control" id="name" placeholder="Dhaka college" name="college" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="Password">Password:</label>
							<div class="col-sm-10">          
								<input type="password" class="form-control" id="Password" placeholder="your password here" name="Password" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="Password">Confirm Password:</label>
							<div class="col-sm-10">          
								<input type="password" class="form-control" id="Password" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label control-label2 col-sm-2" for="Password">Image</label>
							<div class="col-sm-10">          
								<input type="file" class="form-control" id="Password" placeholder="" name="photo" required="">
							</div>
						</div>
						<div class="form-group">        
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-3"></div>
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