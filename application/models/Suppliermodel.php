<?php 

class Suppliermodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM suppliers WHERE suppliers.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM suppliers");
		return $query->result();
	}
}