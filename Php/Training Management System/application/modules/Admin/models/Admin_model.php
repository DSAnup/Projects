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
	public function get_mx_sh_id(){
		$query=$this->db->query('select max(id) as id from schedule_days');
		return $query->row();
	}
	public function get_std_data_for_id($id){
		$query = $this->db->query("select students.name,students.father,students.mother,students.photo,students.date_of_birth,course.name as c_name,enrollment.id AS roll, enrollment.finish_date as expire FROM students JOIN enrollment ON enrollment.stdID=students.id JOIN course ON course.id=students.courseID where enrollment.enroll_id='".$id."' and enrollment.approval='yes'");
		return $query->result();
	}
	public function get_std_data_for_batch($batch){
		$query = $this->db->query("select students.name,students.father,students.mother,students.photo,students.date_of_birth,course.name as c_name,enrollment.enroll_id AS roll,enrollment.finish_date as expire  FROM students JOIN enrollment ON enrollment.stdID=students.serial JOIN course ON course.id=students.courseID where enrollment.batchID=$batch and enrollment.approval='yes'");
		return $query->result();
	}
	//insert data permission
	public function SaveUser($data){
		$this->db->insert('admin',$data);
	}
	public function get_max_std(){
		$d=$this->db->query("select max(id) as id from students");
		return $d->row();
	}
	public function get_std_data($id){
		$query=$this->db->query("SELECT students.name as std_name, students.father,students.mother,students.email,students.date_of_birth,students.nationality,students.religion,students.blood,students.mobile,students.p_village,students.p_post,students.p_upozila,students.p_district,students.g_village,students.g_post,students.g_upozila,students.g_district,students.degree,students.ssc,students.photo,students.age,students.passport_no,students.id AS std_id, students.serial as serial, enrollment.id AS en_id,time_slots.slot,schedule_days.days,enrollment.courseID,enrollment.timeSlot,enrollment.enroll_id FROM enrollment JOIN students ON enrollment.stdID=students.serial JOIN time_slots ON enrollment.timeSlot=time_slots.id JOIN schedule_days ON time_slots.schedule_id=schedule_days.id  WHERE enrollment.id=$id");
		return $query->row();
	}
	public function get_std_data_1($id){
		$query=$this->db->query("SELECT students.*, enrollment.*,time_slots.*,schedule_days.* FROM enrollment JOIN students ON enrollment.stdID=students.serial JOIN time_slots ON enrollment.timeSlot=time_slots.id JOIN schedule_days ON time_slots.schedule_id=schedule_days.id  WHERE enrollment.id=$id");
		return $query->row();
	}
	public function get_std_data_2($id){
		$query=$this->db->query("SELECT students.*, enrollment.*,time_slots.*,schedule_days.* FROM enrollment JOIN students ON enrollment.stdID=students.serial JOIN time_slots ON enrollment.timeSlot=time_slots.id JOIN schedule_days ON time_slots.schedule_id=schedule_days.id  WHERE students.serial='$id'");
		return $query->row();
	}
	
// Model Teacher ID card genarate 

	public function get_std_data_for_id_t($id){
		$query = $this->db->query("SELECT `id`, `name`, `description`, `experience`, `designation`, `contact`, `address`, `skills`, `type`, `photo` FROM `trainer` WHERE id=$id");
		return $query->row();
	}
	public function get_transfer_std($id){
		$query=$this->db->query("SELECT students.*,enrollment.*,vehicle_info.* FROM `enrollment` JOIN students ON students.serial=enrollment.stdID JOIN vehicle_info ON enrollment.stdID=vehicle_info.std_id WHERE enrollment.id='$id'");
		return $query->row();
	}
	public function get_std_id($id){
		$query=$this->db->query("SELECT `stdID` FROM `enrollment` WHERE id=$id");
		return $query->row();
	}
	public function get_std_for_certificate($id){
		$query=$this->db->query("SELECT students.name as std_name, enrollment.finish_date as finish_date,course.name as course_name, enrollment.certificate_id as c_id FROM `enrollment` JOIN students ON students.serial=enrollment.stdID JOIN course ON course.id=enrollment.courseID WHERE enrollment.id=$id");
		return $query->row();
	}
	public function get_std_for_certificate_ajax($id){
		$query=$this->db->query("SELECT students.name as std_name, enrollment.finish_date as finish_date,course.name as course_name, enrollment.certificate_id as c_id FROM `enrollment` JOIN students ON students.serial=enrollment.stdID JOIN course ON course.id=enrollment.courseID WHERE enrollment.certificate_id='$id'");
		return $query->row();
	}
		public function get_transfer_std_driving($id){
		$query = $this->db->query("SELECT students.*,enrollment.* FROM `enrollment` JOIN students on enrollment.stdID=students.serial WHERE enrollment.id=$id");
			return $query->row();	
	}
	public function get_std_1($id){
		$query=$this->db->query("select * from students where serial='$id' limit 1");
		return $query->row();
	}
	public function get_for_fees($id){
		$query=$this->db->query("select * from enrollment where stdID='$id' or enroll_id='$id' limit 1");
		return $query->row();
	}
}
?>