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
    <section>

        <div class="container">
            <div class="row" >

                    <?php
                        $i=0;
                          foreach ($d as $ids){
                            ?>
                                   
                <div style="margin: 5px 5px 5px 5px; height: 192px; width: 300px; border: 1px solid #3245; float: left; background: url('<?=base_url()?>images/id_front.png') !important;  background-repeat: no-repeat !important;background-size: contain !important;">
                   <div style="width: 118px; float: right;padding-top: 40px; padding-left: 4px">
                        <img src="<?=base_url().'std_photo/'.$ids->photo?>" alt="" height ='126' width = '93'>
                    </div>
                   <div style="width: auto; overflow: hidden;">
                       <div class="row">
                            <div class="col-xs-12" style="text-align: left; padding-top: 5px;">
                                <img src="<?=base_url().'images/BADC_title.png'?>"  width="195">
                                <p style="font-size: 10px; padding-left: 30px">236, New Elephant Road, Dhaka</p>
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: 30px">
                            <div class="container-fluid" style="text-align: left; padding-top: 3px; margin-left: 1px">
                                <div class="col-md-8 row" style="width: 180px">
                                    <p style="font-size: 11px; padding-left: 8px">
                                    Name: <?=$ids->name?><br>
                                    Course Name: <?=$ids->c_name?><br>
                                    Roll: <?=$ids->roll?><br>
                                    Expired Date : <?=$ids->expire?><br>
                                   <span style="color: #fff !important; padding-top: 4px"> Card No: <?=$ids->roll?></span>
                                </p>
                                </div>
                                
                            </div>
                        </div>
                   </div>
                    </div>
                <?php }?>
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