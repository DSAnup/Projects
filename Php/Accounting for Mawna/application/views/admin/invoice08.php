<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url().'admin_file/money/'?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url().'admin_file/money/'?>moneystyle.css">
    <title>Invoice</title>
    <style type="text/css">
    body{
       font-size: 50px; 
    }
    #example1{
    font-size: 20px;
    }
    @media print {
    @page { margin: 0; }
    body { margin: 1.6cm; }
    #click {display: none;}
    #footer{display: none;}
    }
    </style>
  </head>
  <body>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-12" id="example1">
            <a href="javascript:void(0)" onclick="window.print('#example1')"  id="click">Print</a>
            <div class="row">
              <div class="col-md-2">
                <div class="invoice_left_logo">
                  <img src="<?= base_url().'admin_file/money/'?>image.png" alt="">
                </div>
              </div>
              <div class="col-md-8">
                <div class="money_rec_top">
                  <p style="font-size: 40px; font-weight: 600;padding-bottom: 10px;color: red;letter-spacing: 5px;">মাওনা ডায়াবেটিক সমিতি</p>
                  <p style="font-size: 40px; font-weight: 600;text-transform: uppercase;padding-left: 10px;">MAWNA DIABETIC ASSOCIATION</p>
                  <p style="font-size: 21px; font-weight: 400;text-transform: uppercase;line-height: 1; margin-bottom: 0; padding-bottom: 0;">(মাওনা ডায়াবেটিক সমিতি ওয়েলফেয়ার ট্রাস্টের একটি সহযোগী প্রতিষ্ঠা)</p>
                  
                </div>
                <div class="top_address">
                  <p style="font-size: 13px;line-height: 1;margin-bottom: 0; padding-bottom: 0;"> লাল কুটির প্লাজা,   মাওনা চৌরাস্তা(মাওনা বাজার রোড),শ্রীপুর  ,গাজীপুর।
                  মোবা: 01762-388424, 01995-913780<br>Email:  mdadrarun@gmail.com  ,Web: www.mdswt.com</p>
                  <!-- <p>ফোন:০৬৮২৫-৫১৮৮২,
                  মোবা:০১৭১১৬০১০০৬, ০১৭১৩-৫৩৩৫৭১</p> -->
                </div>
              </div>
              <div class="col-md-2">
                <div class="invoice_right_logo">
                  <img src="<?= base_url().'admin_file/money/'?>logo2.jpg" alt="">
                </div>
              </div>
              <style>
              .logo_right{
              position: absolute;
              top: 0;
              }
              .logo_right img{
              width: 100px;
              height: 90px;
              margin-top: 30px;
              margin-left: 770px;
              margin-right: 50px;
              }
              .invoice_left_logo img {
    width: 100px;
    height: 90px;
    margin-top: 25px;
    margin-left: 50px;
}
 .invoice_right_logo img {
    width: 100px;
    height: 90px;
    margin-top: 25px;
    margin-right: 50px;
}
              </style>
              
            </div>
            <div class="top_underline">
              <img src="<?= base_url().'admin_file/money/'?>top_underline.png" alt="">
            </div>
            <h2 class="application_form_heading">Money Receipt</h2>
            <div class="row">
              <div class="col-md-6">
                <div class="table_one">
                  <table style="width:100% color:red; font-size: 25px;">
                    <tr>
                      <td style="font-size: 25px;">Invoice No</td>
                      <td>:<span class="padding_right"></span><strong>000<?= $edit[0]->invoice_id?></strong></td>
                      
                      
                    </tr>
                    <tr style="font-size: 25px;">
                      <td>Patient Name</td>
                      <td>:<span class="padding_right"></span><?= $patient->name;?></td>
                    </tr>
                    <tr style="font-size: 25px;">
                      <td>Patient Age</td>
                      <td>:<span class="padding_right"></span><?= $patient->age;?></td>
                    </tr>
                    <tr style="font-size: 20px;">
                      <td>Patient Reg No</td>
                      <td>:<span class="padding_right"></span>GRN/MRN/PRN 000<?= $patient->regisId;?></td>
                    </tr>
                   
                  </table>
                </div>
              </div>
              <div class="col-md-6">
                
                <table style="width:100%;style="font-size: 20px;"">
                  <tr style="font-size: 23px;">
                    <td>Inv Date & Time : </td>
                    <td>:<span class="padding_right"></span>
                    <?php
                    $originalDate = $edit[0]->date;
                    $newDate = date("d-m-Y", strtotime($originalDate));
                    echo $newDate;
                  ?> <?= $edit[0]->time;?></td>
                  
                </tr>
                 <tr style="font-size: 25px;">
                      <td>Mobile No</td>
                      <td>:<span class="padding_right"></span><?php if($patient->phone =='n/a'){ echo strtoupper($patient->phone);}else{echo $patient->phone;}?></td>
                    </tr>
                 <tr style="font-size: 25px;">
                      <td>Refd By</td>
                      <td>:<span class="padding_right"></span><?php if(empty($reference)){echo "Self";}else{echo $reference;}?></td>
                    </tr>
                   
              
              </table>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="tabel_two">
                <table style="width:100%">
                  <tr style="border: 2px solid#ABB1BA;font-size: 25px;">
                    <th style="border: 2px solid#ABB1BA;width: 70px;">SL</th>
                    <th style="border: 2px solid#ABB1BA;width: 120px;">Test Code</th>
                    <th style="border: 2px solid#ABB1BA;width: 400px;">Name of Test</th>
                    <th style="border: 2px solid#ABB1BA;width: 130px;"><span class="all_amount">Amount</span></th>
                  </tr>
                  <?php $i  = 0; foreach($edit as $e){ $i++;?>
                  <tr style="border: 2px solid#ABB1BA;font-size: 25px;">
                     <td style="border: 2px solid#ABB1BA;"><?= $i;?></td>
                    <td style="border: 2px solid#ABB1BA;"><?= $e->testID;?></td>
                    <td style="border: 2px solid#ABB1BA;"><?php foreach($test2 as $t2){if($e->testID==$t2->id){echo $t2->name;}}?></td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $e->price;?></span></td>
                  </tr>
                  <?php }?>
                  <!-- <tr style="border: 2px solid#ABB1BA;">
                    <td style="border: 2px solid#ABB1BA;">520182</td>
                    <td style="border: 2px solid#ABB1BA;">X-RAY L/s SPINE B/V (DIGITAL)</td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount">50</span></td>
                  </tr>
                  <tr style="border: 2px solid#ABB1BA;">
                    <td style="border: 2px solid#ABB1BA;">520182</td>
                    <td style="border: 2px solid#ABB1BA;">X-RAY L/s SPINE B/V (DIGITAL)</td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount">50</span></td>
                  </tr> -->
                  <tr class="table_two_tr" style="font-size: 25px;">
                    <td></td>
                     <td></td>
                    <td><span class="table_two_mid">Total Amount :</span></td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->sub_total?></span></td>
                  </tr>
                  <tr class="table_two_tr" style="font-size: 25px;">
                    <td></td>
                     <td></td>
                    <td><span class="table_two_mid">Less Amount :</span></td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->discount?></span></td>
                  </tr>
                  <tr class="table_two_tr" style="font-size: 25px;">
                    <td></td>
                     <td></td>
                    <td><span class="table_two_mid">Net Payable Amount :</span></td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->grand_total?></span></td>
                  </tr>
                  <tr class="table_two_tr" style="font-size: 25px;">
                    <td></td>
                     <td></td>
                    <td><span class="table_two_mid">Paid Amount :</span></td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->paid?></span></td>
                  </tr>
                  <tr class="table_two_tr" style="font-size: 25px;">
                    <td></td>
                     <td></td>
                    <td><span class="table_two_mid">Due amount :</span></td>
                    <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->due?></span></td>
                  </tr>
                </table>
                <div class="inword_remark" style="font-size: 25px;">
                  <p>(Taka In word: <?= $gword;?> Only)</p>
                </div>
                <div class="posted_reamrk_del" style="font-size: 25px;">
                  <p>Posted By : <?= $posted->name;?></p>
                </div>
                <p style="font-size:25px;font-weight:bold;text-align:center;padding-bottom: 0; margin-bottom: 0;">(একটি অলাভজনক সমাজসেবামূলক স্বাস্থ্য প্রতিষ্ঠান)                    </p>
              </div>
            </div>
          </div>
          <div class="developer_info_top">
            <img src="<?= base_url().'admin_file/money/'?>top_underline.png" alt="">
          </div>
          <div class="developer_info">
            <p style="font-size:25px;">Software Developed By: Youth Fire IT</p>
          </div>
        </div>
      </div>
      </div> <!-- /container -->
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>