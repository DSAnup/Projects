<!-- Top Bar -->
    <nav class="navbar" id="topbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= base_url().'Admin_panel/dashboard'?>">CONTROL PANEL</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <?php 
                        $userID = $this->session->userdata('userID');
                        $date = date('Y-m-d');
                        $task = $this->DS->SelectDataOrder('task','*',array('userID'=>$userID, 'startDate'=>$date),'id','desc');
                        $taskDoing = $this->DS->SelectDataOrder('task','*',array('userID'=>$userID, 'taskComplete'=>'Doing'),'id','desc');
                        $td = count($taskDoing);
                        $taskCompleted = $this->DS->SelectDataOrder('task','*',array('userID'=>$userID, 'taskComplete'=>'Completed'),'id','desc');
                        $tcom = count($taskCompleted);
                        $taskToDo = $this->DS->SelectDataOrder('task','*',array('userID'=>$userID, 'taskComplete'=>'To Do'),'id','desc');
                        $tdo = count($taskToDo);
                        $taskOnHold = $this->DS->SelectDataOrder('task','*',array('userID'=>$userID, 'taskComplete'=>'On Hold'),'id','desc');
                        $tOH = count($taskOnHold);
                        $taskSuspended = $this->DS->SelectDataOrder('task','*',array('userID'=>$userID, 'taskComplete'=>'Suspended'),'id','desc');
                        $tsus = count($taskSuspended);
                        $ct = count($task);
                    ?>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?= $ct;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php foreach($task as $t){?>
                                    <li>
                                        <a href="<?= base_url().'Admin_panel/taskDetails/'.$t->id;?>">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><?= $t->title?></h4>
                                                
                                            </div>
                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="<?= base_url().'Admin_panel/taskcalender'?>">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <?php if(!empty($tcom)){ $tstatus = 'Completed';?>
                                    <li>
                                        <a href="<?= base_url().'Admin_panel/taskListStatus/'.$tstatus?>">
                                            <h4>
                                                <?= $tcom;?> Task Completed
                                                <small>100%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if(!empty($td)){$tstatus = 'Doing';?>
                                    <li>
                                        <a href="<?= base_url().'Admin_panel/taskListStatus/'.$tstatus?>">
                                            <h4>
                                                <?= $td;?> Task Doing
                                                <small>100%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if(!empty($tdo)){$tstatus = 'To_Do';?>
                                    <li>
                                        <a href="<?= base_url().'Admin_panel/taskListStatus/'.$tstatus?>">
                                            <h4>
                                                <?= $tdo;?> Task To Do
                                                <small>100%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if(!empty($tOH)){$tstatus = 'On_Hold';?>
                                    <li>
                                        <a href="<?= base_url().'Admin_panel/taskListStatus/'.$tstatus?>">
                                            <h4>
                                                <?= $tOH;?> Task On Hold
                                                <small>100%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if(!empty($tsus)){$tstatus = 'Suspended';?>
                                    <li>
                                        <a href="<?= base_url().'Admin_panel/taskListStatus/'.$tstatus?>">
                                            <h4>
                                                <?= $tsus;?> Task Suspended
                                                <small>100%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php }?>
                                    
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="<?= base_url().'Admin_panel/taskcalender'?>">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->