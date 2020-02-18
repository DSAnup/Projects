<?php
$this->load->view('front/header');
?>
<section class="contact_section"><!-- start of sign up section -->
	<div class="container">
		<div class="row">
			<!-- <div class="pannel_style pannel_style2" style="color: #fff">Profile</div> -->
<div class="col-sm-12" style="text-align: center;margin-bottom: 60px; margin-top: 50px">
	<h1 style="color: red">Welcome to <img src="<?=base_url()?>assets/img/logo1.png" width="200"></h1>
</div>
			<div class="col-sm-6"><!-- start of contact form part -->

					<table class="table table-bordered">
						<tr>
							<th>Name: </th>
							<td><?= $p->first_name ." ". $p->surname ?></td>
						</tr>
						<tr>
							<th>Username: </th>
							<td><?=$p->username?></td>
						</tr>
						<tr>
							<th>E-mail: </th>
							<td><?=$p->email?></td>
						</tr>
						<tr>
							<th>Gurdian Email: </th>
							<td><?=$p->guardian_email?></td>
						</tr>
						<tr>
							<th>City: </th>
							<td><?=$p->city?></td>
						</tr>
						<tr>
							<th>Country: </th>
							<td><?=$p->country?></td>
						</tr>
					</table>
			</div>
			<div class="col-sm-6">
				<b>Enrolled Subjects: </b>
				<ol>
					<?php
						$ci =& get_instance();
						$ci->load->model('C_admin_model');
						$d=$this->session->userdata('stdID');
						foreach ($sub as $k) {
							$m=$ci->C_admin_model->get_enroll($k->id,$d);
							if(!empty($m)){
								$mm=$ci->C_admin_model->SelectData('course','*',array('subject'=>$k->id));
					?>
					<li><b><?=$k->name?></b>
						<ul>
							<?php 
								foreach ($mm as $e) {
									$f=$ci->C_admin_model->SelectData_1('enrollment','*',array('course_id'=>$e->id,'std_id'=>$d));
									
									if(!empty($f)){
										echo "<li>".$e->name;
									if($f->published!=''){
										echo "----------------- <a href='".base_url()."Front/result/".$e->id."'>View Result</a></li>";
									}
								}
								}
							?>
						</ul>
					</li>
					<?php } }?>
				</ol>
			</div>
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