<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SDTI Admin | Workshops </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?=base_url().'admins/'?>img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" rel="stylesheet" href="<?=base_url().'admins/'?>css/app.css"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="<?=base_url().'admins/'?>vendors/swiper/css/swiper.min.css">
    <link href="<?=base_url().'admins/'?>vendors/nvd3/css/nv.d3.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=base_url().'admins/'?>vendors/lcswitch/css/lc_switch.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url().'admins/'?>css/custom.css">

    <link href="<?=base_url().'admins/'?>css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url().'admins/'?>css/custom_css/dashboard1_timeline.css" rel="stylesheet"/>
    
    <!--end of page level css-->
    <!-- <script type="text/javascript">
    (function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.10.506#p=toshibaxmq01abf050_75l7s3x8sxx75l7s3x8p";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script> -->
</head>


<body class="skin-default">
    <div class="preloader">
        <div class="loader_img"><img src="<?=base_url().'admins/'?>img/loader.gif" alt="loading..." height="64" width="64"></div>
    </div>
    <!-- header logo: style can be found in header-->
    <header class="header">
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the marginin -->
                <img src="<?=base_url().'admins/'?>img/logo.png" alt="logo"/>
            </a>
            <!-- Header Navbar: style can be found in header-->
            <!-- Sidebar toggle button-->
            <div>
                <a href="index.html#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">

                    <!--rightside toggle-->

                    <!-- User Account: style can be found in dropdown-->
                    <li class="dropdown user user-menu">
                        <a href="index.html#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                            <img src="" width="35" class="img-circle img-responsive pull-left"
                            height="35" alt="User Image">
                            <div class="riot">
                                <div>
                                    YouthFireIT
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="" class="img-circle" alt="User Image">
                                <p> YouthFireIT</p>
                            </li>
                            <!-- Menu Body -->
                            <li class="p-t-3"><a href="user_profile.html"> <i class="fa fa-fw ti-user"></i> My Profile </a>
                            </li>
                            <li role="presentation"></li>
                            <li><a href="edit_user.html"> <i class="fa fa-fw ti-settings"></i> Account Settings </a></li>
                            <li role="presentation" class="divider"></li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="lockscreen.html">
                                        <i class="fa fa-fw ti-lock"></i>
                                        Lock
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="login.html">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php
        $this->load->view('leftmenu');
        ?>
        <aside class="right-side">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw ti-move"></i> PENDING LIST
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                                <i class="fa fa-fw ti-close removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered dataTables">
                            <thead>
                                <tr>
                                  <th>SL</th>
                                  <th>Course Name</th>
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Email</th>
                                  <th>Mobile</th>
                                  <th>Photo</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $ci =& get_instance();
                            $ci->load->model('Admin_model');
                            $ii=0;
                            foreach ($en as $e1) {
                                $where=array('id'=>$e1->stdID);
                                $where_1=array('id'=>$e1->courseID);
                                $e=$this->Admin_model->SelectData_1('students','*',$where);
                                $e2=$this->Admin_model->SelectData_1('course','*',$where_1);
                            ?>
                              <tr>
                                  <td><?=++$ii?></td>
                                  <td><?=$e2->name?></td>
                                  <td><?=$e->name?></td>
                                  <td><?=$e->pr_village.', '.$e->pr_post.', '.$e->pr_upozila.', '.$e->pr_district.', '.$e->pr_zip?></td>
                                  <td><?=$e->email?></td>
                                  <td><?=$e->mobile?></td>
                                  <td><img src="<?=base_url().'std_photo/'.$e->photo?>" width="40" height="43"></td>
                                  <td>
                                      <a href="<?=base_url().'Admin/view_profile/'.$e2->id?>" class="btn btn-primary">View</a>
                                  </td>
                              </tr>

                              <?php } ?>
                            </table>
                        </div>
                    </aside>
                    <div id="qn"></div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/g/bootstrap@3.3.7,bootstrap.switch@3.3.2,jquery.nicescroll@3.6.0"></script>
                    <script src="<?=base_url().'admins/'?>js/app.js" type="text/javascript"></script>
                    <!-- end of global js -->

                    <!-- begining of page level js -->
                    <!--Sparkline Chart-->
                    <script type="text/javascript" src="<?=base_url().'admins/'?>js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- flip --->
<script type="text/javascript" src="vendors/flip/js/jquery.flip.min.js"></script>
<script type="text/javascript" src="vendors/lcswitch/js/lc_switch.min.js"></script>
<!--flot chart-->
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
<!--swiper-->
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/swiper/js/swiper.min.js"></script>
<!--chartjs-->
<script src="<?=base_url().'admins/'?>vendors/chartjs/js/Chart.js"></script>
<!--nvd3 chart-->
<script type="text/javascript" src="<?=base_url().'admins/'?>js<?=base_url().'admins/'?>/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="<?=base_url().'admins/'?>js/dashboard1.js"></script>
<!-- end of page level js -->

</body>

</html>
<script type="text/javascript">
    function set_approve(id){
        var i=id.split('_');
        var price=$('#price_'+i[1]).val()
        html='<a href="<?=base_url().'Admin/approve/'?>'+id+'_'+price+'" class="btn btn-primary">Approve</a>'
        
        $('#td_'+i[1]).html(html)
    }
</script>