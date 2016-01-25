<?php
class Admin_model extends MY_Model {

	public function __construct()
	{
	    $this->load->database();
	   	//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	   	$this->db->cache_on();
	   	$this->load->library('session');
		//var_dump($this->app_ini);exit(0);
	}
  	public function get_matchedfood($id = FALSE){
	  if ($id === FALSE)
	  {
	  	//$this->cache_notes();

	  	$query = $this->db->get('matchedfoot');
	    return $query->result_array();
	  }	  
	  $query = $this->db->get_where('matchedfoot', array('id' => $id));
	  return $query->row_array();
	  //return $this->get_page_data('notes', array('id' => $id), $limit, $page, FALSE);
	}
	
	public function set_matchedfood($id = FALSE)
	{
		$data = array(
		    'name' => $this->input->post('name'),
		    'matchName' => $this->input->post('formtname'),
		    'effect'=>$this->input->post('description')
		  );	
		if($id){
			$this->db->where('id',$id);
			return $this->db->update('matchedfoot',$data);
		}else{
			return $this->db->insert('matchedfoot', $data);
		}
	}
}