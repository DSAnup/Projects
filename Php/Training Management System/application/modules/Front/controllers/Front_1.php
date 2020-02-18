<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
Developed By: Morshed Habib Sohel
Mobile: 01735254295
*/
class Front extends MX_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Front_model');
	}

	public function index(){
		$data['slider']=$this->rest->SelectData('slider','*','');
		$data['workshop']=$this->rest->SelectData('workshop','*','');
		$data['trainer']=$this->rest->SelectData('trainer','*','');
		$data['notice']=$this->Front_model->SelectDataOrder('notice','*','','id','desc');
		$data['course']=$this->rest->SelectData('course','*','');
		$data['test']=$this->rest->SelectData('testimonial','*','');
		$data['gallery']=$this->Front_model->get_gallery();
		$this->load->view('index',$data);
	}
	public function trainer($id){
		$data['trainer']=$this->rest->get_trainer($id);
		$this->load->view('teacher_profile',$data);
	}
	public function gallery(){
		$data['gallery']=$this->Front_model->get_gallery_all();
		$this->load->view('gallery',$data);
	}
	public function std_work(){
		$data['gallery']=$this->Front_model->get_std_work_all();
		$this->load->view('std_work',$data);
	}
	public function notice($id){
		$where=array('id'=>$id);
		$data['notice']=$this->rest->SelectData_1('notice','*',$where);
		$this->load->view('notice_details',$data);
	}
	public function course_details($ids){
		$id=explode('_', $ids);
		$where=array('id'=>$id[0]);
		$heads=array('course_id'=>$id[0]);
		$all_where=array('category'=>$id[1]);
		$category_where=array('id'=>$id[1]);
		$data['courses']=$this->rest->SelectData('course','*',$all_where);
		$data['course']=$this->Front_model->SelectData_1('course','*',$where);
		$data['category']=$this->Front_model->SelectData_1('course_category','*',$category_where);
		$data['heads']=$this->Front_model->SelectData('part_heads','*',$heads);
		$data['id']=$id[0];
		$this->load->view('course_details',$data);
	}
	public function all_course($ids){
		$d=$this->Front_model->get_course_category_wise($ids);
		
		if($d!==NULL){
			$id=$d->id.'_'.$d->category;
			redirect(base_url().'course_details/'.$id);	
		}else{
			$category_where=array('id'=>$ids);
			$data['category']=$this->Front_model->SelectData_1('course_category','*',$category_where);
			$this->load->view('empty_course',$data);
		}
		
	}
	public function apply(){
		$data['course']=$this->Front_model->SelectData('course','*','');
		$this->load->view('registration',$data);
	}
	public function registration(){
		
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
		$this->Front_model->SaveData('students',$data);
		$d=$this->Front_model->get_max_std();
		$da['stdID']=$d->id;
		$da['courseID']=$this->input->post('courseID');
		$da['board']=$this->input->post('board');
		$da['timeSlot']=$this->input->post('slot');
		// $da['batchID']=$this->input->post('batch');
		$da['approval']='no';
		$da['date']=date('d/m/Y');
		$this->Front_model->SaveData('enrollment',$da);
		
		//API Starts Here
		$_param=array(
			'name'=>$this->input->post('name'),
			'mobile'=>$this->input->post('mobile'),
			'email'=>$this->input->post('email'),
			'village'=>$this->input->post('pr_village'),
			'post'=>$this->input->post('pr_post'),
			'upozila'=>$this->input->post('pr_upozila'),
			'district'=>$this->input->post('pr_district'),
			);
		$_url="http://youthfireit.com/api";
		$postData = '';
        foreach($_param as $k => $v) 
        { 
          $postData .= $k . '='.$v.'&'; 
        }
        rtrim($postData, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
        $output=curl_exec($ch);
        curl_close($ch);
        
        //API Ends Here
		
		$this->session->set_userdata($data);
        redirect(base_url().'confirm');
	}
	public function confirm(){
		$this->load->view('registration_confirm');
	}
	public function get_batch(){
		$id=$this->input->post('id');
		$where=array('courseID'=>$id);
		$data['batch']=$this->Front_model->SelectData('batch','*',$where);
		$this->load->view('get_batch',$data);
	}
	public function std_list(){
		$this->load->model('Admin_model');
		
		$where=array('approval'=>'yes','certified'=>'no');
		$data['en']=$this->Admin_model->SelectData('enrollment','*',$where);	
		$data['batch']=$this->Admin_model->SelectData('batch','*','');
		$this->load->view('std_lists',$data);
	}
	public function services($id){
		$where=array('service_type'=>$id);
		$where_1=array('id'=>$id);
		$this->load->model('Admin_model');
		$data['news']=$this->Admin_model->SelectDataOrder('service_news','*',$where,'id','desc');
		$data['type']=$this->Admin_model->SelectData_1('services','*',$where_1);
		$this->load->view('service_news',$data);
	}
	public function contact(){
		$this->load->view('contact');
	}
	public function get_days(){
		$id=$this->input->post('id');
		$where=array('course_id'=>$id);
		$data['days']=$this->Front_model->SelectData('schedule_days','*',$where);
		$this->load->view('get_days',$data);
	}
	public function get_slot(){
		$id=$this->input->post('id');
		$where=array('schedule_id'=>$id);
		$data['days']=$this->Front_model->SelectData('time_slots','*',$where);
		$this->load->view('get_slot',$data);
	}
	public function management(){
		$data['query']=$this->Front_model->SelectDataOrder('management', '*', '','id','desc');
		$this->load->view('management',$data);
	}
	public function organogram(){
		$this->load->view('organogram');
	}
	public function sdti(){
		$this->load->view('sdti');
	}
	public function certifiedList(){
		$where=array('approval'=>'yes','certified'=>'yes');
		$data['en1']=$this->Front_model->SelectDataOrder('enrollment','*',$where,'id','desc');
		$this->load->view('certified_list',$data);
	}
	public function verify(){
		$this->load->view('cerificate_verify');
	}
	public function verification(){
		$id=$this->input->post('id');
		$where=array('approval'=>'yes','certified'=>'yes','id'=>$id);
		$data['e1']=$this->Front_model->SelectData_1('enrollment','*',$where,'id','desc');
		$this->load->view('verified_std',$data);
	}
}

?>