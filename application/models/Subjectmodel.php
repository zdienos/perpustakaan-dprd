<?php 

class Subjectmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM subjects WHERE subjects.id = ? ", [$id]);
		if($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM subjects");
		return $query->result();
	}
}