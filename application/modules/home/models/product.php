<?php
class product extends CI_Model
{
    protected $table = "tbl_product";
    
    public function listproduct()
    {
        $this->db->order_by("id","desc");
        $this->db->limit(9);
        return $this->db->get($this->table)->result_array();
    }
}
?>