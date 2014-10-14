<?php
class Notes_model extends MY_Model {

	public function __construct()
	{
	    $this->load->database();
	   	//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	   	$this->db->cache_on();
	   	$this->load->library('session');
		//var_dump($this->app_ini);exit(0);
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
  	public function get_notes($id = FALSE){
	  if ($id === FALSE)
	  {
	  	//$this->cache_notes();

	  	$query = $this->db->get_where('notes');
	    return $query->result_array();
	  }	  
	  $query = $this->db->get_where('notes', array('id' => $id));
	  return $query->row_array();
	  //return $this->get_page_data('notes', array('id' => $id), $limit, $page, FALSE);
	}
	// type：1为public，0为personal
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
		$query = $this->db->get_where('notes', array('scope' => $scope));
	  	return $query->result_array();
	}
	public function get_home_notes(){
		if($this->session->userdata('logged_in')){
	    	$userId = $this->session->userdata('userId');
	    	$where = "userId=$userId OR scope='1'";
	    }else{
	    	$where = array('scope' => '1');
	    }
        if(is_array($where)) {
            $this->db->where($where);
        } else {
            $this->db->where($where, NULL, false);
        }
	    $query = $this->db->get('notes');
	    return $query->result_array();
	}
	public function get_notesByUserId($userId = FALSE,$page = 1,$pageSize = 5){
	  if ($userId)
	  {
	    $where = array('userId' => $userId);
	  }	  
	  $query = $this->get_page_data('notes',$where,$pageSize,($page-1)*$pageSize,FALSE);
	  return $query;
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
	public function get_pageNotes($page = 1,$pageSize = 10){

		$where = FALSE;
		$classId = $this->input->get('class');

	    if($this->session->userdata('logged_in')){
	    	$userId = $this->session->userdata('userId');
	    	$where = "userId=$userId OR scope='1'";
			if($classId){
				$where += " AND type=$classId";
			}
	    	$query = $this->get_page_data('notes',$where,$pageSize,($page-1)*$pageSize,FALSE);
	    }else{
	    	$where = array('scope' => '1');
	    	if($classId){
				$where = array_merge($where,array('type'=>$classId));
			}
	    	$query = $this->get_page_data('notes',$where,$pageSize,($page-1)*$pageSize,FALSE);
	    	//$query = $this->db->get_where('notes', array('scope' => '1'));
	    }
	    return $query;
	}
}