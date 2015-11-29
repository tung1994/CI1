<?php
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->helper(array('form','url'));
        $this->load->library("form_validation");
    }
    
    public function index()
    {
        $data['template'] = "user/index";
        $data['user'] = $this->user_model->getall();
        $this->load->view("layout",$data);
    }
    
    public function insert()
    {                
        if($this->input->post("ok")){
            $this->form_validation->set_rules('name','username','required');
            $this->form_validation->set_rules('email','email','required|valid_email');
            $this->form_validation->set_rules('pass','password','required|min_length[6]|max_length[24]');
            $this->form_validation->set_rules('repass','repass','matches[pass]');
            $this->form_validation->set_rules('address','address','required');
            
            $this->form_validation->set_message('required','%s khong duoc bo trong');
            $this->form_validation->set_message('valid_email','%s khong dung dinh dang');
            $this->form_validation->set_message('min_length','%s khong duoc nho hon %d');
            $this->form_validation->set_message('max_length','%s khong duoc lon hon %d');
            $this->form_validation->set_message('matches','%s khong dung');
            
            if($this->form_validation->run()){
                $formdata = array(
                                    'name'       => $this->input->post("name"),
                                    'email'      => $this->input->post("email"),
                                    'password'   => $this->input->post("pass"),
                                    'address'    => $this->input->post("address")
                );
                $this->user_model->insert($formdata);
                redirect("/admin/user");
            }            
        }        
        $data['template'] = "user/insert";
        $this->load->view("layout",$data);
    } 
    
    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->user_model->delete($id);
        redirect("/admin/user");
    }
    
    public function edit()
    {
        $id = $this->uri->segment(4);
        
        if($this->input->post("ok")){
            $this->form_validation->set_rules('name','username','required');
            $this->form_validation->set_rules('email','email','required|valid_email');
            $this->form_validation->set_rules('pass','password','min_length[6]|max_length[24]');
            $this->form_validation->set_rules('repass','repass','matches[pass]');
            $this->form_validation->set_rules('address','address','required');
            
            $this->form_validation->set_message('required','%s khong duoc bo trong');
            $this->form_validation->set_message('valid_email','%s khong dung dinh dang');
            $this->form_validation->set_message('min_length','%s khong duoc nho hon %d');
            $this->form_validation->set_message('max_length','%s khong duoc lon hon %d');
            $this->form_validation->set_message('matches','%s khong dung');
            
            if($this->form_validation->run()){
                $formdata = array(
                                    'name'   =>$this->input->post("name"),
                                    'email'  =>$this->input->post("email"),
                                    'address'=>$this->input->post("address")
                );
                if($this->input->post("pass") && $this->input->post("pass") == $this->input->post("repass")){
                    $formdata['password'] = $this->input->post("pass");
                }
                $this->user_model->update($id,$formdata);
                redirect("/admin/user");  
            }            
        }                
        $data['infouser'] = $this->user_model->getone($id);
        $data['template'] = "user/edit";
        $this->load->view("layout",$data);
    }    
}
?>