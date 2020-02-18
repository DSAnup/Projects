<?php
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function register($data){
        $this->db->insert('admin',$data);
    }
    public function login($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query=$this->db->get('admin');
        return $query->row();
    }
    public function get_person(){
        $this->db->select('attendance.*,  person.name');
        $this->db->from('attendance');
        $this->db->join('person', 'attendance.personID = person.id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_image_limit(){
        $this->db->select('*');
        $this->db->from('fd_gallery');
        $this->db->where('siteID','1');
        $this->db->limit('4','4');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_special_1(){
        $this->db->select('*');
        $this->db->from('fd_special_dishes');
        $this->db->where('siteID','1');
        $this->db->limit('4','4');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_special_2(){
        $this->db->select('*');
        $this->db->from('fd_special_dishes');
        $this->db->where('siteID','1');
        $this->db->limit('4','8');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_special_3(){
        $this->db->select('*');
        $this->db->from('fd_special_dishes');
        $this->db->where('siteID','1');
        $this->db->limit('4','12');
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>