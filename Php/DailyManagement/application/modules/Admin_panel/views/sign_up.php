<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Login</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url().'admin_assets'?>/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url().'admin_assets'?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url().'admin_assets'?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url().'admin_assets'?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url().'admin_assets'?>/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">WAPS <b>SOLUTION</b></a>
            <small>Sign Up Form</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="post" action="<?= base_url().'Admin_panel/register'?>">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" onblur="checkemail(this.value)" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" onkeyup="passwordcheck(this.value)" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <span id='message'></span>
                    <div class="form-group">
                        <input type="checkbox"  id="terms" class="filled-in chk-col-pink" required>
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" id="enter" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?= base_url().'Admin_panel'?>">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
     function checkemail(email){
        // alert(email);
        $.ajax({
                      url:'<?= base_url()?>Admin_panel/check_email',
                      type: 'post',
                      dataType: 'json',
                      data: {val: email},

                      success: function(data){
                        if(data !=null){
                        alert('This email already taken.');
                          $("#email").val('');
                          
                        }

                    }

                });
    }
    function passwordcheck(val){
        var user_pass = $("#password").val();
        var user_pass2 = val;
        if (user_pass.length == 0) {
           alert("please fill password first");
           $("#enter").prop('disabled',true)//use prop()
         } else if (user_pass == user_pass2) {
           $("#enter").prop('disabled',false)//use prop()
           $('#message').html('Matching').css('color', 'green');
         } else {
           $("#enter").prop('disabled',true)//use prop()
           $('#message').html('Not Matching').css('color', 'red');
           // alert("Your password doesn't same");
         }
    }
</script>
    <!-- Jquery Core Js -->
    <script src="<?= base_url().'admin_assets'?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url().'admin_assets'?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url().'admin_assets'?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url().'admin_assets'?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url().'admin_assets'?>/js/admin.js"></script>
    <script src="<?= base_url().'admin_assets'?>/js/pages/examples/sign-up.js"></script>
</body>

</html>
