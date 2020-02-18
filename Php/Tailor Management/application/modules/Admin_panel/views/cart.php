
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
                    Add New Order
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() . 'Admin_panel/dashboard' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="<?= base_url() . 'Admin_panel/order' ?>">Add order </a></li>
                    
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                        <div class="box">
                            <div class="box-body">
                                <form action="<?=base_url()?>Admin_panel/add_order" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-md-12">
                                                                                     
                                          <div class="form-group">
                                            <label>Select Customer</label>
                                            <select name="custID" class="form-control" id="nameselect">
                                              <option>Select Customer</option>
                                              <?php foreach($customer as $c){?>
                                              <option value="<?= $c->id?>"><?= $c->name?></option>
                                                <?php }?>
                                            </select>
                                            
                                          </div> 
                                          <div class="form-group">
                                            <label>Select Item</label>
                                            <select name="styleID" class="form-control" id="styleSelect">
                                              <option>Select Item</option>
                                              <?php foreach($style as $c){?>
                                              <option value="<?= $c->id?>"><?= $c->name?></option>
                                                <?php }?>
                                            </select>
                                            
                                          </div>

                                          <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="quantity" id="quantity" class="form-control" required="required">
                                          </div> 
                                          <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" name="price" id="price" class="form-control">
                                          </div>
                                        </div>
                                        <button type="button" name="add_cart" class="btn btn-success add_cart" />Add to Cart</button>
                                    </div>
                                    
                                </form>
                                <div class="col-md-12">
                                    <div id="cart_details">
                                     <h3 align="center">Cart is Empty</h3>
                                 </div>
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
          <!-- ./wrapper -->

<?php
$this->load->view('footer');
?>

<script>
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id = $("#styleSelect").val();
            var custid = $("#nameselect").val();
            var price = $("#price").val();
            var quantity = $("#quantity").val();
            // alert(id);
            $.ajax({
                url:"<?php echo base_url(); ?>Admin_panel/ShoppingCart/add",
                method:"POST",
                data:{id:id,custid:custid, price:price, quantity:quantity},
                success:function(data)
                {
                   alert("Product Added into Cart");
                   $('#cart_details').html(data);
                   // $('#' + product_id).val('');
               }
           });

        });


    });
        $(document).on('click', '#clear_cart', function(){
          if(confirm("Are you sure you want to clear cart?"))
          {
             $.ajax({
                url:"<?php echo base_url(); ?>Admin_panel/ShoppingCart/clear",
                success:function(data)
                {
                   alert("Your cart has been clear...");
                   $('#cart_details').html(data);
               }
           });
         }
         else
         {
             return false;
         }
     });
        $(document).on('click', '.remove_inventory', function(){
          var row_id = $(this).attr("id");
          // alert(row_id);
          if(confirm("Are you sure you want to remove this?"))
          {
             $.ajax({
                url:"<?php echo base_url(); ?>Admin_panel/ShoppingCart/remove",
                method:"POST",
                data:{row_id:row_id},
                success:function(data)
                {
                   alert("Product removed from Cart");
                   $('#cart_details').html(data);
               }
           });
         }
         else
         {
             return false;
         }
     });
</script>