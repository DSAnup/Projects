<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Musers');
        $this->load->helper("form"); 
         $this->load->library('form_validation');
        $loggedin = $this->session->userdata('userID');
        if (!isset($loggedin) or $loggedin == '') {
            redirect(base_url().'Admin');
        }
    }

    function index() {
        $data['body'] = 'user_list';
        $data['admin'] = $this->Musers->showuserAdmin();        
        $this->load->view('admin/template', $data);
    }

    
    function create() {    
        if ($this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required');
            if ($this->form_validation->run() == TRUE) {
                if ($this->Musers->create() == 'EXIST') {
                    $this->session->set_flashdata('error', 'Email ID Already Exist');
                    redirect('Admin/user', 'refresh');
                } else {
                    $this->Musers->create();
                    redirect('Admin/user', 'refresh');
                }
            }
        }
    }

    function edit($id = 0) {
        if ($this->input->post('u_name')) {
            $this->Musers->user_update();
            $this->session->set_flashdata('message', 'User Updated');
            redirect('Admin/user');
        } else {
            $data['body'] = "user_edit";
            $data['user'] = $this->Musers->userbyid($id);
            $this->load->view('Admin/template', $data);
        }
    }

    function delete($id) {
        $this->Musers->delete($id);
        redirect('Admin/user');
    }

    //Permission

    function permission($id) {
        $data['body'] = 'user_access_control';
        $data['control_list'] = $this->Musers->checkuserAccess($id);
        $data['menu'] = $this->Musers->getmenu();
        $this->load->view('admin/template', $data);
    }

    function add_permission() {
        $this->Musers->permission_add();
        $this->Musers->permissionAdmintable();
        redirect('admin/users', 'refresh');
    }

}