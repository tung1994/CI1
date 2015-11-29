<?php
class user_model extends CI_Model
{
	public function getUser()
	{
		return "Get User Model";
	}

	public function insert($data)
	{
		echo "<pre>";
		print_r($data);
	}
}