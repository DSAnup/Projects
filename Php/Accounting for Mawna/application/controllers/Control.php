<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Rest_model');
		$this->load->model('Update_model');
		
	}
	public function index()
	{
		if(isset($_SESSION['userID'])){
			redirect(base_url('Control/dashboard'));
		}else{
			$this->load->view('admin/index');
		}
	}
	public function login(){
		$data=$this->input->post();
		$data['status']='active';
		$d=$this->Rest_model->SelectData_1('users','*',$data);
		if (!empty($d)) {
			$this->session->set_userdata('userID',$d->id);
			$this->session->set_userdata('userName',$d->name);
			$this->session->set_userdata('role',$d->role);
			redirect(base_url().'Control/dashboard','refresh');
		}else{
			$this->session->set_flashdata('error','Invalid email or password !');
			redirect(base_url().'Control','refresh');
		}
	}

	public function dashboard()
	{
		$userID = $this->session->userdata('userID');
		$userRole = $this->session->userdata('role');

		if (isset($userID)) {
			$this->session->set_userdata('manu','dashboard');
			$_SESSION['menu']='dashboard';
			$this->session->set_userdata('admin_name',$_SESSION['userName']);
			// if ($userRole == '') {
			// 	$this->load->view('admin/dashboard2');
			// }else{
				$this->load->view('admin/dashboard');	
			// }
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function admin_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','admin');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('users', '*', array('id'=>$id));
			}
			$data['adm'] = $this->Rest_model->SelectDataOrder('users', '*', array('role!='=>'developer'),'id','desc');
			$this->load->view('admin/admin_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_admin(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data = $this->input->post();
			$id = $this->input->post('id');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|mp4';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 100000000;
			$config['max_width'] = 10240000;
			$config['max_height'] = 7680000;
			$this->load->library('upload', $config);

			$this->load->library('image_lib');
			$config_1['image_library'] = 'gd2';
			$config_1['create_thumb'] = FALSE;
			$config_1['maintain_ratio'] = FALSE;
			$config_1['width']         = 150;
			$config_1['height']       = 150;

			if (!$this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data2 = array('upload_data' => $this->upload->data());
				$data['photo'] = $data2['upload_data']['file_name'];
				$config_1['source_image'] = 'uploads/'.$data2['upload_data']['file_name'];
				$this->image_lib->initialize($config_1); 
				$this->image_lib->resize();
			}
			if(isset($id)){
				$this->Rest_model->UpdateData('users', $data,array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('users', $data);
			}
			redirect(base_url().'Control/admin_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_admin($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('users', array('id'=>$id));
			redirect(base_url().'Control/admin_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function change_status($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$d=$this->Rest_model->SelectData_1('users','*', array('id'=>$id));
			if($d->status=='active'){
				$data['status']='inactive';
			}else{
				$data['status']='active';
			}
			$this->Rest_model->UpdateData('users',$data,array('id'=>$id));
			redirect(base_url().'Control/admin_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	
	public function signout(){
		session_destroy();
		redirect(base_url().'Control','refresh');
	}
	public function expense_category($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','ex_category');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('expense_category', '*', array('id'=>$id));
			}
			$data['category'] = $this->Rest_model->SelectDataOrder('expense_category', '*', '','id','desc');
			$this->load->view('admin/expense_category', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_expense_category(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','ex_category');
			$id=$this->input->post('id');
			$data['category']=$this->input->post('category');
			if(isset($id)){
				$this->Rest_model->UpdateData('expense_category', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('expense_category', $data);
			}
			redirect(base_url().'Control/expense_category', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_expense_category($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('expense_category', array('id'=>$id));
			redirect(base_url().'Control/expense_category', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function expense_sub_category($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','ex_category');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('expense_sub_category', '*', array('id'=>$id));
			}
			$data['category'] = $this->Rest_model->SelectDataOrder('expense_category', '*', '','id','desc');
			$data['sub_category'] = $this->Rest_model->SelectDataOrder('expense_sub_category', '*', '','id','desc');
			$this->load->view('admin/expense_sub_category', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_expense_sub_category(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','ex_category');
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('expense_sub_category', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('expense_sub_category', $data);
			}
			redirect(base_url().'Control/expense_sub_category', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_expense_sub_category($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('expense_sub_category', array('id'=>$id));
			redirect(base_url().'Control/expense_sub_category', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_expense($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','ex_category');
			if(isset($id)){
				$data['edit'] = $this->Admin_model->get_expense_1($id);
			}
			$data['category'] = $this->Rest_model->SelectDataOrder('expense_category', '*', '','id','desc');
			$data['sub_category'] = $this->Rest_model->SelectDataOrder('expense_sub_category', '*', '','id','desc');
			$data['expense'] = $this->Admin_model->get_expense();
			$data['expenseCashSum'] = $this->Update_model->expenseCashSum();
			$data['expensechequeSum'] = $this->Update_model->expensechequeSum();
			$this->load->view('admin/add_expense', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function get_sub_category()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData('expense_sub_category','*',array('categoryID'=>$id));
		echo json_encode($data);
	}
	public function add_expense_submit(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','ex_category');
			$id=$this->input->post('id');
			$data=$this->input->post();
			$data['updated_by']=$_SESSION['userID'];
			if(isset($id)){
				$this->Rest_model->UpdateData('expense', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('expense', $data);
			}
			redirect(base_url().'Control/add_expense', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_expense($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['deleted']=1;
			$data['deleted_by']=$_SESSION['userID'];
			$this->Rest_model->UpdateData('expense', $data, array('id'=>$id));
			redirect(base_url().'Control/add_expense', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function test_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('test', '*', array('id'=>$id));
			}
			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/test_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_test(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('test', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('test', $data);
			}
			redirect(base_url().'Control/test_list', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_test($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['deleted']=1;
			$data['deleted_by']=$_SESSION['userID'];
			$this->Rest_model->UpdateData('test', $data, array('id'=>$id));
			redirect(base_url().'Control/test_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function test_sale($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('test_sale', '*', array('invoice_id'=>$id));
			}
			$data['test_sale'] = $this->Admin_model->get_test_sold();
			// $data['patient']=$this->Rest_model->SelectDataOrder('patient','*','','id','desc');
			$data['patient']=$this->Rest_model->SelectDataOrder('patient_new','*','','id','asc');
			$data['dr']=$this->Rest_model->SelectData('dr_list','*','');
			$data['lR']=$this->Rest_model->SelectDataOrder_1('patient_new','*','','id','desc','1');
			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','asc');
			$data['testsaleSub'] = $this->Update_model->testsaleSub();
			$data['testsaleDis'] = $this->Update_model->testsaleDis();
			$data['testsaleCon'] = $this->Update_model->testsaleCon();
			$data['testsaleGrand'] = $this->Update_model->testsaleGrand();
			$this->load->view('admin/test_sale', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	
	public function addnew_patient(){
		$data = $this->input->post();
		$d=$this->Admin_model->get_regID();
		if(!isset($d)){
			$data['regID']=0;
			
		}else{
			$data['regID']=(int)$d->regID+1;
		}
		$this->Rest_model->SaveData('patient',$data);
		redirect(base_url().'Control/test_sale', 'refresh');
	}
	public function get_test_info()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData_1('test','*',array('id'=>$id));
		echo json_encode($data);
	}
	public function add_test_taken(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			$id=$this->input->post('id');
			$data=$this->input->post();
			$d['date']=date('d-m-Y');
			$d['time']=date('H:i:s A');

			if(isset($data['name'])){
				$dd['name']=$data['name'];
				$dd['age']=$data['age'];
				$dd['phone']=$data['phone'];
				$dd['address']=$data['address'];
				$dd['reference']=$data['reference'];
				$dd['height']=$data['height'];
				$dd['weight']=$data['weight'];
				$dd['bp']=$data['bp'];
				$this->Rest_model->SaveData('patient',$dd);
				$d['patientID']=$this->db->insert_id();
			}else{
				$d['patientID']=$data['patientID'];
				$d['reference']=$data['reference'];
			}
			$d['sub_total']=$data['sub_total'];
			$d['discount']=$data['discount'];
			$d['consider']=$data['consider'];
			$d['grand_total']=$data['grand_total'];
			$d['paid']=$data['paid'];
			$d['due']=$data['due'];

			if(isset($id)){
				$this->Rest_model->DeleteData('test_sale',array('invoice_id'=>$id));
				$d['invoice_id']=$id;
				$d['id']=NULL;
				foreach ($data['testID'] as $k => $v) {
					$d['testID']=$v;
					$d['price']=$data['price'][$k];
					$d['type']=@$data['type'][$k];
					$this->Rest_model->SaveData('test_sale', $d);
				}
				
			}else{
				$invoice_id=$this->Admin_model->get_invoice_id();
				// $invoice_id=$this->Admin_model->get_inv();

				$d['invoice_id']=$invoice_id->invoice_id+1;
				// $d['date']=date('Y-m-d');
				foreach ($data['testID'] as $k => $v) {
					$d['testID']=$v;
					$d['price']=$data['price'][$k];
					$d['type']=@$data['type'][$k];
					
					$this->Rest_model->SaveData('test_sale', $d);
					
				}
				// echo "<pre>";
				// 	echo json_encode($data);
			}
			redirect(base_url().'Control/invoice/'.$d['invoice_id'], 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
// 	public function invoice($id){
// 		$userID = $this->session->userdata('userID');
// 		if (isset($userID)) {
// 			$this->session->set_userdata('menu','lab');
// 			if(isset($id)){
// 				$data['edit'] = $this->Rest_model->SelectData('test_sale', '*', array('invoice_id'=>$id));
// 			}
// 			$data['test_sale'] = $this->Rest_model->SelectDataOrder('test_sale', '*', array('deleted'=>0),'id','desc');
// 			$data['patient'] = $this->Rest_model->SelectData_1('patient', '*', array('id'=>$data['edit'][0]->patientID));
// 			if($data['edit'][0]->reference=='self'){
// 				$data['reference']="Self";
// 			}elseif ($data['edit'][0]->reference=='outdoor') {
// 				$data['reference']="Out Door Dr";
// 			}else{
// 				$data['reference'] = $this->Rest_model->SelectData_1('dr_list', '*', array('id'=>$data['edit'][0]->reference))->name;
// 			}
// 			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','desc');
// 			$this->load->view('admin/invoice', $data);
// 		}else{
// 			redirect(base_url().'Control', 'refresh');
// 		}
// 	}

	public function invoice2($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('test_sale', '*', array('invoice_id'=>$id));
			}
			$data['test_sale'] = $this->Rest_model->SelectDataOrder('test_sale', '*', array('deleted'=>0),'id','desc');
			$data['patient'] = $this->Rest_model->SelectData_1('patient', '*', array('id'=>$data['edit'][0]->patientID));
			if($data['edit'][0]->reference=='self'){
				$data['reference']="Self";
			}elseif ($data['edit'][0]->reference=='outdoor') {
				$data['reference']="Out Door Dr";
			}else{
				$data['reference'] = $this->Rest_model->SelectData_1('dr_list', '*', array('id'=>$data['edit'][0]->reference))->name;
			}
			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','desc');
			$data['test2'] = $this->Rest_model->SelectDataOrder('test', '*', '','id','desc');
			$data['gword'] = $this->Admin_model->number_to_word($data['edit'][0]->grand_total);
			$data['posted'] = $this->Rest_model->SelectData_1('users','*',array('id'=>$userID));
			$this->load->view('admin/invoice_new', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function invoice($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('test_sale', '*', array('invoice_id'=>$id));
			}
			$data['test_sale'] = $this->Rest_model->SelectDataOrder('test_sale', '*', array('deleted'=>0),'id','desc');
			$data['patient'] = $this->Rest_model->SelectData_1('patient_new', '*', array('id'=>$data['edit'][0]->patientID));
			if($data['edit'][0]->reference=='self'){
				$data['reference']="Self";
			}elseif ($data['edit'][0]->reference=='outdoor') {
				$data['reference']="Out Door Dr";
			}else{
				$data['reference'] = $this->Rest_model->SelectData_1('dr_list', '*', array('id'=>$data['edit'][0]->reference))->name;
			}
			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','desc');
			$data['test2'] = $this->Rest_model->SelectDataOrder('test', '*', '','id','desc');
			$data['gword'] = $this->Admin_model->number_to_word($data['edit'][0]->grand_total);
			$data['posted'] = $this->Rest_model->SelectData_1('users','*',array('id'=>$userID));
			// echo "<pre>";
			// print_r($data['edit'][0]->reference);
			// print_r($data['reference']);
			// echo "<pre>";
			// print_r($data['patient']);
			$this->load->view('admin/invoice05', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function invoice_full($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('test_sale', '*', array('invoice_id'=>$id));
			}
			$data['test_sale'] = $this->Rest_model->SelectDataOrder('test_sale', '*', array('deleted'=>0),'id','desc');
			$data['patient'] = $this->Rest_model->SelectData_1('patient', '*', array('id'=>$data['edit'][0]->patientID));
			if($data['edit'][0]->reference=='self'){
				$data['reference']="Self";
			}elseif ($data['edit'][0]->reference=='outdoor') {
				$data['reference']="Out Door Dr";
			}else{
				$data['reference'] = $this->Rest_model->SelectData_1('dr_list', '*', array('id'=>$data['edit'][0]->reference))->name;
			}
			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/invoice_full', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_test_invoice($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['deleted']=1;
			$data['deleted_by']=$_SESSION['userID'];
			$this->Rest_model->UpdateData('test_sale', $data, array('invoice_id'=>$id));
			redirect(base_url().'Control/test_sale', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function product_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('products', '*', array('id'=>$id));
			}
			$data['product'] = $this->Rest_model->SelectDataOrder('products', '*', array('deleted'=>0),'id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/product_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_product(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('products', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('products', $data);
			}
			redirect(base_url().'Control/product_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_product($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['deleted']=1;
			$data['deleted_by']=$_SESSION['userID'];
			$this->Rest_model->UpdateData('products', $data, array('id'=>$id));
			redirect(base_url().'Control/product_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function product_purchase($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('product_purchase', '*', array('id'=>$id));
			}
			$data['invoice'] = $this->Rest_model->SelectDataOrder('product_purchase', '*', '','id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$data['product'] = $this->Rest_model->SelectDataOrder('products', '*', '','id','desc');
			$this->load->view('admin/product_purchase', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function get_product_supplier_wise()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData('products','*',array('supplierID'=>$id));
		echo json_encode($data);
	}
	public function get_product_info()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData_1('products','*',array('id'=>$id));
		echo json_encode($data);
	}
	public function add_product_purchase()
	{
		$data=$this->input->post();
		$id=$this->input->post('id');
		$d['date']=date('Y-m-d');
		foreach ($data['productID'] as $key => $value) {
			$d['productID']=$value;
			$d['price']=$data['price'][$key];
			$d['quantity']=$data['quantity'][$key];
			$d['total']=$data['total'][$key];
			if(isset($id)){
				$this->Rest_model->UpdateData('product_purchase',$d,array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('product_purchase',$d);
			}
		}
		redirect(base_url().'Control/product_purchase', 'refresh');
	}
	public function delete_product_purchase($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('product_purchase', array('id'=>$id));
			redirect(base_url().'Control/product_purchase', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function product_sale($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('product_sale', '*', array('invoice_id'=>$id));
			}
			$data['invoice'] = $this->Admin_model->get_sale_invoice();
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$data['product'] = $this->Rest_model->SelectDataOrder('products', '*', '','id','desc');
			$data['patient']=$this->Rest_model->SelectData('patient_new','*','');
			$this->load->view('admin/product_sale', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_product_sale(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			$id=$this->input->post('id');
			$data=$this->input->post();
			$d=$this->input->post();

			if(isset($id)){
				$this->Rest_model->DeleteData('product_sale',array('invoice_id'=>$id));
				$d['invoice_id']=$id;
				$d['id']=NULL;
				foreach ($data['productID'] as $k => $v) {
					$d['productID']=$v;
					$d['price']=$data['price'][$k];
					$d['qty']=$data['qty'][$k];
					$d['total']=$data['total'][$k];
					$this->Rest_model->SaveData('product_sale', $d);
				}
				
			}else{
				$invoice_id=$this->Admin_model->get_invoice_id_pr();
				$d['invoice_id']=$invoice_id->invoice_id+1;
				$d['date']=date('Y-m-d');
				foreach ($data['productID'] as $k => $v) {
					$d['productID']=$v;
					$d['price']=$data['price'][$k];
					$d['qty']=$data['qty'][$k];
					$d['total']=$data['total'][$k];
					$this->Rest_model->SaveData('product_sale', $d);
				}
			}
			redirect(base_url().'Control/product_sale/', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function stock(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			$data['product'] = $this->Rest_model->SelectDataOrder('products', '*', '','id','desc');
			$this->load->view('admin/report_stock', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function free_product_sale($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('product_sale', '*', array('invoice_id'=>$id));
			}
			$data['invoice'] = $this->Admin_model->get_free_sale_invoice();
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$data['product'] = $this->Rest_model->SelectDataOrder('products', '*', '','id','desc');
			$this->load->view('admin/free_product_sale', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_free_product_sale(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			$id=$this->input->post('id');
			$data=$this->input->post();
			$d=$this->input->post();

			if(isset($id)){
				$this->Rest_model->DeleteData('product_sale',array('invoice_id'=>$id));
				$d['invoice_id']=$id;
				$d['id']=NULL;
				foreach ($data['productID'] as $k => $v) {
					$d['productID']=$v;
					$d['price']=$data['price'][$k];
					$d['qty']=$data['qty'][$k];
					$d['total']=$data['total'][$k];
					$this->Rest_model->SaveData('product_sale', $d);
				}
				
			}else{
				$invoice_id=$this->Admin_model->get_invoice_id_free();
				$d['invoice_id']=$invoice_id->invoice_id+1;
				$d['date']=date('Y-m-d');
				foreach ($data['productID'] as $k => $v) {
					$d['productID']=$v;
					$d['price']=$data['price'][$k];
					$d['qty']=$data['qty'][$k];
					$d['total']=$data['total'][$k];
					$this->Rest_model->SaveData('free_product', $d);
				}
			}
			redirect(base_url().'Control/invoice/'.$d['invoice_id'], 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_free_invoice($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('free_product', array('invoice_id'=>$id));
			redirect(base_url().'Control/free_product_sale', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function lab_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','out_lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('out_lab_pathology', '*', array('id'=>$id));
			}
			$data['lab'] = $this->Rest_model->SelectDataOrder('out_lab_pathology', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/lab_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_lab(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','product');
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('out_lab_pathology', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('out_lab_pathology', $data);
			}
			redirect(base_url().'Control/lab_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_lab($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['deleted']=1;
			$data['deleted_by']=$_SESSION['userID'];
			$this->Rest_model->UpdateData('out_lab_pathology', $data, array('id'=>$id));
			redirect(base_url().'Control/lab_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function out_lab_test_entry($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','out_lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData('out_lab_test', '*', array('invoice_id'=>$id));
			}
			$data['invoice'] = $this->Admin_model->get_out_lsb_test_sold();
			$data['test'] = $this->Rest_model->SelectDataOrder('test', '*', array('deleted'=>0),'id','asc');
			$data['patient'] = $this->Rest_model->SelectData('patient_new', '*', '');
			$data['lab'] = $this->Rest_model->SelectDataOrder('out_lab_pathology', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/out_lab_test', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_out_lab_test_taken(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','out_lab');
			$id=$this->input->post('id');
			$data=$this->input->post();
			$d=$this->input->post();

			if(isset($id)){
				$del = $this->Rest_model->SelectData_1('out_lab_test','*',array('invoice_id'=>$id));
				$this->Update_model->outLabDelAmount($del->labID, $del->total );
				$this->Rest_model->DeleteData('out_lab_test',array('invoice_id'=>$id));
				$d['invoice_id']=$id;
				$d['id']=NULL;
				$d['date']=date('Y-m-d');
				foreach ($data['testID'] as $k => $v) {
					$d['testID']=$v;
					$d['price']=$data['price'][$k];
				// 	$d['outprice']=$data['outprice'][$k];
					$this->Rest_model->SaveData('out_lab_test', $d);
				}
				$this->Update_model->outLabAmount($d['labID'], $d['total']);
			}else{
				$invoice_id=$this->Admin_model->get_out_lab_invoice_id();
				$d['invoice_id']=$invoice_id->invoice_id+1;
				$d['date']=date('Y-m-d');
				foreach ($data['testID'] as $k => $v) {
					$d['testID']=$v;
					$d['price']=$data['price'][$k];
				// 	$d['outprice']=$data['outprice'][$k];
					$this->Rest_model->SaveData('out_lab_test', $d);
				}
				$this->Update_model->outLabAmount($d['labID'], $d['total']);
				
			}
			redirect(base_url().'Control/out_lab_test_entry/', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_out_lab_test_invoice($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$del = $this->Rest_model->SelectData_1('out_lab_test','*',array('invoice_id'=>$id));
			$this->Update_model->outLabDelAmount($del->labID, $del->total );
			// echo "<pre>";print_r($del->labID);
			$this->Rest_model->DeleteData('out_lab_test', array('invoice_id'=>$id));
			redirect(base_url().'Control/out_lab_test_entry', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function out_lab_payment($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','out_lab');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('out_lab_payment', '*', array('id'=>$id));
				$data['due']=$this->Admin_model->get_lab_last_month_due($data['edit']->labID);
			}
			$data['payments'] = $this->Rest_model->SelectDataOrder('out_lab_payment', '*', '','id','desc');
			$data['lab'] = $this->Rest_model->SelectDataOrder('out_lab_pathology', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/out_lab_payment', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function get_lab_info()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData_1('out_lab_pathology','*',array('id'=>$id));
		$d=json_encode($data,TRUE);
		$da=json_decode($d,TRUE);
		$da['due']=$this->Admin_model->get_lab_last_month_due($id);
		echo json_encode($da);
	}
	public function add_out_lab_payment_submit()
	{
		$data=$this->input->post();
		$id=$this->input->post('id');
		$d['date']=date('Y-m-d');
		// echo "<pre>";print_r($data);
		foreach ($data['labID'] as $key => $value) {
			$d['labID']=$value;
			$d['cash']=$data['cash'][$key];
			$d['cheque']=$data['cheque'][$key];
			$am = $d['cash']  + $d['cheque'];
			if(isset($id)){
				$this->Rest_model->UpdateData('out_lab_payment',$d,array('id'=>$id));
			}else{
				$this->Update_model->outLabDelAmount($d['labID'], $am);
				$this->Rest_model->SaveData('out_lab_payment',$d);
			}
		}
		redirect(base_url().'Control/out_lab_payment', 'refresh');
	}

	public function delete_out_lab_payment($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$del = $this->Rest_model->SelectData_1('out_lab_payment','*',array('id'=>$id));
			$this->Update_model->outLabAmount($del->labID, $del->cash + $del->cheque );
			// echo "<pre>";print_r($del->cash + $del->cheque);
			$this->Rest_model->DeleteData('out_lab_payment', array('id'=>$id));
			redirect(base_url().'Control/out_lab_payment', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}

	public function out_lab_paymentView($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['outtest'] = $this->Rest_model->SelectDataOrder('out_lab_test','*',array('invoice_id'=>$id),'id','desc');
			$data['lab'] = $this->Rest_model->SelectData_1('out_lab_pathology','*',array('id'=>$data['outtest'][0]->labID));
			$data['test'] = $this->Rest_model->SelectDataOrder('test','*','','id','desc');
			// echo "<pre>"; print_r($data);
			$this->load->view('admin/out_lab_testView', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function reagent_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('lab_reagent', '*', array('id'=>$id));
			}
			$data['reagent'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', '','id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/lab_reagent', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_reagent()
	{
		$data=$this->input->post();
		$id=$this->input->post('id');
		if(isset($id)){
			$this->Rest_model->UpdateData('lab_reagent',$data,array('id'=>$id));
		}else{
			$this->Rest_model->SaveData('lab_reagent',$data);
		}
		redirect(base_url().'Control/reagent_list', 'refresh');
	}
	public function delete_reagent($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('lab_reagent', array('id'=>$id));
			redirect(base_url().'Control/reagent_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function reagent_purchase($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('reagent_purchase', '*', array('id'=>$id));
			}
			$data['reagent'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', '','id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$data['invoice'] = $this->Rest_model->SelectDataOrder('reagent_purchase', '*', '','id','desc');
			$this->load->view('admin/reagent_purchase', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function get_reagent()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData('lab_reagent','*',array('supplierID'=>$id));
		echo json_encode($data);
	}
	public function get_reagent_info()
	{
		$id=$this->input->post('id');
		$data=$this->Rest_model->SelectData_1('lab_reagent','*',array('id'=>$id));
		echo json_encode($data);
	}
	public function add_reagent_purchase(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			$data=$this->input->post();
			$d=array();
			$d['date']=date('Y-m-d');
			foreach ($data['reagentID'] as $k => $v) {
				$d['reagentID']=$v;
				$d['expiry_date']=$data['expiry_date'][$k];
				$d['price']=$data['price'][$k];
				$d['quantity']=$data['quantity'][$k];
				$d['supplierID']=$data['supplierID'][$k];
				$d['total']=$data['total'][$k];
				$this->Rest_model->SaveData('reagent_purchase', $d);
			}
			redirect(base_url().'Control/reagent_purchase/', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function reagent_stock_out(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			$data['reagent'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', '','id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
			$this->load->view('admin/reagent_stock_out', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_stock_out(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			$data=$this->input->post();
			$d=array();
			$d['date']=date('Y-m-d');
			foreach ($data['reagentID'] as $k => $v) {
				$d['reagentID']=$v;
				$d['sold']=$data['sold'][$k];
				// $d['purchase_id']=$data['purchase_id'][$k];
				if($data['sold'][$k]>0){
					$this->Rest_model->SaveData('reagent_sale', $d);
				}
			}
			$this->session->set_flashdata('msg','Stock has been updated !');
			redirect(base_url().'Control/reagent_stock_out/', 'refresh');
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function reagent_stock(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			$data['reagent'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', '','id','desc');
			$this->load->view('admin/reagent_stock', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function reagent_stock_summery(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','reagent');
			$data['device'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', array('type'=>'device'),'id','desc');
			$data['biochemistry'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', array('type'=>'biochemistry'),'id','desc');
			$data['immunology'] = $this->Rest_model->SelectDataOrder('lab_reagent', '*', array('type'=>'immunology'),'id','desc');
			$this->load->view('admin/reagent_stock_summery', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function supplier_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('product_supplier','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','supplier');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', '','id','desc');
			$this->load->view('admin/supplier_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_supplier()
	{
		$data=$this->input->post();
		$id=$this->input->post('id');
		if(isset($id)){
			$this->Rest_model->UpdateData('product_supplier',$data,array('id'=>$id));
		}else{
			$this->Rest_model->SaveData('product_supplier',$data);
		}
		redirect(base_url().'Control/supplier_list', 'refresh');
	}
	public function delete_supplier($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('product_supplier', array('id'=>$id));
			redirect(base_url().'Control/supplier_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function supplier_payment($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('product_supplier','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','supplier');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('type'=>'no'),'id','desc');
			$data['payment'] = $this->Rest_model->SelectDataOrder('supplier_payment', '*', '','id','desc');
			$this->load->view('admin/supplier_payment', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function supplier_payment_pharmacy($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('product_supplier','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','supplier');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('type'=>'yes'),'id','desc');
			$data['payment'] = $this->Rest_model->SelectDataOrder('supplier_payment', '*', array('invoice_no<>'=>''),'id','desc');
			$this->load->view('admin/supplier_payment_pharmacy', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function get_supplier_due_info(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$p=$this->Admin_model->get_total_product_purchase($id);
			$r=$this->Admin_model->get_total_reagent_purchase($id);
			$paid=$this->Admin_model->get_total_paid($id);
			$due=($p+$r)-$paid;
			echo json_encode($due);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function get_supplier_due_info_pharmacy()
	{
		$invoice_id=$this->input->post('invoice_id');
		$supplierID=$this->input->post('supplierID');
		$d=$this->Rest_model->SelectData_1('medicine_receive','*',array('invoice_no'=>$invoice_id,'supplierID'=>$supplierID))->amount;
		echo json_encode($d);
	}
	public function add_supplier_payment()
	{
		$data=$this->input->post();
		$data['date']=date('Y-m-d');
		$this->Rest_model->SaveData('supplier_payment',$data);
		redirect(base_url().'Control/supplier_payment', 'refresh');
	}

	public function total_due(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('due_paid','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$data['supplier'] = $this->Admin_model->get_total_due();
			$data['paid'] = $this->Rest_model->SelectDataOrder('due_paid', '*', '','id','desc');
			$data['product'] = $this->Admin_model->get_product_due();
			$data['test'] = $this->Admin_model->get_test_due();
			$data['patient']=$this->Rest_model->SelectData('patient_new','*','');
			$this->load->view('admin/due_paid', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	
	public function get_patient_due_info(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$p=$this->Admin_model->get_test_due_individual($id);
			$sum = 0;
			foreach ($p as $item) {
			    foreach ($item as $key) {
			    	$sum += $key;
			    }
			}

			$r=$this->Admin_model->get_product_sale_individual($id);
			$sum2 = 0;
			foreach ($r as $item) {
			    foreach ($item as $key) {
			    	$sum2 += $key;
			    }
			}
			$tdue = $sum + $sum2;
			$paid=$this->Admin_model->get_due_paid_individual($id);
			$paidt = 0;
			foreach ($paid as $item) {
			    foreach ($item as $key) {
			    	$paidt += $key;
			    }
			}
			$due=$tdue-$paidt;
			echo json_encode($due);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_due_paid()
	{
		$data=$this->input->post();
		$data['date']=date('Y-m-d');
		$this->Rest_model->SaveData('due_paid',$data);
		redirect(base_url().'Control/total_due', 'refresh');
	}
	public function delete_due_paid($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('due_paid', array('id'=>$id));
			redirect(base_url().'Control/total_due', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function borrower($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('borrower','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$data['borrower'] = $this->Rest_model->SelectDataOrder('borrower', '*', '','id','desc');
			$this->load->view('admin/borrower_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_borrower(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('borrower', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('borrower', $data);
			}
			redirect(base_url().'Control/borrower', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_borrower($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('borrower', array('id'=>$id));
			redirect(base_url().'Control/borrower', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function borrow($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('borrow','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$data['borrower'] = $this->Rest_model->SelectDataOrder('borrower', '*', '','id','desc');
			$data['borrow'] = $this->Rest_model->SelectDataOrder('borrow', '*', '','id','desc');
			$this->load->view('admin/borrow_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_borrow(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$id=$this->input->post('id');
			$data=$this->input->post();

			if(isset($id)){
				$this->Rest_model->UpdateData('borrow', $data, array('id'=>$id));
			}else{
				$data['date']=date('Y-m-d');
				$this->Rest_model->SaveData('borrow', $data);
			}
			redirect(base_url().'Control/borrow', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_borrow($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('borrow', array('id'=>$id));
			redirect(base_url().'Control/borrow', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function borrow_paid($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('borrow_paid','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$data['borrower'] = $this->Rest_model->SelectDataOrder('borrower', '*', '','id','desc');
			$data['borrow'] = $this->Rest_model->SelectDataOrder('borrow_paid', '*', '','id','desc');
			$this->load->view('admin/borrow_paid_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_borrow_paid(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$id=$this->input->post('id');
			$data=$this->input->post();

			if(isset($id)){
				$this->Rest_model->UpdateData('borrow_paid', $data, array('id'=>$id));
			}else{
				$data['date']=date('Y-m-d');
				$this->Rest_model->SaveData('borrow_paid', $data);
			}
			redirect(base_url().'Control/borrow_paid', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_borrow_paid($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('borrow_paid', array('id'=>$id));
			redirect(base_url().'Control/borrow_paid', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function lend_person($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('lend_person','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','lend');
			$data['person'] = $this->Rest_model->SelectDataOrder('lend_person', '*', '','id','desc');
			$this->load->view('admin/lend_person_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_lend_person(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','lend');
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('lend_person', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('lend_person', $data);
			}
			redirect(base_url().'Control/lend_person', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_lend_person($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('lend_person', array('id'=>$id));
			redirect(base_url().'Control/lend_person', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function lend($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('lend','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','lend');
			$data['borrower'] = $this->Rest_model->SelectDataOrder('lend_person', '*', '','id','desc');
			$data['borrow'] = $this->Rest_model->SelectDataOrder('lend', '*', '','id','desc');
			$this->load->view('admin/lend_list', $data);
			
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_lend(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','lend');
			$id=$this->input->post('id');
			$data=$this->input->post();

			if(isset($id)){
				$this->Rest_model->UpdateData('lend', $data, array('id'=>$id));
			}else{
				$data['date']=date('Y-m-d');
				$this->Rest_model->SaveData('lend', $data);
			}
			redirect(base_url().'Control/lend', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_lend($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('lend', array('id'=>$id));
			redirect(base_url().'Control/lend', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function lend_return($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('lend_return','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$data['borrower'] = $this->Rest_model->SelectDataOrder('lend_person', '*', '','id','desc');
			$data['borrow'] = $this->Rest_model->SelectDataOrder('lend_return', '*', '','id','desc');
			$this->load->view('admin/lend_return_list', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_lend_return(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','extra');
			$this->session->set_userdata('new','borrow');
			$id=$this->input->post('id');
			$data=$this->input->post();

			if(isset($id)){
				$this->Rest_model->UpdateData('lend_return', $data, array('id'=>$id));
			}else{
				$data['date']=date('Y-m-d');
				$this->Rest_model->SaveData('lend_return', $data);
			}
			redirect(base_url().'Control/lend_return', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_lend_return($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('lend_return', array('id'=>$id));
			redirect(base_url().'Control/lend_return', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function medicine_receive($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('medicine_receive','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','pharmacy');
			$data['medicine'] = $this->Rest_model->SelectDataOrder('medicine_receive', '*', '','id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', '','id','desc');
			$this->load->view('admin/medicine_receive', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_medicine_receive(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$data=$this->input->post();
			// echo "<pre>";
			// print_r($data['date']);
			if(isset($id)){
				$this->Rest_model->UpdateData('medicine_receive', $data, array('id'=>$id));
			}else{
				if(empty($data['date'])){
				$data['date']=date('Y-m-d');}
				$this->Rest_model->SaveData('medicine_receive', $data);
			}
			redirect(base_url().'Control/medicine_receive', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_medicine_receive($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('medicine_receive', array('id'=>$id));
			redirect(base_url().'Control/medicine_receive', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function cash_receive($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('pharmacy_cash_receive','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','pharmacy');
			$data['medicine'] = $this->Rest_model->SelectDataOrder('pharmacy_cash_receive', '*', '','id','desc');
			$this->load->view('admin/pharmacy_cash_receive', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_cash_receive(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$data=$this->input->post();

			if(isset($id)){
				$this->Rest_model->UpdateData('pharmacy_cash_receive', $data, array('id'=>$id));
			}else{
				$data['date']=date('Y-m-d');
				$this->Rest_model->SaveData('pharmacy_cash_receive', $data);
			}
			redirect(base_url().'Control/cash_receive', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_cash_receive($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('pharmacy_cash_receive', array('id'=>$id));
			redirect(base_url().'Control/cash_receive', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function monthly_payment_bill($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', '','id','desc');
			$data['category'] = $this->Rest_model->SelectDataOrder('expense_category', '*', array('type'=>'bill'),'id','desc');
			$this->load->view('admin/report_monthly_payment_bill', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function book_through_income_expense(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			// $dd = $this->Admin_model->get_total_daily_income2();
			// echo "<pre>";
			// print_r($dd);
			$this->load->view('admin/report_book_through_income_expense');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function report_cash_out_chart(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			$data['ex_category'] = $this->Rest_model->SelectDataOrder('expense_category', '*', '','id','desc');
			$data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', '','id','desc');
			$data['lab'] = $this->Rest_model->SelectDataOrder('out_lab_pathology', '*', '','id','desc');
			$this->load->view('admin/report_cash_out_chart',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_supplier_payment($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('supplier_payment', array('id'=>$id));
			redirect(base_url().'Control/supplier_payment', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function dr_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('dr_list','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','dr');
			$data['dr'] = $this->Rest_model->SelectDataOrder('dr_list', '*', '','id','desc');
			$this->load->view('admin/dr_list', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_dr(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('dr_list', $data, array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('dr_list', $data);
			}
			redirect(base_url().'Control/dr_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_dr($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('dr_list', array('id'=>$id));
			redirect(base_url().'Control/dr_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function dr_fee($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('dr_fee','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','dr');
			$data['dr'] = $this->Rest_model->SelectDataOrder('dr_list', '*', '','id','desc');
			$data['fee'] = $this->Rest_model->SelectDataOrder('dr_fee', '*', '','id','desc');
			$data['patient'] = $this->Rest_model->SelectDataOrder('patient_new', '*', '','id','desc');
			$this->load->view('admin/dr_fee', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_dr_fee(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($data['name'])){
				$dd['name']=$data['name'];
				$dd['age']=$data['age'];
				$dd['phone']=$data['phone'];
				$dd['address']=$data['address'];
				$dd['reference']=$data['reference'];
				$dd['height']=$data['height'];
				$dd['weight']=$data['weight'];
				$dd['bp']=$data['bp'];
				$this->Rest_model->SaveData('patient',$dd);
				$d['patient']=$this->db->insert_id();
			}else{
				$d['patient']=$data['patient'];
			}
			$d['drID']=$data['drID'];
			$d['amount']=$data['amount'];
			$d['type']=$data['type'];
			if(isset($id)){
				$this->Rest_model->UpdateData('dr_fee', $d, array('id'=>$id));
			}else{
				$d['date']=date('Y-m-d');
				$this->Rest_model->SaveData('dr_fee', $d);
			}
			redirect(base_url().'Control/dr_fee', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_dr_fee($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('dr_fee', array('id'=>$id));
			redirect(base_url().'Control/dr_fee', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_product_invoice($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('product_sale', array('invoice_id'=>$id));
			redirect(base_url().'Control/product_sale', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function short_item_purchase($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('short_item_purchase','*',array('id'=>$id));
			}
			$this->session->set_userdata('menu','short');
			$data['fee'] = $this->Rest_model->SelectDataOrder('short_item_purchase', '*', '','id','desc');
			$this->load->view('admin/short_item_purchase', $data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_short_item(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$id=$this->input->post('id');
			$data=$this->input->post();
			if(isset($id)){
				$this->Rest_model->UpdateData('short_item_purchase', $data, array('id'=>$id));
			}else{
				$data['date']=date('Y-m-d');
				$this->Rest_model->SaveData('short_item_purchase', $data);
			}
			redirect(base_url().'Control/short_item_purchase', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_short_item($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('short_item_purchase', array('id'=>$id));
			redirect(base_url().'Control/short_item_purchase', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function reception_statement(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			$data['test']=$this->Rest_model->SelectData('test','*','');
			$this->load->view('admin/report_reception_statement',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function report_monthly_cash_flow()
	{
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			//cash in starts here
			$data['product']=$this->Admin_model->get_product_sale_monthly(date('m'));
			$data['product_pre']=$this->Admin_model->get_product_sale_monthly(date('m')-1);
			$data['test']=$this->Admin_model->get_test_sale_monthly(date('m'));
			$data['test_pre']=$this->Admin_model->get_test_sale_monthly(date('m')-1);
			$data['dr']=$this->Admin_model->get_dr_fee_monthly(date('m'));
			$data['dr_pre']=$this->Admin_model->get_dr_fee_monthly(date('m')-1);
			$data['pharmacy']=$this->Admin_model->get_pharmacy_monthly(date('m'));
			$data['pharmacy_pre']=$this->Admin_model->get_pharmacy_monthly(date('m')-1);
			$data['free_product']=$this->Admin_model->get_free_product_monthly(date('m'));
			$data['free_test']=$this->Admin_model->get_free_test_monthly(date('m'));

			$data['lend_return']=$this->Admin_model->get_lend_return_monthly(date('m'));
			$data['lend_return_pre']=$this->Admin_model->get_lend_return_monthly(date('m')-1);
			$data['borrow']=$this->Admin_model->get_borrow_monthly(date('m'));
			$data['borrow_pre']=$this->Admin_model->get_borrow_monthly(date('m')-1);
			$data['due_paid']=$this->Admin_model->get_due_paid_monthly(date('m'));
			$data['due_paid_pre']=$this->Admin_model->get_due_paid_monthly(date('m')-1);
			//cash in ends here

			//cash out starts here
			$data['category']=$this->Rest_model->SelectData('expense_category','*','');
			$data['borrow_paid_cash']=$this->Admin_model->get_borrow_paid_cash_monthly(date('m'));
			$data['borrow_paid_cash_pre']=$this->Admin_model->get_borrow_paid_cash_monthly(date('m')-1);
			$data['borrow_paid_ck']=$this->Admin_model->get_borrow_paid_ck_monthly(date('m'));
			$data['borrow_paid_ck_pre']=$this->Admin_model->get_borrow_paid_ck_monthly(date('m')-1);
			$data['lend']=$this->Admin_model->get_lend_monthly(date('m'));
			$data['lend_pre']=$this->Admin_model->get_lend_monthly(date('m')-1);
			$data['out_lab_cash']=$this->Admin_model->get_out_lab_cash_monthly(date('m'));
			$data['out_lab_cash_pre']=$this->Admin_model->get_out_lab_cash_monthly(date('m')-1);
			$data['out_lab_ck']=$this->Admin_model->get_out_lab_ck_monthly(date('m'));
			$data['out_lab_ck_pre']=$this->Admin_model->get_out_lab_ck_monthly(date('m')-1);
			$data['supplier_payment_cash']=$this->Admin_model->get_supplier_payment_cash_monthly(date('m'));
			$data['supplier_payment_cash_pre']=$this->Admin_model->get_supplier_payment_cash_monthly(date('m')-1);
			$data['supplier_payment_ck']=$this->Admin_model->get_supplier_payment_ck_monthly(date('m'));
			$data['supplier_payment_ck_pre']=$this->Admin_model->get_supplier_payment_ck_monthly(date('m')-1);
			//cash out ends here

			$data['opening']=$this->Admin_model->get_opening_balance(date('Y-m'));
			$data['opening_pre']=$this->Admin_model->get_opening_balance(date('Y').'-'.(date('m')-1));

			$this->load->view('admin/report_monthly_cash_flow',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function report_monthly_due_paid_consider(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','report');
			for($i=1;$i<=31;$i++){
				$cmd[$i]=$this->Admin_model->get_current_month_due($i,date('m'));
				$cmdp[$i]=$this->Admin_model->get_current_month_due_paid($i,date('m'));
				$cmc[$i]=$this->Admin_model->get_current_month_consider($i,date('m'));

				$pmd[$i]=$this->Admin_model->get_current_month_due($i,(date('m')-1));
				$pmdp[$i]=$this->Admin_model->get_current_month_due_paid($i,(date('m')-1));
				$pmc[$i]=$this->Admin_model->get_current_month_consider($i,(date('m')-1));
			}
			$data['cmd']=$cmd;
			$data['cmdp']=$cmdp;
			$data['cmc']=$cmc;
			$data['pmd']=$pmd;
			$data['pmdp']=$pmdp;
			$data['pmc']=$pmc;
			$this->load->view('admin/report_monthly_due_paid_consider',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function employee_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('employee','*',array('id'=>$id));
			}
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			$this->load->view('admin/employee_list',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_employee(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data = $this->input->post();
			$d = $this->input->post();
			$id = $this->input->post('id');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|mp4';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] = 100000000;
			$config['max_width'] = 10240000;
			$config['max_height'] = 7680000;
			$this->load->library('upload', $config);

			$this->load->library('image_lib');
			$config_1['image_library'] = 'gd2';
			$config_1['create_thumb'] = FALSE;
			$config_1['maintain_ratio'] = FALSE;
			$config_1['width']         = 150;
			$config_1['height']       = 150;

			if (!$this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data2 = array('upload_data' => $this->upload->data());
				$data['photo'] = $data2['upload_data']['file_name'];
				$config_1['source_image'] = 'uploads/'.$data2['upload_data']['file_name'];
				$this->image_lib->initialize($config_1); 
				$this->image_lib->resize();
			}
			$duration=$data['salary']/200;
			$data['pf_end']=date('Y-m-d', strtotime("+".$duration." months", strtotime($data['pf_start'])));
			$data['off_day']='';
			foreach ($d['off_day'] as $key => $value) {
				if($data['off_day']==''){
					$data['off_day']=$value;
				}else{
					$data['off_day']=$data['off_day'].'-'.$value;
				}
			}

			if(isset($id)){
				$this->Rest_model->UpdateData('employee', $data,array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('employee', $data);
			}
			redirect(base_url().'Control/employee_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function delete_employee($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('employee', array('id'=>$id));
			redirect(base_url().'Control/employee_list', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function attendance(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			$this->load->view('admin/attendance_list',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_attendance()
	{
		$d=$this->input->post();
		$data['date']=date('Y-m-d');
		$this->Rest_model->DeleteData('attendance',array('date'=>$data['date']));
		foreach ($d['empID'] as $key => $value) {
			$data['empID']=$value;
			$data['in_time']=$d['in_time'][$key];
			$data['out_time']=$d['out_time'][$key];
			$data['type']=$d['type'][$key];
			$this->Rest_model->SaveData('attendance',$data);
		}
		redirect(base_url().'Control/attendance', 'refresh');
	}

	public function attendance_report(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$d=$this->input->post('date');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			if(isset($d)){
				$data['dd']=$d;
			}else{
				$data['dd']=date('Y-m');
			}
			$this->load->view('admin/report_monthly_attendance',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function salary_sheet(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$d=$this->input->post('date');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			if(isset($d)){
				$data['dd']=$d;
			}else{
				$data['dd']=date('Y-m');
			}
			$this->load->view('admin/report_monthly_salary_sheet',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function salary_advice(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$d=$this->input->post('date');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			if(isset($d)){
				$data['dd']=$d;
			}else{
				$data['dd']=date('Y-m');
			}
			$this->load->view('admin/report_monthly_salary_advice',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function bonus(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$d=$this->input->post('date');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			if(isset($d)){
				$data['dd']=$d;
			}else{
				$data['dd']=date('Y-m');
			}
			$this->load->view('admin/bonus_list',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_bonus()
	{
		$d=$this->input->post();

		foreach ($d['empID'] as $key => $value) {
			$this->Rest_model->DeleteData('bonus',array('date'=>$d['date'][$key],'empID'=>$value));
			$data['empID']=$value;
			$data['amount']=$d['amount'][$key];
			$data['date']=$d['date'][$key];
			$data['purpose']=$d['purpose'][$key];
			$this->Rest_model->SaveData('bonus',$data);
		}
		$this->session->set_flashdata('msg','<div class="alert alert-success"><strong>Success!</strong> Saved Successfully !</div>');
		redirect(base_url().'Control/bonus', 'refresh');
	}
	public function withdrawal($id=NULL)
	{
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			if(isset($id)){
				$data['edit']=$this->Rest_model->SelectData_1('widthdrawal','*',array('id'=>$id));
			}
			$data['withdraw']=$this->Rest_model->SelectDataOrder('widthdrawal','*',array('status'=>'1'),'id','desc');
			$this->load->view('admin/withdrawal',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_withdrawal()
	{
		$data=$this->input->post();
		$data['status']=1;
		if(isset($data['id'])){
			$this->Rest_model->UpdateData('widthdrawal',$data,array('id'=>$data['id']));
		}else{
			$this->Rest_model->SaveData('widthdrawal',$data);
		}
		redirect(base_url().'Control/withdrawal', 'refresh');
	}
	public function withdrawal_refund($id)
	{
		$data['status']=0;
		$this->Rest_model->UpdateData('widthdrawal',$data,array('id'=>$id));
		redirect(base_url().'Control/withdrawal', 'refresh');
	}
	public function patient_list($id=NULL)
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->session->set_userdata('menu','patient');
		if(isset($id)){
			$data['edit']=$this->Rest_model->SelectData_1('patient','*',array('id'=>$id));
		}
		$data['patient']=$this->Rest_model->SelectData('patient','*','');
		$this->load->view('admin/patient_list',$data);
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
	public function add_patient()
{
	$data=$this->input->post();
	if(isset($data['id'])){
		$data = $this->input->post();
		$id = $this->input->post('id');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|mp4';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000000;
		$config['max_width'] = 10240000;
		$config['max_height'] = 7680000;
		$this->load->library('upload', $config);

		$this->load->library('image_lib');
		$config_1['image_library'] = 'gd2';
		$config_1['create_thumb'] = FALSE;
		$config_1['maintain_ratio'] = FALSE;
		$config_1['width']         = 150;
		$config_1['height']       = 150;

		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$data['photo'] = $data2['upload_data']['file_name'];
			$config_1['source_image'] = 'uploads/'.$data2['upload_data']['file_name'];
			$this->image_lib->initialize($config_1); 
			$this->image_lib->resize();
			$qq=$this->Rest_model->SelectData_1('patient','*',array('id'=>$id));
			if($qq->photo!=''){
            unlink('uploads/'.$qq->photo);
            }
		}
		$this->Rest_model->UpdateData('patient',$data,array('id'=>$data['id']));
	}else{
		$data = $this->input->post();
		$d=$this->Admin_model->get_regID();
		if(!isset($d)){
			$data['regID']=0;
			
		}else{
			$data['regID']=(int)$d->regID+1;
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|mp4';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000000;
		$config['max_width'] = 10240000;
		$config['max_height'] = 7680000;
		$this->load->library('upload', $config);

		$this->load->library('image_lib');
		$config_1['image_library'] = 'gd2';
		$config_1['create_thumb'] = FALSE;
		$config_1['maintain_ratio'] = FALSE;
		$config_1['width']         = 150;
		$config_1['height']       = 150;

		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$data['photo'] = $data2['upload_data']['file_name'];
			$config_1['source_image'] = 'uploads/'.$data2['upload_data']['file_name'];
			$this->image_lib->initialize($config_1); 
			$this->image_lib->resize();
		}
		$this->Rest_model->SaveData('patient',$data);
	}
	redirect(base_url().'Control/patient_list', 'refresh');
}
public function delete_patient($id)
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->Rest_model->DeleteData('patient',array('id'=>$id));
		redirect(base_url().'Control/patient_list', 'refresh');
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
	public function patient_ladger()
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->session->set_userdata('menu','patient');
		$data['patient']=$this->Rest_model->SelectData('patient_new','*','');
		$this->load->view('admin/patient_ledger',$data);
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
public function register_patient_list($id=NULL)
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->session->set_userdata('menu','patient');
		if(isset($id)){
			$data['edit']=$this->Rest_model->SelectData_1('patient','*',array('id'=>$id));
		}
		$data['patient']=$this->Rest_model->SelectData('patient','*',array('type'=>1));
		$this->load->view('admin/patient_list',$data);
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
public function marketing_patient_list($id=NULL)
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->session->set_userdata('menu','patient');
		if(isset($id)){
			$data['edit']=$this->Rest_model->SelectData_1('patient','*',array('id'=>$id));
		}
		$data['patient']=$this->Rest_model->SelectData('patient','*',array('type'=>2));
		$this->load->view('admin/patient_list',$data);
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
public function non_register_patient_list($id=NULL)
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->session->set_userdata('menu','patient');
		if(isset($id)){
			$data['edit']=$this->Rest_model->SelectData_1('patient','*',array('id'=>$id));
		}
		$data['patient']=$this->Rest_model->SelectData('patient','*',array('type'=>3));
		$this->load->view('admin/patient_list',$data);
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
public function patient_view($id)
{
	$userID = $this->session->userdata('userID');
	if (isset($userID)) {
		$this->session->set_userdata('menu','patient');
		
			$data['edit']=$this->Rest_model->SelectData_1('patient','*',array('id'=>$id));
		
		$this->load->view('admin/patient_view',$data);
	}else{
		redirect(base_url().'Control', 'refresh');
	}
}
	public function provident_fund($id=NULL)
	{
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$data['dd']=date('Y-m');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			$data['reserve']=$this->Admin_model->get_pf_reserve();
			$this->load->view('admin/provident_fund',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function pf_punishment($id=NULL)
	{
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','pay');
			$data['dd']=date('Y-m');
			$data['emp']=$this->Rest_model->SelectData('employee','*','');
			$data['pun']=$this->Rest_model->SelectDataOrder('pf_punishment','*','','id','desc');
			$this->load->view('admin/pf_punishment',$data);
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function add_punishment()
	{
		$data=$this->input->post();
		$this->Rest_model->SaveData('pf_punishment',$data);
		redirect(base_url().'Control/pf_punishment', 'refresh');
	}
	public function delete_punishment($id)
	{
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('pf_punishment',array('id'=>$id));
			redirect(base_url().'Control/pf_punishment', 'refresh');
		}else{
			redirect(base_url().'Control', 'refresh');
		}
	}
	public function out_lab_ledger()
	{
		$data['lab']=$this->Rest_model->SelectData('out_lab_pathology','*','');
		$this->load->view('admin/out_lab_ledger',$data);
	}
	public function pf_reserve()
	{
		$data['emp']=$this->Rest_model->SelectData('employee','*','');
		$data['reserve']=$this->Rest_model->SelectDataOrder('pf_reserve','*','','id','desc');
		$this->load->view('admin/pr_reserve',$data);
	}
	public function add_reserve()
	{
		$data=$this->input->post();
		$this->Rest_model->SaveData('pf_reserve',$data);
		redirect(base_url().'Control/pf_reserve', 'refresh');
	}
	public function delete_reserve($id)
	{
		$this->Rest_model->DeleteData('pf_reserve',array('id'=>$id));
		redirect(base_url().'Control/pf_reserve', 'refresh');
	}
	public function product_stock()
	{
		$data['product']=$this->Rest_model->SelectData('products','*','');
		$this->load->view('admin/product_stock',$data);
	}
	public function reagent_stock_month()
	{
		$data['reagent']=$this->Rest_model->SelectData('lab_reagent','*','');
		$this->load->view('admin/reagent_stock_month',$data);
	}
	public function upload_test(){
		$this->load->view('admin/upload_csv');
	}
	public function csvPost(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|csv';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('csv')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$csv = array_map('str_getcsv', file(base_url('uploads/'.$d)));
			$l=count($csv);
			for ($i=0; $i <$l ; $i++) { 
				$data['name']=$csv[$i][0];
				$data['price']=$csv[$i][2];
				$data['regular_price']=$csv[$i][1];
				$this->Rest_model->SaveData('test',$data);
			}
		}
		$this->session->set_flashdata('msg','CSV has been saved Successfully!');
		redirect(base_url().'Control/upload_test', 'refresh');
	}
	public function lab_ledger($id)
	{
		$st=date('Y-m').'-01';
		$end=date('Y-m').'-31';
		$data['pt']=$this->Rest_model->SelectData('patient_new','*','');
		$data['te']=$this->Rest_model->SelectData('test','*','');
		$data['lab']=$this->Rest_model->SelectData_1('out_lab_pathology','*',array('id'=>$id));
		$data['test']=$this->Rest_model->SelectData('out_lab_test','*',array('labID'=>$id,'date>='=>$st,'date<='=>$end));
		$this->load->view('admin/out_lab_ledger_details',$data);
	}
	public function report_patient_visiting()
	{
		$_SESSION['menu']='report';
		$data['dr']=$this->Rest_model->SelectData('dr_list','*','');
		$this->load->view('admin/report_patient_visiting',$data);
	}
	public function supplier_ledger_pharmay($id)
	{
		$data['payment']=$this->Rest_model->SelectDataOrder('supplier_payment','*',array('supplierID'=>$id),'id','desc');
		$data['recieve']=$this->Rest_model->SelectDataOrder('medicine_receive','*',array('supplierID'=>$id),'id','desc');
		$data['s']=$this->Rest_model->SelectData_1('product_supplier','*',array('id'=>$id));
		$this->load->view('admin/supplier_ledger_pharmay',$data);
	}
	public function pharmacy_supplier_ledger()
	{
		$data['m']=10;
		$data['supplier']=$this->Rest_model->SelectData('product_supplier','*',array('type'=>'yes'));
		$this->load->view('admin/pharmacy_supplier_ledger',$data);
	}
}
