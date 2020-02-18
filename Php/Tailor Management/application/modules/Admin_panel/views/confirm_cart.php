<?php $this->load->view('head');
$this->load->view('leftMenu');?>
    <div class="wrapper">

        <<!-- ?php
        $this->load->view('leftMenu');
        ?> -->

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
                            <div class="box">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="col-md-12" style="color: #79a0e0">
                                            
                                        </div>
                                        <table class="table table-bordered">
											<tr>
											<th width="10%">SL NO.</th>
											<th width="20%">Name</th>
											<th width="20%">Item Name</th>
											<th width="20%">Quantity</th>
											<th width="20%">Price</th>
											<th width="20%">Sub Total</th>
											</tr>
											<?php $count = 0;
											foreach($this->cart->contents() as $items)
											{ $count++;?>
												
												<tr> 
												<td><?= $count?></td>
												<td> <?= $items["name"] ?></td>
												<td> <?= $items["itemname"] ?></td>
												<td> <?= $items["qty"] ?></td>
												<td> <?= $items["price"] ?></td>
												<td> <?= $items["subtotal"] ?></td>
												</tr>
												
											<?php }?>
											<form method="post" action="<?= base_url("Admin_panel/ShoppingCart/confirm_order")?>">
											<tr>
												
												<td colspan="5" align="right">Total</td>
												<td><input type="text" name="total" id="total" value="<?= $this->cart->total()?>" disabled></td>
												</tr>
												<tr>
												<td colspan="5" align="right">Discount</td>
												<td><input type="text" name="discount" id="discount"></td>
												</tr>
												<tr>
												<td colspan="5" align="right">Grand Total</td>
												<td><input type="text" name="grand_total" id="grand_total" disabled></td>
												</tr>
												<tr>
												<button style="float: right;" type="submit" class="btn btn-success"  id="confirm">Confirm </button>
												</form>
												</table>
                                  </div>

                              </div>
                              <div align="right">
                              	<a href="<?= base_url("Admin_panel/ShoppingCart")?>" type="button" class="btn btn-info" >Update </a>
                              	<a href="<?= base_url("Admin_panel/ShoppingCart/clear")?>" type="button" class="btn btn-danger" >Cancel </a>
                              	
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
<script type="text/javascript">
	$(document).ready(function(){
		$("#discount").keyup(function(){
			var dis = $("#discount").val();
			var to = $("#total").val();
			var grand = to - dis;
			$("#grand_total").val(grand); 
			// alert(grand);
		});

		$("#confirm").click(function(){
			var discount = $("#discount").val();
			var to = $("#total").val();
			var grand = to - discount;
			$("#grand_total").val(grand); 
			$.ajax({
                url:"<?php echo base_url(); ?>Admin_panel/ShoppingCart/confirm_order",
                method:"POST",
                data:{discount:discount, to:to, grand:grand},
                success:function(data)
                {
                	// alert('success');
                   // alert("Product removed from Cart");
                   // $('#cart_details').html(data);
               }
           });
		});
	});
	
	
</script>