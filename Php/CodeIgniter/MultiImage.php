<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MultiImage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $loggedin = $this->session->userdata('userID');
        if (!isset($loggedin) or $loggedin == '') {
            redirect(base_url().'Admin');
        }
        $this->load->model('C_admin_model');
        $this->load->model('MultiImage_model');
    }

    //Default Load
    public function index() {
        $data['product']=  $this->C_admin_model->SelectDataOrder('product','*','','id','desc');
        $data['files'] = $this->C_admin_model->SelectDataOrder('pro_image', '*','','id','desc');
        $data['body'] = 'image';
        $this->load->view('template', $data);
    }
    function upload_multi_images(){

        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'uploads/product/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                
                $this->load->library('upload', $config);
                
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['proid'] = $_POST['proid'];
                }
            }
            
            if(!empty($uploadData)){
                $insert = $this->MultiImage_model->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        redirect(base_url().'Admin/MultiImage/','refresh');
        
    }
    public function del_product_image($id){
        $qq=$this->C_admin_model->SelectData_1('pro_image','*',array('id'=>$id));
        unlink('uploads/product/'.$qq->file_name);
        $this->C_admin_model->DeleteData('pro_image', array('id'=>$id));
        redirect(base_url().'Admin/MultiImage/', 'refresh');
    }
    function upload_multi_images_resize(){

        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'uploads/product/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                
                $this->load->library('upload', $config);
                $this->load->library('image_lib');
                $config_1['image_library'] = 'gd2';
                $config_1['create_thumb'] = FALSE;
                $config_1['maintain_ratio'] = FALSE;
                $config_1['width']         = 800;
                $config_1['height']       = 600;

                // $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['image'] = $fileData['file_name'];
                    $uploadData[$i]['proid'] = $_POST['proid'];
                }
                $data2 = array('upload_data' => $this->upload->data());
                $data['image'] = $data2['upload_data']['file_name'];
                $config_1['source_image'] = 'uploads/product/'.$data2['upload_data']['file_name'];
                $this->image_lib->initialize($config_1); 
                $this->image_lib->resize();
            }
            
            if(!empty($uploadData)){
                $insert = $this->MultiImage_model->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
        }
        redirect(base_url().'Admin/MultiImage/','refresh');
        
    }

    
}
