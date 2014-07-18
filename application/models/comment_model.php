<?php
class Comment_model extends CI_Model {
 
	public function __construct()
	{
	    $this->load->database();
	    $this->load->library('session');
	    
	}
	public function get_comment($noteId=FALSE)
	{
		if ($noteId === FALSE)
		{
			$query = $this->db->get('comment');
			return $query->result_array();
		}
		//$query = $this->db->get_where('comment', array('note_Id' => $noteId));
		$this->db->where('note_Id',$noteId);
		$query = $this->db->get('comment');
	  	return $query->result_array();
		//return $query->row_array();
	}
	public function set_comment($noteId)
	{
		$time = time();
		$data = array(
		    'content' => $this->input->post('content'),
		    'note_id' => $noteId,
		    'username' => $this->session->userdata('username'),
		    'create_date' => $time,
		    'user_id' => $this->session->userdata('userId'),
		    'com_user_id' => $this->input->post('com_user_id',''),
		    'com_user_name' => $this->input->post('com_user_name',''),
		    'issub' => $this->input->post('issub')
	  	);
	  	$indata = $this->db->insert('comment', $data);
	  	return array(0=>$data);
	}
}