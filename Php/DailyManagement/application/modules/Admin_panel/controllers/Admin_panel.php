<?php

class Admin_panel extends MX_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Rest_model');
		$this->load->library('session');
		$this->load->helper('text');

        $this->load->helper('cookie');
	}
	public function index()
	{  
        if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
            $d=$this->Rest_model->SelectData_1('admin_waps','*',array('email'=>$_COOKIE['email'], 'password'=>$_COOKIE['password']));
            if (!empty($d) && $d->status==1) {
            $userID =$this->session->set_userdata('userID',$d->id);
            redirect(base_url().'Admin_panel/dashboard','refresh');
                }
            }else{
                $this->load->view('sign_in');
              }
	}
	public function login(){
		$email=$this->input->post('email');
		$password = md5($this->input->post('password'));
        $remember = $this->input->post('rememberme');
		$d=$this->Rest_model->SelectData_1('admin_waps','*',array('email'=>$email, 'password'=>$password));
        // echo "<pre>"; print_r($email);
        // echo "<pre>"; print_r($d);
		if (!empty($d) && $d->status==1) {
			$userID =$this->session->set_userdata('userID',$d->id);
            if($remember != NULL){
                setcookie('email', $email, time() + (86400*30), "/");
                setcookie('password', $password, time() + (86400*30), "/");
            }
			redirect(base_url().'Admin_panel/dashboard','refresh');
		}else{
			redirect(base_url().'Admin_panel','refresh');
		}
	}
	public function user(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['adm'] = $this->Rest_model->SelectData('admin_waps', '*', '');
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
		// echo "<pre>";
		// print_r($data);
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
		// echo "<pre>";
		// print_r($data);
		$this->Rest_model->UpdateData('admin_waps', $data, array('id'=>$id));
		redirect(base_url().'Admin_panel/user', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
    public function purpose(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose', '*', array('userID'=>$userID),'id','desc');
        $this->load->view('Admin_panel/purpose', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_purpose($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->Rest_model->DeleteData('purpose', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/purpose', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_purpose(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $this->Rest_model->SaveData('purpose', $data);
        redirect(base_url().'Admin_panel/purpose');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function edit_purpose($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['s'] =$this->Rest_model->SelectData_1('purpose','*',array('id'=>$id, 'userID'=>$userID));
        $this->load->view('Admin_panel/edit_purpose', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_purpose(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $this->Rest_model->UpdateData('purpose', $data, array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/purpose', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
	public function dashboard()
	{
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		
        $session['menu']='home';
        $this->session->set_userdata($session);
        $data['balance'] = $this->Admin_model->sumExpense($userID);
        $data['todayExpense'] = $this->Admin_model->todayExpense($userID);
        $data['yesterdayExpense'] = $this->Admin_model->yesterdayExpense($userID);
        $data['lastWeekExpense'] = $this->Admin_model->lastWeekExpense($userID);
        $data['lastMonthExpense'] = $this->Admin_model->lastMonthExpense($userID);
        $data['lastYearExpense'] = $this->Admin_model->lastYearExpense($userID);
        $data['thisMonthExpense'] = $this->Admin_model->thisMonthExpense($userID);
        $data['totalExpense'] = $this->Admin_model->totalExpense($userID);
        $data['totalEarn'] = $this->Admin_model->totalEarn($userID);
        $data['currentLendBalanceSum'] = $this->Admin_model->currentLendBalanceSum($userID);
        $data['currentBorrowBalanceSum'] = $this->Admin_model->currentBorrowBalanceSum($userID);
        $data['currentBalance'] = $this->Rest_model->SelectData_1('balance','*', array('id'=>$userID));
        $data['task'] = $this->Rest_model->SelectDataOrder_1('task','*',array('userID'=>$userID),'id','desc','6');
        // echo "<pre>";
        // print_r($data['thisMonthExpense']);
		$this->load->view('index', $data);
    }
		else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
    public function expense(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['expense'] = $this->Admin_model->get_exPurpose($userID);
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose', '*', array('userID'=>$userID, 'type'=>"Expense Purpose"),'id','desc');
        $this->load->view('Admin_panel/expense', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_expense($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $dd = $this->Rest_model->SelectData_1('expense','*',array('id'=>$id));
        $this->Admin_model->lendbalanceUpdate2($dd->exAmount, $userID);
        $this->Admin_model->expensebalanceUpdate($dd->exAmount, $userID);
        $this->Rest_model->DeleteData('expense', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/expense', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_expense(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $date = date('Y-m-d');
        if($data['exDate']!=''){
            $data['exDate'] = $data['exDate'];
        }else{
            $data['exDate'] = $date;
        }
        $time = date('h:i a');
        $data['exTime'] = $time;
        $this->Rest_model->SaveData('expense', $data);
        $this->Admin_model->currentbalanceUpdate($data['exAmount'], $userID);
        $sumExpense = $this->Admin_model->sumExpense($userID);
        $da['expenseTotal'] = $sumExpense->exAmount;
        $this->Rest_model->UpdateData('balance', $da, array('userID'=>$userID));
        redirect(base_url().'Admin_panel/expense');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_expense(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $pd = $this->Rest_model->SelectData_1('expense','*',array('id'=>$data['id']));
        $this->Admin_model->lendbalanceUpdate2($pd->exAmount, $userID);
        // echo "<pre>"; print_r($data);
        $date = date('Y-m-d');
        if($data['exDate']!=''){
            $data['exDate'] = $data['exDate'];
        }else{
            $data['exDate'] = $date;
        }
        $time = date('h:i a');
        $data['exTime'] = $time;
        $this->Rest_model->UpdateData('expense', $data, array('id'=>$id, 'userID'=>$userID));
        $this->Admin_model->lendbalanceUpdate($data['exAmount'], $userID);
        $sumExpense = $this->Admin_model->sumExpense($userID);
        $da['expenseTotal'] = $sumExpense->exAmount;
        $this->Rest_model->UpdateData('balance', $da, array('userID'=>$userID));
        redirect(base_url().'Admin_panel/expense', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function expense_list(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['expense'] = $this->Admin_model->get_exGroupPurpose($userID);
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose', '*', array('userID'=>$userID, 'type'=>"Expense Purpose"),'id','desc');
        $this->load->view('Admin_panel/expense_list', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function expense_dateWise($date){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['expense'] = $this->Admin_model->get_exDatePurpose($userID, $date);
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose', '*', array('userID'=>$userID, 'type'=>"Expense Purpose"),'id','desc');
        $this->load->view('Admin_panel/expense_list', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function earn(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['earn'] = $this->Admin_model->get_erPurpose($userID);
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose', '*', array('userID'=>$userID, 'type'=>"Earn Purpose"),'id','desc');
        $this->load->view('Admin_panel/earn', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_earn($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $dd = $this->Rest_model->SelectData_1('earn','*',array('id'=>$id, 'userID'=>$userID));
        $this->Admin_model->lendbalanceUpdate($dd->eAmount, $userID);
        $this->Rest_model->DeleteData('earn', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/earn', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_earn(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $date = date('Y-m-d');
        if($data['eDate']!=''){
            $data['eDate'] = $data['eDate'];
        }else{
            $data['eDate'] = $date;
        }
        $time = date('h:i a');
        $data['eTime'] = $time;
        // echo "<pre>"; print_r($data['eAmount']);
        $this->Rest_model->SaveData('earn', $data);
        $this->Admin_model->lendbalanceUpdate2($data['eAmount'], $userID);
        redirect(base_url().'Admin_panel/earn');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_earn(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['eDate']!=''){
            $data['eDate'] = $data['eDate'];
        }else{
            $data['eDate'] = $date;
        }

        $time = date('h:i a');
        $data['eTime'] = $time;
        $this->Rest_model->UpdateData('earn', $data, array('id'=>$id, 'userID'=>$userID));
        $sumEarn = $this->Admin_model->sumEarn($userID);
        $da['earnTotal'] = $sumEarn->eAmount;
        $this->Rest_model->UpdateData('balance', $da, array('userID'=>$userID));
        redirect(base_url().'Admin_panel/earn', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function borrow(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $this->load->view('Admin_panel/borrow', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_borrow($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $dd = $this->Rest_model->SelectData_1('borrow','*',array('id'=>$id));
        // echo "<pre>";
        // print_r($dd);
            $this->Admin_model->borrowbalanceUpdate($dd->borrowGive, $userID);
            $this->Admin_model->borrowbalanceUpdate2($dd->borrowAmount, $userID);
        $this->Rest_model->DeleteData('borrow', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/borrow', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_borrow(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $date = date('Y-m-d');
        if($data['bDate']!=''){
            $data['bDate'] = $data['bDate'];
        }else{
            $data['bDate'] = $date;
        }
        $data['borrowBalance'] = $data['borrowAmount'];
        $this->Rest_model->SaveData('borrow', $data);
        $this->Admin_model->borrowbalanceUpdate($data['borrowAmount'], $userID);
        redirect(base_url().'Admin_panel/borrow');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_borrow(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $da = $this->Rest_model->SelectData_1('borrow','*',array('id'=>$id, 'userID'=>$userID));
        $this->Admin_model->borrowbalanceUpdate2($da->borrowAmount, $userID);
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['bDate']!=''){
            $data['bDate'] = $data['bDate'];
        }else{
            $data['bDate'] = $date;
        }
        $data['borrowBalance'] = $data['borrowAmount'];
        $this->Rest_model->UpdateData('borrow', $data, array('id'=>$id, 'userID'=>$userID));
        $this->Admin_model->borrowbalanceUpdate($data['borrowAmount'], $userID);
        redirect(base_url().'Admin_panel/borrow', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function borrow_back(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['hdate']!=''){
            $data['hdate'] = $data['hdate'];
        }else{
            $data['hdate'] = $date;
        }

        $dd = $this->Rest_model->SelectData_1('borrow','*',array('id'=>$data['borrowId']));
        if($data['hamount'] > $dd->borrowBalance){
            $this->session->set_flashdata('item','The amount must be less than borrow balance');
            redirect(base_url().'Admin_panel/borrow');
        }else{
            $this->Rest_model->SaveData('borrowlendhistory', $data);
            $this->Admin_model->borrowbalanceUpdate2($data['hamount'], $userID);
            $this->Admin_model->borrowbalanceRemain($data['hamount'], $userID, $data['borrowId']);
            $this->Admin_model->borrowbalanceReturn($data['hamount'], $userID, $data['borrowId']);
            redirect(base_url().'Admin_panel/borrow');
        }
        
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    
    public function lend(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['lend'] = $this->Rest_model->SelectDataOrder('lend','*',array('userID'=>$userID),'id','desc');
        $this->load->view('Admin_panel/lend', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_lend($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $dd = $this->Rest_model->SelectData_1('lend','*',array('id'=>$id));
            $this->Admin_model->lendbalanceUpdate($dd->lendReturn, $userID);
            $this->Admin_model->lendbalanceUpdate2($dd->lendAmount, $userID);
            // echo "<pre>";
            // print_r($dd);
        $this->Rest_model->DeleteData('lend', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/lend', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_lend(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $date = date('Y-m-d');
        if($data['lDate']!=''){
            $data['lDate'] = $data['lDate'];
        }else{
            $data['lDate'] = $date;
        }
        $data['lendBalance'] = $data['lendAmount'];
        $this->Rest_model->SaveData('lend', $data);
        $this->Admin_model->lendbalanceUpdate($data['lendAmount'], $userID);
        redirect(base_url().'Admin_panel/lend');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_lend(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $da = $this->Rest_model->SelectData_1('lend','*',array('id'=>$id, 'userID'=>$userID));
        $this->Admin_model->lendbalanceUpdate2($da->lendAmount, $userID);
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['lDate']!=''){
            $data['lDate'] = $data['lDate'];
        }else{
            $data['lDate'] = $date;
        }
        $data['lendBalance'] = $data['lendAmount'];
        $this->Rest_model->UpdateData('lend', $data, array('id'=>$id, 'userID'=>$userID));
        $this->Admin_model->lendbalanceUpdate($data['lendAmount'], $userID);
        redirect(base_url().'Admin_panel/lend', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function lend_back(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['hdate']!=''){
            $data['hdate'] = $data['hdate'];
        }else{
            $data['hdate'] = $date;
        }
        $dd = $this->Rest_model->SelectData_1('lend','*',array('id'=>$data['lendId']));
        if($data['hamount'] > $dd->lendBalance){
            $this->session->set_flashdata('item','The amount must be less than lend balance');
            redirect(base_url().'Admin_panel/lend');
        }else{
            $this->Rest_model->SaveData('borrowlendhistory', $data);
            $this->Admin_model->lendbalanceUpdate2($data['hamount'], $userID);
            $this->Admin_model->lendbalanceRemain($data['hamount'], $userID, $data['lendId']);
            $this->Admin_model->lendbalanceReturn($data['hamount'], $userID, $data['lendId']);
            redirect(base_url().'Admin_panel/lend');
        }
        // echo "<pre>"; print_r($dd->lendBalance);
        
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function task(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['task'] = $this->Rest_model->SelectDataOrder('task','*',array('userID'=>$userID),'id','desc');
        $this->load->view('Admin_panel/task', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function taskList(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['task'] = $this->Rest_model->SelectDataOrder('task','*',array('userID'=>$userID),'id','desc');
        // echo "<pre>";print_r($data['task']);
        $this->load->view('Admin_panel/task_list', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function taskListStatus($stat){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $status = str_replace('_', ' ', $stat);
        $data['task'] = $this->Rest_model->SelectDataOrder('task','*',array('userID'=>$userID,'taskComplete'=>$status),'id','desc');
        // echo "<pre>";print_r($dd);
        $this->load->view('Admin_panel/task_list', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_task($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->Rest_model->DeleteData('task', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/taskList', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_task(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $date = date('Y-m-d');
        if($data['startDate']!=''){
            $data['startDate'] = $data['startDate'];
        }else{
            $data['startDate'] = $date;
        }
        $this->Rest_model->SaveData('task', $data);
        redirect(base_url().'Admin_panel/taskList');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_task(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['startDate']!=''){
            $data['startDate'] = $data['startDate'];
        }else{
            $data['startDate'] = $date;
        }
        $this->Rest_model->UpdateData('task', $data, array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/taskList', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_taskStatus(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $this->Rest_model->UpdateData('task', $data, array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/taskList', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }

    public function taskcalender(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->load->view('Admin_panel/taskcalender');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function taskDetails($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['s'] = $this->Rest_model->SelectData_1('task','*', array('id'=>$id, 'userID'=>$userID));
        $this->load->view('Admin_panel/taskDetails', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function diary(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['diary'] = $this->Rest_model->SelectDataOrder('diary','*',array('userID'=>$userID),'id','desc');
        $this->load->view('Admin_panel/diary', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function diaryList(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['diary'] = $this->Rest_model->SelectDataOrder('diary','*',array('userID'=>$userID),'id','desc');
        $this->load->view('Admin_panel/diary_list', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function delete_diary($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->Rest_model->DeleteData('diary', array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/diaryList', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function add_diary(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data= $this->input->post();
        $date = date('Y-m-d');
        if($data['dDate']!=''){
            $data['dDate'] = $data['dDate'];
        }else{
            $data['dDate'] = $date;
        }
        $this->Rest_model->SaveData('diary', $data);
        redirect(base_url().'Admin_panel/diaryList');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function update_diary(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $date = date('Y-m-d');
        if($data['dDate']!=''){
            $data['dDate'] = $data['dDate'];
        }else{
            $data['dDate'] = $date;
        }
        $this->Rest_model->UpdateData('diary', $data, array('id'=>$id, 'userID'=>$userID));
        redirect(base_url().'Admin_panel/diaryList', 'refresh');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function diarycalender(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->load->view('Admin_panel/diarycalender');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function diaryDetails($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['s'] = $this->Rest_model->SelectData_1('diary','*', array('id'=>$id, 'userID'=>$userID));
        $this->load->view('Admin_panel/diaryDetails', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function calculator(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->load->view('Admin_panel/calculator');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function chartview(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->load->view('Admin_panel/chart');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reports(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $this->load->view('Admin_panel/reportsearch');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reportsByDate(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data = $this->input->post();
        if(empty($data)){
            redirect(base_url().'Admin_panel/reports', 'refresh');
        }else{
        $data['expenseReport'] = $this->Admin_model->dateReportExpense($data['startDate'], $data['endDate'], $userID);
        $data['earnReport'] = $this->Admin_model->dateReportEarn($data['startDate'], $data['endDate'], $userID);
        $data['expenseReportSum'] = $this->Admin_model->dateReportExpenseSum($data['startDate'], $data['endDate'], $userID);
        $data['earnReportSum'] = $this->Admin_model->dateReportEarnSum($data['startDate'], $data['endDate'], $userID);
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose','*',array('userID'=>$userID),'id','desc');
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $data['borrowReport'] = $this->Admin_model->dateReportBorrow($data['startDate'], $data['endDate'], $userID);
        $data['dateReportBorrowAmountSum'] = $this->Admin_model->dateReportBorrowAmountSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportBorrowBalanceSum'] = $this->Admin_model->dateReportBorrowBalanceSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportBorrowGiveSum'] = $this->Admin_model->dateReportBorrowGiveSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLend'] = $this->Admin_model->dateReportLend($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLendAmountSum'] = $this->Admin_model->dateReportLendAmountSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLendBalanceSum'] = $this->Admin_model->dateReportLendBalanceSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLendGiveSum'] = $this->Admin_model->dateReportLendGiveSum($data['startDate'], $data['endDate'], $userID);
        // echo "<pre>"; print_r($data['dateReportBorrowBalanceSum']);
        $this->load->view('Admin_panel/reports', $data);}

        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reportsPrintByDate(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data = $this->input->post();
        if(empty($data)){
            redirect(base_url().'Admin_panel/reports', 'refresh');
        }else{
        $data['expenseReport'] = $this->Admin_model->dateReportExpense($data['startDate'], $data['endDate'], $userID);
        $data['earnReport'] = $this->Admin_model->dateReportEarn($data['startDate'], $data['endDate'], $userID);
        $data['expenseReportSum'] = $this->Admin_model->dateReportExpenseSum($data['startDate'], $data['endDate'], $userID);
        $data['earnReportSum'] = $this->Admin_model->dateReportEarnSum($data['startDate'], $data['endDate'], $userID);
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose','*',array('userID'=>$userID),'id','desc');
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $data['borrowReport'] = $this->Admin_model->dateReportBorrow($data['startDate'], $data['endDate'], $userID);
        $data['dateReportBorrowAmountSum'] = $this->Admin_model->dateReportBorrowAmountSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportBorrowBalanceSum'] = $this->Admin_model->dateReportBorrowBalanceSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportBorrowGiveSum'] = $this->Admin_model->dateReportBorrowGiveSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLend'] = $this->Admin_model->dateReportLend($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLendAmountSum'] = $this->Admin_model->dateReportLendAmountSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLendBalanceSum'] = $this->Admin_model->dateReportLendBalanceSum($data['startDate'], $data['endDate'], $userID);
        $data['dateReportLendGiveSum'] = $this->Admin_model->dateReportLendGiveSum($data['startDate'], $data['endDate'], $userID);
        // echo "<pre>"; print_r($data['dateReportBorrowBalanceSum']);
        $this->load->view('Admin_panel/reportprint', $data);
        }
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reportsPrintByMonth(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data = $this->input->post();
        $monthYear = $data['monthYear'];
        if(empty($data)){
            redirect(base_url().'Admin_panel/reports', 'refresh');
        }else{
        // $data['monthYear'] = $monthYear;
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose','*',array('userID'=>$userID),'id','desc');
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $data['expenseReport'] = $this->Admin_model->monthReportExpense($monthYear, $userID);
        $data['expenseReportSum'] = $this->Admin_model->monthReportExpenseSum($monthYear, $userID);
        $data['earnReportSum'] = $this->Admin_model->monthReportEarnSum($monthYear, $userID);
        $data['earnReport'] = $this->Admin_model->monthReportEarn($monthYear, $userID);
        $data['borrowReport'] = $this->Admin_model->monthReportBorrow($monthYear, $userID);
        $data['dateReportBorrowAmountSum'] = $this->Admin_model->monthReportBorrowAmountSum($monthYear, $userID);
        $data['dateReportBorrowBalanceSum'] = $this->Admin_model->monthReportBorrowBalanceSum($monthYear, $userID);
        $data['dateReportBorrowGiveSum'] = $this->Admin_model->monthReportBorrowGiveSum($monthYear, $userID);
        $data['dateReportLend'] = $this->Admin_model->monthReportLend($monthYear, $userID);
        $data['dateReportLendAmountSum'] = $this->Admin_model->monthReportLendAmountSum($monthYear, $userID);
        $data['dateReportLendBalanceSum'] = $this->Admin_model->monthReportLendBalanceSum($monthYear, $userID);
        $data['dateReportLendGiveSum'] = $this->Admin_model->monthReportLendGiveSum($monthYear, $userID);
        // echo "<pre>"; print_r($monthYear);}
        $this->load->view('Admin_panel/reportprint', $data);}
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reportsByMonth(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data = $this->input->post();
        $monthYear = $data['year'].'-'.$data['month'];
        if(empty($data)){
            redirect(base_url().'Admin_panel/reports', 'refresh');
        }else{
        $data['monthYear'] = $monthYear;
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose','*',array('userID'=>$userID),'id','desc');
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $data['expenseReport'] = $this->Admin_model->monthReportExpense($monthYear, $userID);
        $data['expenseReportSum'] = $this->Admin_model->monthReportExpenseSum($monthYear, $userID);
        $data['earnReportSum'] = $this->Admin_model->monthReportEarnSum($monthYear, $userID);
        $data['earnReport'] = $this->Admin_model->monthReportEarn($monthYear, $userID);
        $data['borrowReport'] = $this->Admin_model->monthReportBorrow($monthYear, $userID);
        $data['dateReportBorrowAmountSum'] = $this->Admin_model->monthReportBorrowAmountSum($monthYear, $userID);
        $data['dateReportBorrowBalanceSum'] = $this->Admin_model->monthReportBorrowBalanceSum($monthYear, $userID);
        $data['dateReportBorrowGiveSum'] = $this->Admin_model->monthReportBorrowGiveSum($monthYear, $userID);
        $data['dateReportLend'] = $this->Admin_model->monthReportLend($monthYear, $userID);
        $data['dateReportLendAmountSum'] = $this->Admin_model->monthReportLendAmountSum($monthYear, $userID);
        $data['dateReportLendBalanceSum'] = $this->Admin_model->monthReportLendBalanceSum($monthYear, $userID);
        $data['dateReportLendGiveSum'] = $this->Admin_model->monthReportLendGiveSum($monthYear, $userID);
        // echo "<pre>"; print_r($data['earnReport']);}
        $this->load->view('Admin_panel/reports', $data);}
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reportsPrintByYear(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data = $this->input->post();
        $year = $data['year'];
        if(empty($data)){
            redirect(base_url().'Admin_panel/reports', 'refresh');
        }else{
        // $data['monthYear'] = $monthYear;
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose','*',array('userID'=>$userID),'id','desc');
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $data['expenseReport'] = $this->Admin_model->yearReportExpense($year, $userID);
        $data['expenseReportSum'] = $this->Admin_model->yearReportExpenseSum($year, $userID);
        $data['earnReportSum'] = $this->Admin_model->yearReportEarnSum($year, $userID);
        $data['earnReport'] = $this->Admin_model->yearReportEarn($year, $userID);
        $data['borrowReport'] = $this->Admin_model->yearReportBorrow($year, $userID);
        $data['dateReportBorrowAmountSum'] = $this->Admin_model->yearReportBorrowAmountSum($year, $userID);
        $data['dateReportBorrowBalanceSum'] = $this->Admin_model->yearReportBorrowBalanceSum($year, $userID);
        $data['dateReportBorrowGiveSum'] = $this->Admin_model->yearReportBorrowGiveSum($year, $userID);
        $data['dateReportLend'] = $this->Admin_model->yearReportLend($year, $userID);
        $data['dateReportLendAmountSum'] = $this->Admin_model->yearReportLendAmountSum($year, $userID);
        $data['dateReportLendBalanceSum'] = $this->Admin_model->yearReportLendBalanceSum($year, $userID);
        $data['dateReportLendGiveSum'] = $this->Admin_model->yearReportLendGiveSum($year, $userID);
        // echo "<pre>"; print_r($data['earnReport']);}
        $this->load->view('Admin_panel/reportprint', $data);}
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function reportsByYear(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data = $this->input->post();
        $year = $data['year'];
        if(empty($data)){
            redirect(base_url().'Admin_panel/reports', 'refresh');
        }else{
        // $data['monthYear'] = $monthYear;
        $data['purpose'] = $this->Rest_model->SelectDataOrder('purpose','*',array('userID'=>$userID),'id','desc');
        $data['borrow'] = $this->Rest_model->SelectDataOrder('borrow','*',array('userID'=>$userID),'id','desc');
        $data['expenseReport'] = $this->Admin_model->yearReportExpense($year, $userID);
        $data['expenseReportSum'] = $this->Admin_model->yearReportExpenseSum($year, $userID);
        $data['earnReportSum'] = $this->Admin_model->yearReportEarnSum($year, $userID);
        $data['earnReport'] = $this->Admin_model->yearReportEarn($year, $userID);
        $data['borrowReport'] = $this->Admin_model->yearReportBorrow($year, $userID);
        $data['dateReportBorrowAmountSum'] = $this->Admin_model->yearReportBorrowAmountSum($year, $userID);
        $data['dateReportBorrowBalanceSum'] = $this->Admin_model->yearReportBorrowBalanceSum($year, $userID);
        $data['dateReportBorrowGiveSum'] = $this->Admin_model->yearReportBorrowGiveSum($year, $userID);
        $data['dateReportLend'] = $this->Admin_model->yearReportLend($year, $userID);
        $data['dateReportLendAmountSum'] = $this->Admin_model->yearReportLendAmountSum($year, $userID);
        $data['dateReportLendBalanceSum'] = $this->Admin_model->yearReportLendBalanceSum($year, $userID);
        $data['dateReportLendGiveSum'] = $this->Admin_model->yearReportLendGiveSum($year, $userID);
        // echo "<pre>"; print_r($data['earnReport']);}
        $this->load->view('Admin_panel/reports', $data);}
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
	public function signout(){
		session_destroy();
        setcookie('email', '', time()+120, "/");
        setcookie('password','' , time()+120, "/");
        // unset($_COOKIE['email']);
        // unset($_COOKIE['password']);
		redirect(base_url().'Admin_panel','refresh');
	}
    public function blank(){
        $this->load->view('Admin_panel/blank');
        
    }
    
    public function profile(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['s'] = $this->Rest_model->SelectData_1('admin_waps', '*', array('id'=>$userID));
        $this->load->view('Admin_panel/profile', $data);
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }   
    }

    public function check_email(){
        
        $email = $this->input->post('val');
        $data = $this->Rest_model->SelectData_1('admin_waps','*',array('email'=>$email));
        echo json_encode($data);
    }
    public function profileUpdate(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);


        $this->load->library('image_lib');
        $config_1['image_library'] = 'gd2';
        $config_1['create_thumb'] = FALSE;
        $config_1['maintain_ratio'] = FALSE;
        $config_1['width']         = 136;
        $config_1['height']       = 136;

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['image'] = $data2['upload_data']['file_name'];
            $config_1['source_image'] = 'uploads/'.$data2['upload_data']['file_name'];
            $this->image_lib->initialize($config_1); 
            $this->image_lib->resize();

            $qq=$this->Rest_model->SelectData_1('admin_waps','*',array('id'=>$id));
            if($qq->image !== ''){unlink('uploads/'.$qq->image);}
        }
        $this->Rest_model->UpdateData('admin_waps', $data, array('id'=>$userID));
        redirect(base_url().'Admin_panel/profile');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function changePassword(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $data['password'] = md5($this->input->post('password'));
        $this->Rest_model->UpdateData('admin_waps', $data, array('id'=>$userID));
        redirect(base_url().'Admin_panel/profile');
        }else{
            redirect(base_url().'Admin_panel', 'refresh');
        }
    }
    public function register(){
        $data= $this->input->post();
        $data['password'] = md5($this->input->post('password'));
        // $d = $this->Rest_model->SelectDataOrder_1('admin_waps','*','','id','desc',1);
        // echo "<pre>";
        // print_r($data);
        $this->Rest_model->SaveData('admin_waps', $data);
        $d = $this->Rest_model->SelectDataOrder_1('admin_waps','*','','id','desc',1);
        $dd['userId'] = $d[0]->id;
        $dd['expenseTotal'] = 0;
        $dd['earnTotal'] = 0;
        $this->Rest_model->SaveData('balance', $dd);
        redirect(base_url().'Admin_panel/dashboard');
    }
    public function forgot_password(){
        $this->load->view('Admin_panel/forgot_password');
       
    }
    public function request_password(){
        $email = $this->input->post('email');
        $d=$this->Rest_model->SelectData_1('admin_waps','*',array('email'=>$email));
        // echo "<pre>";
        // print_r($d);
        if(!empty($d)){
             $random = md5(uniqid(rand(), true));
             $link =  base_url().'Admin_panel/recoverpassword/'.$random;
                $date = date("Y-m-d h:i:sa");
                $strtime=strtotime("+2 days");
                $upmin =  date("Y-m-d h:i:sa", $strtime);
             $message = 'Please click the above link within 7 min '.$link;
             $subject = 'Password Recovery';
             $from_email = "info@wapssolution.com"; 
             $this->load->library('email');
            $this->email->from($from_email, 'Waps Solution');
            $this->email->to($email);
    
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()) {
            $data['templink'] = $random;
            $data['requesttime'] = $date;
            $data['validtime'] = $upmin;
            $this->Rest_model->UpdateData('admin_waps', $data, array('email'=>$email));
            $this->session->set_flashdata('item','Please check your email.');
            redirect(base_url().'Admin_panel/forgot_password');
            }else{
            $this->session->set_flashdata('item','Your are not Register.');
            redirect(base_url().'Admin_panel/forgot_password');
            }
        }else{
            $this->session->set_flashdata('item','Your are not Register.');
            redirect(base_url().'Admin_panel/forgot_password');
        }
    }
    public function recoverpassword($temp){
        $d=$this->Rest_model->SelectData_1('admin_waps','*',array('templink'=>$temp));
        $validtime = date("Y-m-d h:i:sa");
        if($d->validtime > $validtime){
            $this->load->view('Admin_panel/recoverpassword', $d);
        }else{
            $this->session->set_flashdata('item','Your time is passed.');
            redirect(base_url().'Admin_panel/forgot_password');
        }
       
    }
    
    public function resetpassword(){
        $id = $this->input->post('id');
        $data['password'] = md5($this->input->post('password'));
        $this->Rest_model->UpdateData('admin_waps', $data, array('id'=>$id));
        redirect(base_url().'Admin_panel');
       
    }
    
    public function corn_job(){
        $date = date("Y-m-d");
        $dd = $this->Rest_model->SelectData('task', '*', array('startDate'=> $date));
        if(!empty($dd)){
        $emailfinder = $this->Rest_model->SelectData_1('admin_waps','*',array('id'=>$dd[0]->userId));
        // echo "<pre>";
        // print_r($dd) ;
        foreach ($dd as $d){
            // print_r($d->title) ;
            $message = $d->taskBreif;
             $subject = $d->title;
             $from_email = "info@wapssolution.com"; 
             $this->load->library('email');
            $this->email->from($from_email, 'Waps Solution');
            $this->email->to($emailfinder->email);
    
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
        }
        // $message = $dd[0]->taskBreif;
        //      $subject = $dd[0]->title;
        //      $from_email = "info@wapssolution.com"; 
        //      $this->load->library('email');
        //     $this->email->from($from_email, 'Waps Solution');
        //     $this->email->to($emailfinder->email);
    
        //     $this->email->subject($subject);
        //     $this->email->message($message);
        //     $this->email->send();
            
            
        }
       
    }
    public function sign_up(){
        $this->load->view('Admin_panel/sign_up');
       
    }
    public function table(){
        $this->load->view('Admin_panel/table');
       
    }

}
?>