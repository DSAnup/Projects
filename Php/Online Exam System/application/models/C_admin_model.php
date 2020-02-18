<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin_model extends CI_Model {

    function __construct() {
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
        if ($this->db->insert($table, $data))
            return TRUE;

        return FALSE;
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
    public function get_lesson(){
        $this->db->select('*');
        $this->db->from('lesson');
        $this->db->join('course','course.id=lesson.course_id');
        $query=$this->db->get();
        return $query->result();
    }
    public function get_quiz_number($id){
        $query=$this->db->query("SELECT COUNT(`answer`) as number FROM `quiz` WHERE `lesson_id`=$id");
        return $query->row();
    }
    public function get_date(){
        $query=$this->db->query('SELECT date FROM `enrollment` GROUP BY date');
        return $query->result();
    }
    public function search_std($course_id,$date){
        $query=$this->db->query("SELECT studentup.*,studentup.id as std,enrollment.* FROM `enrollment` JOIN studentup ON studentup.id=enrollment.std_id WHERE enrollment.course_id=".$course_id." AND enrollment.date='".$date."'");
        return $query->result();
    }
    public function get_sub($course_id){
        $query=$this->db->query("SELECT course.name AS c, subject.name AS s FROM `course` JOIN subject ON course.subject=subject.id WHERE course.id=".$course_id);
        return $query->row();
    }

   public function get_lesson_video(){
    $query=$this->db->query("select * from lesson order by l_id desc limit 10");
    return $query->result();
   }
   public function get_book_subject(){
    $query=$this->db->query("SELECT * FROM `books` GROUP BY `subject`");
    return $query->result();
   }
   public function get_events(){
    $query=$this->db->query("SELECT * FROM `event` order by id desc LIMIT 1,200");
    return $query->result();
   }
   public function get_events_1($id){
    $query=$this->db->query("SELECT * FROM `event` where id <> $id");
    return $query->result();
   }
   public function get_enroll($id,$std){
    $d=$this->db->query('SELECT enrollment.*,course.*,subject.* FROM `enrollment` JOIN course ON enrollment.course_id=course.id JOIN subject ON course.subject=subject.id WHERE subject.id='.$id.' AND enrollment.std_id='.$std);
    return $d->result();
   }
   public function get_sub1($id){
    $d=$this->db->query('SELECT course.name as c,subject.name as s,subject.id as id FROM `course` JOIN subject ON course.subject=subject.id WHERE course.id='.$id);
    return $d->row();
   }
   public function mail_status($enrol){
    $this->db->set('mailstatus', '1');
    $this->db->where('enroll_id', $enrol);
    $this->db->update('enrollment');
   }
}
