<?php 
$this->load->view('front/header');
?>
<section style="background: #fff" class="col-md-12">
<?php
if(!isset($_SESSION['stdID'])){
?>
	<div class="col-md-8" style="text-align: center;padding-top: 120px">
		<h1 style="color: red">Welcome to <img src="<?=base_url()?>assets/img/logo1.png" width="300"></h1>
		

	</div>
	<div class="col-md-4" style="text-align: center;">
		<h4>Login</h4>
		<form action="<?=base_url()?>Front/login_check" method="post">
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
				<table class="table">
					<tr>
						<th>E-Mail: </th>
						<td><input type="text" name="email" class="form-control" placeholder="Username"></td>
					</tr>
					<tr>
						<th>Password: </th>
						<td><input type="password" name="password" class="form-control" placeholder="*******"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Login" class="btn btn-primary"></td>
					</tr>
				</table>
			</form>
			<h5>New User?</h5>
			<a href="<?=base_url()?>Front/signup">
				<h4>Create New Account</h4>
			</a>
			<img src="<?=base_url().'img/banner.jpg'?>" class="img-responsive">
			<img src="<?=base_url().'img/banner.jpg'?>" class="img-responsive">
		</div>
		<?php }else{ ?>
		<div class="row" style="text-align: center;">
			<h1 style="color: red">Welcome to <img src="<?=base_url()?>assets/img/logo1.png" width="200"></h1>
		</div>
		<div class="container-fluid">
		<div class="col-md-5">
			<h3>Subject List</h3>
			<ol>
			<?php
			foreach ($sub as $k) {
				echo "<li><a href='".base_url()."Front/subject/".$k->id."'>".$k->cat_name."</a></li>";
			}
			?>
			</ol>
		</div>
		<div class="col-md-7">
			<img src="<?=base_url()?>assets/img/dd.webp" class="img-responsive" >
		</div>
</div>
		<?php } ?>
	</section>
	<section class="footer_section" style="
     position: absolute;
    bottom: 0; width: 100%">
   		<div class="container" >
   			<div class="row">
   				<div class="col-sm-12">
   					<div class="foot_bottom_content" style="padding-top: 20px">
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