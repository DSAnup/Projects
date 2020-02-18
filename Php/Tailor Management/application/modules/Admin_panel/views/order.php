
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
                                        <div class="col-md-6">
                                                                                     
                                          <div class="form-group">
                                            <label>Select Customer</label>
                                            <select name="custID" class="form-control" id="nameselect">
                                              <option>Select Customer</option>
                                              <?php foreach($customer as $c){?>
                                              <option value="<?= $c->id?>"><?= $c->name?></option>
                                                <?php }?>
                                            </select>
                                            
                                          </div> 
                                          <h3>Add Order</h3>
                                          <div id="dynamic">
                                            <div class="form-group">
                                                <label>Service Name</label>
                                                <input type="text" name="item[]" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="text" name="quantity[]" id="quantity" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price[]" id="price" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <input type="text" name="discount[]" id="discount" value="0" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="text" name="total[]" id="total" class="form-control">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label></label>
                                                <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Details of Customer</h4>
                                            <div class="form-group">
                                                <label>Customer ID</label>
                                                <div id="cust_number"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <div id="phone"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div id="email"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div id="address"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Picture</label>
                                                <div id="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
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


<script type="text/javascript">
    $(document).ready(function(){
        $("#nameselect").change(function(){
            var id = $("#nameselect").val();
            // alert(d);
            $.ajax({
                    url:'<?= base_url()?>Admin_panel/select_customer',
                    type: 'post',
                    dataType: 'json',
                    data: {val: id},
                    success: function(data){
                        $('#cust_number').html(data.cust_number);
                        $('#phone').html(data.phone);
                        $('#email').html(data.email);
                        $('#address').html(data.address);
                        if(data.image==''){
                            $('#image').html('<img src="<?= base_url().'uploads/noman.gif'?>" width="400px" height="200px">');
                        }else{
                        $('#image').html('<img src="<?= base_url().'uploads/customer/'?>'+data.image+'" width="400px" height="200px">');
                        }
                    }
                });
        });
    })
</script>
<script>
    $(document).ready(function(){
        var i = 1;
            $('#add').click(function(){
                i++;
                // var t="this.value"+"+'_'+"+ii;
        // html='<fieldset id="dynamic'+i+'">'
        html='<div class="form-group">'
        html+='<label>Service Name</label>'
        html+='<input type="text" name="item[]" class="form-control">'
        html+= '</div>'
        html+='<div class="form-group">'
        html+='<label>Quantity</label>'
        html+='<input type="text" name="quantity[]" id="quantity" class="form-control">'
        html+= '</div>'
        html+='<div class="form-group">'
        html+='<label>Price</label>'
        html+='<input type="text" name="price[]" id="price" class="form-control">'
        html+= '</div>'
        html+='<div class="form-group">'
        html+='<label>Discount</label>'
        html+='<input type="text" name="discount[]" id="discount" value="0" class="form-control">'
        html+= '</div>'
        html+='<div class="form-group">'
        html+='<label>Total</label>'
        html+='<input type="text" name="total[]" id="total" class="form-control">'
        html+= '</div>'
        // html+='</fieldset>'
        $('#dynamic').append(html);
            });
    });
</script>
<script type="text/javascript">
    $("#discount").keyup(function(){
        var price = $("#price").val();
    var quantity = $("#quantity").val();
    var discount = $("#discount").val();
    var total = ((price*quantity)-discount);
    $("#total").val(total);
    // alert (total);
    });
    
</script>