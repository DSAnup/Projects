<?php
$this->load->view('front/header');
?>
  	<section class="contact_section">
  		<div class="container">
  			<div class="row">
  				<div class="pannel_style pannel_style2">Contact Us</div>
  				<div class="col-sm-6"><!-- start of contact form part -->
  					<div class="contact_form">
  						 <form class="form-horizontal" action="/action_page.php">
							<div class="form-group">
							  <label class="control-labe control-label2l col-sm-2" for="name">Name:</label>
							  <div class="col-sm-10">          
								<input type="password" class="form-control" id="name" placeholder="Enter Name" name="name">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label control-label2 col-sm-2" for="mail">Mail:</label>
							  <div class="col-sm-10">          
								<input type="password" class="form-control" id="mail" placeholder="Enter Mail Address" name="mail">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label control-label2 col-sm-2" for="Password">Password:</label>
							  <div class="col-sm-10">          
								<input type="password" class="form-control" id="Password" placeholder="Enter password" name="Password">
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label control-label2 col-sm-2" for="Message">Message:</label>
							  <div class="col-sm-10">          
								<textarea rows="4" cols="55" id="Message" name="Message"></textarea>
							  </div>
							</div>
							<div class="form-group">        
							  <div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
								<div class="form-actions password_style">
									<input type="submit" value="Forget Password" title="change password"/>
								</div>
							  </div>
							  
							</div>
						  </form>
  					</div>
  				</div><!-- end of message part -->
  				<div class="col-sm-6">
  					<div class="contact_information">
  						<div class="contact_text">
                                <div class="media">
                                  <div class="media-left">
                                      <i class="fa fa-map-marker event_icon_style" aria-hidden="true"></i>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">Philip Koether Architects, 535 8th Ave #15, </h4>
                                    <h4 class="media-heading">New York 10018, USA </h4>
                                  </div>
                                </div>
                                <div class="media">
                                  <div class="media-left">
                                      <i class="fa fa-volume-control-phone event_icon_style" aria-hidden="true"></i>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">Fax: (123) 789-4560 </h4>
                                    <h4 class="media-heading">Phone: (888) 123-7890  </h4>
                                  </div>
                                </div>
                                <div class="media">
                                  <div class="media-left">
                                     <i class="fa fa-envelope-o event_icon_style" aria-hidden="true"></i>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">Contact@xplus.com </h4>
                                    <h4 class="media-heading">www.xplus.com</h4>
                                  </div>
                                </div>
                            </div>
  						</div>
  				</div><!-- end of contact information -->
  			</div>
  		</div>
  	</section><!-- end of contact information section -->
  	
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
