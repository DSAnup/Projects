<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Update_Control extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $loggedin = $this->session->userdata('userID');
        if (!isset($loggedin) or $loggedin == '') {
            redirect(base_url().'Control');
        }
        $this->load->model('Admin_model');
        $this->load->model('Rest_model');
        $this->load->helper('text');
        $this->load->model('Update_model');
        $this->load->library("cart");
        $this->load->library('session');
        $this->load->helper('url'); 
        
    }

    //Default Load
    function index() {
        $this->load->view('admin/fixed_asset');
    }

    public function fixedassetname($id=NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('fixedassetname', '*', array('id'=>$id));
            }
            $data['fixedassetname'] = $this->Rest_model->SelectDataOrder('fixedassetname', '*', array('deleted'=>0),'id','desc');
            $data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
            $this->load->view('update/fixedassetname', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function add_fixedassetname(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            $id=$this->input->post('id');
            $data=$this->input->post();
            if(isset($id)){
                $this->Rest_model->UpdateData('fixedassetname', $data, array('id'=>$id));
            }else{
                $data['quantity'] = 0;
                $this->Rest_model->SaveData('fixedassetname', $data);
            }
            redirect(base_url().'Update_Control/fixedassetname', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function delete_fixedassetname($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $data['deleted']=1;
            $data['delid']=$userID;
            $this->Rest_model->UpdateData('fixedassetname', $data, array('id'=>$id));
            redirect(base_url().'Update_Control/fixedassetname', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function fixed_asset($id=NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('fixed_asset', '*', array('id'=>$id));
            }
            $data['fixedassetname'] = $this->Rest_model->SelectDataOrder('fixedassetname', '*', array('deleted'=>0),'id','desc');
            $data['fixed_asset'] = $this->Rest_model->SelectDataOrder('fixed_asset', '*', array('deleted'=>0),'id','desc');
            $data['supplier'] = $this->Rest_model->SelectDataOrder('product_supplier', '*', array('deleted'=>0),'id','desc');
            $this->load->view('update/fixed_asset', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function add_fixed_asset(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            $id=$this->input->post('id');
            $data=$this->input->post();
            $q = (int)$data['quantity'];
            // echo "<pre>"; print_r($data);
            
            if(isset($id)){
                $dd = $this->Rest_model->SelectData_1('fixed_asset', '*', array('id'=>$id));
                $this->Update_model->fixedAssetDel($dd->assetId,$dd->quantity);
                $this->Update_model->fixedAssetUp($data['assetId'],$data['quantity']);
                $this->Update_model->delfixedassetNumber($dd->assetId,$dd->quantity);
                // echo "<pre>"; print_r($dd);
                for ($i=1; $i <=$q ; $i++) { 
                $d['assetId'] = $data['assetId'];
                $fxdn = $this->Update_model->fixedassetNumber($data['assetId']);
                if(!isset($fxdn)){
                    $d['assetNumber'] = 1;
                }else{
                    $d['assetNumber'] = (int)$fxdn->assetNumber+1;
                }
                $this->Rest_model->SaveData('fxassetnumber', $d);
            }
                $this->Rest_model->UpdateData('fixed_asset', $data, array('id'=>$id));
            }else{
                for ($i=1; $i <=$q ; $i++) { 
                $d['assetId'] = $data['assetId'];
                $fxdn = $this->Update_model->fixedassetNumber($data['assetId']);
                if(!isset($fxdn)){
                    $d['assetNumber'] = 1;
                }else{
                    $d['assetNumber'] = (int)$fxdn->assetNumber+1;
                }
                $this->Rest_model->SaveData('fxassetnumber', $d);
            }
                $this->Update_model->fixedAssetUp($data['assetId'],$data['quantity']);
                $this->Rest_model->SaveData('fixed_asset', $data);
            }
            redirect(base_url().'Update_Control/fixed_asset', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }

    public function fixed_asset_number($id=NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            
            $data['fixedassetname'] = $this->Rest_model->SelectDataOrder('fixedassetname', '*', array('deleted'=>0),'id','desc');
            $data['fixed_asset'] = $this->Rest_model->SelectDataOrder('fixed_asset', '*', array('deleted'=>0),'id','desc');
            $data['fxassetnumber'] = $this->Rest_model->SelectDataOrder('fxassetnumber', '*', '','id','desc');
            $this->load->view('update/fixed_asset_number', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function delete_fixed_asset($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $dd = $this->Rest_model->SelectData_1('fixed_asset', '*', array('id'=>$id));
                $this->Update_model->fixedAssetDel($dd->assetId,$dd->quantity);
            $data['deleted']=1;
            $data['delid']=$userID;
            $this->Rest_model->UpdateData('fixed_asset', $data, array('id'=>$id));
            redirect(base_url().'Update_Control/fixed_asset', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function fixed_asset_adj($id=NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('fixed_asset_adj', '*', array('id'=>$id));
            }
            $data['fixed_asset_adj'] = $this->Rest_model->SelectDataOrder('fixed_asset_adj', '*', array('deleted'=>0),'id','desc');
            $data['fixed_asset'] = $this->Rest_model->SelectDataOrder('fixed_asset', '*', array('deleted'=>0),'id','desc');
            $this->load->view('update/fixed_asset_adj', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function view_fixed_asset(){
        $id = $this->input->post('val');
        $data = $this->Rest_model->SelectData_1('fixed_asset','*',array('id'=>$id));
        echo json_encode($data);
    }
    public function add_fixed_asset_adj(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','product');
            $id=$this->input->post('id');
            $data=$this->input->post();
            if(isset($id)){
                $this->Rest_model->UpdateData('fixed_asset_adj', $data, array('id'=>$id));
            }else{
                $this->Update_model->fixedAssetDel($data['assetId'],$data['aquantity']);
                $this->Rest_model->SaveData('fixed_asset_adj', $data);
            }
            redirect(base_url().'Update_Control/fixed_asset_adj', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function patient($id=NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            $data['dr_list'] = $this->Rest_model->SelectDataOrder('dr_list', '*','','id','desc');
            $data['employee'] = $this->Rest_model->SelectDataOrder('employee', '*','','id','desc');
            $this->load->view('update/registration', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function addNewPatient(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            // $id=$this->input->post('id');
            $data=$this->input->post();
            $date = date('d-m-Y');
            $dmonth = date('Y-m');
            unset($data[0]);
            //  echo "<pre>";
            // print_r($data); 
            if(empty($data['date'])){
                $data['date'] = $date;
                $data['dmonth'] = $dmonth;
            }else{
                $data['dmonth'] = date('Y-m', strtotime($data['date']));
            }
            
           
            if(empty($data['patReg'])){
                $data['patReg'] = 1;
            }
            if($data['patReg'] == 1){
                $grn = $this->Update_model->grnNum($data['patReg']);
                if(!isset($grn)){
                    $data['grnNum'] = 1;
                }else{
                    $data['grnNum'] = (int)$grn->grnNum+1;
                }
                $grnM = $this->Update_model->grnMNum($data['patReg'], $data['dmonth']);
                if(!isset($grnM)){
                    $data['grnMNum'] = 1;
                }else{
                    $data['grnMNum'] = (int)$grnM->grnMNum+1;
                }
            }
            if($data['patReg'] == 2){
                $grn = $this->Update_model->mrnNum($data['patReg']);
                if(!isset($grn)){
                    $data['mrnNum'] = 1;
                }else{
                    $data['mrnNum'] = (int)$grn->mrnNum+1;
                }
                $grnM = $this->Update_model->mrnMNum($data['patReg'], $data['dmonth']);
                if(!isset($grnM)){
                    $data['mrnMNum'] = 1;
                }else{
                    $data['mrnMNum'] = (int)$grnM->mrnMNum+1;
                }
            }
            if($data['patReg'] == 3){
                $grn = $this->Update_model->prnNum($data['patReg']);
                if(!isset($grn)){
                    $data['prnNum'] = 1;
                }else{
                    $data['prnNum'] = (int)$grn->prnNum+1;
                }
                $grnM = $this->Update_model->prnMNum($data['patReg'], $data['dmonth']);
                if(!isset($grnM)){
                    $data['prnMNum'] = 1;
                }else{
                    $data['prnMNum'] = (int)$grnM->prnMNum+1;
                }
            }
            //  echo "<pre>";
            // print_r($grnM); 
            $config['upload_path'] = './uploads/patients/';
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

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data2 = array('upload_data' => $this->upload->data());
                $data['image'] = $data2['upload_data']['file_name'];
                $config_1['source_image'] = 'uploads/patients/'.$data2['upload_data']['file_name'];
                $this->image_lib->initialize($config_1); 
                $this->image_lib->resize();
            }
            $this->Rest_model->SaveData('patient_new', $data);
            redirect(base_url().'Update_Control/patientList', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function convertreg($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            $pat = $this->Rest_model->SelectData_1('patient_new','*',array('id'=>$id));
            $grn = $this->Update_model->grnNum(1);
            $data['dmonth'] = date('Y-m');
            $data['date'] = date('d-m-Y');
            $data['prnNum'] = 0;
            $data['mrnNum'] = 0;
            $data['mrnMNum'] = 0;
            $data['prnMNum'] = 0;
            $data['updateBy'] = $userID;
            if(!isset($grn)){
                $data['grnNum'] = 1;
            }else{
                $data['grnNum'] = (int)$grn->grnNum+1;
            }
            $grnM = $this->Update_model->grnMNum(1, $data['dmonth']);
                if(!isset($grnM)){
                    $data['grnMNum'] = 1;
                }else{
                    $data['grnMNum'] = (int)$grnM->grnMNum+1;
                }
            $this->Rest_model->UpdateData('patient_new',$data, array('id'=>$id));
            redirect(base_url().'Update_Control/patientList', 'refresh');
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function addNewPatient2(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            $id=$this->input->post('id');
            $data=$this->input->post();
            $date = date('Y-m-d');
            $dmonth = date('Y-m');
            if(empty($data['date'])){
                $data['date'] = $date;
                $data['dmonth'] = $dmonth;
            }else{
                $data['dmonth'] = date('Y-m', strtotime($data['date']));
            }
            $data['regBy'] = $userID;
            if($data['patReg'] == 1){
                $grn = $this->Update_model->grnNum($data['patReg']);
                if(!isset($grn)){
                    $data['grnNum'] = 1;
                }else{
                    $data['grnNum'] = (int)$grn->grnNum+1;
                }
                $grnM = $this->Update_model->grnMNum($data['patReg'], $data['dmonth']);
                if(!isset($grnM)){
                    $data['grnMNum'] = 1;
                }else{
                    $data['grnMNum'] = (int)$grnM->grnMNum+1;
                }
            }
            if($data['patReg'] == 2){
                $grn = $this->Update_model->mrnNum($data['patReg']);
                if(!isset($grn)){
                    $data['mrnNum'] = 1;
                }else{
                    $data['mrnNum'] = (int)$grn->mrnNum+1;
                }
                $grnM = $this->Update_model->mrnMNum($data['patReg'], $data['dmonth']);
                if(!isset($grnM)){
                    $data['mrnMNum'] = 1;
                }else{
                    $data['mrnMNum'] = (int)$grnM->mrnMNum+1;
                }
            }
            if($data['patReg'] == 3){
                $grn = $this->Update_model->prnNum($data['patReg']);
                if(!isset($grn)){
                    $data['prnNum'] = 1;
                }else{
                    $data['prnNum'] = (int)$grn->prnNum+1;
                }
                $grnM = $this->Update_model->prnMNum($data['patReg'], $data['dmonth']);
                if(!isset($grnM)){
                    $data['prnMNum'] = 1;
                }else{
                    $data['prnMNum'] = (int)$grnM->prnMNum+1;
                }
            }
            $config['upload_path'] = './uploads/patients/';
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

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data2 = array('upload_data' => $this->upload->data());
                $data['image'] = $data2['upload_data']['file_name'];
                $config_1['source_image'] = 'uploads/patients/'.$data2['upload_data']['file_name'];
                $this->image_lib->initialize($config_1); 
                $this->image_lib->resize();
            }
            $this->Rest_model->SaveData('patient_new', $data);
            redirect(base_url().'Control/test_sale', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function viewpatient($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            $data['p'] = $this->Rest_model->SelectData_1('patient_new','*', array('id'=>$id));
            $data['employee'] = $this->Rest_model->SelectData('employee', '*','');
            $data['dr_list'] = $this->Rest_model->SelectDataOrder('dr_list', '*','','id','desc');
            // $data['n'] = $this->Update_model->viewpatient($id);
            // echo "<pre>";print_r($data['p']);
            $this->load->view('update/viewpatient', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function patientList(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            
            $data['patient_new'] = $this->Rest_model->SelectDataOrder('patient_new', '*', '','id','desc');
            $this->load->view('update/patientList', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function editpatient($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','patient');
            $data['pn'] = $this->Rest_model->SelectData_1('patient_new', '*', array('id'=>$id));
            $this->load->view('update/editpatient', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
public function updateNewPatient(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
        $id = $this->input->post('id');
        $data = $this->input->post();
        $data['up_date'] = date('Y-m-d');
        $data['updateBy'] = $userID;
        $config['upload_path'] = './uploads/patients/';
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
        $config_1['width']         = 150;
        $config_1['height']       = 150;

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['image'] = $data2['upload_data']['file_name'];
            $config_1['source_image'] = 'uploads/patients/'.$data2['upload_data']['file_name'];
            $this->image_lib->initialize($config_1); 
            $this->image_lib->resize();
            $qq=$this->Rest_model->SelectData_1('patient_new','*',array('id'=>$id));
            if($qq->image!=''){
            unlink('uploads/patients/'.$qq->image);
            }
        }
        $this->Rest_model->UpdateData('patient_new', $data, array('id'=>$id));
        redirect(base_url().'Update_Control/patientList', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function delete_patientNew($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $qq=$this->Rest_model->SelectData_1('patient_new','*',array('id'=>$id));
            if($qq->image!=''){
            unlink('uploads/patients/'.$qq->image);
            }
            $this->Rest_model->DeleteData('patient_new',array('id'=>$id));
            redirect(base_url().'Update_Control/patientList', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function test_package($id=NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','lab');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('fixedassetname', '*', array('id'=>$id));
            }
            $data['fixedassetname'] = $this->Rest_model->SelectDataOrder('fixedassetname', '*', array('deleted'=>0),'id','desc');
            $data['test_package'] = $this->Update_model->test_package();
            $this->load->view('update/test_package', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function add_test_package(){
        $data=$this->input->post();
        $rand = rand(0, 100000);
        $data['tpId'] = $rand;
        foreach ($data['name'] as $key => $value) {
            $d['name'] = $data['name'][$key];
            $d['price'] = $data['price'][$key];
            $d['packagename'] = $data['packagename'];
            $d['grandTotal'] = $data['grandTotal'];
            $d['tpId'] = $data['tpId'];
            $this->Rest_model->SaveData('test_package', $d);
        }
        $t['tpId'] = $data['tpId'];
        $t['name'] = $data['packagename'];
        $t['price'] = $data['grandTotal'];
        $this->Rest_model->SaveData('test', $t);
        redirect(base_url().'Update_Control/test_package', 'refresh');
        // echo "<pre>"; print_r($data['tpId']);
    }
    public function employee($id = NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','pay');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('employeenew', '*', array('id'=>$id));
            }
            $data['patient_new'] = $this->Rest_model->SelectDataOrder('patient_new', '*', '','id','desc');
            $this->load->view('update/employee', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function addNewEmployee(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','pay');
            $id=$this->input->post('id');
            $data=$this->input->post();
            if(isset($id)){
                $this->Rest_model->UpdateData('employeenew', $data, array('id'=>$id));
            }else{
                $this->Rest_model->SaveData('employeenew', $data);
            }
            redirect(base_url().'Update_Control/employee_listNew', 'refresh');
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function employee_listNew(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','pay');
            
            $data['employeenew'] = $this->Rest_model->SelectDataOrder('employeenew', '*', '','id','desc');
            $this->load->view('update/employee_listNew', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function delete_employeeNew($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            
            $this->Rest_model->DeleteData('employeenew',array('id'=>$id));
            redirect(base_url().'Update_Control/employee_listNew', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function bank_deposit($id = NULL){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','ex_category');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('bank_deposit', '*', array('id'=>$id));
            }
            $data['bank_deposit'] = $this->Rest_model->SelectDataOrder('bank_deposit', '*', '','id','desc');
            $this->load->view('update/bank_deposit', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }

    public function add_bank_deposit(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','pay');
            $id=$this->input->post('id');
            $data=$this->input->post();
            if(isset($id)){
                $this->Rest_model->UpdateData('bank_deposit', $data, array('id'=>$id));
            }else{
                $this->Rest_model->SaveData('bank_deposit', $data);
            }
            redirect(base_url().'Update_Control/bank_deposit', 'refresh');
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function delete_bank_deposit($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            
            $this->Rest_model->DeleteData('bank_deposit',array('id'=>$id));
            redirect(base_url().'Update_Control/bank_deposit', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function work_plan($id = NULL){
        $userID = $this->session->userdata('userID');
        // $userRole = $this->session->userdata('role');
        if (isset($userID)) {
            $this->session->set_userdata('menu','work_plan');
            if(isset($id)){
                $data['edit'] = $this->Rest_model->SelectData_1('work_plan', '*', array('id'=>$id));
            }
            $data['work_plan'] = $this->Rest_model->SelectDataOrder('work_plan', '*', array('userId'=>$userID),'id','desc');
            $this->load->view('update/work_plan', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function add_work_plan(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','work_plan');
            $id=$this->input->post('id');
            $data=$this->input->post();
            $data['userId'] = $userID;
            if(isset($id)){
                $this->Rest_model->UpdateData('work_plan', $data, array('id'=>$id));
            }else{
                $this->Rest_model->SaveData('work_plan', $data);
            }
            redirect(base_url().'Update_Control/work_plan', 'refresh');
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function delete_work_plan($id){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            
            $this->Rest_model->DeleteData('work_plan',array('id'=>$id));
            redirect(base_url().'Update_Control/plan_list', 'refresh');
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
    public function plan_list(){
        $userID = $this->session->userdata('userID');
        if (isset($userID)) {
            $this->session->set_userdata('menu','admin');
            
            $data['work_plan'] = $this->Rest_model->SelectDataOrder('work_plan', '*', '','id','desc');
            $data['users'] = $this->Rest_model->SelectDataOrder('users', '*', '','id','desc');
            $this->load->view('update/plan_list', $data);
            
        }else{
            redirect(base_url().'Control', 'refresh');
        }
    }
}?>