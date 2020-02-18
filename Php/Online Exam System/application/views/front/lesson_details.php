<?php
$this->load->view('front/header');
?>
  	<section class="lecture_section"><!-- start of signIn section -->
  		<div class="container">
  			<div class="row lect_row_style">
  				<div class="col-sm-8">
  					<div class="">
  						<h3 class="lect_head"><?=$l->title?></h3>
						<!-- <div class="author lect_athor">
							Dr. Miltiadis A. Boboulos
						</div>
						<div class="pages lect_athor">
							<span class="">By Jay Cooper</span>&nbsp;
							<span class="pub_date">20/07/2017</span>
						</div> -->
  					</div>
  					<div>
					
				</div>
				<div class="lect_des col-md-12">
				<div class="col-md-6 embed-responsive embed-responsive-16by9" style="margin: 15px; padding-top: 10px">
						<?php
						if($l->lesson_video!==''){
						$url = $l->lesson_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
						$iddd = $matches[1];
						?>
						<iframe class="embed-responsive-item" id="ytplayer" type="text/html"  src="https://www.youtube.com/embed/<?php echo $iddd ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
						<?php } ?>
					</div>
					<div style="text-align: justify;padding: 5px">
						<p style="text-align: justify; "><?php  echo $l->details;  ?></p>
					</div>
					
				</div>
				<div class=" col-md-12">
  						<div class="panel panel-primary pannel_style">Books</div>
  						<div class="com">
  						<?php
						if($l->book!==''){
  						?>
  						<?=$l->book_details?>
							<a href="<?=base_url().'assets/uploads/'.$l->book?>">Download</a>
							<?php } ?>
  						</div>
  						</div>
  						<div class=" col-md-12">
  						<div class="panel panel-primary pannel_style">Quiz <span style="float: right;">Number of Questions : <?=$qn->number?></span></div>
  						<div class="com">
  						<a href="<?=base_url().'Front/take_quiz/'.$l->l_id?>">Participate </a>
  						</div>
  						</div>
  					<div class="comment_person col-md-12">
  						<div class="panel panel-primary pannel_style">Comment</div>
  						<div class="com">
  							<img src="" class="img-responsive" alt="Commenter Image">
  							<span><name>Md Ariful Islam</name></span>
  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore accusamus quo neque. Ab perspiciatis iste saepe, numquam id fugit vel quia animi illo! Accusamus, vel.</p>
  						</div>
  					</div>
  					<div class="com_form">
  						 <form class="form-horizontal" action="/action_page.php">
							<div class="form-group">
							  <div class="col-sm-10">          
								<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
							  </div>
							</div>
							<div class="form-group">
							  <div class="col-sm-10">          
								<input type="email" class="form-control" id="mail" placeholder="Enter Mail Address" name="mail">
							  </div>
							</div>
							<div class="form-group">
								<div class="col-sm-10">
									<textarea  cols="75%" rows="6" placeholder="Text Your Comment"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 sub_button">
							  		<input type="submit" value="submit" id="" name="">
							  	</div>
							</div>
						  </form>
  					</div>
  				</div>
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
						<div class="panel panel-primary pannel_style">Others Lecture</div>
						<div class="">
							<ul>
								<li><a href="#">5 reasons to integrate teacher websites with your school website</a></li>
								<li><a href="#">Tips for improving parent involvement in school</a></li>
								<li><a href="#">4 ways to use Twitter for schools to increase engagement</a></li>
								<li><a href="#"></a></li>
							</ul>
						</div>
					</div><!-- end of other lecture -->
  				</div>
  			</div>
  		</div>
  	</section>
  	<script src="<?=base_url()?>front_assets/js/jquery-3.2.1.js"></script>
    <script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script>
  </body>
</html>