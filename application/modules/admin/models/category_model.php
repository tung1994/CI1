<?php
class category_model extends CI_Model
{
    protected $table = "tbl_category";
    
    public function __construct()
    {
        $this->load->database();
    }
    
    public function listcategory($limit = "",$start = 0)
    {
        if($limit && $start){
            $this->db->limit($limit,$start);
        }       
        return $this->db->get($this->table)->result_array();
    }
    
    public function insertcategory($data)
    {
        $this->db->insert($this->table,$data);
    }
    
    public function checkname($name,$id = "")
    {
        if($id){
            $this->db->where("id !=",$id);
        }
        $this->db->where("cate_name",$name);
        return $this->db->get($this->table)->num_rows();
    }
    
    public function getinfo($id)
    {
        $this->db->where("id",$id);
        return $this->db->get($this->table)->row_array();
    }
    
    public function update($data,$id)
    {
        $this->db->where("id",$id);
        $this->db->update($this->table,$data);
    }
    
    public function delete($id)
    {
        $this->db->where("id",$id);
        $this->db->delete($this->table);
    }
    
    public function gettotal()
    {
        return $this->db->get($this->table)->num_rows();
    }
}
?>