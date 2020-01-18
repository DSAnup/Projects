
Modal button

<button class="btn btn-info btn-sm"  value="<?php echo $row->id; ?>" onclick="ss(this.value)"  data-toggle="modal" data-target="#myModal"><i class="icon-eye-open icon-white"></i></button>

ajax data send and receive

<script type="text/javascript">
	function ss(id){
                // alert(id);
                
                $.ajax({
                	url:'<?= base_url()?>Admin/Dropdown/view_product',
                	type: 'post',
                	dataType: 'json',
                	data: {val: id},

                	success: function(data){

                		$('#productname').html(data.product_name);
                		$('#productcat').html(data.name);
                		$('#producsubcat').html(data.sub_name);
                		$('#brandname').html(data.brand_name);
                		$('#protitle').html(data.title);
                		$('#prodetails').html(data.details);
                		$('#proprice').html(data.price);
                		$('#proldprice').html(data.old_price);
                		$('#proquantity').html(data.quantity);
                    
                    $('#msg').html('<img src="<?= base_url().'uploads/project/'?>'+data.image+'" width="400px" height="200px">');

                    // var test = data.s;
                    if (data.white == 1) {$('#color').html("Available");};
                    if (data.black == 1) {$('#color1').html("Available");};
                    if (data.red == 1) {$('#color2').html("Available");};
                    if (data.lightgrey == 1) {$('#color3').html("Available");};
                    if (data.other_color == 1) {$('#color4').html("Available");};
                    if (data.s == 1) {$('#size').html("Available");};
                    if (data.m == 1) {$('#size1').html("Available");};
                    if (data.l == 1) {$('#size2').html("Available");};
                    if (data.xl == 1) {$('#size3').html("Available");};



                }

            });
            }
        </script>

        foreach

        <script type="text/javascript">
            function ss(id){
               var d= $('#reg').val();
                // alert(d);
                $.ajax({
                    url:'<?= base_url()?>Admin_panel/view_batch',
                    type: 'post',
                    dataType: 'json',
                    data: {val: id, dd:d},

                    success: function(data){

                        $('select[name="batchId"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="batchId"]').append('<option value="'+ value.id +'">'+ value.batchName +'</option>');
                        });



                }   

            });
            }
        </script>

Dropdown Controller 

	public function view_product(){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Admin','refresh');
        }else{
            $id = $this->input->post('val');
        
        $data = $this->M_admin_model->get_product_1($id);
        
        echo json_encode($data); 
        }
    }


M_admin_model Model

    public function get_product_1($id){
        $this->db->select('product.*, pro_cat.name,pro_sub_cat.sub_name, brand.brand_name');
        $this->db->from('product');
        $this->db->join('pro_cat', 'product.procatid=pro_cat.id');
        $this->db->join('pro_sub_cat', 'product.prosubcatid=pro_sub_cat.id');
        $this->db->join('brand', 'product.brand_id=brand.id');
        $this->db->order_by('product.id','desc');
        $this->db->where('product.id',$id);
        // $this->db->group_by('pro_sub_cat.id');
        $query =$this->db->get();
        return $query->row();
    }

 Plugin 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> (if needed)

  Modal View

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="productname"></h4>
      </div>
      <div class="modal-body">
       <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Product Category</td>
            <td id="productcat"></td>
            
          </tr>
          <tr>
            <td>Product Sub_Category</td>
            <td id="producsubcat"></td>
            
          </tr>
          <tr>
            <td>Brand Name</td>
            <td id="brandname"></td>
            
          </tr>
          <tr>
            <td>Product Title</td>
            <td id="protitle"></td>
            
          </tr>
          <tr>
            <td>Product Details</td>
            <td id="prodetails"></td>
            
          </tr>
          <tr>
            <td>Product Sub_Category</td>
            <td id="producsubcat"></td>
            
          </tr>
          <tr>
            <td>Product Price</td>
            <td id="proprice"></td>
            
          </tr>
          <tr>
            <td>Product Old Price</td>
            <td id="proldprice"></td>
            
          </tr>
          <tr>
            <td>Product Quantity</td>
            <td id="proquantity"></td>
            
          </tr>
          <tr>
            <th colspan="2">Available Color</th>
          </tr>
          <tr>
            <td>White</td>
            <td id="color"></td>
          </tr>
          <tr>
            <td>Black</td>
            <td id="color1"></td>
          </tr>
          <tr>
            <td>Red</td>
            <td id="color2"></td>
          </tr>
          <tr>
            <td>Lightgrey</td>
            <td id="color3"></td>
          </tr>
          <tr>
            <td>Others</td>
            <td id="color4"></td>
          </tr><tr>
            <th colspan="2">Available Size</th>
          </tr>
          <tr>
            <td>Small</td>
            <td id="size"></td>
          </tr>
          <tr>
            <td>Medium</td>
            <td id="size1"></td>
          </tr>
          <tr>
            <td>Large</td>
            <td id="size2"></td>
          </tr>
          <tr>
            <td>Extra Large</td>
            <td id="size3"></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<a data-toggle="modal" data-target="#myModal-<?= $s->id;?>" href="javascript:void(0);">View</a>

<?php foreach($message as $s){?>
<!-- Modal -->
  <div class="modal fade" id="myModal-<?= $s->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?= $s->date;?></h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php }?>
  