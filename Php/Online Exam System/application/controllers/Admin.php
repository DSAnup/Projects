<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_controller {
	function __construct() {
		parent::__construct();
		$this->load->model('C_admin_model');
		$this->load->model('Admin_model');
		$this->load->model('Rest_model');
	}
	public function index()
	{
		if(isset($_SESSION['userID'])){
			redirect(base_url('Admin/dashboard'));
		}else{
			$this->load->view('admin/index');
		}
	}
	public function login(){
		$data=$this->input->post();
		$data['password'] = md5($this->input->post('password'));
		$data['status']='active';
		$d=$this->Rest_model->SelectData_1('users','*',$data);
		if (!empty($d)) {
			$this->session->set_userdata('userID',$d->id);
			$this->session->set_userdata('userName',$d->name);
			$this->session->set_userdata('role',$d->role);
			redirect(base_url().'Admin/dashboard','refresh');
		}else{
			$this->session->set_flashdata('error','Invalid email or password !');
			redirect(base_url().'Admin','refresh');
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
			$this->load->view('admin/dashboard');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function admin_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','admin');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('users', '*', array('id'=>$id));
			}
			$data['adm'] = $this->Rest_model->SelectDataOrder('users', '*', '','id','desc');
			$this->load->view('admin/admin_list', $data);
			
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function add_admin(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data = $this->input->post();
			$data['password'] = md5($this->input->post('password'));
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
			redirect(base_url().'Admin/admin_list', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function delete_admin($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('users', array('id'=>$id));
			redirect(base_url().'Admin/admin_list', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
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
			redirect(base_url().'Admin/admin_list', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	
	public function signout(){
		session_destroy();
		redirect(base_url().'Admin','refresh');
	}

	public function course($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['subject']=  $this->C_admin_model->SelectData('subject','*','');
			$this->session->set_userdata('menu','main');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('course', '*', array('id'=>$id));
			}
			$data['course']=  $this->C_admin_model->SelectDataOrder('course','*','','id','desc');
			$this->load->view("admin/course", $data);
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function create_course(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data=$this->input->post();
			$id = $this->input->post('id');
			if(isset($id)){
				$this->Rest_model->UpdateData('course', $data, array('id'=>$id));
			}else{
				$this->C_admin_model->SaveData('course',$data);
			}
			redirect(base_url().'Admin/course','refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function course_delete($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$where=array('id'=>$id);
			$this->C_admin_model->DeleteData('course',$where);
			redirect(base_url().'Admin/course','refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function subject($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['subject']=  $this->C_admin_model->SelectData('subject','*','');
			$data['course_cat'] = $this->Rest_model->SelectDataOrder('course_cat', '*', '','id','desc');
			$this->session->set_userdata('menu','main');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('subject', '*', array('id'=>$id));
			}
			$this->load->view("admin/subject", $data);
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function create_subject(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data=$this->input->post();
			$id = $this->input->post('id');
	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = 'gif|jpg|png|mp4';
	        $config['encrypt_name'] = TRUE;
	        $config['max_size'] = 100000000;
	        $config['max_width'] = 10240000;
	        $config['max_height'] = 7680000;
	        $this->load->library('upload', $config);

	        if (!$this->upload->do_upload('photo')) {
	            $error = array('error' => $this->upload->display_errors());
	        } else {
	            $data2 = array('upload_data' => $this->upload->data());
	            $data['photo'] = $data2['upload_data']['file_name'];
	        }
			if(isset($id)){
				$qq=$this->Rest_model->SelectData_1('subject','*',array('id'=>$id));
					if($qq->photo!=''){
		            unlink('uploads/'.$qq->photo);
		            }
				$this->Rest_model->UpdateData('subject', $data, array('id'=>$id));
			}else{
				$this->C_admin_model->SaveData('subject',$data);
			}
			redirect(base_url().'Admin/subject','refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function subject_delete($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$where=array('id'=>$id);
			$qq=$this->Rest_model->SelectData_1('subject','*',array('id'=>$id));
				if($qq->photo!=''){
	            unlink('uploads/'.$qq->photo);
	            }
			$this->C_admin_model->DeleteData('subject',$where);
			redirect(base_url().'Admin/subject','refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function quiz($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data['subject']=  $this->C_admin_model->SelectData('subject','*','');
			$data['course']=  $this->C_admin_model->SelectData('course','*','');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('quiz', '*', array('q_id'=>$id));
			}
			$data['quiz'] = $this->Rest_model->SelectDataOrder('quiz', '*','','q_id','desc');
			$this->session->set_userdata('menu','main');
			$this->load->view("admin/quiz", $data);
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	
    public function create_quiz(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$data = $this->input->post();
        $id = $this->input->post('q_id');
		if(isset($id)){
			$this->Rest_model->UpdateData('quiz', $data, array('q_id'=>$id));
		}else{
			$this->C_admin_model->SaveData('quiz',$data);
		}
        redirect(base_url().'Admin/quiz','refresh');
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function lesson_wise_quiz_delete($id){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $where=array('lesson_id'=>$id);
        $this->C_admin_model->DeleteData('quiz',$where);
        redirect(base_url().'Admin/quiz','refresh');
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function quiz_edit($id){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $data['id']=$id;
        $data['quiz']=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$id));
        $data['course']=$this->C_admin_model->SelectData('course','*','');
        $this->load->view("admin/quiz_edit", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function edit_quiz_post(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $question=$this->input->post('question');
        $q=$this->input->post('q_id');
        $option_1=$this->input->post('option_1');
        $option_2=$this->input->post('option_2');
        $option_3=$this->input->post('option_3');
        $option_4=$this->input->post('option_4');

        $answer=$this->input->post('answer');
        foreach ($question as $key => $value) {
            $data['question']=$value;
            $data['option_4']=$option_4[$key];
            $data['option_3']=$option_3[$key];
            $data['option_2']=$option_2[$key];
            $data['option_1']=$option_1[$key];
            $data['answer']=$answer[$key];

            $this->C_admin_model->UpdateData('quiz',$data,array('q_id'=>$q[$key]));
        }
        redirect(base_url().'Admin/quiz','refresh');
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function quiz_delete($id){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $a=explode('_', $id);
        $this->C_admin_model->DeleteData('quiz',array('q_id'=>$a[1]));
        redirect(base_url().'Admin/quiz_edit/'.$a[0],'refresh');
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function get_module(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $id=$this->input->post('item');
        $data=$this->C_admin_model->SelectData('course','*',array('subject'=>$id));
        $this->output->set_content_type('application/json');
		$q = json_encode($data);
		echo $q;
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function students(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $data['subject']=$this->C_admin_model->SelectData('subject','*','');
        $data['date']=$this->C_admin_model->get_date();
        $this->load->view("admin/students", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function search_std(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $course_id=$this->input->post('course_id');
        $date=$this->input->post('date');
        $data['date']=$date;
        $data['sub1']=$this->C_admin_model->SelectData('subject','*','');
        $data['date1']=$this->C_admin_model->get_date();
        $data['sub']=$this->C_admin_model->get_sub($course_id);
        $data['std']=$this->C_admin_model->search_std($course_id,$date);
        $this->load->view("admin/search_result", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function set_publish(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $id=$this->input->post('id');
        $this->C_admin_model->UpdateData('enrollment',array('published'=>'yes'),array('id'=>$id));
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function result2($enrol){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$data['en'] = $this->Rest_model->SelectData_1('enrollment','*',array('enroll_id'=>$enrol));
    	$data['st'] = $this->Rest_model->SelectData_1('studentup','*',array('id'=>$data['en']->std_id));
    	$data['quiz']=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$data['en']->course_id));
    	$data['answer'] = $this->C_admin_model->SelectData('answer','*',array('enroll_id'=>$enrol));
        $this->load->view("admin/result2", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function send($enrol){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$data['en'] = $this->Rest_model->SelectData_1('enrollment','*',array('enroll_id'=>$enrol));
    	$student = $this->Rest_model->SelectData_1('studentup','*',array('id'=>$data['en']->std_id));
    	$data['quiz']=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$data['en']->course_id));
    	$course = $this->Rest_model->SelectData_1('course', '*', array('id'=>$data['en']->course_id));
    	$answer = $this->C_admin_model->SelectData('answer','*',array('enroll_id'=>$enrol));
    	$totalAnswer=0;
        $totalQuestion=0;
        foreach ($answer as $q) {
            $s=$this->C_admin_model->SelectData_1('quiz','*',array('q_id'=>$q->quiz_id));
            if($q->answer==$s->answer){
              $totalAnswer+=1;
            }
            $totalQuestion+=1;
          }
        $useremail = $this->Rest_model->SelectData_1('users','*', array('id'=>$userID));
        $this->C_admin_model->mail_status($enrol);
        $to = $student->email;
        $togurdian = $student->guardian_email;
		$subject = 'Exam Result';
		$from = $useremail->email;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		 
		$headers .= 'From: '.$from."\r\n".
		    'Reply-To: '.$from."\r\n" .
		    'X-Mailer: PHP/' . phpversion();

    	$html = "<b>Total Correct Answer: </b> ".$totalAnswer."<b> out of </b>".$totalQuestion;
    	$message = '<html><body>';
		$message .= '<h3>Dear '.$student->username.'</h3>';
		$message .= '<h5>Result on lesson '.$course->name.' taken on '.$data['en']->date.' : </h5>';
		$message .= '<p>'.$html.'</p>';
		$message .= '</body></html>';
		$message2 = '<html><body>';
		$message2 .= '<h3>Dear Guardian</h3>';
		$message2 .= '<h5>Result of '.$student->username.' on lesson '.$course->name.' taken on '.$data['en']->date.' : </h5>';
		$message2 .= '<p>'.$html.'</p>';
		$message2 .= '</body></html>';
		if(mail($to, $subject, $message, $headers)){
			$this->session->set_flashdata('item','Student mail has been sent successfully');
		} else{
			$this->session->set_flashdata('item','Unable to send email. Please try again.');
		}
		if(mail($togurdian, $subject, $message2, $headers)){
		    $this->session->set_flashdata('item2','Guardian mail has been sent successfully');
		} else{
		    $this->session->set_flashdata('item2','Unable to send email. Please try again.');
		}
		redirect(base_url().'Admin/studentsresult','refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function sendfull($id){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$enrollment = $this->Rest_model->SelectData('enrollment','*',array('std_id'=>$id, 'published'=>'yes'));
    	
        $html = "<table style='border: 1px solid black; text-align:center'>
    			<tr style='background-color: lightgray;'>
    				<th style='border: 1px solid black;'>Course Name</th>
    				<th style='border: 1px solid black;'>Enroll Name</th>
    				<th style='border: 1px solid black;'>Date</th>
    				<th style='border: 1px solid black;'>Result</th>
    			</tr>";
    	foreach ($enrollment as $en) {
    		$course = $this->Rest_model->SelectData_1('course', '*', array('id'=>$en->course_id));
    		$answer = $this->C_admin_model->SelectData('answer','*',array('enroll_id'=>$en->enroll_id));
    		$totalAnswer=0;
        	$totalQuestion=0;
    		$html .= "<tr><td style='border: 1px solid black;'>".$course->name."  "."</td>";
    		$html .= "<td style='border: 1px solid black;'>".$en->enroll_id."  "."</td>";
    		$html .= "<td style='border: 1px solid black;'>".$en->date."  "."</td>";
    		foreach ($answer as $q) {
	            $s=$this->C_admin_model->SelectData_1('quiz','*',array('q_id'=>$q->quiz_id));
	            if($q->answer==$s->answer){
	              $totalAnswer+=1;
	            }
	            $totalQuestion+=1;
	          }
	        $html .= "<td style='border: 1px solid black;'><b>Total Correct Answer: </b> ".$totalAnswer."<b> out of </b>".$totalQuestion."</td></tr><br>";
    		
    	}
    	$html .= "</table>";
    	// print_r($id);
    	$student = $this->Rest_model->SelectData_1('studentup','*',array('id'=>$id));
    	
        $useremail = $this->Rest_model->SelectData_1('users','*', array('id'=>$userID));
        // $this->C_admin_model->mail_status($enrol);
        $to = $student->email;
        $togurdian = $student->guardian_email;
		$subject = 'Full Result';
		$from = $useremail->email;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		 
		$headers .= 'From: '.$from."\r\n".
		    'Reply-To: '.$from."\r\n" .
		    'X-Mailer: PHP/' . phpversion();

    	
    	$message = '<html><body>';
		$message .= '<h3>Dear '.$student->username.',</h3>';
		$message .= $html;
		$message .= '</body></html>';
		$message2 = '<html><body>';
		$message2 .= '<h3>Dear Guardian</h3>';
		$message2 .= '<h5>Full Result of Your Student '.$student->username.'</h5>';
		$message2 .= $html;
		$message2 .= '</body></html>';
		if(mail($to, $subject, $message, $headers)){
			$this->session->set_flashdata('item','Student mail has been sent successfully');
		} else{
			$this->session->set_flashdata('item','Unable to send email. Please try again.');
		}
		if(mail($togurdian, $subject, $message2, $headers)){
		    $this->session->set_flashdata('item2','Guardian mail has been sent successfully');
		} else{
		    $this->session->set_flashdata('item2','Unable to send email. Please try again.');
		}
		redirect(base_url().'Admin/studentsfullresult','refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function studentsfullresult(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$data['studentup'] = $this->Rest_model->SelectDataOrder('studentup','*','','username','desc');
        $this->load->view("admin/studentsfullresult", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function publish($enrol){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$this->C_admin_model->UpdateData('enrollment',array('published'=>'yes'),array('enroll_id'=>$enrol));
    	redirect(base_url().'Admin/studentsresult');
    	}else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function result($da){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
        $d=explode('_', $da);
        $data['std']=$d[1];
        $data['sub']=$this->C_admin_model->get_sub($d[0]);
        $data['st']=$this->C_admin_model->SelectData_1('studentup','*',array('id'=>$d[1]));
        $data['quiz']=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$d[0]));
        $this->load->view("admin/result", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function reset(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {
    	$data=$this->input->post('id');
    	$d=explode('_',$data);
		$this->C_admin_model->DeleteData('enrollment',array('std_id'=>$d[1],'course_id'=>$d[0]));
		$q=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$d[0]));
		foreach($q as $c){
			$this->C_admin_model->DeleteData('answer',array('std_id'=>$d[1],'quiz_id'=>$c->q_id));
		}
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
    public function studentsresult(){
    	$userID = $this->session->userdata('userID');
		if (isset($userID)) {

        $data['enrollment']=$this->C_admin_model->SelectDataOrder('enrollment','*','','id','desc');
        $data['studentup']=$this->C_admin_model->SelectDataOrder('studentup','*','','id','desc');
        $data['course']=$this->C_admin_model->SelectDataOrder('course','*','','id','desc');
        $data['date']=$this->C_admin_model->get_date();
        $this->load->view("admin/studentsresult", $data);
        }else{
			redirect(base_url().'Admin', 'refresh');
		}
    }
	public function import_students(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','studentup');
			$this->load->view('admin/import_students');
			
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function uploadCsv(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$count = 0;
		$fp = fopen($_FILES['csvfile']['tmp_name'],'r') or die("can't open file");

		if (($handle = fopen($_FILES['csvfile']['tmp_name'], 'r')) !== FALSE)
		{

			while($csv_line = fgetcsv($fp,1024))
			{
				$count++;
				if($count == 1)
				{
					continue;
				}
				for($i = 0, $j = count($csv_line); $i < $j; $i++)
				{	               
	               $insert_csv = array();
	               $insert_csv['username'] = (!empty($csv_line[0])?$csv_line[0]:null);
	               $insert_csv['password'] = (!empty($csv_line[1])?$csv_line[1]:null);
	               $insert_csv['email'] = (!empty($csv_line[2])?$csv_line[2]:null);
	               $insert_csv['guardian_email'] = $csv_line[3];
	               $insert_csv['first_name'] = $csv_line[4];
                   $insert_csv['surname'] = $csv_line[5];
                   $insert_csv['city'] = $csv_line[6];
                   $insert_csv['country'] = $csv_line[7];

                   
	            }
	            $this->C_admin_model->SaveData('studentup',$insert_csv);
			}
		}
		redirect(base_url().'Admin/student_list');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}

	public function student_list($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','studentup');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('studentup', '*', array('id'=>$id));
			}
			$data['adm'] = $this->Rest_model->SelectDataOrder('studentup', '*', '','id','desc');
			$this->load->view('admin/student_list', $data);
			
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function add_student(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data = $this->input->post();
			$id = $this->input->post('id');
			if(isset($id)){
				$this->Rest_model->UpdateData('studentup', $data,array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('studentup', $data);
			}
			redirect(base_url().'Admin/student_list', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function delete_student($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('studentup', array('id'=>$id));
			redirect(base_url().'Admin/student_list', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function course_cat($id=NULL){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','main');
			if(isset($id)){
				$data['edit'] = $this->Rest_model->SelectData_1('course_cat', '*', array('id'=>$id));
			}
			$data['adm'] = $this->Rest_model->SelectDataOrder('course_cat', '*', '','id','desc');
			$this->load->view('admin/course_cat', $data);
			
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function add_course_cat(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$data = $this->input->post();
			$id = $this->input->post('id');
			if(isset($id)){
				$this->Rest_model->UpdateData('course_cat', $data,array('id'=>$id));
			}else{
				$this->Rest_model->SaveData('course_cat', $data);
			}
			redirect(base_url().'Admin/course_cat', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function delete_course_cat($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->Rest_model->DeleteData('course_cat', array('id'=>$id));
			redirect(base_url().'Admin/course_cat', 'refresh');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}

	public function import_quiz(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
			$this->session->set_userdata('menu','main');
			$data['subject']=  $this->C_admin_model->SelectData('subject','*','');
			$data['course']=  $this->C_admin_model->SelectData('course','*','');
			$this->load->view('admin/import_quiz', $data);
			
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}
	public function uploadCsv2(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$count = 0;
		$fp = fopen($_FILES['csvfile']['tmp_name'],'r') or die("can't open file");

		if (($handle = fopen($_FILES['csvfile']['tmp_name'], 'r')) !== FALSE)
		{

			while($csv_line = fgetcsv($fp,1024))
			{
				$count++;
				if($count == 1)
				{
					continue;
				}
				for($i = 0, $j = count($csv_line); $i < $j; $i++)
				{	               
	               $insert_csv = array();
	               $insert_csv['lesson_id'] = (!empty($csv_line[0])?$csv_line[0]:null);
	               $insert_csv['sub_id'] = (!empty($csv_line[1])?$csv_line[1]:null);
	               $insert_csv['question'] = $csv_line[2];
	               $insert_csv['answer'] = $csv_line[3];
	               $insert_csv['option_1'] = $csv_line[4];
                   $insert_csv['option_2'] = $csv_line[5];
                   $insert_csv['option_3'] = $csv_line[6];
                   $insert_csv['option_4'] = $csv_line[7];
                   $insert_csv['answer_explain'] = $csv_line[8];

                   
	            }
	            $this->C_admin_model->SaveData('quiz',$insert_csv);
			}
		}
		redirect(base_url().'Admin/quiz');
		}else{
			redirect(base_url().'Admin', 'refresh');
		}
	}

}
