<?php

/**
	 * 
	 */
	class Front extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
        	$this->load->model('C_admin_model');
            $this->load->model('Admin_model');
		}

		public function index(){
        $data['sub']=$this->C_admin_model->SelectData('course_cat','*','');
        $this->load->view('front/index',$data);
    }
    public function contact(){
    	$this->load->view('front/contact');
    }
    public function about(){
    	$this->load->view('front/about');
    }
    // public function login(){
    // 	$user['email']=$this->input->post('username');
    //     $user['password']=$this->input->post('password');
    //     $d=$this->C_admin_model->SelectData_1('studentup','*',$where);
    // }
    public function signup(){
    	$this->load->view('front/signup');
    }
    public function login_check(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $where=array('email'=>$email,'password'=>$password);
        $d=$this->C_admin_model->SelectData_1('studentup','*',$where);
        if($d!=null){
            //$d['stdID']=$d->id;

            $r=$d->id;
            $ds['stdID']=$r;
            $ds['photo']=$d->photo;
            $ds['name']=$d->name;
            $this->session->set_userdata($ds);
            redirect(base_url(),'refresh');
        }else{
            $this->session->set_flashdata('login', '<strong>Error !</strong> Invalid Login Information ! Please try again.');
            redirect(base_url(),'refresh');
        }
        
    }
    public function signup_post(){
        $data=$this->input->post();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|mp4';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 10000000000000000;
        $config['max_width'] = 1024000000000000;
        $config['max_height'] = 7680000000000000;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['photo'] = $data2['upload_data']['file_name'];
        }
        $this->C_admin_model->SaveData('studentup',$data);
        $id=$this->db->insert_id();
        $data['stdID']=$id;
        $this->session->set_userdata($data);
        redirect(base_url().'Front/profile','refresh');
    }
    public function profile(){
        $d=$this->session->userdata('stdID');
        $where=array('id'=>$d);
        $data['sub']=$this->C_admin_model->SelectData('subject','*','');
        $data['course']=$this->C_admin_model->SelectData('course','*','');
        $data['enrollment']=$this->C_admin_model->SelectData('enrollment','*',array('std_id'=>$d, 'published'=>'yes'));
        $data['p']=$this->C_admin_model->SelectData_1('studentup','*',$where);
        $this->load->view('front/profile',$data);
    }
    public function take_quiz($id){
        $std=$this->session->userdata('stdID');
        $qq=$this->C_admin_model->SelectData('enrollment','*',array('course_id'=>$id,'std_id'=>$std));
        if(empty($qq)){
            $ds['course_id']=$id;
            $ds['std_id']=$this->session->userdata('stdID');
            $ds['status']='no';
            $ds['date']=date('d/m/Y');
            $this->C_admin_model->SaveData('enrollment',$ds);
            $where=array('id'=>$id);
            $r=$this->C_admin_model->SelectData_1('course','*',$where);
            $data['l']=$r;
            $where=array('lesson_id'=>$id);
            $data['quiz']=$this->C_admin_model->SelectData('quiz','*',$where);
            $data['subject']=$this->C_admin_model->SelectData('course','*',array('subject'=>$r->subject));
            $this->load->view('front/quiz',$data);
        }else{
            redirect(base_url(),'refresh');
        }

    }
    function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    public function take_quiz2($id){
        $std=$this->session->userdata('stdID');
        $qq=$this->C_admin_model->SelectData('enrollment','*',array('course_id'=>$id,'std_id'=>$std));
        $rr=$this->C_admin_model->SelectData_1('course','*',array('id'=>$id));
        $q = count($qq);
        $data['rand'] = $this->generateRandomString();
        // echo $rand;
        if($q <= $rr->howmuchtime){
            $ds['course_id']=$id;
            $ds['std_id']=$this->session->userdata('stdID');
            $ds['status']='no';
            $ds['date']=date('d/m/Y');
            $ds['enroll_id']=$data['rand'];
            $this->C_admin_model->SaveData('enrollment',$ds);
            $where=array('id'=>$id);
            $r=$this->C_admin_model->SelectData_1('course','*',$where);
            $data['l']=$r;
            $where=array('lesson_id'=>$id);
            $data['quiz'] = $this->Admin_model->quiztest($id, $r->totalquestion);
            $data['subject']=$this->C_admin_model->SelectData('course','*',array('subject'=>$r->subject));
            $this->load->view('front/quiz2',$data);
        }else{
            redirect(base_url(),'refresh');
        }

    }
    public function check_answer(){
        $correct=0;
        $r=0;
        $enroll_id = $this->input->post('enroll_id');
        $count=$this->input->post('quiz_id');
        $data['std_id']=$this->session->userdata('stdID');
        $rand = $this->generateRandomString();
        foreach ($count as $key => $value) {
            $r+=1;
            $data['quiz_id']=$value;
            $data['enroll_id'] = $enroll_id;
            $data['answer']=$this->input->post('answer'.++$key);
            $this->C_admin_model->SaveData('answer',$data);
            
            $dd['sub']['an'][$key]=$data['answer'];

            $w=array('q_id'=>$value);
            $an=$this->C_admin_model->SelectData_1('quiz','*',$w);
            if($data['answer']==$an->answer){
                $correct+=1;
            }
        }
        $io=$this->input->post('l_id');
        $where=array('id'=>$io);
        $dd['l']=$this->C_admin_model->SelectData_1('course','*',$where);
        $dd['correct']=$correct;
        $dd['num']=$r;
        $where=array('lesson_id'=>$io);
        $dd['qu']=$this->C_admin_model->SelectData('quiz','*',$where);
        $dd['an']=$count;
        $dd['subject']=$this->C_admin_model->SelectData('course','*','');
        // echo "<pre>";
        // print_r($data);
        // $this->load->view('front/result',$dd);
        redirect(base_url().'Front/welcome','refresh');
    }
    public function welcome(){
        $this->load->view('front/welcome');
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url(),'refresh');
    }
    public function books(){
        $data['books']=$this->C_admin_model->SelectData('books','*','');
        $data['subject']=$this->C_admin_model->get_book_subject();
        $this->load->view('front/books',$data);
    }
    public function search_book($sub){
        $where=array('subject'=>$sub);
        $data['books']=$this->C_admin_model->SelectData('books','*',$where);
        $data['subject']=$this->C_admin_model->get_book_subject();
        $this->load->view('front/books_search',$data);
    }
    public function events($id){
        if($id=='all'){
            $data['main']=$this->C_admin_model->SelectDataOrderLimit('event','*','','id','desc','1');
        $data['events']=$this->C_admin_model->get_events();
    }else{
        $where=array('id'=>$id);
        $data['main']=$this->C_admin_model->SelectDataOrder('event','*',$where,'id','desc');
        $data['events']=$this->C_admin_model->get_events_1($id);
    }
        
        $this->load->view('front/events',$data);
    }
    public function modules($id){
        $data['sub']=$this->C_admin_model->SelectData_1('subject','*',array('id'=>$id));
        $data['query']=$this->C_admin_model->SelectData('course','*',array('subject'=>$id));
        $this->load->view('front/modules',$data);
    }
    public function subject($id){
        $data['course']=$this->C_admin_model->SelectData_1('course_cat','*',array('id'=>$id));
        $data['sub']=$this->C_admin_model->SelectData('subject','*',array('cId'=>$id));
        $this->load->view('front/subject',$data);
    }
    public function result($id){
        $data['sub']=$this->C_admin_model->get_sub1($id);
        $data['quiz']=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$id));
        // echo "<pre>"; print_r($data['sub']);
        $this->load->view('front/result_view',$data);
    }


    public function result2($enrol){
        $data['en'] = $this->C_admin_model->SelectData_1('enrollment','*',array('enroll_id'=>$enrol));
        $data['st'] = $this->C_admin_model->SelectData_1('studentup','*',array('id'=>$data['en']->std_id));
        $data['quiz']=$this->C_admin_model->SelectData('quiz','*',array('lesson_id'=>$data['en']->course_id));
        $data['course'] = $this->C_admin_model->SelectData('course','*','');
        $data['answer'] = $this->C_admin_model->SelectData('answer','*',array('enroll_id'=>$enrol));
        $this->load->view("front/result2", $data);

    }

	}

?>