<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SDTI ID Card</title>
    <!-- StyleSheet -->
    <link href="<?=base_url().'admins/'?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url().'admins/'?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="<?=base_url().'admins/'?>assets/css/style.css" rel="stylesheet">  -->
    <!-- <link href="<?=base_url().'admins/'?>css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/> -->
    <style type="text/css">
        .ddd {
    text-align: center;
    background: #F0614D !important;
    font-weight:800;
   padding: 0px
}
.footer1 {
     position: absolute;
    bottom: 0;
    height: 20px;
    width: 100%;
}
.id-card{
position: relative;
    padding-bottom: 20px;
}
    </style>

</head>

<body style="padding-top: -3px">
<div id="hh">
    <a href="<?=base_url().'Admin/front/id'?>" class="btn btn-primary">Back</a>
<A HREF="javascript:window.print()" onclick="hide()" class="btn btn-success">Print</A>
</div>
    <section class="section-padding">

        <div class="container">
            <div class="row" >

                                   
                <div class="col-xs-4" style="margin-top: -2px">
                    <div class="id-card" style="margin-bottom: 16px;border: 2px solid#1D1F21;height: 476px; margin-right: 18px; margin-left: 18px">
                        <div class="row">
                            <div class="col-xs-12" style="text-align: center; padding-top: 5px">
                                <img src="<?=base_url().'images/BADC_title.png'?>"  width="300">
                                <h4>Head Office, Elanbari, Dhaka</h4>
                            </div>
                        </div>

                        <!-- <div class="logo-c-name" style="float: left;padding-top: 5px; padding-left: 2px;"> 
                             
                        </div> -->
                        <div class="id-name" style="text-align: center; margin-bottom: 4px">
                            <h4>ID CARD</h4> <img src="<?=base_url().'trainers/'.$d->photo?>" alt="" height ='148' width = '128'> 
                        </div>
                        <div class="student-detailes" style="font-size: 16px;padding-left: 8px"><b>
                            <span>Name: <?=$d->name?></span><br>
                            <span>Designation: <?=$d->designation?></span><br>
                            <span>Driving Licence ID: <?=$licence?></span><br>
                            <span>Contact No: <?=$d->contact?></span><br>
                            <span>ID: <?=$d->id?></span><br>
                            <!-- <span>Course Start: </span><br> -->
                            <!-- <span>Date of Birth: <?=$ids->date_of_birth?></span><br></b> -->
                           
                        </div>
                        <div class=" container-fluid ddd footer1"><span style="-webkit-print-color-adjust:exact;">Card No: <?=$d->id?></span> </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
    
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url().'admins/'?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url().'admins/'?>assets/js/main.min.js"></script>
</body>
<script type="text/javascript">
    function hide(){
        $('#hh').hide()
    }
</script>
</html>