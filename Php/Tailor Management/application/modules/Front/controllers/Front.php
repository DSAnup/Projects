<?php

class Front extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Rest_model');
        //  
        $this->session->set_userdata('siteID','1');
    }
    public function index(){
        $this->load->view('index');
    }
    
}