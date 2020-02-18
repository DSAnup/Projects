<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function SelectData($table, $data, $where) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select($data);
        $this->db->from($table);
        return $this->db->get()->row();
    }

/// Login Verification
    function verify($email, $pw) {
        $this->db->where('email', $email);
        $this->db->where('password', $pw);
        $this->db->where('status', '1');
        $this->db->limit(1);
        $q = $this->db->get('wsxq_admin');

        if ($q->num_rows() > 0) {
            $row = $q->row_array();
            $data['user_id'] = $row['id'];
            $data['mail'] = $row['email'];
            $data['type'] = $row['type'];
            $this->session->set_userdata($data);
        } else {
            $this->session->set_flashdata('error', 'The Email or Password You Entered is incorrect!');
        }
    }
    public function quizgroup(){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->group_by('lesson_id');
        return $this->db->get()->result();
    }
    public function quiztest($id, $limit){
        $this->db->select('*');
        $this->db->from('quiz');
        $this->db->where('lesson_id', $id);
        $this->db->order_by('q_id', 'RANDOM');
        $this->db->limit($limit);
        return $this->db->get()->result();

    }
}
