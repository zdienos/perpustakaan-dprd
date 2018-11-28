<?php 

class Postmodel extends CI_Model
{
	public function find($id)
	{
		$query = $this->db->query("SELECT * FROM posts WHERE posts.id = ? ", [$id]);
		if($query){
			$post = $query->row();
			$post->category_ids = [];
			$query = $this->db->query("SELECT * FROM post_categories WHERE post_id = ?", [$post->id]);
			foreach($query->result() as $row){
				$post->category_ids[] = $row->category_id;
			}
			return $post;
		}else{
			return false;
		}
	}

	public function find_by_slug($slug)
	{
		$query = $this->db->query("SELECT * FROM posts WHERE posts.slug = ? ", [$slug]);
		if($query){
			$post = $query->row();
			$post->category_ids = [];
			$query = $this->db->query("SELECT * FROM post_categories WHERE post_id = ?", [$post->id]);
			foreach($query->result() as $row){
				$post->category_ids[] = $row->category_id;
			}
			return $post;
		}else{
			return false;
		}
	}

	public function all()
	{
		$query = $this->db->query("SELECT * FROM posts");
		return $query->result();
	}

	public function get_latest($limit = 5)
	{
		$query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT ? ", [$limit]);
		if($query){
			$posts = $query->result();
			for($i = 0; $i < count($posts); $i++){
				$query = $this->db->query("SELECT
												categories.title,
												categories.slug,
												categories.id
											FROM
												post_categories
											INNER JOIN categories ON post_categories.category_id = categories.id
											WHERE post_categories.post_id = ? ", [$posts[$i]->id]);

				$posts[$i]->categories = $query->result();
			}
			return $posts;
		}
	}

	public function get_current_page_records($limit, $start) 
    {
    	$this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get("posts");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

	public function get_total()
	{
		return $this->db->count_all("posts");
	}

	public function get_by_category_id($category_id)
	{
		$query = $this->db->query("SELECT
										post_categories.category_id,
										posts.id,
										posts.title,
										posts.slug,
										posts.content,
										posts.administrator_id,
										posts.featured_image,
										posts.created_at,
										posts.updated_at 
									FROM
										post_categories
										INNER JOIN posts ON post_categories.post_id = posts.id 
									WHERE
										post_categories.category_id = ? ", $category_id);

		return $query->result();
	}
}