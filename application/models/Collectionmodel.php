<?php 

class Collectionmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM collections WHERE collections.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM collections");
		return $query->result();
	}

	public function count()
	{
		$query = $this->db->query("SELECT * FROM collections");
		return $query->num_rows();
	}

	public function get_updated_at($value='')
	{
		$query = $this->db->query("SELECT collections.created_at FROM collections ORDER BY created_at DESC limit 1");
		if($query->num_rows()){
			return $query->row()->created_at;
		}else{
			return false;
		}
		
	}
}