<?php
/**
* 
*/
class Update_model extends CI_Model
{
	
	function __construct() {
        parent::__construct();
    }
    public function outLabAmount($id, $amount){
        $this->db->set('remainAmount', 'remainAmount +' .$amount, false);
        $this->db->where('id', $id);
        $this->db->update('out_lab_pathology');
    }
    public function outLabDelAmount($id, $amount){
        $this->db->set('remainAmount', 'remainAmount -' .$amount, false);
        $this->db->where('id', $id);
        $this->db->update('out_lab_pathology');
    }
    
    public function totalDue($id){
        $this->db->select_sum('outprice');
        $this->db->from('out_lab_test');
        $this->db->where('labID', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function fixedAssetUp($id, $amount){
        $this->db->set('quantity', 'quantity +' .$amount, false);
        $this->db->where('id', $id);
        $this->db->update('fixedassetname');
    }
    public function fixedAssetDel($id, $amount){
        $this->db->set('quantity', 'quantity -' .$amount, false);
        $this->db->where('id', $id);
        $this->db->update('fixedassetname');
    }
    public function grnNum($patcat)
    {
        $this->db->select_max('grnNum');
        $this->db->where('patReg', $patcat);
        $d = $this->db->get('patient_new');
        return $d->row();
    }
    public function grnMNum($patcat, $dmonth)
    {
        $this->db->select_max('grnMNum');
        $this->db->where('patReg', $patcat);
        $this->db->where('dmonth', $dmonth);
        $d = $this->db->get('patient_new');
        return $d->row();
    }
    public function mrnNum($patcat)
    {
        $this->db->select_max('mrnNum');
        $this->db->where('patReg', $patcat);
        $d = $this->db->get('patient_new');
        return $d->row();
    }
    public function mrnMNum($patcat, $dmonth)
    {
        $this->db->select_max('mrnMNum');
        $this->db->where('patReg', $patcat);
        $this->db->where('dmonth', $dmonth);
        $d = $this->db->get('patient_new');
        return $d->row();
    }
    public function prnNum($patcat)
    {
        $this->db->select_max('prnNum');
        $this->db->where('patReg', $patcat);
        $d = $this->db->get('patient_new');
        return $d->row();
    }
    public function prnMNum($patcat, $dmonth)
    {
        $this->db->select_max('prnMNum');
        $this->db->where('patReg', $patcat);
        $this->db->where('dmonth', $dmonth);
        $d = $this->db->get('patient_new');
        return $d->row();
    }
    public function todayExpense(){
        $date = '03-01-2019';
        $this->db->select_sum('paid');
        $this->db->group_by(array('date'));
        $this->db->where('date', $date);
        $query = $this->db->get('test_sale');
        return $query->result();
    }
    public function fixedassetNumber($assetId)
    {
        $this->db->select_max('assetNumber');
        $this->db->where('assetId', $assetId);
        $d = $this->db->get('fxassetnumber');
        return $d->row();
    }
    public function delfixedassetNumber($assetId, $limit)
    {
        $this->db->select('*');
        $this->db->where('assetId', $assetId);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit);
        $this->db->delete('fxassetnumber');
        
    }
    public function expenseCashSum(){
        $this->db->select_sum('cash');
        $this->db->from('expense');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function expensechequeSum(){
        $this->db->select_sum('cheque');
        $this->db->from('expense');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function testsaleSub(){
        $this->db->select_sum('sub_total');
        $this->db->from('test_sale_view');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function testsaleDis(){
        $this->db->select_sum('discount');
        $this->db->from('test_sale_view');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function testsaleCon(){
        $this->db->select_sum('consider');
        $this->db->from('test_sale_view');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function testsaleGrand(){
        $this->db->select_sum('grand_total');
        $this->db->from('test_sale_view');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function checkregisterBook(){
        $this->db->select_sum('grand_total');
        $this->db->from('test_sale_view');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function test_package(){
        $this->db->select('*');
        $this->db->from('test_package');
        $this->db->where('deleted', 0);
        $this->db->group_by('tpId');
        $query = $this->db->get();
        return $query->result();
    }
}?>