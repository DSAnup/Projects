<?php

class crud_controller extends CI_Controller {
    public function contact(){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Admin','refresh');
        }else{
        $data['contact']=  $this->C_admin_model->SelectData('contact','*','');
        $data['body'] = "contact";
        $this->load->view("Admin/template", $data);
        }
    }
    public function add_contact(){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Admin','refresh');
        }else{
        $data = $this->input->post();
        $this->C_admin_model->SaveData('contact',$data);
        redirect(base_url().'Admin/contact');
        }
    }
    public function edit_contact($id){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Admin','refresh');
        }else{
        $data['c'] = $this->C_admin_model->SelectData_1('contact','*',array('id'=>$id));
        $data['body'] = "edit_contact";
        $this->load->view("Admin/template", $data);
        }
    }
    public function update_contact(){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Admin','refresh');
        }else{
        $id = $this->input->post('id');
        $data = $this->input->post();
        $this->C_admin_model->UpdateData('contact', $data, array('id'=>$id));
        redirect(base_url().'Admin/contact');
        }
    }
    public function del_contact($id){
        if(!isset($_SESSION['userID'])){
          redirect(base_url().'Admin','refresh');
        }else{
        $this->C_admin_model->DeleteData('contact',array('id'=>$id));
        redirect(base_url().'Admin/contact');
        }
    }
