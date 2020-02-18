<?php
/**
 * 
 */
class Testing extends CI_Controller
{
	
	function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Rest_model');
		$this->load->library('session');
		$this->load->helper('text');
		
	}
	public function index(){
		$this->load->library('Pdf');
		$data['c']=$this->Rest_model->SelectData_1('measurement','*', array('id'=>'2'));
		$this->load->view('Admin_panel/example', $data);
	}
	public function searchname(){
		$search = $this->input->post('search');
		$query = $this->db->query("SELECT * FROM measurement WHERE name LIKE '%$search%'");
		$result = '';
        $result .='<div class="search"><ul>';
        if($query){
            while ($data = $query) {        
                $result.='<li>'.$data['name'].'</li>';
            }}else{
                $result.='<li>No Data Available</li>';
            }
            $result.='</ul></div>';
            echo $result;
		
	}
}
	
?>