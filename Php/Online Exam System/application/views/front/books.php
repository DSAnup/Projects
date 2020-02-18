<?php
$this->load->view('front/header');
?>
  	<section class="ebook_section"><!-- start of ebook section -->
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-3 ">
  					<div class="row_style">
  						<h2 class="text_b_style">TextBook Free<span><i class="fa fa-book" aria-hidden="true"></i></span></h2>
						<div class="text_nav">
							<ul>
							<?php
							foreach ($subject as $s) {
							?>
								<li><a href="<?=base_url().'Front/search_book/'.$s->subject?>"><?=$s->subject?></a></li>
								<?php } ?>
							</ul>
						</div>
  					</div>
  				</div>
  				<div class="col-sm-9"><!-- start of signin form part -->
  					<div class="eb_head_image">
  						<img src="<?=base_url().'front_assets/'?>image/CCNA.jpg" class="img-responsive" alt="Ebook Header Image">
  					</div>
  					<div class="e_book_heading">
  						<h2>IT, Programming & Computer science books</h2>
  						<p>Our free computer science, programming and IT books will keep you up to date on programming and core issues within computer and information technology. You can download IT textbooks about programming using Java, Prolog techniques or brush up on your Microsoft Office skills!</p>
  					</div>
  					<div class="row sort_bar ">
  						<div class="pannel_style">Show Result </div>
<?php
foreach ($books as $e) {
?>
  						<div class="row author_style">
  							<div class="col-sm-2">
								<img src="<?=base_url().'books_photo/'.$e->photo?>" alt="" class="thumb" width="140" height="180">
							</div>
							<div class="col-sm-10">
								<h3><?=$e->name?></h3>
								<div class="author">
									<?=$e->author?>
								</div>
								<div class="pages">
									<span class="p_span_style">
										<b class="priceFree">Free</b>
									</span>
									<span class="p_span_style">PDF</span>
								</div>
								<p class="description">
									<?php  echo strip_tags($e->description)  ?>
								</p>
								<a href="<?=base_url().'books_photo/'.$e->book?>" class="btn btn-sm btn-primary">Download</a>
							</div>
  						</div><!-- end of ebook row -->
  						
  						<?php } ?>
  						
  					</div>
  				</div><!-- end of signin part -->
  			</div>
  		</div>
  	</section><!-- end of ebook section -->
  	
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