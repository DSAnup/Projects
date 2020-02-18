
<div class="wrapper">

    <header class="main-header">
        <a href="<?= base_url().'Admin_panel/dashboard'?>" class="logo">
            <span class="logo-mini"><b>STK</b></span>
            <span class="logo-lg"><b>CONTROL PANEL</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <li><a href="<?= base_url();?>" target="_blank"><i class="fa fa-globe"></i></a></li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url() . 'admin_file/admin/' ?>dist/img/avatar5.png" class="user-image"
                            alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                echo $this->session->userdata('userName');
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?= base_url() . 'admin_file/admin/' ?>dist/img/avatar5.png" class="img-circle"
                                alt="User Image">

                                <p>
                                    <?php
                                    echo $this->session->userdata('userName');
                                    ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                    </div>
                                    <div class="col-xs-4 text-center">
                                    </div>
                                    <div class="col-xs-4 text-center">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">                               
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url() . 'Admin_panel/signout' ?>"
                                     class="btn btn-default btn-flat">Sign out</a>
                                 </div>
                             </li>
                         </ul>
                     </li>
                     <!-- Control Sidebar Toggle Button -->
                     <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview <?php
                if ($_SESSION['menu'] == 'dashboard') {
                    echo "active";
                }
                ?>">
                <a href="#">
                    <i class="fa fa-wpexplorer fa-2x"></i> <span> &nbsp;&nbsp; Dashboard</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-circle-o"></i>
                Dashboard </a></li>
            </ul>
        </li>
        <li class="treeview <?php
                if ($_SESSION['menu'] == 'dashboard') {
                    echo "active";
                }
                ?>">
                <a href="#">
                    <i class="fa fa-clone"></i> <span>Admin Info</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <?php 
                    $ci = & get_instance();
                    $ci->load->model('Rest_model');
                    $userID = $this->session->userdata('userID');
                    $dd= $this->Rest_model->SelectData_1('admin_waps','*',array('type'=>'1','id'=>$userID));
                    $ddd= $this->Rest_model->SelectData_1('admin_waps','*',array('permission'=>'1','id'=>$userID));
                    
                    if($dd==true || $ddd== true){
                ?>
                <li class="active"><a href="<?= base_url() . 'Admin_panel/user' ?>"><i class="fa fa-list-alt"></i>
                Create User & List </a></li>
                <li class="active"><a href="<?= base_url() . 'Admin_panel/cost' ?>"><i class="fa fa-list-alt"></i>
                Cost Management </a></li>
                <?php }?>
                <?php 
                    $ci = & get_instance();
                    $ci->load->model('Rest_model');
                    $userID = $this->session->userdata('userID');
                    $dd= $this->Rest_model->SelectData_1('admin_waps','*',array('permission'=>'1','id'=>$userID));
                    
                    if($dd==true){
                ?>
                <!-- hello -->
                <li class="active"><a href="<?= base_url() . 'Admin_panel/user' ?>"><i class="fa fa-list-alt"></i>
                Super Admin </a></li>
                <?php }?>
                
            </ul>
        </li>
        <li class="treeview <?php
                if ($_SESSION['menu'] == 'dashboard') {
                    echo "active";
                }
                ?>">
                <a href="#">
                    <i class="fa fa-clone"></i> <span>Customer Info</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                
                <li class="active"><a href="<?= base_url() . 'Admin_panel/customer' ?>"><i class="fa fa-plus"></i>
                Add Customer </a></li>
                <li class="active"><a href="<?= base_url() . 'Admin_panel/customer_list' ?>"><i class="fa fa-list-alt"></i>
                Customer List </a></li>
                
                <!-- hello -->
                
            
                
            </ul>
        </li>
        <li class="treeview <?php
                if ($_SESSION['menu'] == 'dashboard') {
                    echo "active";
                }
                ?>">
                <a href="#">
                    <i class="fa fa-clone"></i> <span>Add Services/ Style</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                
                <li class="active"><a href="<?= base_url() . 'Admin_panel/service' ?>"><i class="fa fa-plus"></i>
                Add Style/ Services </a></li>
                
                <!-- hello -->
                
            
                
            </ul>
        </li>
        <li class="treeview <?php
                if ($_SESSION['menu'] == 'dashboard') {
                    echo "active";
                }
                ?>">
                <a href="#">
                    <i class="fa fa-clone"></i> <span>New Order</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                
                <li class="active"><a href="<?= base_url() . 'Admin_panel/ShoppingCart' ?>"><i class="fa fa-plus"></i>
                New Order </a></li>
                <li class="active"><a href="<?= base_url() . 'Admin_panel/ShoppingCart/order_list' ?>"><i class="fa fa-list-alt"></i>
                Order List </a></li>
                
                <!-- hello -->
                
            
                
            </ul>
        </li>
        <li class="treeview <?php
                if ($_SESSION['menu'] == 'dashboard') {
                    echo "active";
                }
                ?>">
                <a href="#">
                    <i class="fa fa-clone"></i> <span>Reports</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                
                <li class="active"><a href="<?= base_url() . 'Admin_panel/reports' ?>"><i class="fa fa-arrow-right"></i>
                Reports </a></li>
                
                <!-- hello -->
                
            
                
            </ul>
        </li>

    </ul>
</section>
<!-- /.sidebar -->
</aside>
