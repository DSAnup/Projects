<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <div class="nav_profile">
                <div class="media profile-left">
                    <a class="pull-left profile-thumb" href="index.html#">
                        </a>
                        <div class="content-profile">
                            <h4 class="media-heading">YouthFireIT</h4>
                           <ul class="icon-list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-lock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-settings"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <li class="<?php if($this->session->userdata('menu')=='home'){ echo 'active';} ?>" id="active">
                        <a href="<?=base_url().'Admin/index/home'?>">
                            <i class="menu-icon ti-desktop"></i>
                            <span class="mm-text ">HomePage</span>
                        </a>
                    </li>

                   <!--  <li class="<?php if($this->session->userdata('menu')=='slider'){ echo 'active';} ?>">
                        <a href="<?=base_url().'Admin/slider_manager/slider'?>">
                            <i class="menu-icon ti-desktop"></i>
                            <span class="mm-text ">Slider Manager</span>
                        </a>
                    </li>
                     -->
                    <!-- edit start -->

                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='course'){ echo 'active';} ?>">
                        <a href="index.html#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Coures</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">

                            <li>
                                <a href="<?=base_url().'Admin/add_course/course'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Add Course
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'Admin/course_schedule/course'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Schedule
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'Admin/add_course_aprt/course'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Add Course Parts
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?=base_url().'Admin/course/course'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Course List
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'Admin/batch/course'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Batch List
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='std'){ echo 'active';} ?>">
                        <a href="#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Admission</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php if($_SESSION['role']=='super'){ ?>
                            <li>
                                <a href="<?=base_url().'Admin/pending/std'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Pending Enrollment
                                </a>
                            </li>
                            <?php } ?>
                             <li>
                                <a href="<?=base_url().'Admin/apply'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Add Student
                                </a>
                            </li>  
                            <li>
                                <a href="<?=base_url().'Admin/std_list/std'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Student List
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'Admin/print_certificate_ajax/std'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Print Certificate
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='dr'){ echo 'active';} ?>">
                        <a href="#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Driving Licence</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                             <li>
                                <a href="<?=base_url().'Admin/driving_apply/dr'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Add Clients (NEW)
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'Admin/driving_apply_std/dr'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Add Clients (STUDENT)
                                </a>
                            </li>  
                            <li>
                                <a href="<?=base_url().'Admin/driving_std_list/dr'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Client List
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='own'){ echo 'active';} ?>">
                        <a href="#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Ownership Transfer</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                             <li>
                                <a href="<?=base_url().'Admin/ownership_transfer_apply/own'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Add Clients
                                </a>
                            </li>  
                            <li>
                                <a href="<?=base_url().'Admin/ownership_transfer_std_list/own'?>">
                                    <i class=" menu-icon fa fa-fw ti-widget-alt"></i>
                                    Client List
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='fee'){ echo 'active';} ?>">
                        <a href="#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Fees</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?=base_url().'Admin/due_fees/fee'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Dues
                                </a>
                            </li> 
                            <li>
                                <a href="<?=base_url().'Admin/collect_fees/fee'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Collect Fees
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'Admin/paid_fees/fee'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Collected Fees
                                </a>
                            </li>                              
                        </ul>
                    </li>
                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='trainer'){ echo 'active';} ?>">
                        <a href="#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Instructor</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?=base_url().'Admin/trainers/trainer'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Instructor
                                </a>
                            </li>								
                        </ul>
                    </li>
                    
                    <li class="menu-dropdown <?php if($this->session->userdata('menu')=='id'){ echo 'active';} ?>">
                        <a href="<?=base_url().'Admin/front/id'?>">
                            <i class="menu-icon ti-widget"></i>
                            <span>ID Card</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            
                            <li>
                                <a href="<?=base_url().'Admin/front/id'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Front Side (Student)
                                </a>
                            </li>
                             <li>
                                <a href="<?=base_url().'Admin/front_t/id'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Front Side (Instructor)
                                </a>
                            </li> 
                            <li>
                                <a href="<?=base_url().'Admin/back/id'?>">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    Back Site
                                </a>
                            </li>                                           
                        </ul>
                    </li>
                     <li class="<?php if($this->session->userdata('menu')=='u'){ echo 'active';} ?>" id="active">
                        <a href="<?=base_url().'Admin/user/u'?>">
                           <i class="menu-icon ti-widget"></i>
                            <span class="mm-text ">User</span>
                        </a>
                    </li>
                    <li class="<?php if($this->session->userdata('menu')=='db'){ echo 'active';} ?>" id="active">
                        <a href="<?=base_url().'Admin/db_backup/db'?>">
                            <i class="menu-icon ti-desktop"></i>
                            <span class="mm-text ">Database Backup</span>
                        </a>
                    </li>
                    <!-- <li class="menu-dropdown">
                        <a href="index.html#">
                            <i class="menu-icon ti-widget"></i>
                            <span>Student Activity</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_student_work.html">
                                    <i class=" menu-icon fa fa-fw ti-widgetized"></i>
                                    add_Student Activity
                                </a>
                            </li>											
                        </ul>
                    </li> -->
                </ul>
                <!-- / .navigation --> </div>
                <!-- menu --> </section>
                <!-- /.sidebar --> </aside>