<?php
class Tags_model extends MY_Model {

	function __construct()
	{
	    $this->load->database();
	   	$this->db->cache_on();
	}
	public function get_tags($id = FALSE)
	{
		if($id){
			$query = $this->db->get_where('tags', array('id' => $id));
		}else{
			$query = $this->db->get('tags');
		}
		return $query->result_array();
	}
	public function search_tags($key)
	{
		if($key){
			$this->db->like("tag_name",$key);
		}
		$query = $this->db->get('tags');
		return $query->result_array();
	}
	public function set_tag($value)
	{
		if(is_array($value)){
			$str_value = '("'.implode('"),("',$value).'")';
		}else{
			$str_value = '("'.$value.'")';
		}
		$sql = 'insert ignore into tags (tag_name) values '.$str_value;
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function search_notes($tagName)
	{
		if($tagName){
			$this->db->like("tags",$tagName);
		}
		$query = $this->db->get('tags');
		return $query->result_array();
	}
}