<?php
class Ipc_model extends MY_Model {

	function __construct()
	{
	    $this->load->database();
	   	$this->db->cache_on();
	   	$this->load->library('session');
	}
	public function get_json($id = FALSE)
	{
		
		if($id){
			$query = $this->db->get_where('ipc', array('id' => $id));
		}else{
			
			$query = $this->db->get('ipc');
		}
		return $query->row_array();
	}
	// public function search_tags($key)
	// {
	// 	if($key){
	// 		$this->db->like("tag_name",$key);
	// 	}
	// 	$query = $this->db->get('tags');
	// 	return $query->result_array();
	// }
	public function reset()
	{
		$sql = 'create table if not exists ybbdb.ipc(id int(10) not null auto_increment primary key,value text,userId int(5),userName varchar(20),time char(16))';
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function set_ipc()
	{
		$userId = $this->input->post('userId');
		if($this->session->userdata('userId')!=$userId){
			return FALSE;
		}
		$data = array(
			'userId' => $userId,
			'userName' => $this->session->userdata('username'),
			'value'=> $this->input->post('value'),
			'time'=> time()
			);
		return $this->db->insert('ipc', $data);
	}
	public function up_ipc($id=FALSE)
	{
		$userId = $this->input->post('userId');
		if($this->session->userdata('userId')!=$userId){
			return FALSE;
		}
		if($id){
			$time = time();
			$this->db->where('id',$id);
			return $this->db->update('ipc',array(
				'userId' => $userId,
				'userName' => $this->session->userdata('username'),
				'value'=> $this->input->post('value'),
				'time'=> time()
				));
		}
		// if(is_array($value)){
		// 	$str_value = '("'.implode('"),("',$value).'")';
		// }else{
		// 	$str_value = '("'.$value.'")';
		// }
	}
	// public function search_notes($tagName)
	// {
	// 	if($tagName){
	// 		$this->db->like("tags",$tagName);
	// 	}
	// 	$query = $this->db->get('tags');
	// 	return $query->result_array();
	// }
}