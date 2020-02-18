<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Exam</title>
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>assets/img/fav.png"/>
	<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>front_assets/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>front_assets/css/font-awesome.min.css"/>
	<style type="text/css">
		.n a:link{
			color: #fff;
			text-decoration-style: none;
		}
		.n  a:visited{
			color: #fff;
			text-decoration-style: none;
		}
	</style>
</head>
<body>
	<section class="header_section"><!-- start header part -->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 n" style="color: #fff">
					<h1>
					<a class="n" href="<?=base_url()?>"> <img src="<?=base_url()?>assets/img/logo1.png" ></a>
					</h1>
				</div>
				<div class="col-sm-4" style="text-align: right;padding-top: 20px">
					<?php
					if(isset($_SESSION['stdID'])){
					?>
					<a href="<?=base_url()?>Front/profile" class="btn btn-info">Profile</a>
					<a href="<?=base_url()?>Front/logout" class="btn btn-success">Logout</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</section><!-- end of header section -->
