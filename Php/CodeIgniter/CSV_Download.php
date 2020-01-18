<?php
//Model

 function getUserDetails(){
 
    $response = array();
 
    // Select record
    $this->db->select('ip,current_page,time,country,city,region');
    $q = $this->db->get('visitor_details');
    $response = $q->result_array();
 
    return $response;
  }
  // Controller
  public function exportCSV(){ 
        $this->load->helper('url');
   // file name 
   $filename = 'users_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");
   
   // get data 
   $usersData = $this->M_admin_model->getUserDetails();

   // file creation 
   $file = fopen('php://output', 'w');
 
   $header = array("Ip","Page","Time","Country","City","Region"); 
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   exit; 
  }