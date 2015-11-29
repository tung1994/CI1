<?php
class product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->helper(array("form","url"));
        $this->load->model("product_model");
        $this->load->model("category_model");
    }
    
    public function index()
    {
        $data['product'] = $this->product_model->getall();
        $data['title'] = "List product";
        $data['template'] = "product/index";
        $this->load->view("layout",$data);
    }
    
    public function insert()
    {
        $this->category_model->listcategory();
        if($this->input->post("ok")){
            $formdata = $this->validation();
            if($formdata){
                $filename = $this->upload();
                if($filename){
                    $formdata['image'] = $filename;
                }
                echo "<pre>";
                print_r($formdata);
                echo "</pre>";
                die;
                //$this->product_model->insert($formdata);
                //redirect("/admin/product");
            }
        }
        $data['category'] = $this->category_model->listcategory();
        $data['title'] = "Insert product";
        $data['template'] = "product/form";
        $this->load->view("layout",$data);
    }
    
    public function edit($id)
    {
        $data['product'] = $this->product_model->getone($id);
        $data['category'] = $this->category_model->listcategory();
        if($this->input->post("ok")){
            $formdata = $this->validation();
            if($formdata){
                $filename = $this->upload();
                if($filename){
                    $formdata['image'] = $filename;
                    @unlink("./uploads/".$data['product']['image']);
                }
                $this->product_model->update($formdata,$id);
                redirect("/admin/product");
            }
        }
        $data['title'] = "Edit product";
        $data['template'] = "product/form";
        $this->load->view("layout",$data);
    }
    
    public function delete($id)
    {
        $data = $this->product_model->getone($id);
        $this->product_model->delete($id);
        @unlink("./uploads/".$data['image']);
        redirect("/admin/product");
    }
    
    public function validation()
    {
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('price','price','required|numeric');
        $this->form_validation->set_rules('category','category','required');
        $this->form_validation->set_rules('info','infomation','required');
        
        $this->form_validation->set_message('required','%s khong dc de trong');
        $this->form_validation->set_message('numeric','%s phai la so');
        if($this->form_validation->run()){
            $formdata = array(
                                'cate_id' => $this->input->post("category"),
                                'name'    => $this->input->post("name"),
                                'price'   => $this->input->post("price"),
                                'info'    => $this->input->post("info"),
                                'status'  => $this->input->post("status")
            );
        }else{
            return false;
        }
    }
    
    public function upload()
    {
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != null){
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '100000';
			$config['max_width']  = '10000';
			$config['max_height']  = '1024';
			$this->load->library('upload', $config);
            $this->upload->do_upload("image");
            $fileinfo = $this->upload->data();
            return $fileinfo['file_name'];
        }else{
            return false;
        }
    }    
}
?>