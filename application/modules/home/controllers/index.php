<?php
class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("category");
        $this->load->model("product");
    }
    
    public function index()
    {
        $data['product']  = $this->product->listproduct();
        $data['category'] = $this->category->listcategory();
        $data['template'] = "default/index";
        $this->load->view("layout",$data);
    }
}
?>