<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Musers extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function showuserAdmin() {
        $data = $this->db->get('wsxq_admin');
        if ($data->num_rows() > 0) {
            return $data->result_array();
        } else {
            $data = NULL;
        }
    }

    function userbyid($id) {
        $this->db->where('id', $id);
        $q = $this->db->get('wsxq_admin');
        return $q->row_array();
    }

    function create() {
        $this->db->where('email', $_POST['email']);
        $q = $this->db->get('wsxq_admin');
        if ($q->num_rows() > 0) {
            return 'EXIST';
        } else {
            $pw = md5($this->input->post('password'));
            $data = array(
                'email' => $_POST['email'],
                'password' => $pw,
                'u_name' => $_POST['u_name'],
                'status' => $_POST['status'],
                'type' => '10',
                'permission' => '1',
                'registered' => date('Y-m-d H:i:s')
            );
            $this->db->insert('wsxq_admin', $data);
        }
    }

    function user_update() {
        //$pw = substr(do_hash($this->input->post('password')), 0, 16);
        $data = array(
            'u_name' => $_POST['u_name'],
            'email' => $_POST['email'],
            'status' => $_POST['status']
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('wsxq_admin', $data);
        //print_r($this->db->last_query());
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('wsxq_admin');
    }

}

