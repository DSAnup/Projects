<?php
    public function db_backup(){
        $this->load->dbutil();
        $this->load->library('zip');
        $this->load->helper('download');
        $this->load->helper('file');
        $db_format = array('format'=>'zip','filename'=>"waps_backup.sql");
        $backup = & $this->dbutil->backup($db_format);
        $dbname = 'backup-on-'.date('Y-m-d').'.zip';
        $save = 'assets/db_backup/'.$dbname;
        
        write_file($save,$backup);
        
        force_download($dbname, $backup);
        
    }