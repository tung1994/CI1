<?php
class product_model extends CI_Model
{
    protected $table = "tbl_product";
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getall()
    {
        return $this->db->select("tbl_product.id,name,tbl_product.image,cate_name,price")
                    ->from($this->table)
                    ->join("tbl_category","tbl_category.id = tbl_product.cate_id","left")
                    ->get()
                    ->result_array();
    }
    
    public function insert($data)
    {
        $this->db->insert($this->table,$data);
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
    
    public function getone($id)
    {
        $this->db->where("id",$id);
        return $this->db->get($this->table)->row_array();
    }    
}
?>