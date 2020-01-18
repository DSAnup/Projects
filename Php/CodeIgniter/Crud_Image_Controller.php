<?php

class General extends CI_Controller {
	public function slider(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['slider'] = $this->Rest_model->SelectDataOrder('slider', '*', '','id','desc');
		$this->load->view('Admin_panel/slider', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function add_slider(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data = $this->input->post();
        $config['upload_path'] = './uploads/slider/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 100000000;
        $config['max_width'] = 10240000;
        $config['max_height'] = 7680000;
        $this->load->library('upload', $config);


        $this->load->library('image_lib');
        $config_1['image_library'] = 'gd2';
        $config_1['create_thumb'] = FALSE;
        $config_1['maintain_ratio'] = FALSE;
        $config_1['width']         = 1211;
        $config_1['height']       = 700;

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['image'] = $data2['upload_data']['file_name'];
            $config_1['source_image'] = 'uploads/slider/'.$data2['upload_data']['file_name'];
            $this->image_lib->initialize($config_1); 
            $this->image_lib->resize();
        }
        $this->Rest_model->SaveData('slider', $data);
        redirect(base_url().'Admin_panel/slider', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function edit_slider($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$data['c'] =$this->Rest_model->SelectData_1('slider','*',array('id'=>$id));
		$this->load->view('Admin_panel/edit_slider', $data);
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function update_slider(){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$id = $this->input->post('id');
        $data = $this->input->post();
        $config['upload_path'] = './uploads/slider/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 100000000;
        $config['max_width'] = 10240000;
        $config['max_height'] = 7680000;
        $this->load->library('upload', $config);


        $this->load->library('image_lib');
        $config_1['image_library'] = 'gd2';
        $config_1['create_thumb'] = FALSE;
        $config_1['maintain_ratio'] = FALSE;
        $config_1['width']         = 1211;
        $config_1['height']       = 700;

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data2 = array('upload_data' => $this->upload->data());
            $data['image'] = $data2['upload_data']['file_name'];
            $config_1['source_image'] = 'uploads/slider/'.$data2['upload_data']['file_name'];
            $this->image_lib->initialize($config_1); 
            $this->image_lib->resize();
            $qq=$this->Rest_model->SelectData_1('slider','*',array('id'=>$id));
            if($qq->image!=''){
            unlink('uploads/slider/'.$qq->image);
            }
        }
        $this->Rest_model->UpdateData('slider', $data, array('id'=>$id));
        redirect(base_url().'Admin_panel/slider', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
		}
	}
	public function delete_slider($id){
		$userID = $this->session->userdata('userID');
		if (isset($userID)) {
		$qq=$this->Rest_model->SelectData_1('slider','*',array('id'=>$id));
            if($qq->image!=''){
        	unlink('uploads/slider/'.$qq->image);}
		$this->Rest_model->DeleteData('slider', array('id'=>$id));
		redirect(base_url().'Admin_panel/slider', 'refresh');
		}else{
			redirect(base_url().'Admin_panel', 'refresh');
			
		}
	}