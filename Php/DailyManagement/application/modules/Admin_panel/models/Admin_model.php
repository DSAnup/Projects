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
    public function get_exPurpose($id){
        $this->db->select('expense.*,  purpose.purpose');
        $this->db->from('expense');
        $this->db->join('purpose', 'expense.purId = purpose.id','left');
        $this->db->where('expense.userId', $id);
        $this->db->order_by('expense.id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_exDatePurpose($id, $date){
        $this->db->select('expense.*,  purpose.purpose');
        $this->db->from('expense');
        $this->db->join('purpose', 'expense.purId = purpose.id','left');
        $this->db->where('expense.userId', $id);
        $this->db->where('expense.exDate', $date);
        $this->db->order_by('expense.id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_exGroupPurpose($id){
        $this->db->select('expense.*,  purpose.purpose');
        $this->db->from('expense');
        $this->db->join('purpose', 'expense.purId = purpose.id','left');
        $this->db->where('expense.userId', $id);
        $this->db->group_by('expense.exDate');
        $this->db->order_by('expense.id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_erPurpose($id){
        $this->db->select('earn.*,  purpose.purpose');
        $this->db->from('earn');
        $this->db->join('purpose', 'earn.purId = purpose.id','left');
        $this->db->where('earn.userId', $id);
        $this->db->order_by('earn.id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function sumExpense($userId){
        $this->db->select_sum('exAmount');
        $this->db->where('userId', $userId);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function sumEarn($userId){
        $this->db->select_sum('eAmount');
        $this->db->where('userId', $userId);
        $query = $this->db->get('earn');
        return $query->row();
    }
    public function expensebalanceUpdate($amount, $userId){
        
        $this->db->set('expenseTotal', 'expenseTotal-'.$amount , FALSE);
        $this->db->where('userId', $userId);
        $this->db->update('balance');
    }
    public function currentbalanceUpdate($amount, $userId){
        
        $this->db->set('earnTotal', 'earnTotal-'.$amount , FALSE);
        $this->db->where('userId', $userId);
        $this->db->update('balance');
    }
    public function lendbalanceUpdate($amount, $userId){
        $this->db->set('earnTotal', 'earnTotal-'.$amount , FALSE);
        $this->db->where('userId', $userId);
        $this->db->update('balance');
    }
    public function lendbalanceUpdate2($amount, $userId){
        
        $this->db->set('earnTotal', 'earnTotal+'.$amount , FALSE);
        $this->db->where('userId', $userId);
        $this->db->update('balance');
    }
    public function lendbalanceRemain($amount, $userId, $id){
        $array = array('userId'=>$userId, 'id'=>$id);
        $this->db->set('lendBalance', 'lendBalance-'.$amount , FALSE);
        $this->db->where($array);
        $this->db->update('lend');
    }
    public function lendbalanceReturn($amount, $userId, $id){
        $array = array('userId'=>$userId, 'id'=>$id);
        $this->db->set('lendReturn', 'lendReturn +'.$amount , FALSE);
        $this->db->where($array);
        $this->db->update('lend');
    }
    public function borrowbalanceUpdate($amount, $userId){
        $this->db->set('earnTotal', 'earnTotal+'.$amount , FALSE);
        $this->db->where('userId', $userId);
        $this->db->update('balance');
    }
    public function borrowbalanceUpdate2($amount, $userId){
        
        $this->db->set('earnTotal', 'earnTotal-'.$amount , FALSE);
        $this->db->where('userId', $userId);
        $this->db->update('balance');
    }
    public function borrowbalanceRemain($amount, $userId, $id){
        $array = array('userId'=>$userId, 'id'=>$id);
        $this->db->set('borrowBalance', 'borrowBalance-'.$amount , FALSE);
        $this->db->where($array);
        $this->db->update('borrow');
    }
    public function borrowbalanceReturn($amount, $userId, $id){
        $array = array('userId'=>$userId, 'id'=>$id);
        $this->db->set('borrowGive', 'borrowGive +'.$amount , FALSE);
        $this->db->where($array);
        $this->db->update('borrow');
    }
    public function get_expense($date, $id)
    {
        $this->db->select('exAmount');
        $this->db->from('expense');
        $this->db->like('expense.exDate', $date);
        $this->db->where('expense.userId', $id);
        $d = $this->db->get()->result();
        // $d=$this->db->query('SELECT exAmount FROM expense WHERE expense.exDate like "%'.$date.'%"')->result();
        $grand_total=0;
        foreach ($d as $k) {
            $grand_total+=$k->exAmount;
        }
        return $grand_total;
    }
    public function todayExpense($id){
        $date = date('Y-m-d');
        $con = array('expense.exDate'=> $date,'expense.userId'=>$id );
        $this->db->select_sum('exAmount');
        $this->db->where($con);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function thisMonthExpense($id){
        $date = date('Y-m');
        // $con = array('expense.exDate'=> $date,'expense.userId'=>$id );
        $this->db->select_sum('exAmount');
        $this->db->like('exDate', $date);
        $this->db->where('userId', $id);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function totalExpense($id){
        // $date = date('Y-m');
        // $con = array('expense.exDate'=> $date,'expense.userId'=>$id );
        $this->db->select_sum('exAmount');
        // $this->db->like('exDate', $date);
        $this->db->where('userId', $id);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function totalEarn($id){
        // $date = date('Y-m');
        // $con = array('expense.exDate'=> $date,'expense.userId'=>$id );
        $this->db->select_sum('eAmount');
        // $this->db->like('exDate', $date);
        $this->db->where('userId', $id);
        $query = $this->db->get('earn');
        return $query->row();
    }
    public function yesterdayExpense($id){
        $date = date('Y-m-d', strtotime("-1 days"));
        $con = array('expense.exDate'=> $date,'expense.userId'=>$id );
        $this->db->select_sum('exAmount');
        $this->db->where($con);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function lastWeekExpense($id){
        $previous_week = strtotime("-1 week +1 day");

        $start_week = strtotime("last saturday midnight",$previous_week);
        $end_week = strtotime("next friday",$start_week);

        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);
        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->where('expense.exDate >=', $start_week);
        $this->db->where('expense.exDate <=', $end_week);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function lastMonthExpense($id){

        $start_month = date("Y-m-d", strtotime("first day of previous month"));
        $end_month = date("Y-m-d", strtotime("last day of previous month"));

        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->where('expense.exDate >=', $start_month);
        $this->db->where('expense.exDate <=', $end_month);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function lastYearExpense($id){

        $last_year = date("Y",strtotime("-1 year"));


        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->like('expense.exDate', $last_year);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function dateReportExpense($startdate, $enddate, $id){
        $this->db->select('*');
        $this->db->where('expense.userId', $id);
        $this->db->where('expense.exDate >=', $startdate);
        $this->db->where('expense.exDate <=', $enddate);
        $query = $this->db->get('expense');
        return $query->result();
    }
    public function dateGroupExpenseSum($startdate, $id){
        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->where('expense.exDate', $startdate);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function dateReportExpenseSum($startdate, $enddate, $id){
        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->where('expense.exDate >=', $startdate);
        $this->db->where('expense.exDate <=', $enddate);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function monthReportExpense($month,  $id){
        $this->db->select('*');
        $this->db->where('expense.userId', $id);
        $this->db->like('exDate', $month);
        $query = $this->db->get('expense');
        return $query->result();
    }
    public function monthReportExpenseSum($month,  $id){
        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->like('exDate', $month);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function yearReportExpense($month,  $id){
        $this->db->select('*');
        $this->db->where('expense.userId', $id);
        $this->db->like('exDate', $month);
        $query = $this->db->get('expense');
        return $query->result();
    }
    public function yearReportExpenseSum($month,  $id){
        $this->db->select_sum('exAmount');
        $this->db->where('expense.userId', $id);
        $this->db->like('exDate', $month);
        $query = $this->db->get('expense');
        return $query->row();
    }
    public function dateReportEarn($startdate, $enddate, $id){
        $this->db->select('*');
        $this->db->where('earn.userId', $id);
        $this->db->where('earn.eDate >=', $startdate);
        $this->db->where('earn.eDate <=', $enddate);
        $query = $this->db->get('earn');
        return $query->result();
    }
    public function dateReportEarnSum($startdate, $enddate, $id){
        $this->db->select_sum('eAmount');
        $this->db->where('earn.userId', $id);
        $this->db->where('earn.eDate >=', $startdate);
        $this->db->where('earn.eDate <=', $enddate);
        $query = $this->db->get('earn');
        return $query->row();
    }
    public function monthReportEarn($month, $id){
        $this->db->select('*');
        $this->db->where('earn.userId', $id);
        $this->db->like('eDate', $month);
        $query = $this->db->get('earn');
        return $query->result();
    }
    public function monthReportEarnSum($month, $id){
        $this->db->select_sum('eAmount');
        $this->db->where('earn.userId', $id);
        $this->db->like('eDate', $month);
        $query = $this->db->get('earn');
        return $query->row();
    }
    public function yearReportEarn($month, $id){
        $this->db->select('*');
        $this->db->where('earn.userId', $id);
        $this->db->like('eDate', $month);
        $query = $this->db->get('earn');
        return $query->result();
    }
    public function yearReportEarnSum($month, $id){
        $this->db->select_sum('eAmount');
        $this->db->where('earn.userId', $id);
        $this->db->like('eDate', $month);
        $query = $this->db->get('earn');
        return $query->row();
    }
    public function dateReportBorrow($startdate, $enddate, $id){
        $this->db->select('*');
        $this->db->where('borrow.userId', $id);
        $this->db->where('borrow.bDate >=', $startdate);
        $this->db->where('borrow.bDate <=', $enddate);
        $query = $this->db->get('borrow');
        return $query->result();
    }
    public function dateReportBorrowAmountSum($startdate, $enddate, $id){
        $this->db->select_sum('borrowAmount');
        $this->db->where('borrow.userId', $id);
        $this->db->where('borrow.bDate >=', $startdate);
        $this->db->where('borrow.bDate <=', $enddate);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function dateReportBorrowBalanceSum($startdate, $enddate, $id){
        $this->db->select_sum('borrowBalance');
        $this->db->where('borrow.userId', $id);
        $this->db->where('borrow.bDate >=', $startdate);
        $this->db->where('borrow.bDate <=', $enddate);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function dateReportBorrowGiveSum($startdate, $enddate, $id){
        $this->db->select_sum('borrowGive');
        $this->db->where('borrow.userId', $id);
        $this->db->where('borrow.bDate >=', $startdate);
        $this->db->where('borrow.bDate <=', $enddate);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function monthReportBorrow($month, $id){
        $this->db->select('*');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->result();
    }
    public function monthReportBorrowAmountSum($month, $id){
        $this->db->select_sum('borrowAmount');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function monthReportBorrowBalanceSum($month, $id){
        $this->db->select_sum('borrowBalance');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function monthReportBorrowGiveSum($month, $id){
        $this->db->select_sum('borrowGive');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function yearReportBorrow($month, $id){
        $this->db->select('*');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->result();
    }
    public function yearReportBorrowAmountSum($month, $id){
        $this->db->select_sum('borrowAmount');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function yearReportBorrowBalanceSum($month, $id){
        $this->db->select_sum('borrowBalance');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function yearReportBorrowGiveSum($month, $id){
        $this->db->select_sum('borrowGive');
        $this->db->where('borrow.userId', $id);
        $this->db->like('bDate', $month);
        $query = $this->db->get('borrow');
        return $query->row();
    }
    public function dateReportLend($startdate, $enddate, $id){
        $this->db->select('*');
        $this->db->where('lend.userId', $id);
        $this->db->where('lend.lDate >=', $startdate);
        $this->db->where('lend.lDate <=', $enddate);
        $query = $this->db->get('lend');
        return $query->result();
    }
    public function dateReportLendAmountSum($startdate, $enddate, $id){
        $this->db->select_sum('lendAmount');
        $this->db->where('lend.userId', $id);
        $this->db->where('lend.lDate >=', $startdate);
        $this->db->where('lend.lDate <=', $enddate);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function dateReportLendBalanceSum($startdate, $enddate, $id){
        $this->db->select_sum('lendBalance');
        $this->db->where('lend.userId', $id);
        $this->db->where('lend.lDate >=', $startdate);
        $this->db->where('lend.lDate <=', $enddate);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function dateReportLendGiveSum($startdate, $enddate, $id){
        $this->db->select_sum('lendReturn');
        $this->db->where('lend.userId', $id);
        $this->db->where('lend.lDate >=', $startdate);
        $this->db->where('lend.lDate <=', $enddate);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function monthReportLend($month, $id){
        $this->db->select('*');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->result();
    }
    public function monthReportLendAmountSum($month, $id){
        $this->db->select_sum('lendAmount');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function monthReportLendBalanceSum($month, $id){
        $this->db->select_sum('lendBalance');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function monthReportLendGiveSum($month, $id){
        $this->db->select_sum('lendReturn');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function yearReportLend($month, $id){
        $this->db->select('*');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->result();
    }
    public function yearReportLendAmountSum($month, $id){
        $this->db->select_sum('lendAmount');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function yearReportLendBalanceSum($month, $id){
        $this->db->select_sum('lendBalance');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function yearReportLendGiveSum($month, $id){
        $this->db->select_sum('lendReturn');
        $this->db->where('lend.userId', $id);
        $this->db->like('lDate', $month);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function currentLendBalanceSum($id){
        $this->db->select_sum('lendBalance');
        $this->db->where('lend.userId', $id);
        $query = $this->db->get('lend');
        return $query->row();
    }
    public function currentBorrowBalanceSum($id){
        $this->db->select_sum('borrowBalance');
        $this->db->where('borrow.userId', $id);
        $query = $this->db->get('borrow');
        return $query->row();
    }
}
?>