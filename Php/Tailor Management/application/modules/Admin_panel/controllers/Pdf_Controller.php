<?php
	
	/**
	 * 
	 */
	class Pdf_Controller extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('Pdf');
			$this->load->model('Rest_model');
		}
		public function index(){
			$data['allc'] = $this->Rest_model->SelectDataOrder('measurement','*','','id','desc');
			$this->load->view('Admin_panel/example', $data);
		}
		public function makepdf($id){
			$data['s']= $this->Rest_model->SelectData_1('measurement','*',array('id'=>$id));
			$this->load->view('Admin_panel/example_img', $data);
		}
		public function barcode(){
			$data['allc'] = $this->Rest_model->SelectDataOrder('measurement','*','','id','desc');
			$this->load->view('Admin_panel/barcode', $data);
		}
	}

?>