<?php

	/**
	 * 
	 */
	class ShoppingCart extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Rest_model');
			$this->load->model('Shopping_model');
			$this->load->library("cart");
			$this->load->library('Pdf');
		}
		function index()
		{
			$data['customer'] = $this->Rest_model->SelectDataOrder('measurement', '*', '','id','desc');
			$data['style'] = $this->Rest_model->SelectDataOrder('style_category', '*', '','id','desc');
			$this->load->view("cart", $data);
		}

		function add()
		{
			$this->load->library("cart");
			$id = $this->input->post('id');
			$custid = $this->input->post('custid');
			$price = $this->input->post('price');
			$quantity = $this->input->post('quantity');
			if($quantity != null){
				$qty = (int)$quantity;
			}else{
				$qty = 1;
			}
			if($price != null){
				$pri = floatval($price);
			}else{
				$pri = 0;
			}
			$sup = $this->Rest_model->SelectData_1('style_category','*',array('id'=>$id));
			$up = $this->Shopping_model->get_customer_1($custid);
			// echo "<pre>";
   //  	var_dump($qty);
   //  	echo "</pre>";
			
			$data = array(
                'id'      => $id,
                'custID'  => $custid,
                'qty'     => $qty,
                'price'   => $pri,
                'name'    => $up->name,
                'itemname'	=>$sup->name,

        
		);
		 $this->cart->insert($data); 
	  
	  echo $this->view();
	}
	public function confirm_cart(){
		// $data['cart'] = $this->cart->contents();
		$this->load->view("confirm_cart");
	}
	public function save_order(){
		$this->load->view("save_order");
	}
    public function confirm_order(){
    	$this->load->library("cart");
    	$dis = $this->input->post('discount');
    	
    	$inv=$this->Shopping_model->get_inv();
    	$date2 = date('Y-m-d');
		$total = $this->cart->total();
		$grand_total = $total-$dis;
        if($inv!==0){
            $in=1+(int)$inv->invoice_number;
        }else{
            $in=1;
        }
    	$cart = $this->cart->contents();
    		foreach ($cart as $item){
				$order_detail[] = array(
					'styleID' => $item['id'],
					'custID' => $item['custID'],
					'quantity' => $item['qty'],
					'price' => $item['price'],
					'subtotal' => $item['subtotal'],
					'invoice_number'=>$in,
					'total'=>$total,
					'discount'=>$dis,
					'grand_total'=>$grand_total,
					'date2' =>$date2
				);
			}
					$this->db->insert_batch('new_order', $order_detail);
					$this->session->set_flashdata('order','Your Order Placed Successfully');
					$last_id = $this->Shopping_model->last_id();
					$data['sd'] = $this->Shopping_model->get_view_1($last_id);
					// $data['sd'] = $this->Rest_model->SelectData_1('new_order','*',array('id'=>$last_id));
					$gid = $data['sd']->invoice_number;
					$data['gin'] = $this->Shopping_model->get_group_inv($gid);
					// $da = $this->user
					// echo "<pre>";
					// print_r($data['sd']);
			$this->load->view("save_order", $data);
    }
    public function print_order(){
    	$data['s'] = $this->Shopping_model->last_check_id();
    	$last_id = $data['s']->id;
    	$gid = $data['s']->invoice_number;
    	$data['sd'] = $this->Shopping_model->get_view_1($last_id);
		$data['gin'] = $this->Shopping_model->get_group_inv($gid);
    	// echo "<pre>";
					// print_r($data['sd']);
    	$this->load->view('order_pdf', $data);
    }
    public function order_list(){
    	$data['order_list'] = $this->Shopping_model->get_group_list();
    	$this->load->view('order_list', $data);
    }
    public function print_order_group($id){
    	$data['sd'] = $this->Shopping_model->get_view_1($id);
    	$gid = $data['sd']->invoice_number;
		$data['gin'] = $this->Shopping_model->get_group_inv($gid);
    	$this->load->view('order_pdf', $data);
    }
    public function del_order_group($id){
    	$data['sd'] = $this->Shopping_model->get_view_1($id);
    	$gid = $data['sd']->invoice_number;
    	$this->Shopping_model->DeleteData('new_order', array('invoice_number'=>$gid));
    	redirect(base_url().'Admin_panel/ShoppingCart/order_list','refresh');
    }
	function load()
	{
		echo $this->view();
	}

	function remove()
	{
		$this->load->library("cart");
		$row_id = $_POST["row_id"];
		$data = array(
			'rowid'  => $row_id,
			'qty'  => 0
		);
		$this->cart->update($data);
		echo $this->view();
	}

	function clear()
	{
		$this->load->library("cart");
		$this->cart->destroy();
		redirect(base_url().'Admin_panel/ShoppingCart', 'refresh');
	}

	function view()
	{
		$this->load->library("cart");
		$output = '';
		$output .= '
		<h3>Shopping Cart</h3><br />
		<div class="table-responsive">
		<div align="right">
		<button type="button" id="clear_cart" class="btn btn-warning">Clear Cart</button>
		</div>
		<br />
		<table class="table table-bordered">
		<tr>
		<th width="10%">Id</th>
		<th width="20%">Name</th>
		<th width="20%">Item Name</th>
		<th width="20%">Quantity</th>
		<th width="20%">Price</th>
		<th width="20%">Sub Total</th>
		<th width="15%">Action</th>
		</tr>

		';
		$count = 0;
		foreach($this->cart->contents() as $items)
		{
			$count++;
			$output .= '
			<tr> 
			<td>'.$count.'</td>
			<td>'.$items["name"].'</td>
			<td>'.$items["itemname"].'</td>
			<td>'.$items["qty"].'</td>
			<td>'.$items["price"].'</td>
			<td>'.$items["subtotal"].'</td>
			<td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
			</tr>
			';
		}
		$output .= '
		<tr>
		<td colspan="4" align="right">Total</td>
		<td>'.$this->cart->total().'</td>
		</tr>
		</table>

		</div>
		
		';
		$base = base_url("Admin_panel/ShoppingCart/confirm_cart");
		$output.='
				<div align="right">
		<a type="button" class="btn btn-success" target="_blank" href='.$base.'>Save</a>
		</div>
		';


		if($count == 0)
		{
			$output = '<h3 align="center">Cart is Empty</h3>';
		}
		return $output;
	}


	}

?>