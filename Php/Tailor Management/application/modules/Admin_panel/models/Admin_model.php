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
    public function get_person_name(){
        $query = $this->db->query("SELECT attendance.*, person.name FROM attendance LEFT JOIN person ON attendance.personID = person.id");
        return $query;
    }
    public function get_category(){
        $this->db->select('fd_item.*, fd_item.id as id, fd_category.name');
        $this->db->from('fd_item');
        $this->db->join('fd_category', 'fd_item.catID = fd_category.id','left');
        $query = $this->db->get();
        return $query->result();
    }
    public function count_msg(){
        $this->db->from('fd_msg');
        // $this->db->where('fd_msg.siteID', $siteID)
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function login_time($id){
        $startdate = date('Y-m-d');
        $this->db->set('lastlogin', $startdate, false);
        $this->db->where('id', $id);
        $this->db->update('admin_waps');
    }
    public function super_admin(){
        $this->db->from('admin_waps');
        $this->db->where('admin_waps.permission', '1');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function update_cus(){
        $query = $this->db->query("UPDATE measurement SET cust_number = CONCAT('Customer_000','',id);");
        return $query;
    }
    public function get_search($name){
        $this->db->like('name', $name,'both');
        return $this->db->get('measurement')->result();
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
    public function get_rep_cost($first, $second){
        $this->db->where('date >=', $first);
        $this->db->where('date <=', $second);
        return $this->db->get('cost')->result();
    }

    public function get_rep_sum($first, $second){
        $this->db->select_sum('amount');
        $this->db->where('date >=', $first);
        $this->db->where('date <=', $second);
        return $this->db->get('cost')->row();
    }
    public function get_rep_order($first, $second){
        $this->db->where('date2 >=', $first);
        $this->db->where('date2 <=', $second);
        $this->db->group_by("invoice_number");
        return $this->db->get('new_order')->result();
    }
    public function get_rep_order_sum($first, $second){
        $this->db->select('grand_total');
        $this->db->where('date2 >=', $first);
        $this->db->where('date2 <=', $second);
        $this->db->group_by("invoice_number");
        return $this->db->get('new_order')->result();
    }
}
?>