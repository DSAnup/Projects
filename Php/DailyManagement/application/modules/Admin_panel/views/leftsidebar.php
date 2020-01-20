        <?php
            $userID = $this->session->userdata('userID');
            $ci = & get_instance();
            $ci->load->model('Rest_model');
            $dd = $this->Rest_model->SelectData_1('admin_waps','*',array('id'=>$userID)); 
        ?>
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php if(!empty($dd->image)){?>
                        <a href="<?= base_url().'Admin_panel/profile'?>"><img src="<?= base_url().'uploads/'.$dd->image?>" alt="<?= $dd->name?>"  width="48" height="48"/></a>
                    <?php } else{?>
                    <a href="<?= base_url().'Admin_panel/profile'?>">
                    <img src="<?= base_url().'admin_assets/'?>images/user.png" width="48" height="48" alt="User" /></a>
                    <?php }?>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $dd->name;?></div>
                    <div class="email"><?= $dd->email;?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?= base_url().'Admin_panel/profile'?>"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url().'Admin_panel/signout'?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li
                        <?php $d = $this->uri->segment(2); if( $d == 'dashboard'){echo 'class ="active"';}?>
                    >
                        <a href="<?= base_url().'Admin_panel/dashboard'?>">
                            <i class="material-icons">home</i>
                            <span>DashBoard</span>
                        </a>
                    </li>
                    <?php if($dd->type=='3'){?>
                    <li
                        <?php $d = $this->uri->segment(2); if( $d == 'user'){echo 'class ="active"';}?>
                    >
                        <a href="<?= base_url().'Admin_panel/user'?>">
                            <i class="material-icons">account_circle</i>
                            <span>Admin User</span>
                        </a>
                    </li>
                    <?php }?>
                    <li
                    <?php $d = $this->uri->segment(2); if( $d == 'purpose' || $d == 'earn'|| $d == 'expense'|| $d == 'lend'|| $d == 'borrow'){echo 'class ="active"';}?>
                    >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>My Management</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li <?php if($d == 'purpose'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/purpose'?>">Add General Purposes</a>
                            </li>
                            <li <?php if($d == 'expense'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/expense'?>">Add Expense</a>
                            </li>
                            <li <?php if($d == 'earn'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/earn'?>">Add Earning</a>
                            </li>
                            <li <?php if($d == 'lend'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/lend'?>">Lend Information</a>
                            </li>
                            <li <?php if($d == 'borrow'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/borrow'?>">Borrow Information</a>
                            </li>
                        </ul>
                    </li>
                    <li
                        <?php $d = $this->uri->segment(2); if( $d == 'taskcalender' || $d == 'task'|| $d == 'taskList' || $d == 'diary' || $d == 'diarycalender' || $d == 'diaryList'|| $d == 'diaryDetails'|| $d == 'taskDetails'){echo 'class ="active"';}?>
                    >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>My Diary & Task Schedular</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li <?php $d = $this->uri->segment(2); if( $d == 'taskcalender' || $d == 'task' || $d == 'taskList'){echo 'class ="active"';}?>>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>My Tasks</span>
                                </a>
                                <ul class="ml-menu">

                                    <li <?php if($d == 'taskcalender'){echo 'class ="active"';}?>>
                                        <a href="<?= base_url().'Admin_panel/taskcalender'?>">
                                            <span>Tasks Calender</span>
                                        </a>
                                    </li>
                                    <li <?php if($d == 'task'){echo 'class ="active"';}?>>
                                        <a href="<?= base_url().'Admin_panel/task'?>">
                                            <span>Add Tasks / Schedular</span>
                                        </a>
                                    </li>
                                    <li <?php if($d == 'taskList'){echo 'class ="active"';}?>>
                                        <a href="<?= base_url().'Admin_panel/taskList'?>">
                                            <span>Tasks List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php $d = $this->uri->segment(2); if( $d == 'diary' || $d == 'diarycalender' || $d == 'diaryList'){echo 'class ="active"';}?>>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>My Diary</span>
                                </a>
                                <ul class="ml-menu">

                                    <li <?php if($d == 'diary'){echo 'class ="active"';}?>>
                                        <a href="<?= base_url().'Admin_panel/diary'?>">
                                            <span>Add Notes</span>
                                        </a>
                                    </li>
                                    <li <?php if($d == 'diarycalender'){echo 'class ="active"';}?>>
                                        <a href="<?= base_url().'Admin_panel/diarycalender'?>">
                                            <span>Diary Calender</span>
                                        </a>
                                    </li>
                                    <li <?php if($d == 'diaryList'){echo 'class ="active"';}?>>
                                        <a href="<?= base_url().'Admin_panel/diaryList'?>">
                                            <span>Note List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li
                        <?php $d = $this->uri->segment(2); if( $d == 'reports' || $d == 'stats'|| $d == 'my_exp'){echo 'class ="active"';}?>
                    >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">build</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($d == 'reports'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/reports'?>">Reports</a>
                            </li>
                            <!-- <li <?php if($d == 'stats'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/stats'?>">Add Stats</a>
                            </li>
                            <li <?php if($d == 'my_exp'){echo 'class ="active"';}?>>
                                <a href="<?= base_url().'Admin_panel/my_exp'?>">Add Experience</a>
                            </li> -->
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date("Y")?> - <?php echo date('Y', strtotime('+1 years'))?> <a href="javascript:void(0);">WAPS SOLUTION</a>.
                </div>
                <div class="version">
                    <!-- <b>Version: </b> 1.0.5 -->
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar