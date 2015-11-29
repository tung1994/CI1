<?php 
class category extends CI_Model
{
    protected $table = "tbl_category";
    
    public function listcategory()
    {
        return $this->db->get($this->table)->result_array();
    }
    
}

?>