<?php 
//libarary, helper
$this->load->library('pagination');
$this->load->helper('url');
$this->load->helper('array');

//No Parameter

//Controller
public function index() {
$data['c1'] = $this->Rest_model->SelectData_1('contact','*',array('id'=>'3'));
$data['a'] = $this->Rest_model->SelectData_1('general_info','*',array('id'=>'1'));
$data['sli'] = $this->Rest_model->SelectDataOrder_1('slider','*','','id','desc','5');
$data['testi'] = $this->Rest_model->SelectDataOrder_1('testimonial','*','','id','desc','5');
$data['pcat'] = $this->Rest_model->SelectData('product_cat','*','');
$data['bcat'] = $this->Rest_model->SelectData('brand_cat','*','');
$data['video'] = $this->Rest_model->SelectDataOrder('video', '*','','id','desc');
$data['vpopular'] = $this->Rest_model->SelectDataOrder_1('video', '*','','popular','desc','9');
$total_row=count($data['video']);
$config = array();
$config["base_url"] = base_url().'live_tv';
$config["total_rows"] = $total_row;
$config["per_page"] = 3;
$config["uri_segment"] = 2;
$choice = $config["total_rows"] / $config["per_page"];
$config["num_links"] = floor($choice);

$config['cur_tag_open'] = '<a class="active">';
$config['cur_tag_close'] = '</a>';
$this->pagination->initialize($config);

$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
$data['vid'] = $this->Admin_model->fetch_video($config["per_page"], $page);
$data["links"]= $this->pagination->create_links();
$this->load->view('index', $data);
}


//Route

$route['live_tv'] = 'Front/live_tv';
$route['live_tv/(:num)'] = 'Front/live_tv/$1';

//Model

public function fetch_product($limit, $id){
$this->db->select('product.*, product_cat.p_cat_name, product.id as id');
$this->db->from('product');
$this->db->join('product_cat','product_cat.id = product.p_cat_id');
$this->db->order_by('id','desc');
$this->db->limit($limit,$id);
return $this->db->get()->result();
}?>

<div class="text-center">
<div class="pagination"><?=$links?></div>
</div>

<style>
.pagination {
	display: inline-block;
	text-align: center;
}

.pagination a {
	color: black;
	float: left;
	padding:4px 8px;
	text-decoration: none;
	border: 1px solid #ddd;
}

.pagination a.active {
	background-color: #F68B1E;
	color: white;
	border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination a:first-child {
	border-top-left-radius: 5px;
	border-bottom-left-radius: 5px;
}

.pagination a:last-child {
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px;
}
</style>
bootstrap pagination css
<style>
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
     border-radius: 5px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>


<?php 
// with parameter
//Controller
public function prosingle($param){
        $data['c1'] = $this->Rest_model->SelectData_1('contact','*',array('id'=>'3'));
        $data['pcat'] = $this->Rest_model->SelectData('product_cat','*','');
        $data['bcat'] = $this->Rest_model->SelectData('brand_cat','*','');
        $data['sprod'] = $this->M_admin_model->get_product_1($param);
        $data['sn'] = $data['sprod'][0]->p_cat_name;
        // var_dump($data['sn']);    
        $data['cw'] = $this->Rest_model->SelectDataOrder('main_post','*',array('menuid'=>$id),'id','desc');
        

        $total_row=count($data['cw']);
        $config = array();
        $config["base_url"] = base_url().'category/'.$id;
        $config["total_rows"] = $total_row;
        $config["per_page"] = 6;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['cur_tag_open'] = '<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['cwp'] = $this->Admin_model->fetch_main_post_1($id, $config["per_page"], $page);
        $data["links"]= $this->pagination->create_links();
        $this->load->view('prosingle', $data);
    }

    //Routes

    $route['category/(:any)'] = 'Front/news_category/$1';
    $route['category/(:any)/(:any)'] = 'Front/news_category/$1/$2';

    //Model

    public function fetch_product_1($param, $limit, $id){
        $this->db->select('product.*, product_cat.p_cat_name, product.id as id');
        $this->db->from('product');
        $this->db->join('product_cat','product_cat.id = product.p_cat_id');
        $this->db->order_by('id','desc');
        $this->db->where('product_cat.id', $param);
        $this->db->limit($limit,$id);
        return $this->db->get()->result();
    }
    ?>