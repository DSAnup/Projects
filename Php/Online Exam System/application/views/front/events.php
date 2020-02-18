<?php
$this->load->view('front/header');
?>
<?php
foreach ($main as $k) {
?>
  	<section class="event_section"><!-- start of event section -->
  		<div class="container">
  			<div class="row">
  				<h2 class="event_heading">Latest Events </h2>
  				<div class="col-sm-4">
  					<img src="<?=base_url().'assets/uploads/'.$k->photo?>" class="img-responsive" alt="event Picture">
  				</div>
  				<div class="col-sm-8">
  					<h3 class="event_title"><?=$k->headline?></h3>
  					<p class="event_para"><?=$k->details?></p>
  					<div class="row">
  						<div class="col-sm-4">
  							<i class="fa fa fa-microphone event_icon_style" aria-hidden="true"></i><span class="event_icon_rules">&nbsp;&nbsp;<?=$k->speaker?>&nbsp;&nbsp; Speakers</span>
  						</div>
  						<div class="col-sm-4">
  							<i class="fa fa fa-ticket event_icon_style" aria-hidden="true"></i><span class="event_icon_rules">&nbsp;&nbsp;<?=$k->ticket?> &nbsp;&nbsp; Ticket</span>
  						</div>
  						<div class="col-sm-4">
  							<i class="fa fa fa-calendar event_icon_style" aria-hidden="true"></i><span class="event_icon_rules">&nbsp;&nbsp;<?=$k->events?>&nbsp;&nbsp; Events</span>
  						</div>
  					</div>
  					<a href="<?=$k->link?>">
  					<div class="register_button">
  						<a href="<?=$k->link?>" class="btn outline-btn">Register Today</a>
  					</div>
  					</a>
  				</div>
  			</div>
  		</div>
  	</section><!-- end of event details section -->
  	<?php } ?>

  	<section class="others_event"><!-- start of others events -->
  		<div class="container">
		<div class="row">
		<?php
		foreach ($events as $l) {
		?>
			<div class="col-sm-4">
				<div class="recent_event_img">
					<img src="<?=base_url().'assets/uploads/'.$l->photo?>" class="img-responsive"  alt="Recent Events">
					<h2><?=$l->headline?></h2>
					<p><?php  echo mb_substr(strip_tags($l->details),0,150,"utf-8");  ?></p>
					<a href="<?=base_url().'Front/events/'.$l->id?>">Details</a>
				</div>
			</div>
<?php } ?>
		</div>
	</div>  		
  	</section><!-- end of recent events section -->
  	
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