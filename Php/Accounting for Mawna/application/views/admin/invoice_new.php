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
      @media print {
        @page { }
        body { }
        #click {display: none;}
        #footer{display: none;}
      }
     
    
    </style>
  </head>
  <body>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12" style="margin-left:-40px;margin-top:20px;" id="example1">
            <a href="javascript:void(0)" onclick="window.print('#example1')"  id="click">Print</a>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="money_rec_top">
                  <p style="font-size: 40px; font-weight: 600;padding-bottom: 10px;color: red;letter-spacing: 5px; padding-left: 100px;">মাওনা ডায়াবেটিক সমিতি  </p>
                  <p style="font-size: 40px; font-weight: 500;text-transform: uppercase;padding-left: 100px;">Mawna Diabetic Association</p>
                    <p style="font-size: 25px; font-weight: 400;text-transform: uppercase;padding-left: 100px;line-height: 1;">মাওনা ডায়াবেটিক সমিতি ওয়েলফেয়ার ট্রাস্টের একটি সহযোগী প্রতিষ্ঠান</p>
                  <div class="bcci_logo">
                    <img src="<?= base_url().'admin_file/money/'?>image.png" alt="">
                  </div>
                </div>
                <div class="top_address">
                                    <p style="font-size: 14px;padding-left: 90px;line-height: 1"> লাল কুটির প্লাজা,   মাওনা চৌরাস্তা(মাওনা বাজার রোড),শ্রীপুর  ,গাজীপুর। 
              মোবা: 01762-388424, 01995-913780<br>Email:  mdadrarun@gmail.com  ,Web: www.mdswt.com</p>     
              
             
                </div>
              </div>
            </div>
            <div class="top_underline">
              <img src="<?= base_url().'admin_file/money/'?>top_underline.png" alt="">
            </div>
            <h2 class="application_form_heading">Money Receipt</h2>
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="table_one">
                  <table style="width:100% color:red;">
                    <tr>
                      <td>Invoice No</td>
                      <td>:<span class="padding_right"></span><strong>000<?= $edit[0]->invoice_id?></strong></td>
                      
                      
                    </tr>
                    <tr>
                      <td>Patient Name</td>
                      <td>:<span class="padding_right"></span><?= $patient->name;?></td>
                    </tr>
                    <tr>
                      <td>Patient Age</td>
                      <td>:<span class="padding_right"></span><?= $patient->age;?></td>
                    </tr>
                   <!-- <tr>
                      <td>Refd By</td>
                      <td>:<span class="padding_right"></span><?=$reference?></td>
                    </tr>--->
                   <!--- <tr>
                      <td>Phone</td>
                      <td>:<span class="padding_right"></span><?= $patient->phone;?></td>
                    </tr>--->
                  </table>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                
                <table style="width:100%">
                  <tr>
                    <td>Inv Date & Time : </td>
                    <td>:<span class="padding_right"></span>
                      <?php
                        $originalDate = $edit[0]->date;
                        $newDate = date("d-m-Y", strtotime($originalDate));
                        echo $newDate;
                     ?> <?= $edit[0]->time;?></td>
                    
                  </tr>
                 <tr>
                    <td>Mobile</td>
                      <td>:<span class="padding_right"></span><?= $patient->phone;?></td>
                  </tr>
                  <tr>
                      <td>Refd By</td>
                      <td>:<span class="padding_right"></span><?=$reference?></td>
                   <!--- <td>Patient Sex</td>
                    <td>:<span class="padding_right"></span><?= $patient->sex;?></td>--->
                    
                  </tr>
                </table>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="tabel_two">
                  <table style="width:100%">
                    <tr style="border: 2px solid#ABB1BA;">
                      <th style="border: 2px solid#ABB1BA;">Test Code</th>
                      <th style="border: 2px solid#ABB1BA;">Name of Test</th>
                      <th style="border: 2px solid#ABB1BA;"><span class="all_amount">Amount</span></th>
                    </tr>
                    <?php foreach($edit as $e){?>
                    <tr style="border: 2px solid#ABB1BA;">
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
                    <tr class="table_two_tr">
                      <td></td>
                      <td><span class="table_two_mid">Total Amount :</span></td>
                      <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->sub_total?></span></td>
                    </tr>
                    <tr class="table_two_tr">
                      <td></td>
                      <td><span class="table_two_mid">Discount :</span></td>
                      <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->discount?></span></td>
                    </tr>
                    <tr class="table_two_tr">
                      <td></td>
                      <td><span class="table_two_mid">Grand Total :</span></td>
                      <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->grand_total?></span></td>
                    </tr>
                    <tr class="table_two_tr">
                      <td></td>
                      <td><span class="table_two_mid">Received Amount :</span></td>
                      <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->paid?></span></td>
                    </tr>
                    <tr class="table_two_tr">
                      <td></td>
                      <td><span class="table_two_mid">Due Amount :</span></td>
                      <td style="border: 2px solid#ABB1BA;"><span class="all_amount"><?= $edit[0]->due?></span></td>
                    </tr>
                  </table>
                  <div class="inword_remark">
                    <p>(Taka In word: <?= $gword;?> Only)</p>
                  </div>
                  <div class="posted_reamrk_del">
                    <p>Posted By : <?= $posted->name;?> </p>
                    <p style="font-size:16px;font-weight:bold;text-align:center;">(একটি অলাভজনক সমাজসেবামূলক স্বাস্থ্য প্রতিষ্ঠান)                    </p>
                   <!--- <p>Remarks: Due by Mawya General Hospital</p>
                    <p>Delivery After: 36 Hours </p>-->
                  </div>
                </div>
              </div>
            </div>
<div class="developer_info_top">
  <img src="<?= base_url().'admin_file/money/'?>top_underline.png" alt="">
</div>
            <div class="developer_info">
              <p>Software Developed By: Youth Fire IT</p>
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