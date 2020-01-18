<?php

class MultiImage_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getRows($id = ''){
        $this->db->select('id,image,created');
        $this->db->from('pro_image');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('created','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('pro_image',$data);
        return $insert?true:false;
    }
    
}
