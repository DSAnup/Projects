<?php 
$this->load->view('front/header');
?>
<section style="background: #fff" class="col-md-12">
<?php
if(!isset($_SESSION['stdID'])){
?>
	<div class="col-md-8" style="text-align: center;padding-top: 50px">
		<h1 style="color: red">Welcome to <img src="<?=base_url()?>assets/img/logo1.png" width="300"></h1>
		<img src="<?=base_url()?>assets/img/bb.png" class="img-responsive">
		

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
		<div class="container-fluid">
			<div class="col-md-8" style="border-right: 2px solid black;">
				<br>
				
				<p style="text-align: justify;">
					<img src="<?=base_url().'assets/uploads/'.$sub->photo?>" style="float: left; margin-right: 5px" class="img-responsive">
					<b><?=$sub->name?></b><br>
					<?=$sub->details?>
				</p>
			</div>
			
		<div class="col-md-4" style="padding-left: 25px">
			<h3>Exam Modules</h3>
			<ol>
			<?php
			$ci =& get_instance();
			$ci->load->model('C_admin_model');
			$std=$this->session->userdata('stdID');
			foreach ($query as $k) {
				$qq=$ci->C_admin_model->SelectData('enrollment','*',array('course_id'=>$k->id,'std_id'=>$std));
				$rr=$this->C_admin_model->SelectData_1('course','*',array('id'=>$k->id));
        		$q = count($qq);
				if($q <= $rr->howmuchtime){
				echo "<li><a href='".base_url()."Front/take_quiz2/".$k->id."'>".$k->name."</a></li>";
			}else{
				echo "<li>".$k->name."</li>";
			}
			}
			?>
			</ol>
		</div>
</div>
		<?php } ?>
	</section>
	<section class="footer_section" style="width: 100%">
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