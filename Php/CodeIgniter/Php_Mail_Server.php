<?php
    public function send_msg(){
        $this->load->library('session');
        $data= $this->input->post();
        $to      = 'anup12.m@gmail.com';
        $from      = $data['email'];
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $subject = $data['subject'];
        $message = $data['message'];;
        $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        $this->Rest_model->SaveData('message', $data);
        $this->session->set_flashdata('item','Your Message is Successfully send');
        redirect(base_url().'Front/contact','refresh');
        
    }