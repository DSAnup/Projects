<?php $this->load->view('header');?>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php $this->load->view('topbar');?>
    <section>
        <?php $this->load->view('leftsidebar');?>
        <?php $this->load->view('rightsidebar');?>
    </section>

        <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <a href="<?= base_url().'Admin_panel/calculator'?>" target="_blank">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Calculator</div>
                            <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                        </div>
                    </div>
                </div>
                </a>
                <a href="<?= base_url().'Admin_panel/expense'?>" >
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Add Expense</div>
                            <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                        </div>
                    </div>
                </div>
                </a>
                <a href="<?= base_url().'Admin_panel/expense_list'?>">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Expense List</div>
                            <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                        </div>
                    </div>
                </div>
                </a>
                <a href="<?= base_url().'Admin_panel/earn'?>" >
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Add Earning</div>
                            <!-- <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div> -->
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- #END# Widgets -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body bg-teal">
                            <!-- <div class="font-bold m-b--35"> Summary</div> -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Total Earning</th>
                                            <td><?= $totalEarn->eAmount;?></td>
                                        </tr>
                                        <tr>
                                            <th>Total Expense</th>
                                            <td><?= $totalExpense->exAmount;?></td>
                                        </tr>
                                        <tr>
                                            <th> Total Borrow (Balance Only)</th>
                                            <td><?= $currentBorrowBalanceSum->borrowBalance;?></td>
                                        </tr>
                                        <tr>
                                            <th> Total Lend (Balance Only)</th>
                                            <td><?= $currentLendBalanceSum->lendBalance;?></td>
                                        </tr>
                                        <tr>
                                            <th> Current Balance</th>
                                            <td><?php echo  $currentBalance->earnTotal;?></td>
                                        </tr> 
                                        <!-- <tr>
                                            <th> Balance without Lend & Borrow</th>
                                            <td><?php echo  $totalEarn->eAmount-$totalExpense->exAmount;?></td>
                                        </tr> 
                                        <tr>
                                            <th> Balance with Lend & Borrow</th>
                                            <td><?php echo  ($totalEarn->eAmount+$currentLendBalanceSum->lendBalance)-($totalExpense->exAmount + $currentBorrowBalanceSum->borrowBalance);?></td>
                                        </tr> -->  
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row clearfix">
                
                <!-- Answered Tickets -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <style type="text/css">
          #chartdiv {
            width: 100%;
            height: 500px;
          }                           
        </style>
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <div class="col-md-12">
          <div id="chartdiv"></div>         
        </div>                  
        <script type="text/javascript">
          var chart = AmCharts.makeChart( "chartdiv", {
            "type": "serial",
            "theme": "light",
            "marginRight": 40,
            "marginLeft": 50,
            "autoMarginOffset": 30,
            "dataDateFormat": "YYYY-MM-DD",
            "valueAxes": [ {
              "id": "v1",
              "axisAlpha": 0,
              "position": "left",
              "ignoreAxisWidth": true
            } ],
            "balloon": {
              "borderThickness": 1,
              "shadowAlpha": 0
            },
            "graphs": [ {
              "id": "g1",
              "balloon": {
                "drop": true,
                "adjustBorderColor": false,
                "color": "#ffffff",
                "type": "smoothedLine"
              },
              "fillAlphas": 0.2,
              "bullet": "round",
              "bulletBorderAlpha": 1,
              "bulletColor": "#FFFFFF",
              "bulletSize": 5,
              "hideBulletsCount": 50,
              "lineThickness": 2,
              "title": "red line",
              "useLineColorForBulletBorder": true,
              "valueField": "value",
              "balloonText": "<span style='font-size:10px;'>[[value]]</span>"
            } ],
            "chartCursor": {
              "valueLineEnabled": true,
              "valueLineBalloonEnabled": true,
              "cursorAlpha": 0,
              "zoomable": false,
              "valueZoomable": true,
              "valueLineAlpha": 0.5
            },
            "valueScrollbar": {
              "autoGridCount": true,
              "color": "#000000",
              "scrollbarHeight": 50
            },
            "categoryField": "date",
            "categoryAxis": {
              "parseDates": true,
              "dashLength": 1,
              "minorGridEnabled": true
            },
            "export": {
              "enabled": false
            },
            "dataProvider": [ 
            <?php
            $userID = $this->session->userdata('userID'); 
            $ci=&get_instance();
            $ci->load->model('Admin_model');
            $en=array();
            $today = date('Y-m-d');
            for($i=0;$i<30;$i++){
              $stop_date = new DateTime($today);
              $stop_date->modify('-'.$i.' day');
              $en[$i]=$stop_date->format('Y-m-d');
            }
            $e=array_reverse($en);
            foreach ($e as $key => $value) {
              $sold=$ci->Admin_model->get_expense($value, $userID);
              ?>
              {
                "date": "<?=$value?>",
                "value": <?=$sold?>
              }, 
            <?php } ?> 

            ]
          } );
        </script>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">Expense Summary</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b><?php if(empty($todayExpense->exAmount)){echo "0";}else{echo $todayExpense->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b><?php if(empty($yesterdayExpense->exAmount)){echo "0";}else{echo $yesterdayExpense->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b><?php if(empty($lastWeekExpense->exAmount)){echo "0";}else{echo $lastWeekExpense->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                                <li>
                                    THIS MONTH
                                    <span class="pull-right"><b><?php if(empty($thisMonthExpense->exAmount)){echo "0";}else{echo $thisMonthExpense->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b><?php if(empty($lastMonthExpense->exAmount)){echo "0";}else{echo $lastMonthExpense->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                                <li>
                                    LAST YEAR
                                    <span class="pull-right"><b><?php if(empty($lastYearExpense->exAmount)){echo "0";}else{echo $lastYearExpense->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                                <li>
                                    ALL
                                    <span class="pull-right"><b><?php if(empty($balance->exAmount)){echo "0";}else{echo $balance->exAmount;} ?></b> <small>TK.</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>LATEST TASK INFOS</h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach($task as $s){$i++;?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $s->title?></td>
                                            <td><?php echo $date = date('d M, Y', strtotime($s->startDate)) ;?></td>
                                            <td>
                                                <?php if($s->endDate=='0000-00-00'){echo $date = date('d M, Y', strtotime($s->startDate));} else{ echo $date = date('d M, Y', strtotime($s->endDate)) ;}?>
                                            </td>
                                            <td>
                                                <?php if($s->taskComplete == 'Completed'){;?>
                                                <span class="label bg-green">Completed</span>
                                                <?php }if($s->taskComplete == 'Doing'){;?>
                                                    <span class="label bg-orange">Doing</span>
                                                <?php }if($s->taskComplete == 'To Do'){;?>
                                                    <span class="label bg-blue">To Do</span>
                                                <?php }if($s->taskComplete == 'On Hold'){;?>
                                                    <span class="label bg-light-blue">On Hold</span>
                                                <?php }if($s->taskComplete == 'Suspended'){;?>
                                                    <span class="label bg-red">Suspended</span>
                                                <?php };?>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <!--  -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"><a href="<?= base_url().'Admin_panel/taskList'?>">See Task List</a></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
    
        </div>
    </section>


   <?php $this->load->view('footern');?>

<script type="text/javascript">
  $(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

});



    Morris.Donut({
        element: 'donut_chart',
        data: [{
            label: 'Chrome',
            value: 37
        }, {
            label: 'Firefox',
            value: 30
        }, {
            label: 'Safari',
            value: 18
        }, {
            label: 'Opera',
            value: 12
        },
        {
            label: 'Other',
            value: 3
        }],
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
        formatter: function (y) {
            return y + '%'
        }
    });

</script>
   



   