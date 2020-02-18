<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
Developed By: Morshed Habib Sohel
Mobile: 01735254295
E-Mail: mhsohel017@gmail.com
*/
class Admin_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
	

	/**
	REST FUNCTIONS STARTS HERE
	**/

	public function SelectData($table, $data, $where) {
		if ($where) {
			$this->db->where($where);
		}
		$this->db->select($data);
		$this->db->from($table);
		return $this->db->get()->result();
	}
	public function SelectDataOrder($table, $data, $where,$by,$type) {
		if ($where) {
			$this->db->where($where);
		}
		$this->db->select($data);
		$this->db->from($table);
		$this->db->order_by($by,$type);
		return $this->db->get()->result();
	}
	public function SelectData_1($table, $data, $where) {
		if ($where) {
			$this->db->where($where);
		}
		$this->db->select($data);
		$this->db->from($table);
		return $this->db->get()->row();
	}

	public function SaveData($table, $data) {
		if ($this->db->insert($table, $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function DeleteData($table, $where) {
		if ($where) {
			$this->db->where($where);
		}
		if ($this->db->delete($table)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function UpdateData($table, $data, $where) {
		$this->db->where($where);
		if ($this->db->update($table, $data)) {
			return TRUE;
		} else
		return FALSE;
	}

	/** REST FUNCTIONS ENDS HERE **/
	public function get_workshop(){
		$query=$this->db->query("SELECT w.name AS name, w.details AS details, w.date AS date, w.price AS price, w.duration AS duration, t.name as trainer, w.id as id, w.trainer as t_id FROM `workshop` as w JOIN trainer as t on w.trainer=t.id");
		return $query->result();
	}
	public function get_max_id(){
		$this->db->select_max('id');
		$query = $this->db->get('trainer');
		return $query->row();
	}
	public function SelectCourse(){
		$query=$this->db->query("select * from course where category!=3");
		return $query->result();
	}
	public function get_head_id(){
		$query=$this->db->query('select max(id) as id from part_heads');
		return $query->row();
	}
	public function get_payment_info($id){
		$query=$this->db->query("select sum(amount) as amount from payment where enroll_id='$id'");
		return $query->row();
	}
	public function get_max_payment_id(){
		$query=$this->db->query('select max(id) as id from payment');
		return $query->row();
	}
	public function get_max_payment($id){
		$query=$this->db->query("select * from payment where id='$id'");
		return $query->row();
	}
	public function get_price_info($id){
		$query=$this->db->query("select price from enrollment where id='$id'");
		return $query->row();
	}
	public function get_notices(){

	}
}
?>