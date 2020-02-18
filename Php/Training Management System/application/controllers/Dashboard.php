<?php

class Dashboard extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
    public function index($left_menu){
    	$data['code']=$this->Dashboard_model->get_head_code();
        $array['left_menu']=$left_menu;
        $this->session->set_userdata($array);
        $this->load->view('userlist',$data);
    }
    public function bn2enNumber($number) {
        $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $bn_number = str_replace($replace_array, $search_array, $number);
        return $bn_number;
    }
    public function notification(){
        $number[0]['n']=$this->Dashboard_model->get_notification_num();
        echo json_encode($number);
    }
    public function get_notification(){
        $this->load->helper('en2bn');
        $data=array();
        $i=0;
        $no=$this->Dashboard_model->get_notified();
        foreach ($no as $k) {
            $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        $bn_number = str_replace($replace_array, $search_array, $k->amount);
            
            $data[$i]['head']=$k->time.' | '.$k->sub_head_title.' বাবদ খরচ --'.$bn_number.' টাকা।';
            $i+=1;
        }
        echo json_encode($data);
    }
    public function clear_notification(){
        $data['viewd']=$this->input->post('confirmation');
        $this->Dashboard_model->clead_notification($data);
    }
}
