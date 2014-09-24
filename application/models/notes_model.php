<?php
class Notes_model extends MY_Model {

	public function __construct()
	{
	    $this->load->database();
	   	//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	   	$this->db->cache_on();
	   	$this->load->library('session');
	}

	public function cache_notes(){
		if ( ! $this->cache->get('notes'))
		{
			$query = $this->db->get('notes');
			     // Save into the cache for 5 minutes
			$this->cache->save('notes', $query->result_array(), 300);
		}
		return $this->cache->get('notes');

	}
  	public function get_notes($id = FALSE,$page = 1,$limit = 10){
	  if ($id === FALSE)
	  {
	  	//$this->cache_notes();

	  	//$query = $this->db->get('notes');
	    //$query = $this->db->get('notes');
	    //return $this->cache->get('notes');
	    if($this->session->userdata('logged_in')){
	    	$query = $this->db->get('notes');
	    // 	$query1 = $this->db->get_where('notes', array('scope' => '1');
	    // 	$query2 = $this->db->get_where('notes', array('scope' => '2','userId'=>$this->session->userdata('userId'));
	    // 	$result = array_merge_recursive($query1->result_array(), $query2->result_array()); 
	    // }else{
	    // 	$query = $this->db->get_where('notes', array('scope' => '1');
	    // 	$result = $query->result_array();
	    }else{
	    	$query = $this->db->get_where('notes', array('scope' => '1'));
	    }
	    //$result = $this->get_page_data('notes', FALSE, $limit, ($page-1)*$limit, FALSE);
	    $result = $query->result_array();
	    return $result;
	  }
	  
	  $query = $this->db->get_where('notes', array('id' => $id));
	  return $query->row_array();
	  //return $this->get_page_data('notes', array('id' => $id), $limit, $page, FALSE);
	}
	// type：1为public，1为personal
	public function get_notesByType($type = FALSE){
	  if ($type === FALSE)
	  {
	    $query = $this->db->get('notes');

	    return $query->result_array();
	  }	  
	  $query = $this->db->get_where('notes', array('type' => $type));
	  return $query->row_array();
	}

	public function get_notes_by_scope($scope='1'){
		$query = $this->db->get_where('notes', array('scope' => $scope,'userId'=>$this->session->userdata('userId')));
	  	return $query->result_array();
	}
	public function get_notesByUserId($userId = FALSE){
	  if ($userId === FALSE)
	  {
	    $query = $this->db->get('notes');

	    return $query->result_array();
	  }	  
	  $query = $this->db->get_where('notes', array('userId' => $userId));
	  return $query->result_array();
	}
	public function set_notes()
	{

	  $this->load->helper('url');
	  $slug = url_title($this->input->post('title'), 'dash', TRUE);
	  $time = time();
	  $data = array(
	    'title' => $this->input->post('title'),
	    'slug' => $slug,
	    'content' => $this->input->post('content'),
	    'type' => $this->input->post('type'),
	    'create_date' => $time,
	    'scope' => $this->input->post('scope'),
	    'userName' => $this->input->post('userName'),
	    'userId' =>$this->input->post('userId')
	  );
	  return $this->db->insert('notes', $data);
	}
	public function remove_note($id = FALSE){
		if ($id != FALSE){
			return $this->db->delete("notes",array("id"=>$id));
		}
		
	}
	public function get_oldNotes($id = FALSE){
	  if ($id === FALSE)
	  {
	    $query = $this->db->get('articles');
	    return $query->result_array();
	  }
	  
	  $query = $this->db->get_where('notes', array('id' => $id));
	  return $query->row_array();
	}
	public function update_notes($id = FALSE)
	{	
		$userId = $this->input->post('userId');
		if($this->session->userdata('userId')!=$userId){
			return FALSE;
		}
		if($id){
			$this->load->helper('url');
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
			$time = time();
			$this->db->where('id',$id);
			return $this->db->update('notes',array(
				'title' => $this->input->post('title'),
			    'slug' => $slug,
			    'content' => $this->input->post('content'),
			    'type' => $this->input->post('type'),
			    'create_date' => $time,
			    'scope' => $this->input->post('scope')
				));
		}
	}
}