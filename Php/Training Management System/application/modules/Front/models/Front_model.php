<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
Developed By: Morshed Habib Sohel
Mobile: 01735254295
E-Mail: mhsohel017@gmail.com
*/
class Front_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function SelectData($table, $data, $where) {
		if ($where) {
			$this->db->where($where);
		}
		$this->db->select($data);
		$this->db->from($table);
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
	public function SelectDataOrder($table, $data, $where,$by,$type) {
		if ($where) {
			$this->db->where($where);
		}
		$this->db->select($data);
		$this->db->from($table);
		$this->db->order_by($by,$type);
		return $this->db->get()->result();
	}
	public function SaveData($table, $data) {
		if ($this->db->insert($table, $data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function get_gallery(){
		$query=$this->db->query('select * from gallery limit 12');
		return $query->result();
	}
	public function get_gallery_all(){
		$query=$this->db->query('select * from gallery');
		return $query->result();
	}
	public function get_std_work_all(){
		$query=$this->db->query('select * from std_work');
		return $query->result();
	}
	public function get_course_category_wise($category){
		$query=$this->db->query("select * from course where category='$category' limit 1");
		return $query->row();
	}
	public function get_max_std(){
		$d=$this->db->query("select max(id) as id from students");
		return $d->row();
	}
}