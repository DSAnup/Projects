<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BDTA ID Card</title>
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

.id-card-back{
    padding-left: 8px;   
    background-image: url('../images/logo2.png')!important;
       
    /*background-image: url(http://i54.tinypic.com/4zuxif.jpg); */
    background-repeat: no-repeat;  
    background-position: center;
}
.id-card-back img{
 opacity: 0.3;
}
.id-card-back h4 {
    font-size: 12px;
    font-weight: 800;
}

.id-card-back h5 {
    text-align: center;
    font-size: 18px;
    font-weight: 700;
}
.id-card-back p {
    line-height: 10px;
    text-align: left;
    font-weight: 600;
    margin-left: 5px;
}
.id-card-back h3{
    text-align: center;
    color: #1EA362 !important;
}
.sdti{
    text-align: center !important;
    font-weight: 900px;
    font-size: 16px;
    color: #5dba2e !important;
    padding-left: 5px;
}
.id-card-back h6{
    font-weight: 800;
    font-size: 12px;
}

.id-card-back h5:before {
    position: absolute;
    width: 60px;
    height: 2px;
    background: #1D1F21;
    left: 50%;
    margin-left: -30px;
    top: 13%;
    content: "";
}
.student-signature{
     padding-left: 8px;
}
.authorizes-signature{
    float: right;
    margin-top: -68px;
    position: relative;
     padding-left: 8px;
}

.authorizes-signature p {
    margin-left: -180px;
    margin-top: 40px;
}
.authorizes-signature img{
    padding-left:0;
    position: absolute;
}
.student-signature:before {
    background: #1d1f21 none repeat scroll 0 0;
    bottom: 15%;
    content: "";
    height: 1px;
    left: 66%;
    margin-left: -232px;
    position: absolute;
    width: 110px;
}
.authorizes-signature:before {
   background: #1d1f21 none repeat scroll 0 0;
    bottom: 40%;
    content: "";
    height: 1px;
    left: 75%;
    margin-left: -177px;
    position: absolute;
    width: 125px;
}


@media print {
 background-image: url('../images/logo2.png');
}


    </style>

                              
</head>

<body style="padding-top: -3px">
<div id="hh">
    <a href="<?=base_url().'Admin/back/id'?>" class="btn btn-primary">Back</a>
<A HREF="javascript:window.print()" onclick="hide()" class="btn btn-success">Print</A>
</div>
    <section class="section-padding" >

        <div class="container" >
            <div class="row"  >

                    <?php
                        $i=0;
                          for ($id=0; $id<$n; $id++){
                            ?>
                                   
                <!--<div class="col-xs-4" style="margin-top: -2px">-->
                <!--    <div class="id-card" style="margin-bottom: 16px;border: 2px solid#1D1F21;height: 476px; margin-right: 18px; margin-left: 18px">-->
                       

                <!--     <div class="id-card-backend">-->
                <!--     <div class="col-xs-12" style="text-align: center; padding-top: 5px">-->
                <!--                <img src="<?=base_url().'images/BADC_title.png'?>"  width="300">-->
                <!--                <h4>Head Office, Elanbari, Dhaka</h4>-->
                <!--            </div>-->
                <!--        <div class="id-card-back" style="-webkit-print-color-adjust:exact;padding-left: 8px;background-image: url('<?=base_url()."images/back.png"?>')!important;">-->
                <!--            <h2 class="sdti"> </h2>-->
                <!--            <br><br><br><br><br><br><br>-->
                <!--            <h5>Address:</h5>-->
                <!--            <p>Head Office,</p>-->
                <!--            <p>Elanbari</p>-->
                            <!-- <p>Sumon Plaza, Senpara Parbota,</p>
                <!--            <p>Begum Rokeya Sharoni, Mirpur # 10,</p> -->
                <!--            <p>Dhaka # 1216, Bangladesh</p>-->
                <!--            <p>Cell: +88 01711 045669</p>-->
                            
                <!--            <p> Telephone No: 9012344</p>-->
                <!--            <p>E-mail: info.bsdti@gmail.com</p>-->
                <!--            <p>Web Address:www.bdta.com</p>-->
                            
                <!--            <h6>Validity: <?=$v?></h6> -->
                <!--            <br><br><br>-->
                <!--        </div>-->
                <!--        <div class="container-fluid" style="padding: 0px; margin-top: 10px">-->
                <!--            <div class="col-xs-6" style="padding-left: 4px"></br>-->
                                <!--<img src="<?=base_url().'admins/'?>assets/image/Signature1.png" alt="" height="25" width="110">-->
                <!--                <p style="font-size: 11px; border-top: 3px solid black; padding-right: 3px">Authorizes Signature</p>-->
                <!--            </div>-->
                <!--            <div class="col-xs-6" style="padding-right:  4px"></br>-->
                                <!-- <img src="<?=base_url().'admins/'?>assets/image/Signature1.png" alt="" height="25" width="110">-->
                <!--                <p style="font-size: 11px; border-top: 3px solid black; padding-left: 3px">Authorizes Signature</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                      
                        
                <!--    </div>-->
                <!--</div>-->
                
                <div style="margin: 5px 5px 5px 5px; height: 192px; width: 300px; border: 1px solid #3244; float: left; background: url('<?=base_url()?>images/id_back_side.png') !important;  background-repeat: no-repeat !important;background-size: contain !important;">
                   <div style="width: auto; overflow: hidden;">
                       <!--<div class="row">-->
                            <div class="col-xs-12" style="text-align: center; padding-top: 5px;">
                                <img src="<?=base_url().'images/BADC_title.png'?>"  width="200">
                                <p style="font-size: 10px; padding-left: 30px">
                                    Sheltec Sterra, Office: 206(3rd Floor), 236 New Elephant Road, Dhaka-1205, Hotline: 09678771247
                                </p>
                            </div>
                        <!--</div>-->
                        <div class="row" style="margin-top: 0px">
                            <div class="container-fluid" style="text-align: center; padding-top: 0px; margin-left: 1px">
                                    <p style="font-size: 11px; padding-left: 8px">
                                    Cell: +88 01711 045669<br>
                                    <!--Telephone No: <br>-->
                                    E-mail: info.bsdti@gmail.com
                                    <div class="col-xs-6" style="padding-left: 4px">
                                        <img src="<?=base_url().'admins/'?>assets/image/Signature1.png" alt="" height="25" width="110">
                                        <p style="font-size: 11px; border-top: 3px solid black; padding-right: 3px">Authorizes Signature</p>
                                    </div>
                                    <div class="col-xs-6" style="padding-right:  4px">
                                         <img src="<?=base_url().'admins/'?>assets/image/Signature1.png" alt="" height="25" width="110">
                                        <p style="font-size: 11px; border-top: 3px solid black; padding-left: 3px">Authorizes Signature</p>
                                    </div>
                                   <span style="color: #fff !important; padding-top: 9px"> www.facebook.com/bdta.17</span>
                                </p>
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
    <script src="<?php echo base_url() ?>jQuery-Plugin-Print/jQuery.print.js"></script>
</body>
<script type="text/javascript">
    function hide(){
        $('#hh').hide()
    }
</script>
</html>