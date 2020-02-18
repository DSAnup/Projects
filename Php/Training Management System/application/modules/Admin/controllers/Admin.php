<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
Developed By: Morshed Habib Sohel
Mobile: 01735254295
E-Mail: mhsohel017@gmail.com
*/
class Admin extends MX_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->session->unset_userdata('update');
		$session['mac']='20-1A-06-FA-3C-F6';
		$this->session->set_userdata($session);
	}

	public function index(){
		//$mac=mac();
		//$m=$this->session->userdata('mac');
		//if($mac!==$m){
			//echo "<script>location.href='http://youthfireit.com'</script>";
		//}else{
			$session=$this->session->userdata('userID');
			if(isset($session)){
				redirect(base_url() . 'Admin/index1');
			}
			$this->load->view('login');
		//}
	}
	public function login(){
		$email=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$where=array('email'=>$email,'password'=>$password);
		$data=$this->Admin_model->SelectData_1('admin','*',$where);
		if ($data !== NULL) {
			$session['userID'] = $data->id;
			$session['name'] = $data->name;
			$session['role'] = $data->role;
			$this->session->set_userdata($session);
			redirect(base_url() . 'Admin/index1');
		} else {
			redirect(base_url() . 'Admin');
		}
	}
	public function logout(){
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('userID');
		redirect(base_url() . 'Admin');
	}
	public function index1(){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$this->load->view('index');
	}
	public function trainers($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['query']=$this->Admin_model->SelectData('trainer','*','');
		$this->load->view('trainers',$data);
	}
	public function add_trainer(){
		$data['name']=$this->input->post('name');
		$data['designation']=$this->input->post('designation');
		$data['experience']=$this->input->post('experience');
		$data['contact']=$this->input->post('contact');
		$data['address']=$this->input->post('address');
		$data['type']=$this->input->post('type');
		$data['skills']=$this->input->post('skills');
		$data['description']=$this->input->post('description');

		$count=$this->input->post('count');
		$icon=$this->input->post('icon');
		$link=$this->input->post('link');

		$config['upload_path'] = './trainers/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$this->Admin_model->SaveData('trainer',$data);
		$id=$this->Admin_model->get_max_id();
		$dd=array();
		for($i=0;$i<=$count;$i++){
			$dd['icon']=$icon[$i];
			$dd['link']=$link[$i];
			$dd['trainerID']=$id->id;
			$this->Admin_model->SaveData('social_link',$dd);
		}
		redirect(base_url().'Admin/trainers/trainer');
	}

	public function delete_trainer($id){
		$where = array('id' =>$id);
		$wheres = array('trainerID' =>$id);
		$this->Admin_model->DeleteData('trainer',$where);
		$this->Admin_model->DeleteData('social_link',$wheres);
		redirect(base_url().'Admin/trainers/trainer');
	}
	public function edit_trainer($id){
		// $this->session->unset_userdata('update');
		$session = array('update' =>'yes');
		$this->session->set_userdata($session);
		$where = array('id' =>$id);
		$wheres = array('trainerID' =>$id);
		$data['id']=$id;
		$data['q']=$this->Admin_model->SelectData_1('trainer','*',$where);
		$data['links']=$this->Admin_model->SelectData('social_link','*',$wheres);
		$data['query']=$this->Admin_model->SelectData('trainer','*','');
		$this->load->view('update_trainer',$data);
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
	}
	public function update_trainer(){
		$id=$this->input->post('id');
		$data['name']=$this->input->post('name');
		$data['designation']=$this->input->post('designation');
		$data['experience']=$this->input->post('experience');
		$data['contact']=$this->input->post('contact');
		$data['address']=$this->input->post('address');
		$data['type']=$this->input->post('type');
		$data['skills']=$this->input->post('skills');
		$data['description']=$this->input->post('description');

		$count=$this->input->post('count');
		$icon=$this->input->post('icon');
		$link=$this->input->post('link');


		$config['upload_path'] = './trainers/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$where = array('id' =>$id);
		$this->Admin_model->UpdateData('trainer',$data,$where);

		$wheres = array('trainerID' =>$id);
		$this->Admin_model->DeleteData('social_link',$wheres);
		$dd=array();
		for($i=0;$i<$count;$i++){
			$dd['icon']=$icon[$i];
			$dd['link']=$link[$i];
			$dd['trainerID']=$id;
			$this->Admin_model->SaveData('social_link',$dd);
		}
		$this->session->unset_userdata('update');
		redirect(base_url().'Admin/trainers/trainer');
	}
	public function delete_std_work($id){
		$wh=array('id'=>$id);
		$da=$this->Admin_model->SelectData_1('std_work','*',$wh);
		$im=$da->photo;
		unlink('gallery/'.$im);
		$this->Admin_model->DeleteData('std_work',$wh);
		redirect(base_url().'Admin/gallery/gl');
	}
	public function add_course($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['category']=$this->Admin_model->SelectData('course_category','*','');
		$this->load->view('add_course',$data);
	}
	public function add_coruse_post(){
		$config['upload_path'] = './course_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$data['name']=$this->input->post('name');
		$data['category']=$this->input->post('category');
		$data['duration']=$this->input->post('duration');
		$data['description']=$this->input->post('description');
		$this->Admin_model->SaveData('course',$data);
		redirect(base_url().'Admin/course/course');
	}
	public function course($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$this->load->view('course_list',$data);
	}
	public function delete_course($id){
		$where=array('id'=>$id);
		$this->Admin_model->DeleteData('course',$where);
		redirect(base_url().'Admin/course/course');
	}
	public function edit_course($id){
		$where=array('id'=>$id);
		$data['course']=$this->Admin_model->SelectData_1('course','*',$where);
		$data['category']=$this->Admin_model->SelectData('course_category','*','');
		$this->load->view('course_edit',$data);
	}
	public function edit_coruse_post(){
		$config['upload_path'] = './course_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$where=array('id'=>$this->input->post('id'));
		$data['name']=$this->input->post('name');
		$data['category']=$this->input->post('category');
		$data['duration']=$this->input->post('duration');
		$data['description']=$this->input->post('description');
		$this->Admin_model->UpdateData('course',$data,$where);
		redirect(base_url().'Admin/course/course');
	}
	public function add_course_aprt($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$data['course']=$this->Admin_model->SelectCourse();
		$this->load->view('add_course_part',$data);
	}
	public function add_coruse_part_post(){
		$data_1['course_id']=$this->input->post('course_id');
		$data_1['head']=$this->input->post('head');
		$this->Admin_model->SaveData('part_heads',$data_1);
		$data_2['head_id']=$this->Admin_model->get_head_id()->id;
		
		$parts=$this->input->post('parts');
		
		foreach ($parts as $key => $value) {
			$data_2['parts']=$value;
			$this->Admin_model->SaveData('course_parts',$data_2);
		}
		redirect(base_url().'Admin/course/course');
	}
	public function view_course($id){
		$short=array('id'=>$id);
		$heads=array('course_id'=>$id);
		$data['course']=$this->Admin_model->SelectData_1('course','*',$short);
		$data['heads']=$this->Admin_model->SelectData('part_heads','*',$heads);
		$this->load->view('course_details',$data);
	}
	public function delete_parts($id){
		$i=explode('_', $id);
		$where=array('id'=>$i[0]);
		$this->Admin_model->DeleteData('course_parts',$where);
		redirect(base_url().'Admin/view_course/'.$i[1]);
	}
	public function edit_parts($id){
		$i=explode('_', $id);
		$where=array('id'=>$i[0]);
		$data['part']=$this->Admin_model->SelectData_1('course_parts','*',$where);
		$data['course_id']=$i[1];
		$this->load->view('edit_parts',$data);
	}
	public function edit_coruse_part_post(){
		$id=$this->input->post('part_id');
		$course_id=$this->input->post('course_id');
		$data['parts']=$this->input->post('parts');
		$where=array('id'=>$id);
		$this->Admin_model->UpdateData('course_parts',$data,$where);
		redirect(base_url().'Admin/view_course/'.$course_id);
	}
	public function batch($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);

		$data['batch']=$this->Admin_model->SelectData('batch','*','');
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$this->load->view('batch',$data);
	}
	public function add_batch(){
		$data['courseID']=$this->input->post('courseID');
		$name=$this->input->post('batch_name');
		foreach ($name as $e) {
			$data['batch_name']=$e;
			$this->Admin_model->SaveData('batch',$data);
		}
		redirect(base_url() . 'Admin/batch/course');
	}
	public function delete_batch($id){
		$where=array('id'=>$id);
		$this->Admin_model->DeleteData('batch',$where);
		redirect(base_url() . 'Admin/batch/course');
	}
	public function pending($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$where=array('approval'=>'no');
		$data['en']=$this->Admin_model->SelectData('enrollment','*',$where);	
		$data['batch']=$this->Admin_model->SelectData('batch','*','');
		$this->load->view('pending_approval',$data);
	}
	public function delete_std($id){
		$where=array('id'=>$id);
		$this->Admin_model->DeleteData('students',$where);
		redirect(base_url().'Admin/std_list/std');
	}
	public function edit_std($id){
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$data['query']=$this->Admin_model->get_std_data($id);
		$this->load->view('edit_std',$data);
	}
	public function edit_std_post(){
		$std_id=$this->input->post('std_id');
		$where=array('id'=>$std_id);
		$en_id=$this->input->post('en_id');
		$where_1=array('id'=>$en_id);

		$data['courseID']=$this->input->post('courseID');
		$data['board']=$this->input->post('board');
		$slot=$this->input->post('slot');
		if(isset($slot)){
			$data['slot']=$slot;
		}
		$data['name']=$this->input->post('name');
		$data['father']=$this->input->post('father');
		$data['mother']=$this->input->post('mother');
		$data['email']=$this->input->post('email');
		$data['mobile']=$this->input->post('mobile');
		$data['date_of_birth']=$this->input->post('date_of_birth');
		$data['age']=$this->input->post('age');
		$data['nationality']=$this->input->post('nationality');
		$data['religion']=$this->input->post('religion');
		$data['blood']=$this->input->post('blood');
		$data['p_village']=$this->input->post('p_village');
		$data['p_post']=$this->input->post('p_post');
		$data['p_upozila']=$this->input->post('p_upozila');
		$data['p_district']=$this->input->post('p_district');
		$data['g_village']=$this->input->post('g_village');
		$data['g_post']=$this->input->post('g_post');
		$data['g_upozila']=$this->input->post('g_upozila');
		$data['g_district']=$this->input->post('g_district');
		$data['degree']=$this->input->post('degree');
		$data['ssc']=$this->input->post('ssc');
		$data['passport_no']=$this->input->post('passport_no');
		$data['courseID']=$this->input->post('courseID');

		$config['upload_path'] = './std_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}

		$this->Admin_model->UpdateData('students',$data,$where);

		$da['courseID']=$this->input->post('courseID');
		$da['board']=$this->input->post('board');
		$da['timeSlot']=$this->input->post('slot');

		$this->Admin_model->UpdateData('enrollment',$da,$where_1);
		redirect(base_url().'Admin/pending/std');
	}

	public function approve($ids){
		$content=explode('_', $ids);
		$where=array('id'=>$content[1]);
		$data['approval']='yes';
		$data['batchID']=$content[0];
		$data['price']=$content[2];
		$this->Admin_model->UpdateData('enrollment',$data,$where);
		redirect(base_url() . 'Admin/pending/std');
	}
	public function std_list($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$where=array('approval'=>'yes','certified'=>'no','timeSlot !='=>'NULL');
		$data['en']=$this->Admin_model->SelectDataOrder('enrollment','*',$where,'id','desc');
		$where=array('approval'=>'yes','certified'=>'yes');
		$data['en1']=$this->Admin_model->SelectDataOrder('enrollment','*',$where,'finish_date','desc');	
		$data['batch']=$this->Admin_model->SelectData('batch','*','');
		$this->load->view('std_list',$data);
	}
	public function driving_std_list($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$where=array('approval'=>'yes','certified'=>'no','courseID'=>'professional_licence','timeSlot is NULL'=>NULL);
		$data['professional']=$this->Admin_model->SelectDataOrder('enrollment','*',$where,'id','desc');
		$where_1=array('approval'=>'yes','certified'=>'no','courseID'=>'non_professional_licence','timeSlot is NULL'=>NULL);
		$data['non_professional']=$this->Admin_model->SelectDataOrder('enrollment','*',$where_1,'id','desc');
		$where_2=array('approval'=>'yes','certified'=>'no','courseID'=>'international_licence','timeSlot is NULL'=>NULL);
		$data['international']=$this->Admin_model->SelectDataOrder('enrollment','*',$where_2,'id','desc');
		$this->load->view('driving_std_list',$data);
	}
	public function ownership_transfer_std_list($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$where=array('approval'=>'yes','certified'=>'no','courseID'=>'ownership_transfer','timeSlot is NULL'=>NULL);
		$data['transfer']=$this->Admin_model->SelectDataOrder('enrollment','*',$where,'id','desc');
		$this->load->view('ownership_transfer_std_list',$data);
	}
	public function due_fees($menu){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$where=array('approval'=>'yes');
		$data['en']=$this->Admin_model->SelectData('enrollment','*',$where);	
		$data['batch']=$this->Admin_model->SelectData('batch','*','');
		$this->load->view('due_fees',$data);
	}
	public function collect_fee($id){
		$session = array('menu' =>'fee');
		$this->session->set_userdata($session);

		$where=array('id'=>$id);
		$std=$this->Admin_model->SelectData_1('enrollment','*',$where);
		$where_1=array('serial'=>$std->stdID);
		$data['std']=$this->Admin_model->SelectData_1('students','*',$where_1);
		$data['en_id']=$std->stdID;
		$e3=$this->Admin_model->get_payment_info($std->id);
		$due=$std->price-$e3->amount;
		$data['due']=$due;
		$where_c=array('id'=>$std->courseID);
		$data['course']=$this->Admin_model->SelectData_1('course','*',$where_c);
		$where_b=array('id'=>$std->batchID);
		$data['batch']=$this->Admin_model->SelectData_1('batch','*','');
		$this->load->view('collect_fee_link',$data);
	}
	public function collection_post(){
		$datas=$this->input->post();
		$datas['date']=date('d/m/Y');

		$ids=$this->input->post('enroll_id');
		// $where=array('stdID'=>$ids);
		// $std=$this->Admin_model->SelectData_1('enrollment','*',$where);
		$std=$this->Admin_model->get_for_fees($ids);
		$id=$std->id;
		$datas['enroll_id']=$id;
		$amount=$this->input->post('amount');
		$payment=$this->Admin_model->get_payment_info($id);
		$price=$this->Admin_model->get_price_info($id);
		$datas['due']=$price->price-$payment->amount-$amount;
		$this->Admin_model->SaveData('payment',$datas);
		
		$dd=$this->Admin_model->get_max_payment_id();
		redirect(base_url().'Admin/print_collection/'.$dd->id);
	}
	public function print_collection($id){
		$session = array('menu' =>'fee');
		$this->session->set_userdata($session);

		$pp=$this->Admin_model->get_max_payment($id);
		$data['p_id']=$id;
		$where=array('id'=>$pp->enroll_id);
		$std=$this->Admin_model->SelectData_1('enrollment','*',$where);
		$where_1=array('serial'=>$std->stdID);
		$data['std']=$this->Admin_model->SelectData_1('students','*',$where_1);
		$data['en_id']=$id;
		$e3=$this->Admin_model->get_payment_info($std->id);
		$due=$std->price-$e3->amount;
		$data['due']=$pp->due;
		$where_c=array('id'=>$std->courseID);
		$data['course']=$this->Admin_model->SelectData_1('course','*',$where_c);
		$where_b=array('id'=>$std->batchID);
		$data['batch']=$this->Admin_model->SelectData_1('batch','*','');
		$data['enroll_id']=$std->enroll_id;

		$data['amount']=$pp->amount;
		$data['date']=$pp->date;
		$data['fee']=$pp->fee;
		$data['licence']=$pp->licence;
		$data['transfer']=$pp->transfer;
		$this->load->view('collection_print',$data);
	}
	public function collect_fees(){
		$session = array('menu' =>'fee');
		$this->session->set_userdata($session);
		$this->load->view('collect_fees');
	}
	public function get_payment_info(){
		$session = array('menu' =>'fee');
		$this->session->set_userdata($session);

		$id=$this->input->post('id');
		$std=$this->Admin_model->get_for_fees($id);
		$where_1=array('serial'=>$std->stdID);
		$st=$this->Admin_model->SelectData_1('students','*',$where_1);
		$data['std_name']=$st->name;
		$data['email']=$st->email;
		$data['mobile']=$st->mobile;
		$data['en_id']=$id;
		$e3=$this->Admin_model->get_payment_info($std->id);
		$due=$std->price-$e3->amount;
		$data['due']=$due;
		if(is_numeric($std->courseID)){
			$where_c=array('id'=>$std->courseID);
			$c=$this->Admin_model->SelectData_1('course','*',$where_c);
			$data['course_name']=$c->name;
		}else{
			$data['course_name']=$std->courseID;
		}
		$where_b=array('id'=>$std->batchID);
		$b=$this->Admin_model->SelectData_1('batch','*','');
		$data['batch']=$b->batch_name;
		echo json_encode($data);
	}
	public function paid_fees($menu){
		$session = array('menu' =>'fee');
		$this->session->set_userdata($session);

		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		
		$data['pay']=$this->Admin_model->SelectData('payment','*','');	
		// $data['batch']=$this->Admin_model->SelectData('batch','*','');
		$this->load->view('paid_fees',$data);
	}
	public function apply(){
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$this->load->view('registration',$data);
	}
	public function registration(){
		
		$data=$this->input->post();
		$data['serial']='STD'.$this->input->post('serial');
		$data['enroll_id']='EN'.$this->input->post('enroll_id');
		$data['approval']='no';

		$config['upload_path'] = './std_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$this->Admin_model->SaveData('students',$data);
		
		$d=$this->Admin_model->get_max_std();
		$where_233=array('id'=>$d->id);
		$dd=$this->Admin_model->SelectData_1('students','*',$where_233);
		$da['stdID']=$dd->serial;
		$da['enroll_id']=$dd->enroll_id;
		$da['courseID']=$this->input->post('courseID');
		$da['board']=$this->input->post('board');
		$da['timeSlot']=$this->input->post('slot');
		$da['approval']='no';
		$da['date']=date('d/m/Y');
		$this->Admin_model->SaveData('enrollment',$da);
		$iddss= $this->db->insert_id();
		$data['id'] = $d->serial;
		
		$this->session->set_userdata($data);
		redirect(base_url().'Admin/confirm/'.$iddss);
	}
	public function confirm($id){
		// $ids= $this->session->flashdata();
		// if(!isset($ids)){
		// 	redirect(base_url().'Admin/pending/std');
		// }
		$data['sql']=$this->Admin_model->get_std_data_1($id);
		$this->load->view('registration_confirm',$data);
	}

	public function driving_apply($menu){
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$this->load->view('registration_licence',$data);
	}
	public function driving_registration(){
		
		$data=$this->input->post();
		$data['serial']='DL'.$this->input->post('serial');
		$data['approval']='no';

		$config['upload_path'] = './std_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$this->Admin_model->SaveData('students',$data);
		
		$d=$this->Admin_model->get_max_std();
		
		$where_233=array('id'=>$d->id);
		$dd=$this->Admin_model->SelectData_1('students','*',$where_233);
		$da['stdID']=$dd->serial;
		$da['courseID']=$this->input->post('courseID');
		$da['timeSlot']=$this->input->post('slot');
		$da['price']=$this->input->post('price');
		$da['approval']='yes';
		$da['date']=date('d/m/Y');
		$this->Admin_model->SaveData('enrollment',$da);
		$data['id'] =$dd->serial;
		
		
		$this->session->set_userdata($data);
		redirect(base_url().'Admin/driving_confirm');
	}
	public function driving_apply_std($menu){
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$this->load->view('registration_licence_std',$data);
	}
	public function driving_confirm(){
		$this->load->view('registration_confirm_driving');
	}
	public function ownership_transfer_apply($menu){
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['course']=$this->Admin_model->SelectData('course','*','');
		$this->load->view('registration_ownership_transfer',$data);
	}
	public function ownership_transfer_registration(){
		$data['name']=$this->input->post('name');
		$data['courseID']=$this->input->post('courseID');
		$data['father']=$this->input->post('father');
		$data['mother']=$this->input->post('mother');
		$data['email']=$this->input->post('email');
		$data['mobile']=$this->input->post('mobile');
		$data['date_of_birth']=$this->input->post('date_of_birth');
		$data['age']=$this->input->post('age');
		$data['nationality']=$this->input->post('nationality');
		$data['passport_no']=$this->input->post('passport_no');
		$data['religion']=$this->input->post('religion');
		$data['p_village']=$this->input->post('p_village');
		$data['p_post']=$this->input->post('p_post');
		$data['p_upozila']=$this->input->post('p_upozila');
		$data['p_district']=$this->input->post('p_district');
		$data['g_village']=$this->input->post('g_village');
		$data['g_post']=$this->input->post('g_post');
		$data['g_upozila']=$this->input->post('g_upozila');
		$data['g_district']=$this->input->post('g_district');
		$data['price']=$this->input->post('price');
		$data['serial']='OTF'.$this->input->post('serial');
		$data['approval']='no';

		$config['upload_path'] = './std_photo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 100000;
		$config['max_width'] = 102400;
		$config['max_height'] = 76800;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data2 = array('upload_data' => $this->upload->data());
			$d = $data2['upload_data']['file_name'];
			$data['photo'] = $d;
		}
		$this->Admin_model->SaveData('students',$data);
		
		$d=$this->Admin_model->get_max_std();
		$where_233=array('id'=>$d->id);
		$dd1=$this->Admin_model->SelectData_1('students','*',$where_233);
		$da['stdID']=$dd1->serial;
		$da['courseID']=$this->input->post('courseID');
		$da['price']=$this->input->post('price');
		$da['approval']='yes';
		$da['date']=date('d/m/Y');
		$this->Admin_model->SaveData('enrollment',$da);
		$idd= $this->db->insert_id();
		$data['id'] =$dd1->serial;
		// $dd['std_id']=$dd->serial;
		$dd['std_id']=$dd1->serial;
		$dd['existing_owner']=$this->input->post('existing_owner');
		$dd['vehicle_category']=$this->input->post('vehicle_category');
		$dd['veh_reg_no']=$this->input->post('veh_reg_no');
		$dd['veh_tax_exp_date']=$this->input->post('veh_tax_exp_date');
		$dd['veh_fitness_date']=$this->input->post('veh_fitness_date');
		$dd['veh_ins_exp_date']=$this->input->post('veh_ins_exp_date');
		$dd['veh_eng_no']=$this->input->post('veh_eng_no');
		$dd['veh_chasis_no']=$this->input->post('veh_chasis_no');
		$dd['veh_accident_history']=$this->input->post('veh_accident_history');
		$dd['veh_app_date']=$this->input->post('veh_app_date');
		$dd['veh_tmp_rc']=$this->input->post('veh_tmp_rc');
		$dd['veh_bio_date']=$this->input->post('veh_bio_date');
		$dd['veh_rc_date']=$this->input->post('veh_rc_date');
		$this->Admin_model->SaveData('vehicle_info',$dd);

		// $data['vehicle_category']=$this->input->post('vehicle_category');
		// $data['veh_reg_no']=$this->input->post('veh_reg_no');
		// $data['veh_tax_exp_date']=$this->input->post('veh_tax_exp_date');
		// $data['veh_fitness_date']=$this->input->post('veh_fitness_date');
		// $data['veh_ins_exp_date']=$this->input->post('veh_ins_exp_date');
		// $data['veh_eng_no']=$this->input->post('veh_eng_no');
		// $data['veh_chasis_no']=$this->input->post('veh_chasis_no');
		// $data['veh_accident_history']=$this->input->post('veh_accident_history');
		// $data['veh_app_date']=$this->input->post('veh_app_date');
		// $data['veh_tmp_rc']=$this->input->post('veh_tmp_rc');
		// $data['veh_bio_date']=$this->input->post('veh_bio_date');
		// $data['veh_rc_date']=$this->input->post('veh_rc_date');

		// $this->session->set_userdata($data);
		redirect(base_url().'Admin/client_details_transfer/'.$idd);
	}
	public function ownership_transfer_confirm(){
		$this->load->view('registration_confirm_ownership_transfer');
	}

	public function mark_as_certified(){
		$id=$this->input->post('id');

		$where=array('id'=>$id);
		$data['certified']='yes';
		$data['certificate_id']=$this->input->post('c_id');
		$data['finish_date']=$this->input->post('date');
		$this->Admin_model->UpdateData('enrollment',$data,$where);
		redirect(base_url().'Admin/std_list/std');
	}
	public function course_schedule($menu){
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$data['course']=$this->Admin_model->SelectDataOrder('course','*','','id','desc');
		$this->load->view('course_schedule',$data);
	}
	public function add_schedule(){
		$data['course_id']=$this->input->post('course_id');
		$data['days']=$this->input->post('days');
		$this->Admin_model->SaveData('schedule_days',$data);
		$d=$this->Admin_model->get_mx_sh_id();
		$da['schedule_id']=$d->id;
		$sl=$this->input->post('slot');
		$c=count($sl);
		for($i=0;$i<$c; $i++) {
			$da['slot']=$sl[$i];
			$this->Admin_model->SaveData('time_slots',$da);
		}
		redirect(base_url().'Admin/course_schedule/course');
	}
	public function edit_time_slot($id){
		$where=array('id'=>$id);
		$d=$this->Admin_model->SelectData_1('time_slots','*',$where);
		$data['slot']=$d;
		$days_id=$d->schedule_id;
		$where_1=array('id'=>$days_id);
		$data['days']=$this->Admin_model->SelectData_1('schedule_days','*',$where_1);
		$data['course']=$this->Admin_model->SelectDataOrder('course','*','','id','desc');
		$this->load->view('edit_time_slot',$data);
	}
	public function update_schedule(){
		$where=array('id'=>$this->input->post('slot_id'));
		$where_1=array('id'=>$this->input->post('days_id'));
		$data['slot']=$this->input->post('slot');
		$da['days']=$this->input->post('days');
		$this->Admin_model->UpdateData('schedule_days',$da,$where_1);
		$this->Admin_model->UpdateData('time_slots',$data,$where);
		redirect(base_url().'Admin/course_schedule/course');
	}
	public function delete_time_slot($id){
		$where=array('id'=>$id);
		$this->Admin_model->DeleteData('time_slots',$where);
		redirect(base_url().'Admin/course_schedule/course');
	}
	public function delete_days($id){
		$where=array('id'=>$id);
		$this->Admin_model->DeleteData('schedule_days',$where);
		redirect(base_url().'Admin/course_schedule/course');
	}
	public function add_slot($id){
		$where=array('id'=>$id);
		$data['days']=$this->Admin_model->SelectData_1('schedule_days','*',$where);
		$data['course']=$this->Admin_model->SelectDataOrder('course','*','','id','desc');
		$this->load->view('add_slot',$data);
	}
	public function add_slot_post(){
		$id=$this->input->post('days_id');
		
		$da['schedule_id']=$id;
		$sl=$this->input->post('slot');
		$c=count($sl);
		for($i=0;$i<$c; $i++) {
			$da['slot']=$sl[$i];
			$this->Admin_model->SaveData('time_slots',$da);
		}
		redirect(base_url().'Admin/course_schedule/course');
	}
	function db_backup(){
		$session=$this->session->userdata('userID');
		if(!isset($session)){
			redirect(base_url() . 'Admin');
		}else{
			$session = array('menu' =>$menu);
			$this->session->set_userdata($session);
			date_default_timezone_set('Asia/Calcutta');
      // Load the DB utility class 
			$this->load->dbutil(); 
      $prefs = array( 'format' => 'zip', // gzip, zip, txt 
      	'filename' => 'backup_'.date('d_m_Y_H_i_s').'.sql', 
                                                      // File name - NEEDED ONLY WITH ZIP FILES 
      	'add_drop' => TRUE,
                                                     // Whether to add DROP TABLE statements to backup file
      	'add_insert'=> TRUE,
                                                    // Whether to add INSERT data to backup file 
      	'newline' => "\n"
                                                   // Newline character used in backup file 
      	); 
         // Backup your entire database and assign it to a variable 
      $backup =& $this->dbutil->backup($prefs); 
         // Load the file helper and write the file to your server 
      $this->load->helper('file'); 
      write_file('/path/to/'.'dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup); 
         // Load the download helper and send the file to your desktop 
      $this->load->helper('download'); 
      force_download('dbbackup_'.date('d_m_Y_H_i_s').'.zip', $backup);
  }
}
public function front($menu){
	$session = array('menu' =>$menu);
	$this->session->set_userdata($session);
	$data['ba']=$this->Admin_model->SelectData('batch','*','');
	$this->load->view('search_id_front',$data);
}
public function front_side(){
	$batch=$this->input->post('batch');
	$data['d']=$this->Admin_model->get_std_data_for_batch($batch);
	$this->load->view('front1',$data);
}
public function front_side_by_id(){
	$id=$this->input->post('id');
	$data['d']=$this->Admin_model->get_std_data_for_id($id);
	$this->load->view('front1',$data);
}
public function back($menu){
	$session = array('menu' =>$menu);
	$this->session->set_userdata($session);
	$this->load->view('back_side_search');
}
public function back_side(){
	$data['n']=$this->input->post('number');
	$data['v']=$this->input->post('validity');
	$this->load->view('back_side',$data);
}
// user table
public function user($menu){
	$session = array('menu' =>$menu);
	$this->session->set_userdata($session);	
	$data['u_show']=$this->Admin_model->SelectData('admin','*','');
	$this->load->view('create_user',$data);
}

// input data in database for user
public function add_user(){
	$data['name']=$this->input->post('name');
	$data['email']=$this->input->post('email');
	$data['password']=md5($this->input->post('password'));
	$this->Admin_model->SaveUser($data);
	redirect(base_url().'Admin/user/u');
}
// delete data from user
public function delete_user($ids){
	$data=array('id'=>$ids);
	$this->load->Admin_model->DeleteData('admin',$data);
	redirect(base_url().'Admin/user/u');

}
// select data from update
public function edit_user($ids){
	$where=array('id'=>$ids);
	$data['u_show']=$this->Admin_model->SelectData_1('admin','*',$where);
	$this->load->view('edit_user',$data);
}
// update data form user table
public function edit_users(){
	$id=$this->input->post('id');
	$where=array('id'=>$id);
	$data=$this->input->post();
	$data['password']=md5($this->input->post('password'));//This line only for md5 password
	$this->Admin_model->UpdateData('admin',$data,$where);
	redirect(base_url().'Admin/user/u');
}
// Controller Teacher ID card 
public function front_t($menu){
	$session = array('menu' =>$menu);
	$this->session->set_userdata($session);
	$data['ba']=$this->Admin_model->SelectData('batch','*','');
	$this->load->view('search_id_front_t',$data);
}
public function front_side_by_id_t(){
	$id=$this->input->post('id');
	$data['d']=$this->Admin_model->get_std_data_for_id_t($id);
	$data['licence']=$this->input->post('licence');
	$this->load->view('front_t',$data);
}
// public function transfer_client_details($id){
// 	$data['sql']=$this->Admin_model->get_transfer_std($id);
// 	$this->load->view('transfer_std_view',$data);
// }
public function client_details_transfer($id){
	$data['sql']=$this->Admin_model->get_transfer_std($id);
	$this->load->view('transfer_std_view',$data);
}
public function transfer_client_edit($id){
	$data['sql']=$this->Admin_model->get_transfer_std($id);
	$this->load->view('transfer_client_edit',$data);
}
public function ownership_transfer_edit_post(){
	$iidd=$this->input->post('id');
	$std_ids=$this->Admin_model->get_std_id($iidd);
	$where=array('serial'=>$std_ids->stdID);

	$data['name']=$this->input->post('name');
	$data['courseID']=$this->input->post('courseID');
	$data['father']=$this->input->post('father');
	$data['mother']=$this->input->post('mother');
	$data['email']=$this->input->post('email');
	$data['mobile']=$this->input->post('mobile');
	$data['date_of_birth']=$this->input->post('date_of_birth');
	$data['age']=$this->input->post('age');
	$data['nationality']=$this->input->post('nationality');
	$data['passport_no']=$this->input->post('passport_no');
	$data['religion']=$this->input->post('religion');
	$data['p_village']=$this->input->post('p_village');
	$data['p_post']=$this->input->post('p_post');
	$data['p_upozila']=$this->input->post('p_upozila');
	$data['p_district']=$this->input->post('p_district');
	$data['g_village']=$this->input->post('g_village');
	$data['g_post']=$this->input->post('g_post');
	$data['g_upozila']=$this->input->post('g_upozila');
	$data['g_district']=$this->input->post('g_district');
	$data['price']=$this->input->post('price');
	// $data['serial']=$this->input->post('serial');
	$data['approval']='no';

	$config['upload_path'] = './std_photo/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['encrypt_name'] = TRUE;
	$config['max_size'] = 100000;
	$config['max_width'] = 102400;
	$config['max_height'] = 76800;
	$this->load->library('upload', $config);

	if (!$this->upload->do_upload('userfile')) {
		$error = array('error' => $this->upload->display_errors());
	} else {
		$data2 = array('upload_data' => $this->upload->data());
		$d = $data2['upload_data']['file_name'];
		$data['photo'] = $d;
	}
	$this->Admin_model->UpdateData('students',$data,$where);

	$where_1=array('id'=>$iidd);
	// $da['stdID']=$std_ids->stdID;
	$da['courseID']=$this->input->post('courseID');
	$da['price']=$this->input->post('price');
	$da['approval']='yes';
	$da['date']=date('d/m/Y');
	$this->Admin_model->UpdateData('enrollment',$da,$where_1);
	
	$where_2=array('std_id'=>$std_ids->stdID);
	$data['id'] =$iidd;
	$dd['std_id']=$std_ids->stdID;
	$dd['existing_owner']=$this->input->post('existing_owner');
	$dd['vehicle_category']=$this->input->post('vehicle_category');
	$dd['veh_reg_no']=$this->input->post('veh_reg_no');
	$dd['veh_tax_exp_date']=$this->input->post('veh_tax_exp_date');
	$dd['veh_fitness_date']=$this->input->post('veh_fitness_date');
	$dd['veh_ins_exp_date']=$this->input->post('veh_ins_exp_date');
	$dd['veh_eng_no']=$this->input->post('veh_eng_no');
	$dd['veh_chasis_no']=$this->input->post('veh_chasis_no');
	$dd['veh_accident_history']=$this->input->post('veh_accident_history');
	$dd['veh_app_date']=$this->input->post('veh_app_date');
	$dd['veh_tmp_rc']=$this->input->post('veh_tmp_rc');
	$dd['veh_bio_date']=$this->input->post('veh_bio_date');
	$dd['veh_rc_date']=$this->input->post('veh_rc_date');
	$this->Admin_model->UpdateData('vehicle_info',$dd,$where_2);

	// $data['vehicle_category']=$this->input->post('vehicle_category');
	// $data['veh_reg_no']=$this->input->post('veh_reg_no');
	// $data['veh_tax_exp_date']=$this->input->post('veh_tax_exp_date');
	// $data['veh_fitness_date']=$this->input->post('veh_fitness_date');
	// $data['veh_ins_exp_date']=$this->input->post('veh_ins_exp_date');
	// $data['veh_eng_no']=$this->input->post('veh_eng_no');
	// $data['veh_chasis_no']=$this->input->post('veh_chasis_no');
	// $data['veh_accident_history']=$this->input->post('veh_accident_history');
	// $data['veh_app_date']=$this->input->post('veh_app_date');
	// $data['veh_tmp_rc']=$this->input->post('veh_tmp_rc');
	// $data['veh_bio_date']=$this->input->post('veh_bio_date');
	// $data['veh_rc_date']=$this->input->post('veh_rc_date');

	// $this->session->set_userdata($data);
	redirect(base_url().'Admin/client_details_transfer/'.$iidd);
}
public function transfer_client_delete($id){
	$std_ids=$this->Admin_model->get_std_id($id);
	$where=array('serial'=>$std_ids->stdID);
	$this->load->Admin_model->DeleteData('students',$where);
	redirect(base_url().'Admin/ownership_transfer_std_list/own');
}
public function certified_print($id){
	$data['sql']=$this->Admin_model->get_std_for_certificate($id);
	$this->load->view('print_certificate',$data);
}
public function print_certificate_ajax($menu){
	$session = array('menu' =>$menu);
	$this->session->set_userdata($session);

	$this->load->view('print_certificate_ajax');
}
public function get_certificate_info(){
	$id=$this->input->post('id');
	$d=$this->Admin_model->get_std_for_certificate_ajax($id);
	echo json_encode($d);
}
// edited code by zahid
public function client_driving_details($id){
	$data['sql']=$this->Admin_model->get_transfer_std_driving($id);
	$this->load->view('client_driving_details',$data);

}
public function client_driving_edit($ids){
	$data['sql']=$this->Admin_model->get_transfer_std_driving($ids);
	$this->load->view('client_driving_edit',$data);
}

public function driving_registration_edit_post(){
	$idd=$this->input->post('id');
	$std_id=$this->Admin_model->get_std_id($idd);
	$where=array('serial'=>$std_id->stdID);
	$data=$this->input->post();
	$data['approval']='no';

	$config['upload_path'] = './std_photo/';
	$config['allowed_types'] = 'gif|jpg|png';
	$config['encrypt_name'] = TRUE;
	$config['max_size'] = 100000;
	$config['max_width'] = 102400;
	$config['max_height'] = 76800;
	$this->load->library('upload', $config);

	if (!$this->upload->do_upload('userfile')) {
		$error = array('error' => $this->upload->display_errors());
	} else {
		$data2 = array('upload_data' => $this->upload->data());
		$d = $data2['upload_data']['file_name'];
		$data['photo'] = $d;
	}
	$this->Admin_model->UpdateData('students',$data,$where);

	$where_1=array('id'=>$idd);
	$da['courseID']=$this->input->post('courseID');
	$da['timeSlot']=$this->input->post('slot');
	$da['price']=$this->input->post('price');
	$da['approval']='yes';
	$da['date']=date('d/m/Y');
	$this->Admin_model->UpdateData('enrollment',$da,$where_1);
	$data['id'] = $idd;

	$this->session->set_userdata($data);
	redirect(base_url().'Admin/driving_confirm');
}
public function driving_registration_delete($id){
	$ids = $this->Admin_model->get_std_id($id);
	$data=array('serial'=>$ids->stdID);
	$this->load->Admin_model->DeleteData('students',$data);
	redirect(base_url().'Admin/driving_std_list/dr');
}
public function get_std_for_licence(){
	$id=$this->input->post('id');
	$data=$this->Admin_model->get_std_data_2($id);
	echo json_encode($data);
}
public function get_duplicate_std(){
	$i=$this->input->post('id');
	$where=array('serial'=>$i);
	$id=$this->Admin_model->SelectData_1('students','*',$where);
	if($id!=NULL){
		echo "error";
	}else{
		echo "ok";
	}
}
public function get_duplicate_en(){
	$i='EN'.$this->input->post('id');
	$where=array('enroll_id'=>$i);
	$id=$this->Admin_model->SelectData_1('enrollment','*',$where);
	if($id!=NULL){
		echo "error";
	}else{
		echo "ok";
	}
}
}	
?>
