<?php
class Shopping_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_inv(){
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query=$this->db->get('new_order');
        
        $c=count($query->row());
        if($c==null){
            return 0;
        }else{
            return $query->row();
        }
    }
    public function last_id(){
           $insert_id = $this->db->insert_id();
           return $insert_id;
    }
    public function last_check_id(){
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query=$this->db->get('new_order')->row();
        return $query;
    }
    public function get_customer(){
        $this->db->select('measurement.*,new_order.*, new_order.id as id');
        $this->db->from('new_order');
        $this->db->join('measurement', 'new_order.custID = measurement.id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_customer_1($id){
        $this->db->select('*');
        $this->db->from('measurement');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_group_inv($innum){
        $this->db->select('measurement.*,new_order.*, style_category.name as stylename, new_order.date as invoicedate, new_order.id as id');
        $this->db->from('new_order');
        $this->db->join('measurement', 'new_order.custID = measurement.id');
        $this->db->join('style_category', 'new_order.styleID = style_category.id');
        $this->db->where('invoice_number', $innum);
        // $this->db->group_by('invoice_number', $innum);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_view_1($id){
        $this->db->select('measurement.*,new_order.*, style_category.name as stylename, new_order.date as invoicedate, new_order.id as id');
        $this->db->from('new_order');
        $this->db->join('measurement', 'new_order.custID = measurement.id');
        $this->db->join('style_category', 'new_order.styleID = style_category.id');
        $this->db->where('new_order.id', $id);
        // $this->db->group_by('invoice_number', $innum);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_group_list(){
        $this->db->select('measurement.*,new_order.*, style_category.name as stylename, new_order.date as invoicedate, new_order.id as id');
        $this->db->from('new_order');
        $this->db->join('measurement', 'new_order.custID = measurement.id');
        $this->db->join('style_category', 'new_order.styleID = style_category.id');
        // $this->db->where('invoice_number', $innum);
        $this->db->group_by('invoice_number');
        $this->db->order_by('new_order.id','desc');
        // $this->db->group_by('invoice_number', $innum);
        $query = $this->db->get();
        return $query->result();
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
}
?>