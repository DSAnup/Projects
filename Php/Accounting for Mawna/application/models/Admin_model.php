<?php
/**
* 
*/
class Admin_model extends CI_Model
{
	
	function __construct() {
        parent::__construct();
    }
    
    public function get_expense()
    {
        $y=date('Y');
        $m=date('m');
        $query=$this->db->query('SELECT e.*,s.sub_category,c.category,c.id as c_id FROM `expense` AS e JOIN expense_sub_category as s ON e.sub_categoryID=s.id JOIN expense_category AS c ON s.categoryID=c.id WHERE date BETWEEN "'.$y.'-'.$m.'-01" AND "'.$y.'-'.$m.'-31" AND e.deleted=0');
        return $query->result();
    }
    public function get_expense_1($id)
    {
        $y=date('Y');
        $m=date('m');
        $query=$this->db->query('SELECT e.*,s.sub_category,c.category,c.id as c_id FROM `expense` AS e JOIN expense_sub_category as s ON e.sub_categoryID=s.id JOIN expense_category AS c ON s.categoryID=c.id WHERE e.id='.$id);
        return $query->row();
    }
    public function get_invoice_id()
    {
        $query=$this->db->query('select max(invoice_id) as invoice_id from test_sale');
        return $query->row();
    }
    public function get_test_sold()
    {
        $query=$this->db->query('select * from test_sale where deleted=0 group by invoice_id order by id desc');
        return $query->result();
    }
    public function get_sale_invoice()
    {
        $query=$this->db->query('select * from product_sale group by invoice_id order by id desc');
        return $query->result();
    }
    public function get_free_sale_invoice()
    {
        $query=$this->db->query('select * from free_product group by invoice_id order by id desc');
        return $query->result();
    }
    public function get_invoice_id_pr()
    {
        $query=$this->db->query('select max(invoice_id) as invoice_id from product_sale');
        return $query->row();
    }
    public function get_invoice_id_free()
    {
        $query=$this->db->query('select max(invoice_id) as invoice_id from free_product');
        return $query->row();
    }
    public function opening_stock($id)
    {
        $date=date('Y-m').'-01';
        $purchase=$this->db->query('select sum(quantity) as qty from product_purchase where productID='.$id.' and date<"'.$date.'"')->row();
        $sale=$this->db->query('select sum(qty) as qty from product_sale where productID='.$id.' and date<"'.$date.'"')->row();
        $free=$this->db->query('select sum(qty) as qty from free_product where productID='.$id.' and date<"'.$date.'"')->row();
        return $open=$purchase->qty-($sale->qty+$free->qty);
        
    }
    public function product_recieve($id)
    {
        $date=date('Y-m').'-01';
        $today=date('Y-m-d');
        $purchase=$this->db->query('select sum(quantity) as qty from product_purchase where productID='.$id.' and date>="'.$date.'" and date<="'.$today.'"')->row();
        return $open=$purchase->qty;
    }
    public function product_sold($id)
    {
        $date=date('Y-m').'-01';
        $today=date('Y-m-d');
        $sale=$this->db->query('select sum(qty) as qty from product_sale where productID='.$id.' and date>="'.$date.'" and date<="'.$today.'"')->row();
        $free=$this->db->query('select sum(qty) as qty from free_product where productID='.$id.' and date>="'.$date.'" and date<="'.$today.'"')->row();
        return $sale=$sale->qty+$free->qty;
    }
    public function get_out_lsb_test_sold()
    {
        $query=$this->db->query('select * from out_lab_test group by invoice_id order by id desc');
        return $query->result();
    }
    public function get_out_lab_invoice_id()
    {
        $query=$this->db->query('select max(invoice_id) as invoice_id from out_lab_test');
        return $query->row();
    }
    public function get_lab_last_month_due($id)
    {
        $date=date('Y-m-d');
        $sale=$this->db->query('select total from out_lab_test where labID='.$id.' and date <= "'.$date.'" group by invoice_id')->result();
        $sold=0;
        foreach ($sale as $k) {
            $sold+=$k->total;
        }
        $paid=$this->db->query('select sum(cash+cheque) as paid from out_lab_payment where labID='.$id.' and date <="'.$date.'" ')->row();
        return $due=$sold-$paid->paid;
    }
    public function reagent_opening_stock($id)
    {
        $date=date('Y-m').'-01';
        $pr=$this->db->query('select * from lab_reagent where id="'.$id.'"')->row();
        $in=$this->db->query('select sum(quantity) as p from reagent_purchase where reagentID='.$id.' and date < "'.$date.'"')->row();
        $out=$this->db->query('select sum(sold) as s from reagent_sale where reagentID='.$id.' and date < "'.$date.'"')->row();
        return $due=$in->p-round($out->s/$pr->box_size,2);
        // return $due=$pr->box_size;
    }
    public function reagent_stock_in($id,$d)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(quantity) as p from reagent_purchase where reagentID='.$id.' and date >= "'.$date.'" and date <= "'.$d.'" ')->row();
        return $due=$in->p;
    }
    public function reagent_stock_out($id,$d)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(sold) as p from reagent_sale where reagentID='.$id.' and date >= "'.$date.'" and date <= "'.$d.'" ')->row();
        return $due=$in->p;
    }
    public function reagent_stock($id)
    {
        $date=date('Y-m-d');
        $in=$this->db->query('select sum(quantity) as p from reagent_purchase where reagentID='.$id.' and date <= "'.$date.'"')->row();
        $out=$this->db->query('select sum(sold) as s from reagent_sale where reagentID='.$id.' and date <= "'.$date.'"')->row();
        return $due=$in->p-$out->s;
    }
    public function get_total_product_purchase($id)
    {
        $date=date('Y-m-d');
        $in=$this->db->query('SELECT sum(total) as total FROM `product_purchase`  JOIN products  ON product_purchase.productID=products.id JOIN product_supplier ON products.supplierID=product_supplier.id WHERE product_supplier.id='.$id.' and product_purchase.date <= "'.$date.'"')->row();
        return $in->total;
    }
    public function get_total_reagent_purchase($id)
    {
        $date=date('Y-m-d');
        $in=$this->db->query('select sum(total) as p from reagent_purchase where reagentID='.$id.' and date <= "'.$date.'"')->row();
        return $due=$in->p;
    }
    public function get_total_paid($id)
    {
        $date=date('Y-m-d');
        $in=$this->db->query('select sum(cash+cheque) as paid from supplier_payment where supplierID='.$id.' and date <="'.$date.'" ')->row();
        return $due=$in->paid;
    }
    public function get_total_due()
    {

    }
    public function get_product_due()
    {
        $in=$this->db->query('select * from product_sale where due>0 group by invoice_id order by id desc ')->result();
        return $in;
    }
    public function get_test_due()
    {
        $in=$this->db->query('select * from test_sale where due>0 group by invoice_id order by id desc ')->result();
        return $in;
    }
    public function get_test_due_individual($id)
    {
        $in=$this->db->query('SELECT due FROM test_sale WHERE patientID = "'.$id.'" GROUP BY invoice_id')->result();
        return $in;
    }

    public function get_product_sale_individual($id)
    {
        $in=$this->db->query('SELECT due FROM product_sale WHERE customer_name = "'.$id.'" GROUP BY invoice_id')->result();
        return $in;
    }
    public function get_due_paid_individual($id)
    {
        $in=$this->db->query('SELECT amount FROM due_paid WHERE patientID = "'.$id.'"')->result();
        return $in;
    }
    public function get_p_month_product_purchase($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('SELECT sum(total) as total FROM `product_purchase`  JOIN products  ON product_purchase.productID=products.id JOIN product_supplier ON products.supplierID=product_supplier.id WHERE product_supplier.id='.$id.' and product_purchase.date < "'.$date.'"')->row();
        return $in->total;
    }
    public function get_p_month_reagent_purchase($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(total) as p from reagent_purchase where reagentID='.$id.' and date < "'.$date.'"')->row();
        return $due=$in->p;
    }
    public function get_p_month_paid($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(cash+cheque) as paid from supplier_payment where supplierID='.$id.' and date <"'.$date.'" ')->row();
        return $due=$in->paid;
    }
    public function get_c_month_product_purchase($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('SELECT sum(total) as total FROM `product_purchase`  JOIN products  ON product_purchase.productID=products.id JOIN product_supplier ON products.supplierID=product_supplier.id WHERE product_supplier.id='.$id.' and product_purchase.date >= "'.$date.'"')->row();
        return $in->total;
    }
    public function get_c_month_reagent_purchase($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(total) as p from reagent_purchase where reagentID='.$id.' and date >= "'.$date.'"')->row();
        return $due=$in->p;
    }
    public function get_c_month_paid($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(cash+cheque) as paid from supplier_payment where supplierID='.$id.' and date >="'.$date.'" ')->row();
        return $due=$in->paid;
    }
    public function get_cash_supplier_payment($id)
    {
        $date=date('Y-m-d');
        $in=$this->db->query('select sum(cash) as paid from supplier_payment where supplierID='.$id.' and date <="'.$date.'" ')->row();
        return $due=$in->paid;
    }
    public function get_ck_supplier_payment($id)
    {
        $date=date('Y-m-d');
        $in=$this->db->query('select sum(cheque) as paid from supplier_payment where supplierID='.$id.' and date <="'.$date.'" ')->row();
        return $due=$in->paid;
    }
    public function get_expense_ck($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(cheque) as paid from expense where sub_categoryID='.$id.' and date >="'.$date.'" ')->row();
        return $due=$in->paid;
    }
    public function get_expense_csh($id)
    {
        $date=date('Y-m').'-01';
        $in=$this->db->query('select sum(cash) as paid from expense where sub_categoryID='.$id.' and date >="'.$date.'" ')->row();
        return $due=$in->paid;
    }
    
    public function get_total_daily_income($id)
    {
        $i=sprintf('%02d',$id);
        $date=$i.'-'.date('m-Y');
        $in=$this->db->query('select sum(paid) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(paid) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
            $product=$in->paid;
        }
        if(isset($t)){
            $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_total_daily_income_pre($id)
    {

        $i=sprintf('%02d',$id);
        $date=$i.'-'.date('m-Y');
        $date=date('Y-m-d',strtotime('-1 day',strtotime($da)));
        $in=$this->db->query('select sum(paid) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(paid) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
             $product=$in->paid;
        }
        if(isset($t)){
             $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_total_daily_due($id)
    {
        $i=sprintf('%02d',$id);
        $date=$i.'-'.date('m-Y');
        $in=$this->db->query('select sum(due) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(due) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
             $product=$in->paid;
        }
        if(isset($t)){
             $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_total_daily_due_paid($id)
    {
        $i=sprintf('%02d',$id);
        // $date=$i.'-'.date('m-Y');
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as paid from due_paid where date ="'.$date.'"')->row();
        if($in==NULL){
            return 0;
        }else{
            return $in->paid+0;
        }
    }
    public function get_total_daily_cash_expense($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash) as paid from expense where date ="'.$date.'" and sub_categoryID!=17 and sub_categoryID!=18')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_ck_expense($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cheque) as paid from expense where date ="'.$date.'" and sub_categoryID!=17 and sub_categoryID!=18')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_bank_deposit($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as paid from bank_deposit where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_president_honorium($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash+cheque) as paid from expense where date ="'.$date.'" and sub_categoryID!=17')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_pharmacy_cash($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as paid from pharmacy_cash_receive where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_lend($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as paid from lend where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_lend_return($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as paid from lend_return where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_cash_borrow($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash) as paid from borrow where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_cheque_borrow($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cheque) as paid from borrow where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }

    public function get_total_daily_cash_borrow_paid($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash) as paid from borrow_paid where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_total_daily_cheque_borrow_paid($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cheque) as paid from borrow_paid where date ="'.$date.'"')->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_date_wise_ck_expense($d,$sub)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cheque) as paid from expense where date ="'.$date.'" and sub_categoryID='.$sub)->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_date_wise_csh_expense($d,$sub)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash) as paid from expense where date ="'.$date.'" and sub_categoryID='.$sub)->row();
        $r=0;
        if(isset($in)){
            $r=$in->paid;
        }
        return $r+0;
    }
    public function get_date_wise_supplier_due($d,$id)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $product=$this->db->query('SELECT sum(total) as total FROM `product_purchase`  JOIN products  ON product_purchase.productID=products.id JOIN product_supplier ON products.supplierID=product_supplier.id WHERE product_supplier.id='.$id.' and product_purchase.date = "'.$date.'"')->row();

        $reagent=$this->db->query('select sum(total) as p from reagent_purchase where reagentID='.$id.' and date = "'.$date.'"')->row();

        $paid=$this->db->query('select sum(cash+cheque) as paid from supplier_payment where supplierID='.$id.' and date <="'.$date.'" ')->row();

        if(($product->total+$reagent->p)-$paid->paid<0){
            return 0;
        }else{
            return ($product->total+$reagent->p)-$paid->paid;
        }
    }
    public function get_date_wise_supplier_paid($d,$id)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $paid=$this->db->query('select sum(cash+cheque) as paid from supplier_payment where supplierID='.$id.' and date ="'.$date.'" ')->row();
        $pp=0;
        if(isset($paid)){
            $pp= $paid->paid;
        }
        return $pp+0;
    }
    public function get_date_wise_lab_due($d,$id)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $paid=$this->db->query('select sum(cheque) as paid from out_lab_payment where labID='.$id.' and date ="'.$date.'" ')->row();
        $total=$this->db->query('select total from out_lab_test where labID='.$id.' and date ="'.$date.'" group by invoice_id')->result();
        $p=0;
        foreach ($total as $key => $value) {
            $p+=(float)$value->total;
        }
        $pp=0;
        if(isset($paid)){
            $pp= $p-$paid->paid;
        }
        if($pp<0){
            $pp=0;
        }
        return $pp+0;
    }
    public function get_date_wise_lab_paid($d,$id)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $paid=$this->db->query('select sum(cheque) as paid from out_lab_payment where labID='.$id.' and date ="'.$date.'" ')->row();

        $pp=0;
        if(isset($paid)){
            $pp= $paid->paid;
        }
        if($pp<0){
            $pp=0;
        }
        return $pp+0;
    }
    public function get_date_wise_lend($d)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $paid=$this->db->query('select sum(amount) as paid from lend where date ="'.$date.'" ')->row();

        $pp=0;
        if(isset($paid)){
            $pp= $paid->paid;
        }
        if($pp<0){
            $pp=0;
        }
        return $pp+0;
    }
    public function get_date_wise_borrow_due($d)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $borrow=$this->db->query('select sum(cash+cheque) as b from borrow where date ="'.$date.'" ')->row();
        $paid=$this->db->query('select sum(cash+cheque) as paid from borrow_paid where date ="'.$date.'" ')->row();
        $pp=0;
        if(isset($paid)){
            $pp= $borrow->b-$paid->paid;
        }
        if($pp<0){
            $pp=0;
        }
        return $pp+0;
    }
    public function get_date_wise_borrow_paid($d)
    {
        $i=sprintf('%02d',$d);
        $date=date('Y-m').'-'.$i;
        $paid=$this->db->query('select sum(cash+cheque) as paid from borrow_paid where date ="'.$date.'" ')->row();

        $pp=0;
        if(isset($paid)){
            $pp= $paid->paid;
        }
        if($pp<0){
            $pp=0;
        }
        return $pp+0;
    }
    public function get_book_total($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(grand_total) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(grand_total) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
            $product=$in->paid;
        }
        if(isset($t)){
            $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_book_total_due($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(due) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(due) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
            $product=$in->paid;
        }
        if(isset($t)){
            $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_book_total_due_paid($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as paid from due_paid where date ="'.$date.'"')->row();
        $product=0;
        if(isset($in)){
            $product=$in->paid;
        }
        return (float)$product+0;
    }
    public function get_book_total_consider($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(consider) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(consider) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
            $product=$in->paid;
        }
        if(isset($t)){
            $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_book_total_dis($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(discount) as paid from product_sale_view where date ="'.$date.'"')->row();
        $t=$this->db->query('select sum(discount) as paid from test_sale_view where date ="'.$date.'"')->row();
        $product=0;
        $test=0;
        if(isset($in)){
            $product=$in->paid;
        }
        if(isset($t)){
            $test=$t->paid;
        }
        return $product+$test;
    }
    public function get_book_total_free_product($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select total as paid from free_product where date ="'.$date.'" group by invoice_id')->row();
        $product=0;
        if(isset($in)){
            foreach ($in as $k) {
                $product+=$in->paid;
            }
            
        }
        return (float)$product+0;
    }
    public function get_book_total_book_sale($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(qty) as qty from product_sale where date ="'.$date.'" and productID=2')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_glucose_sale($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(qty) as qty from product_sale where date ="'.$date.'" and productID=3')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_dr_fee($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as qty from dr_fee where date ="'.$date.'"')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_medicine_cash($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as qty from medicine_receive where date ="'.$date.'"')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_medicine_due($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(due) as qty from medicine_receive where date ="'.$date.'"')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_short_item($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(amount) as qty from short_item_purchase where date ="'.$date.'"')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_lab_purchase($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(total) as qty from product_purchase where date ="'.$date.'"')->row();
        $re=$this->db->query('select sum(total) as qty from reagent_purchase where date ="'.$date.'"')->row();

        $p=$this->db->query('select sum(cash+cheque) as qty from supplier_payment where date ="'.$date.'"')->row();

        $product=0;
        $reagent=0;
        $paid=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        if(isset($re)){
            $reagent=$re->qty;  
        }
        if(isset($p)){
            $paid=$p->qty;  
        }
        return $paid+0;
    }
    public function get_book_total_lab_due($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(total) as qty from product_purchase where date ="'.$date.'"')->row();
        $re=$this->db->query('select sum(total) as qty from reagent_purchase where date ="'.$date.'"')->row();

        $p=$this->db->query('select sum(cash+cheque) as qty from supplier_payment where date ="'.$date.'"')->row();

        $product=0;
        $reagent=0;
        $paid=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        if(isset($re)){
            $reagent=$re->qty;  
        }
        if(isset($p)){
            $paid=$p->qty;  
        }
        return ($product+$reagent)-$paid;
    }
    public function get_book_total_rce($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash) as qty from expense where date ="'.$date.'" and sub_categoryID=19')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_mce($id)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select sum(cash) as qty from expense where date ="'.$date.'" and sub_categoryID=20')->row();
        $product=0;
        if(isset($in)){
            $product=$in->qty;  
        }
        return (float)$product+0;
    }
    public function get_book_total_pt_no($id,$type)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select * from dr_fee where date ="'.$date.'" and type="'.$type.'"')->row();
        $product=0;
        if(isset($in)){
            $product=count($in);  
        }
        return (float)$product+0;
    }
    public function get_book_total_test_no($id,$test)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y-m').'-'.$i;
        $in=$this->db->query('select count(testID) as no from test_sale where date ="'.$date.'" and testID="'.$test.'"')->row();
        $u=$this->db->query('select count(testID) as no from out_lab_test where date ="'.$date.'" and testID="'.$test.'"')->row();
        return $in->no+$u->no;
    }
    public function get_product_sale_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(paid) as p from product_sale_view where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_test_sale_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(paid) as p from test_sale_view where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_dr_fee_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(amount) as p from dr_fee where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_pharmacy_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(amount) as p from pharmacy_cash_receive where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_free_product_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(qty) as p from free_product where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_free_test_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select count(testID) as p from test_sale where date >= "'.$start.'" and date <= "'.$end.'" and price=0')->row();
        return $due=$in->p+0;
    }
    public function get_lend_return_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(amount) as p from lend_return where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_borrow_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cash+cheque) as p from borrow where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_due_paid_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(amount) as p from due_paid where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_expense_monthly_category_wise_cash($id,$date)
    {
        $start=$date.'-01';
        $end=$date.'-31';
        $total=0;
        $sub=$this->db->query('select * from expense_sub_category where categoryID= "'.$id.'"')->result();
        foreach ($sub as $k) {
            $in=$this->db->query('select sum(cash) as p from expense where date >= "'.$start.'" and date <= "'.$end.'" and sub_categoryID='.$k->id)->row();
            $total+=$in->p;
        }
        return $total;
    }
    public function get_expense_monthly_category_wise_ck($id,$date)
    {
        $start=$date.'-01';
        $end=$date.'-31';
        $total=0;
        $sub=$this->db->query('select * from expense_sub_category where categoryID= "'.$id.'"')->result();
        foreach ($sub as $k) {
            $in=$this->db->query('select sum(cheque) as p from expense where date >= "'.$start.'" and date <= "'.$end.'" and sub_categoryID='.$k->id)->row();
            $total+=$in->p;
        }
        return $total;
    }
    public function get_borrow_paid_cash_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cash) as p from borrow_paid where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_borrow_paid_ck_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cheque) as p from borrow_paid where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_lend_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(amount) as p from lend where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_out_lab_cash_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cash) as p from out_lab_payment where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_out_lab_ck_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cheque) as p from out_lab_payment where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_supplier_payment_cash_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cash) as p from supplier_payment where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_supplier_payment_ck_monthly($id)
    {
        $start=date('Y').'-'.$id.'-01';
        $end=date('Y').'-'.$id.'-31';
        $in=$this->db->query('select sum(cheque) as p from supplier_payment where date >= "'.$start.'" and date <= "'.$end.'"')->row();
        return $due=$in->p+0;
    }
    public function get_opening_balance($d)
    {
        $date=$d.'-01';
        $product=$this->db->query('select sum(paid) as p from product_sale_view where date < "'.$date.'"')->row()->p;
        $test=$this->db->query('select sum(paid) as p from test_sale_view where date < "'.$date.'"')->row()->p;
        $dr=$this->db->query('select sum(amount) as p from dr_fee where date < "'.$date.'"')->row()->p;
        $pharmacy=$this->db->query('select sum(amount) as p from pharmacy_cash_receive where date < "'.$date.'"')->row()->p;
        $lend_return=$this->db->query('select sum(amount) as p from lend_return where date < "'.$date.'"')->row()->p;
        $borrow=$this->db->query('select sum(cash+cheque) as p from borrow where date < "'.$date.'"')->row()->p;
        $due_paid=$this->db->query('select sum(amount) as p from due_paid where date < "'.$date.'"')->row()->p;

        $cash_in=$product+$test+$dr+$pharmacy+$lend_return+$borrow+$due_paid;

        $expense=$this->db->query('select sum(cash+cheque) as p from expense where date < "'.$date.'"')->row()->p;
        $borrow_paid=$this->db->query('select sum(cash+cheque) as p from borrow_paid where date < "'.$date.'"')->row()->p;
        $lend=$this->db->query('select sum(amount) as p from lend where date < "'.$date.'"')->row()->p;
        $out_lab_payment=$this->db->query('select sum(cheque+cash) as p from out_lab_payment where date < "'.$date.'"')->row()->p;

        $cash_out=$expense+$borrow_paid+$lend+$out_lab_payment;
        return $cash_in-$cash_out;
    }
    public function get_current_month_due($id,$m)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y').'-'.$m.'-'.$i;
        $product=$this->db->query('select sum(due) as p from product_sale_view where date="'.$date.'"')->row()->p;
        $test=$this->db->query('select sum(due) as p from test_sale_view where date="'.$date.'"')->row()->p;
        return $product+$test;
    }
    public function get_current_month_due_paid($id,$m)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y').'-'.$m.'-'.$i;
        $product=$this->db->query('select sum(amount) as p from due_paid where date="'.$date.'"')->row()->p;
        
        return $product+0;
    }
    public function get_current_month_consider($id,$m)
    {
        $i=sprintf('%02d',$id);
        $date=date('Y').'-'.$m.'-'.$i;
        $product=$this->db->query('select sum(consider) as p from product_sale_view where date="'.$date.'"')->row()->p;
        $test=$this->db->query('select sum(consider) as p from test_sale_view where date="'.$date.'"')->row()->p;
        return $product+$test;
    }
    public function get_patient_due($id)
    {
        $product=$this->db->query('select sum(due) as p from product_sale_view where customer_name="'.$id.'"')->row()->p;
        $test=$this->db->query('select sum(due) as p from test_sale_view where patient_name="'.$id.'"')->row()->p;
        return $product+$test;
    }
    public function get_patient_due_paid($id)
    {
        $test=$this->db->query('select sum(amount) as p from due_paid where patientID="'.$id.'"')->row()->p;
        return $test+0;
    }
    public function get_current_month_punishment($id,$date)
    {
        $d=$date.'-01';
        $d2=$date.'31';
        $test=$this->db->query('select sum(amount) as p from pf_punishment where empID="'.$id.'" and date >="'.$d.'" and date<="'.$d2.'"')->row()->p;
        return $test+0;
    }
    public function get_cumulative_punishment($id,$date)
    {
        $d=$date.'-01';
        $d2=$date.'31';
        $test=$this->db->query('select sum(amount) as p from pf_punishment where empID="'.$id.'" and  date<="'.$d2.'"')->row()->p;
        return $test+0;
    }
    public function get_pf_withdraw($id)
    {
        $test=$this->db->query('select sum(amount) as p from widthdrawal where empID="'.$id.'" and  type="pf"')->row()->p;
        return $test+0;
    }
    public function get_out_lab_test($id)
    {
        $test=$this->db->query('select sum(total) as p from out_lab_test where labID="'.$id.'" group by invoice_id')->row()->p;
        return $test+0;
    }
    public function get_out_lab_payment_cash($id)
    {
        $test=$this->db->query('select sum(cash) as p from out_lab_payment where labID="'.$id.'"')->row()->p;
        return $test+0;
    }
    public function get_out_lab_payment_cheque($id)
    {
        $test=$this->db->query('select sum(cheque) as p from out_lab_payment where labID="'.$id.'"')->row()->p;
        return $test+0;
    }
    public function get_pf_reserve()
    {
        $test=$this->db->query('select sum(amount) as p from pf_reserve')->row()->p;
        return $test+0;
    }
    public function get_product_stock_in($id)
    {
        $test=$this->db->query('select sum(quantity) as p from product_purchase where productID="'.$id.'"')->row()->p;
        return $test+0;
    }
    public function get_product_stock_out($id)
    {
        $test=$this->db->query('select sum(qty) as p from product_sale where productID="'.$id.'"')->row()->p;
        return $test+0;
    }
    public function get_purchase_id($id)
    {
        $pr=$this->db->query('select * from lab_reagent where id="'.$id.'"')->row();
        $d=array();
        $p=$this->db->query('select * from reagent_purchase where reagentID="'.$id.'"')->result();
        foreach ($p as $k) {
            $s=$this->db->query('select sum(sold) as s from reagent_sale where purchase_id="'.$k->id.'"')->row();
            if($k->quantity>$s->s){
                array_push($d, $k->id);
            }
        }
        return $d;
    }
    public function get_running_stock($id)
    {
        $pr=$this->db->query('select * from lab_reagent where id="'.$id.'"')->row();
        $s=$this->db->query('select sum(sold) as s from reagent_sale where reagentID="'.$id.'"')->row();
        // return $s=$pr->box_size-(($s->s/$pr->box_size)-round($s->s/$pr->box_size))*$pr->box_size;
        return $s=$pr->box_size-(($s->s/$pr->box_size)-round($s->s/$pr->box_size))*$pr->box_size.' '.$pr->unit;
    }
    public function get_intact_stock($id)
    {
        $pr=$this->db->query('select * from lab_reagent where id="'.$id.'"')->row();
        $s=$this->db->query('select sum(sold) as s from reagent_sale where reagentID="'.$id.'"')->row();
        $p=$this->db->query('select sum(quantity) as s from reagent_purchase where reagentID="'.$id.'"')->row();
        return $s=$p->s-round($s->s/$pr->box_size);
    }
    public function get_run_exp_date($id)
    {
        $pr=$this->db->query('select * from lab_reagent where id="'.$id.'"')->row();
        $s=$this->db->query('select sum(sold) as s from reagent_sale where reagentID="'.$id.'"')->row();
        $p=$this->db->query('select * from reagent_purchase where reagentID="'.$id.'" order by id desc')->result();
        $purchase=0;
        $exp='';
        foreach ($p as $k) {
            $purchase+=$k->quantity;
            if($purchase*$pr->box_size>$s->s){
                $exp=$k->expiry_date;
                break;
            }
        }
        return $exp;
    }
    public function get_max_exp($id)
    {
        $p=$this->db->query('select max(expiry_date) as d from reagent_purchase where reagentID="'.$id.'"')->row();
        return $p->d;
    }
    public function remain_lab_product($id)
    {
        $pr=$this->db->query('select * from lab_reagent where id="'.$id.'"')->row();
        $p=$this->db->query('select sum(quantity) as d from reagent_purchase where reagentID="'.$id.'"')->row();
        $s = $this->db->query('select sum(sold) as s from reagent_sale where reagentID="'.$id.'"')->row();

        $remain = ($p->d*$pr->box_size) - $s->s;
        return $remain;
    }
    public function get_stock_monthly($regID,$month)
    {
        $i=sprintf('%02d',$month);
        $start=date('Y').'-'.$i.'-01';
        $end=date('Y').'-'.$i.'-31';
         $p=$this->db->query('select sum(sold) as d from reagent_sale where reagentID="'.$regID.'" and date >="'.$start.'" and date <="'.$end.'"')->row();
         $r=$this->db->query('select * from lab_reagent where id="'.$regID.'"')->row();
        return $p->d/$r->box_size;
         // return $p->d;
    }
    public function get_regID()
    {
        $d=$this->db->query('select max(regID) as regID from patient');
        return $d->row();
    }
    public function get_total_patinet($type,$date,$id)
    {
        $i=sprintf('%02d',$date);
        $day=date('Y-m').'-'.$i;
        $d=$this->db->query('select * from dr_fee where drID='.$id.' and date="'.$day.'" and type="'.$type.'"');
        return $d->result();
    }public function get_inv(){
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query=$this->db->get('test_sale');
        
        $c=count($query->row());
        if($c==null){
            return 0;
        }else{
            return $query->row();
        }
    }
    public function number_to_word( $num )
   {
    $ones = array(
        0 =>"ZERO", 
        1 => "ONE", 
        2 => "TWO", 
        3 => "THREE", 
        4 => "FOUR", 
        5 => "FIVE", 
        6 => "SIX", 
        7 => "SEVEN", 
        8 => "EIGHT", 
        9 => "NINE", 
        10 => "TEN", 
        11 => "ELEVEN", 
        12 => "TWELVE", 
        13 => "THIRTEEN", 
        14 => "FOURTEEN", 
        15 => "FIFTEEN", 
        16 => "SIXTEEN", 
        17 => "SEVENTEEN", 
        18 => "EIGHTEEN", 
        19 => "NINETEEN",
        "014" => "FOURTEEN" 
    ); 
    $tens = array( 
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY", 
        3 => "THIRTY", 
        4 => "FORTY", 
        5 => "FIFTY", 
        6 => "SIXTY", 
        7 => "SEVENTY", 
        8 => "EIGHTY", 
        9 => "NINETY" 
    ); 
    $hundreds = array( 
        "HUNDRED", 
        "THOUSAND", 
        "MILLION", 
        "BILLION", 
        "TRILLION", 
        "QUARDRILLION" 
); //limit t quadrillion 
    $num = number_format($num,2,".",","); 
    $num_arr = explode(".",$num); 
    $wholenum = $num_arr[0]; 
    $decnum = $num_arr[1]; 
    $whole_arr = array_reverse(explode(",",$wholenum)); 
    krsort($whole_arr,1); 
    $rettxt = ""; 
    foreach($whole_arr as $key => $i){
        while(substr($i,0,1)=="0")
            $i=substr($i,1,5);
        if($i < 20){ 
//echo "getting:".$i;
            $rettxt .= $ones[$i]; 
        }elseif($i < 100){ 
            if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
            if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
        }else{ 
            if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
            if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
        } 
        if($key > 0){ 
            $rettxt .= " ".$hundreds[$key]." "; 
        } 
    } 
    if($decnum > 0){ 
        $rettxt .= " and "; 
        if($decnum < 20){ 
            $rettxt .= $ones[$decnum]; 
        }elseif($decnum < 100){ 
            $rettxt .= $tens[substr($decnum,0,1)]; 
            $rettxt .= " ".$ones[substr($decnum,1,1)]; 
        } 
    } 
    return ucwords(strtolower($rettxt)); 
}
}