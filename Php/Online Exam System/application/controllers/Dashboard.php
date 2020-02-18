<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $loggedin = $this->session->userdata('userID');
        if (!isset($loggedin) or $loggedin == '') {
            redirect(base_url().'Admin');
        }
    }

    //Default Load
    public function index() {
        $data['body'] = 'welcome';
        $this->load->view('template', $data);
    }

    //--> Video Module Start

    
}
