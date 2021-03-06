<!DOCTYPE html>
<!-- saved from url=(0037)http://clear.lcrm.in/light/login.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>::Admin Login::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://clear.lcrm.in/light/img/favicon.ico">
    <!-- Bootstrap -->
    <link href="<?=base_url()?>/__Admin Login___files/bootstrap.min.css" rel="stylesheet">
    <!-- end of bootstrap -->
    <!--page level css -->
    <link type="text/css" href="<?=base_url()?>/__Admin Login___files/themify-icons.css" rel="stylesheet">
    <link href="<?=base_url()?>/__Admin Login___files/all.css" rel="stylesheet">
    <link href="<?=base_url()?>/__Admin Login___files/bootstrapValidator.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/__Admin Login___files/login.css" rel="stylesheet">
    <!--end page level css-->
</head>

<body id="sign-in">
<div class="preloader" style="display: none;">
    <div class="loader_img"><img src="<?=base_url()?>/__Admin Login___files/loader.gif" alt="loading..." height="64" width="64" style="display: none;"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 login-form">
            <div class="panel-header">
                <h2 class="text-center">
                    Admin Login
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="<?=base_url().'Admin/login'?>" id="authentication" method="post" class="login_validator bv-form" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                            <div class="form-group">
                                <label for="email" class="sr-only"> E-mail</label>
                                <input type="text" class="form-control  form-control-lg" id="email" name="username" placeholder="E-mail" data-bv-field="username">
                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="username" data-bv-result="NOT_VALIDATED" style="display: none;">The email address is required</small><small class="help-block" data-bv-validator="regexp" data-bv-for="username" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter valid email format</small></div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" data-bv-field="password">
                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED" style="display: none;">Password is required</small></div>
                            
                            <div class="form-group">
                                <input type="submit" value="Sign In" class="btn btn-primary btn-block">
                            </div>
                            
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script async="" src="<?=base_url()?>/__Admin Login___files/analytics.js.download"></script><script src="./__Admin Login___files/jquery.min.js.download"></script>
<script src="<?=base_url()?>/__Admin Login___files/bootstrap.min.js.download"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="<?=base_url()?>/__Admin Login___files/icheck.js.download"></script>
<script src="<?=base_url()?>/__Admin Login___files/bootstrapValidator.min.js.download" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url()?>/__Admin Login___files/login.js.download"></script>
<!-- end of page level js -->



</body></html>