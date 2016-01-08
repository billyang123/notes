<?php
class Demo_model extends MY_Model {

	public function __construct()
	{
	    $this->load->database();
	   	//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	   	$this->db->cache_on();
	   	$this->load->library('session');
		//var_dump($this->app_ini);exit(0);
	}

	public function cache_demo(){
		if ( ! $this->cache->get('demo'))
		{
			$query = $this->db->get('demo');
			     // Save into the cache for 5 minutes
			$this->cache->save('demo', $query->result_array(), 300);
		}
		return $this->cache->get('demo');

	}
  	public function get_demo($id = FALSE){

	  if ($id === FALSE)
	  {
	  	//$this->cache_notes();

	  	$query = $this->db->get_where('demo');
	    return $query->result_array();
	  }	  
	  $query = $this->db->get_where('demo', array('demo_id' => $id));
	  return $query->row_array();
	  //return $this->get_page_data('notes', array('id' => $id), $limit, $page, FALSE);
	}
	
	public function set_demo()
	{
	  $time = time();
	  $userId = $this->session->userdata('userId');

	  $username = $this->session->userdata('username');
	  $data = array(
	    'demo_name' => $this->input->post('demo_name'),
	    'content' => $this->input->post('content'),
	    'extra_text'=>$this->input->post('extra_text'),
	    'create_time' => $time,
	    'user_name' => $username,
	    'user_id' =>$userId,
	    'tag_name' =>"seajs",
	    'level'=>1
	  );
	  return $this->db->insert('demo', $data);
	}
	public function remove_demo($id = FALSE){
		if ($id != FALSE){
			return $this->db->delete("demo",array("demo_id"=>$id));
		}
		
	}
	public function update_demo($id = FALSE)
	{	
		$userId = $this->input->post('userId');
		if($this->session->userdata('userId')!=$userId){
			return FALSE;
		}
		if($id){
			$time = time();
			$this->db->where('demo_id',$id);
			return $this->db->update('demo',array(
			    'demo_name' => $this->input->post('demo_name'),
			    'content' => $this->input->post('content'),
			    'extra_text'=>$this->input->post('extra_text'),
			    'create_time' => $time,
			    // 'user_name' => $this->input->post('userName'),
			    // 'user_id' =>$this->input->post('userId'),
			    'tag_name' =>"seajs",
			    'level'=>1
			  ));
		}
	}
}