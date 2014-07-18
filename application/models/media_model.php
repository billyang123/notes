<?php
class Media_model extends CI_Model {
	public function __construct()
	{
	    $this->load->database();
	   	//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	   	$this->db->cache_on();
	   	$this->load->library('session');
	}
	public function add_album()
	{
		$data = array(
			"name" => $this->input->post("albumName"),
			"userId" =>$this->input->post('userId'),
			"userName" =>$this->input->post('userName'),
			"description" => $this->input->post("albumDescription"),
			"limits" => $this->input->post("albumLimits")
		);
		return $this->db->insert('album', $data);
		$this->db->insert('album',$data);
		if($this->db->affected_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}
	public function get_album($id=FALSE)
	{
		if($id == FALSE)
		{
			$query = $this->db->get('album');
			return $query->result_array();
		}
		$query = $this->db->get_where('album', array('id' => $id));
		return $query->row_array();
	}
}