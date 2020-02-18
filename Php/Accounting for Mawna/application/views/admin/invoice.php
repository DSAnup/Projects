<?php $this->load->view('admin/head_c');?>
<div class="wrapper">

  <?php
  $this->load->view('admin/leftMenu');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice 
        <small> Invoice </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() . 'Control/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url() . 'Control/admin_list' ?>"> Invoice  </a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="box">
          <div class="box-body" style="background:#f1f3f6">
            <div class="col-md-12" style="color: #79a0e0">
              <!-- <h3> Invoice </h3> -->
            </div>
            <div class="col-xs-12 col-md-12">
              <div class="col-md-10 col-md-offset-1">
               

               <table border="0" style="background: #fff" id="img">
                <tbody><tr>
                  <td>
                    <table border="0" width="100%">
                      <tbody><tr>
                       <td align="center" style="border-bottom:2px #333 solid;"><span><img src="http://mdswt.com/pharmacy/my-assets/image/logo/8ff4b39150bfcb379127ae2e20535d9c.png" width="80" height="80"></span><br><span style="font-size:20px">মাওনা ডায়াবেটিক সমিতি</span> <br>Mawna Diabetic Association <br>A sister concern of Mawna Diabetic Somity Welfare Trust <br>
                        Lal Kutir Plaza (1st Floor), Mawna Chourasta (Mawna Bazar Road),<br> Sheepur, Gazipur-1700,
01762-388424
                      </td>
                    </tr>
                    <tr>
                      <td align="center">Name: <b><?php if(isset($edit)){ echo @$patient->name;}?></b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Age: <?=$patient->age?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Height: <?=$patient->height?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Weight: <?=$patient->weight?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp BP: <?=$patient->bp?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br> Patient Regi. No: <?=$patient->regID?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Mobile: <?=$patient->phone?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Address: 
                        <?=$patient->present_address?>
                        <br>
                      </td>
                    </tr>
                    <tr>
                      <td align="center"><nobr><date>Date:<?=@$edit[0]->date?><time></time></date></nobr></td>
                    </tr>
                  </tbody>
                </table>

                <table width="100%">
                  <tbody><tr>
                    <td>SL</td>
                    <td colspan="3">Test Name</td>
                    <td align="right">Price</td>
                  </tr>
                  <?php if(isset($edit)){
                    $i=1;
                    foreach ($edit as $k) {
                      ?>
                      <tr>
                        <td align="left"><nobr><?=$i++?></nobr></td>
                        <td align="left" colspan="3"><nobr>
                          <?php foreach ($test as $e) {
                            if($e->id==$k->testID){
                              echo $e->name;
                            }
                          } ?>
                        </nobr><nobr></nobr></td>
                        <td align="right"><nobr><?php if($k->price==0){ echo "Free";}else{ ?>৳<?=$k->price?><?php } ?></nobr></td>
                      </tr>
                      <?php } } ?>
                      <tr>
                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                      </tr>
                      <tr>
                        <td align="left"><nobr></nobr></td>
                        <td align="left" colspan="3"><nobr>Sub Total</nobr></td>
                        <td align="right"><nobr>৳ <?php if(isset($edit)){ echo $edit[0]->sub_total;}else{ echo '0';} ?></nobr></td>
                      </tr>
                      <tr>
                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                      </tr>
                      <tr>
                        <td align="left"><nobr></nobr></td>
                        <td align="left" colspan="3"><nobr>Discount</nobr></td>
                        <td align="right"><nobr>৳ <?php if(isset($edit)){ echo $edit[0]->discount;}else{ echo '0';} ?></nobr></td>
                      </tr>
                      <tr>
                        <td align="left"><nobr></nobr></td>
                        <td align="left" colspan="3"><nobr>Consider</nobr></td>
                        <td align="right"><nobr>৳ <?php if(isset($edit)){ echo $edit[0]->consider;}else{ echo '0';} ?> </nobr></td>
                      </tr>
                      <tr>
                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                      </tr>
                      <tr>
                        <td align="left"><nobr></nobr></td>
                        <td align="left" colspan="3"><nobr><strong>Grand Total</strong></nobr></td>
                        <td align="right"><nobr><strong>৳ <?php if(isset($edit)){ echo $edit[0]->grand_total;}else{ echo '0';} ?></strong></nobr></td>
                      </tr>
                      <tr>
                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                      </tr>
                      <tr>
                        <td align="left"><nobr></nobr></td>
                        <td align="left" colspan="3"><nobr>Paid</nobr></td>
                        <td align="right"><nobr>৳ <?php if(isset($edit)){ echo $edit[0]->paid;}else{ echo '0';} ?></nobr></td>
                      </tr>
                      <tr>
                        <td align="left"><nobr></nobr></td>
                        <td align="left" colspan="3"><nobr>Due</nobr></td>
                        <td align="right"><nobr>৳ <?php if(isset($edit)){ echo $edit[0]->due;}else{ echo '0';} ?></nobr></td>
                      </tr>
                      <tr>
                        <td colspan="5" style="border-top:#333 1px solid;"><nobr></nobr></td>
                      </tr>
                    </tbody>
                  </table>
                  <table width="100%">
                    <tbody>
                      <tr>
                      <td>Receipt  No:<?php if(isset($edit)){ echo $edit[0]->invoice_id;}else{ echo '0';} ?></td>
                      <td>Reference: <?=$reference?></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                Powered  By: YouthFireIT, info@youthfireit.com

              </td>
            </tr>
          </tbody></table>
          <div class="panel-footer text-left">
            <a class="btn btn-danger" href="<?=base_url()?>Control/test_sale">Cancel</a>
            <button class="btn btn-info" onclick="jQuery.print('#img')"><span class="fa fa-print"></span></button>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


</section>
<!-- /.content -->
</div>
</div>
<input type="hidden" value="0" id="sl">
<!-- ./wrapper -->
<?php $this->load->view('admin/footer_c');?>
