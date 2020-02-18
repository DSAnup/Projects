<?php
$this->load->view('front/header');

?>
<section class="lecture_section"><!-- start of lecture section -->
	<div class="container">
		<div class="row lect_row_style">
			<div class="col-sm-8">
				<div>
					<h3 class="lect_head"><?=$c->name?></h3>
				</div>
				<div class="lect_des col-md-12">
				<div class="col-md-6 embed-responsive embed-responsive-16by9" style="margin: 15px; padding-top: 10px">
						<?php
						if($c->video!==''){
						$url = $c->video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
						$iddd = $matches[1];
						?>
						<iframe class="embed-responsive-item" id="ytplayer" type="text/html"  src="https://www.youtube.com/embed/<?php echo $iddd ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
						<?php } ?>
					</div>
					<div style="text-align: justify;padding: 5px">
						<p style="text-align: justify; "><?php  echo $c->description;  ?></p>
					</div>
					
				</div>
				<div class="others_lect col-md-12">
					<div class="panel panel-primary pannel_style">Lectures</div>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						<?php
						$i=0;
						foreach($lesson as $le){
						$i+=1;
						?>
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										<?=$le->title?>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse <?php if($i==1){ echo 'in';} ?> " role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<p><?php  echo mb_substr(strip_tags($le->details),0,250,"utf-8");  ?>.&nbsp;<a href="<?=base_url().'Front/lesson_details/'.$le->l_id?>"> Read More</a></p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div><!-- end of left side lecture demo -->
			<div class="col-sm-4">
				<div class="lect_videos">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/rQ9oSWxRn38" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="sin_up_info">
					<div class="panel panel-primary pannel_style">Sign up for our Newsletter</div>
					<div class="contact_form">
						<form class="form-horizontal" action="/action_page.php">
							<div class="form-group">
								<label class="control-label col-sm-2 label_style" for="name">Name:</label>
								<div class="col-sm-10">          
									<input type="password" class="form-control" id="name" placeholder="Enter Name" name="name">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2 label_style" for="mail">Mail:</label>
								<div class="col-sm-10">          
									<input type="password" class="form-control" id="mail" placeholder="Enter Mail Address" name="mail">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2 label_style" for="Password"></label>
								<div class="col-sm-10 sub_button">
									<input type="submit" value="submit" id="" name="">
								</div>
							</div>
						</form>
					</div>
				</div><!-- end of sign up news letter -->
				<div class="follow_us">
					<div class="">
						<div class="panel panel-primary pannel_style">Follow Us</div>
						<a href="#"><i class="fa fa fa-facebook event_icon_style" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa fa-twitter event_icon_style" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa fa-linkedin event_icon_style" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa fa-youtube event_icon_style" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa fa-google-plus event_icon_style" aria-hidden="true"></i></a>
					</div>
				</div><!-- end of follow us div -->
				<div class="other_lect">
					<div class="panel panel-primary pannel_style">Recent post Lecture</div>
					<div class="">
						<ul>
							<li><a href="#">5 reasons to integrate teacher websites with your school website</a></li>
							<li><a href="#">Tips for improving parent involvement in school</a></li>
							<li><a href="#">4 ways to use Twitter for schools to increase engagement</a></li>
							<li><a href="#"></a></li>
						</ul>
					</div>
				</div><!-- end of other lecture -->
				<div class="">
					<div class="panel panel-primary pannel_style">Popular Ebooks</div>
					<div class="row author_style">
						<div class="col-sm-10">
							<h4>Automation and Robotics</h4>
							<p class="description">
								In this book we are dealing with series part production featured by a medium complexity degree and a medium number of individual components and assembly technique…
							</p>
							<form action="" method="" class="down_style">
								<button type="submit">
									Download!
								</button>
							</form>
						</div>
					</div><!-- end of ebook row -->
					<div class="row author_style">
						<div class="col-sm-10">
							<h4>Automation and Robotics</h4>
							<p class="description">
								In this book we are dealing with series part production featured by a medium complexity degree and a medium number of individual components and assembly technique…
							</p>
							<form action="" method="" class="down_style">
								<button type="submit">
									Download!
								</button>
							</form>
						</div>
					</div><!-- end of ebook row -->
					<div class="row author_style">
						<div class="col-sm-10">
							<h4>Automation and Robotics</h4>
							<p class="description">
								In this book we are dealing with series part production featured by a medium complexity degree and a medium number of individual components and assembly technique…
							</p>
							<form action="" method="" class="down_style">
								<button type="submit">
									Download!
								</button>
							</form>
						</div>
					</div><!-- end of ebook row -->
				</div><!-- end of popular Ebooks -->
			</div>
		</div>
	</div>
</section><!-- end of lecture section -->

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
<script src="<?=base_url().'front_assets/'?>js/jquery-3.2.1.js"></script>
<script src="<?=base_url().'front_assets/'?>js/bootstrap.min.js"></script>
</body>
</html>