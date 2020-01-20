<?php

class Front extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Rest_model');
        $this->load->helper('text');
        $this->load->library('session');
        //  
    }
    public function index(){
        
        $this->load->view('index');
    }
    public function about(){
        
        $this->load->view('about');
    }
    public function contact(){
        
        $this->load->view('contact');
    }
    public function clientProfile(){
        
        $this->load->view('clientProfile');
    }
    public function packages(){
        
        $this->load->view('packages');
    }
    public function products(){
        
        $this->load->view('products');
    }
    public function productDetails(){
        
        $this->load->view('productDetails');
    }
    public function services(){
        
        $this->load->view('services');
    }

}