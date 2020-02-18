<?php

class Admin_panel extends MX_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Rest_model');
		$this->load->library('session');
		$this->load->helper('text');
		
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function login(){
		$enddate = date('2018-05-15 21:01:54');
		$startdate = date('Y-m-d H:i:s');
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		$d = $this->Rest_model->SelectData_1('admin_waps','*',array('email'=>$email, 'password'=>$password,'status'=>'1'));
		if (!empty($d)) {
			$userID =$this->session->set_userdata('userID',$d->id);
			$userName =$this->session->set_userdata('userName',$d->name);
			redirect(base_url().'Admin_panel/dashboard','refresh');
		}else{
			redirect(base_url().'Admin_panel','refresh');
		}
	}
	public function user(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['adm'] = $this->Rest_model->SelectData('admin_waps', '*', '');
		$data['dd']= $this->Rest_model->SelectData_1('admin_waps','*',array('permission'=>'1','id'=>$userID));
		$data['c'] = $this->Admin_model->super_admin();
		$this->load->view('Admin_panel/user', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function delete_user($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$this->Rest_model->DeleteData('admin_waps', array('id'=>$id));
		redirect(base_url().'Admin_panel/user', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function add_user(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data= $this->input->post();
		$data['password'] = md5($this->input->post('password'));
		$this->Rest_model->SaveData('admin_waps', $data);
		redirect(base_url().'Admin_panel/user');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function edit_user($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['adm'] =$this->Rest_model->SelectData_1('admin_waps','*',array('id'=>$id));
		$this->load->view('Admin_panel/edit_user', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function update_user(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$id = $this->input->post('id');
		$data = $this->input->post();
		$data['password'] = md5($this->input->post('password'));
		$this->Rest_model->UpdateData('admin_waps', $data, array('id'=>$id));
		redirect(base_url().'Admin_panel/user', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function dashboard()
	{
		$userID = $this->session->userdata('userID');
		
		if (isset($userID)) {
		$userName =$this->session->userdata('userName');
        $session['menu']='home';
        $this->session->set_userdata($session);
		$this->load->view('dashboard');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function signout(){
		session_destroy();
		redirect(base_url().'Admin_panel','refresh');
	}
	public function customer(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['customer'] = $this->Rest_model->SelectDataOrder('measurement', '*', '','id','desc');
		$this->load->view('Admin_panel/customer', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function add_customer(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		
		
		$date = date("Y-m-d");

		$data= $this->input->post();
		$data['date'] = $date;
		// var_dump($data['date']);
        $config['upload_path'] = './uploads/customer/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 100000000;
        $config['max_width'] = 10240000;
        $config['max_height'] = 7680000;
        $this->load->library('upload', $config);


        $this->load->library('image_lib');
        $config_1['image_library'] = 'gd2';
        $config_1['create_thumb'] = FALSE;
        $config_1['maintain_ratio'] = FALSE;
        $config_1['width']         = 720;
        $config_1['height']       = 540;

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['image'] = $data2['upload_data']['file_name'];
            $config_1['source_image'] = 'uploads/customer/'.$data2['upload_data']['file_name'];
            $this->image_lib->initialize($config_1); 
            $this->image_lib->resize();
        }
        $this->Rest_model->SaveData('measurement', $data);
        $this->Admin_model->update_cus();
        redirect(base_url().'Admin_panel/customer', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function add_measurement($id){
        $userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $data['c'] = $this->Rest_model->SelectData_1('measurement','*',array('id'=>$id));
        $this->load->view("measurement", $data);
        }else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
    public function update_measurement(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $this->Rest_model->UpdateData('measurement', $data, array('id'=>$id));
        redirect(base_url().'Admin_panel/add_measurement/'.$id, 'refresh');
    	}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function customer_list(){
        $userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $data['customer'] = $this->Rest_model->SelectDataOrder('measurement', '*', '','id','desc');
        $this->load->view("customer_list", $data);
        }else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
    public function view_customer(){
        $userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $id = $this->input->post('val');
        $data = $this->Rest_model->SelectData_1('measurement','*',array('id'=>$id));
        echo json_encode($data); 
        }else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
	public function edit_customer($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['c'] =$this->Rest_model->SelectData_1('measurement','*',array('id'=>$id));
		$this->load->view('Admin_panel/edit_customer', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function print_customer_details($id){
        $userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $data['c'] = $this->Rest_model->SelectData_1('measurement', '*', array('id'=>$id));
        $this->load->view("print_customer_details", $data);
        }else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
    public function update_customer(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $config['upload_path'] = './uploads/customer/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 100000000;
        $config['max_width'] = 10240000;
        $config['max_height'] = 7680000;
        $this->load->library('upload', $config);


        $this->load->library('image_lib');
        $config_1['image_library'] = 'gd2';
        $config_1['create_thumb'] = FALSE;
        $config_1['maintain_ratio'] = FALSE;
        $config_1['width']         = 800;
        $config_1['height']       = 600;

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['image'] = $data2['upload_data']['file_name'];
            $config_1['source_image'] = 'uploads/customer/'.$data2['upload_data']['file_name'];
            $this->image_lib->initialize($config_1); 
            $this->image_lib->resize();
            $qq=$this->Rest_model->SelectData_1('measurement','*',array('id'=>$id));
            unlink('uploads/customer/'.$qq->image);
        }
        $this->Rest_model->UpdateData('measurement', $data, array('id'=>$id));
        redirect(base_url().'Admin_panel/customer_list', 'refresh');
    	}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
	public function del_customer($id){
        $userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$qq=$this->Rest_model->SelectData_1('measurement','*',array('id'=>$id));
            unlink('uploads/customer/'.$qq->image);
        $this->Rest_model->DeleteData('measurement', array('id'=>$id));
        redirect(base_url().'Admin_panel/customer_list', 'refresh');
        }else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
	public function order(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['customer'] = $this->Rest_model->SelectDataOrder('measurement', '*', '','id','desc');
		$data['order'] = $this->Rest_model->SelectDataOrder('new_order', '*', '','id','desc');
		$this->load->view('Admin_panel/order', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function select_customer(){
        $userID = $this->session->userdata('userID');
		if (isset($userID)) {
            $id = $this->input->post('val');
        
        $data = $this->Admin_model->get_customer_1($id);
        
        echo json_encode($data); 
        }else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
    }
    public function add_order(){
    	$data = $this->input->post();
    	$dda = $this->session->set_userdata('uu', $data);
    	$da['use'] = $this->session->userdata('uu');
  
    	$this->load->view('Admin_panel/testing', $da);
    	
    }
    public function cart(){
    	$data['customer'] = $this->Rest_model->SelectDataOrder('measurement', '*', '','id','desc');
    	$this->load->view('Admin_panel/cart', $data);
    }
	public function service(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['service'] = $this->Rest_model->SelectDataOrder('style_category', '*', '','id','desc');
		$this->load->view('Admin_panel/service', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function add_serviceservice(){
		$data = $this->input->post();
		$this->Rest_model->SaveData('style_category', $data);
		redirect(base_url().'Admin_panel/service');
	}
	public function reports(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		// $data['service'] = $this->Rest_model->SelectDataOrder('style_category', '*', '','id','desc');
		$this->load->view('reports');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function cost(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['cost'] = $this->Rest_model->SelectDataOrder('cost', '*', '','id','desc');
		$this->load->view('cost', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function generate_report(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		$d = date('Y-m-d');
		if($date1 == null){
			$date1 = $d;
		}
		if($date2 == null){
			$date2 = $d;
		}
		$data['rep'] = $this->Admin_model->get_rep_cost($date1, $date2);
		$data['repsum'] = $this->Admin_model->get_rep_sum($date1, $date2);
		$data['reporder'] = $this->Admin_model->get_rep_order($date1, $date2);
		$data['daas'] = $this->Admin_model->get_rep_order_sum($date1, $date2);
		$data['date1'] = $date1;
		$data['date2'] = $date2;
		
		$this->load->view('generate_report', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function print_report(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		$d = date('Y-m-d');
		if($date1 == null){
			$date1 = $d;
		}
		if($date2 == null){
			$date2 = $d;
		}
		$data['rep'] = $this->Admin_model->get_rep_cost($date1, $date2);
		$data['repsum'] = $this->Admin_model->get_rep_sum($date1, $date2);
		$data['reporder'] = $this->Admin_model->get_rep_order($date1, $date2);
		$data['daas'] = $this->Admin_model->get_rep_order_sum($date1, $date2);
		$data['date1'] = $date1;
		$data['date2'] = $date2;
		
		$this->load->view('print_report', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function add_cost(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data = $this->input->post();
		$data['date'] = $this->input->post('date');
		$d = date('Y-m-d');
		if($data['date'] == null){
			$data['date'] = $d;
		}else{
			$data['date'] = $this->input->post('date');
		}
		// print_r($data['date']);
		$this->Rest_model->SaveData('cost', $data);
		redirect(base_url().'Admin_panel/cost');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function edit_cost($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['c'] = $this->Rest_model->SelectData_1('cost','*',array('id'=>$id));
		$this->load->view('edit_cost', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function update_cost(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data = $this->input->post();
		$id = $this->input->post('id');
		$data['date'] = $this->input->post('date');
		$d = date('Y-m-d');
		if($data['date'] == null){
			$data['date'] = $d;
		}else{
			$data['date'] = $this->input->post('date');
		}
		// print_r($data['date']);
		$this->Rest_model->UpdateData('cost', $data, array('id'=>$id));
		redirect(base_url().'Admin_panel/cost');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}

}
?>