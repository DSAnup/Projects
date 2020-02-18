<?php $this->load->view('head');
$this->load->view('leftMenu');?>
    <div class="wrapper">

        <!-- ?php
        $this->load->view('leftMenu');
        ?> -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Reports
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/reports' ?>">Check Reports </a></li>
                    
                </ol><br>
                <a href="javascript:void(0)" id="pri" onclick="window.print('#img')" style="float: right;"> Print</a>  
            </section>
            <style>
            .tt{
              font-size:15px;
              /*padding-right: 10px;*/
            }
            th, td{
              text-align:center;
            }
            @media print {
              @page { margin: 0; }
              body { margin: 0.5cm; }
              #pri {
                display: none;
              }
              .main-footer {
                display: none;
              }
            }

          </style>

                                              <!-- Main content -->
            <section class="content">
                <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body" >
                                        <div class="col-md-12" style="color: #79a0e0">
                                            <h3>Income Reports</h3>
                                            <p>From <?= $date1?>  To <?= $date2?></p>
                                            <!-- <button onclick="myFunction()">Print this page</button> -->

                                            
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Invoice No</th>
                                                    <th>Grand Total</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $sum = 0; $i=0; foreach ($reporder as $num => $s) { $sum += $s->grand_total;?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->invoice_number ?></td>
                                                  <td><?= $s->grand_total ?></td>
                                                  <td><?= $s->date2   ?></td>
                                                  
                                              </tr>
                                              
                                              <?php } ?>
                                              <tr style="text-align: center;">
                                                <td colspan="2">Total Income</td>
                                                <td><?php 
                                                    echo $sum;?>
                                                      
                                                    </td>
                                                <!-- <td>hel</td>
                                                <td>hel</td>
                                                <td>hel</td> -->
                                              </tr>
                                          </tbody>
                                      </table>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                            <div class="box">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body" id="img">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            <h3>Expense Reports</h3>
                                            <p>From <?= $date1?>  To <?= $date2?></p>
                                            
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped" border="1">
                                            <thead style="background-color: #79a0e0">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Purposes</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itembody">
                                              <?php $sum2 = 0; $i=0; foreach ($rep as $num => $s) { $sum2 += $s->amount;?>
                                                <tr align="center">
                                                  <td><?= ++$i;?></td>
                                                  <td><?= $s->purpose  ?></td>
                                                  <td><?= $s->amount ?></td>
                                                  <td><?= $s->date   ?></td>
                                                  
                                              </tr>
                                              
                                              <?php } ?>
                                              <tr style="text-align: center;">
                                                <td colspan="2">Total Expense</td>
                                                <td><?php 
                                                    echo $sum2;?>
                                                      
                                                    </td>
                                                <!-- <td>hel</td>
                                                <td>hel</td>
                                                <td>hel</td> -->
                                              </tr>
                                              <tr style="text-align: center;">
                                                <td colspan="2">Balance  </td>
                                                <td><?php 
                                                     $b= $sum-$sum2;
                                                     echo $b.'/=';
                                                     ?>
                                                      <?php if($b>0){echo "(Profit)";}else{echo "Loss";}?>
                                                    </td>
                                                <!-- <td>hel</td>
                                                <td>hel</td>
                                                <td>hel</td> -->
                                              </tr>
                                          </tbody>
                                      </table>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </section>
                  <!-- /.content -->
              </div>

          </div>
          

<?php
$this->load->view('footer');
?>
