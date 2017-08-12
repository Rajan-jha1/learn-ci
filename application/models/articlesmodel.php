<?php 

class Articlesmodel extends CI_model
{
	public function add_category($data)
	{
		//echo "<pre/>";
		//print_r($data);
		return $this->db->insert('category', $data);
	}
	public function view_category($userid)
	{
		$query=$this->db
					->select(['cat_id','cat_name','creation'])
					->from('category')
					->where('user_id',$userid)
					->get();
		return $query->result();

	}
	public function add_articles($data)
	{
		//print_r($data);
		return $this->db->insert('articles', $data);
	}
	public function view_articles($userid)
	{
		$query=$this->db
					->select(['title','description','article_id','creation','image_path'])
					->from('articles')
					->where('user_id',$userid)
					->get();
		return $query->result();

	}
}