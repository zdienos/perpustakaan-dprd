<?php 

class Varmodel extends CI_Model
{
	public function get($key)
	{
		$query = $this->db->query("SELECT $key FROM var WHERE id = 1 ");
		return $query->row()->$key;
	}
}