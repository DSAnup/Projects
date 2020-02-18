<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
Developed By: Morshed Habib Sohel
Mobile: 01735254295
*/
class Slider extends MX_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index($menu){
		$session = array('menu' =>$menu);
		$this->session->set_userdata($session);
		$this->load->view('index');
	}
}
?>