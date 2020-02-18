<?php $this->load->view('head');
$this->load->view('leftMenu');?>
    <div class="wrapper">
<style type="text/css">
	#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Order List
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer' ?>">Add Customer </a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/customer_list' ?>"> Customer List</a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                        <div class="col-md-12">
                            <h3><?php echo $this->session->flashdata('order');?></h3>
                            <div class="box">
                            	<div align="center">
                            		<a href="<?= base_url().'Admin_panel/ShoppingCart/print_order'?>" target="_blank" type="button" class="btn btn-success"> Print</a>
                            	</div>
                                <div class="box">
                                	<div class="col-md-6">
                                		<h5 style="font-weight: bolder;">Customer Details</h5>
                                		<p><?= $sd->cust_number?></p>
                                		<p><?= $sd->name?></p>
                                		<p><?= $sd->phone?></p>
                                		<p><?= $sd->email?></p>
                                	</div>
                                	<div class="col-md-6" align="right">
                                		<h5>Invoice No : #<?= $sd->invoice_number?></h5>
                                		
                                		<p><?= $sd->invoicedate?></p>
                                		<!-- <p><?= $sd->phone?></p>
                                		<p><?= $sd->email?></p> -->
                                	</div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            
                                        </div>
                                        <table class="table table-bordered" id="customers">
											<tr>
											<th width="10%">SL NO.</th>
											<th width="20%">Item Name</th>
											<th width="20%">Quantity</th>
											<th width="20%">Price</th>
											<th width="20%">Sub Total</th>
											</tr>
											<?php $count = 0;
											foreach($gin as $i)
											{ $count++;?>
												
												<tr> 
												<td><?= $count?></td>
												<td> <?= $i->stylename ?></td>
												<td> <?= $i->quantity ?></td>
												<td> <?= $i->price?></td>
												<td> <?= $i->subtotal ?></td>
												</tr>
												
											<?php }?>
												<tr>
													<td colspan="4">Total</td>
													<td><?= $sd->total?></td>
												</tr>
												<tr>
													<td colspan="4">Discount</td>
													<td><?= $sd->discount?></td>
												</tr>
												<tr>
													<td colspan="4">Grand Total</td>
													<td><?= $sd->grand_total?></td>
												</tr>
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
          <!-- ./wrapper -->
<?php
$this->load->view('footer');
?>
