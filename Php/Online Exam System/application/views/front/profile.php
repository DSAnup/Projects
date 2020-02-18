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
				<table class="table">
				    <thead>
				      <tr>
				        <th>Sl</th>
				        <th>Enrolment Date</th>
				        <th>Course</th>
				        <th>View Results</th>
				      </tr>
				    </thead>
				    <tbody>

					<?php
						$i = 0;
						$ci =& get_instance();
						$ci->load->model('C_admin_model');
						$d=$this->session->userdata('stdID');
						foreach ($enrollment as $k) {
							$i++;
					?>
				      <tr>
				        <td><?= $i; ?></td>
				        <td><?= $k->date; ?></td>
				        <td><?php
				        	foreach($course as $c){
				        		if($c->id == $k->course_id){
				        			echo $c->name;
				        		}
				        	}
				        ?></td>
				        <td><a href="<?= base_url().'Front/result2/'.$k->enroll_id?>">View Results</a></td>
				      </tr>
				 	 <?php }?>
				    </tbody>
				  </table>

					
					
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