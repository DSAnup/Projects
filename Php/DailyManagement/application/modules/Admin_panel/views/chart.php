<?php $this->load->view('header');?>
<!-- <link href="<?= base_url().'admin_assets/'?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
<?php $userID = $this->session->userdata('userID');;?>
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
            <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
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
              $sold=$ci->Admin_model->get_expense($value);
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
</div>
</div>
    </section>

   <?php $this->load->view('footern');?>
  