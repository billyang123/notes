<?php
class Media_model extends MY_Model {
	public function __construct()
	{
	    $this->load->database();
	   	//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	   	$this->db->cache_on();
	   	$this->load->library('session');
	   	$this->load->library('cart');
	}
	public function add_album()
	{
		$data = array(
			"name" => $this->input->post("albumName"),
			"userId" =>$this->input->post('userId'),
			"userName" =>$this->input->post('userName'),
			"description" => $this->input->post("albumDescription"),
			"limits" => $this->input->post("albumLimits"),
			'cover' => $this->input->post("albumCover")
		);
		if($this->db->insert('album', $data)){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
	}
	public function add_default_album($username)
	{
		$data = array(
			"name" => '默认',
			"userId" =>$this->session->userdata('userId'),
			"userName" =>$username,
			"description" => '默认相册',
			"limits" => 'public',
			'cover' => ''
		);
		$this->db->insert('album', $data);
		return $this->db->insert_id();
		//$this->db->insert('album',$data);
	}
	public function get_album($id=FALSE)
	{
		if($id == FALSE)
		{
			$query = $this->db->get_where('album',array(
				//'userId' => $this->session->userdata('userId'),
				'userName' => $this->session->userdata('username')
				)
			);
			return $query->result_array();
		}
		$query = $this->db->get_where('album', array(
			'id' => $id,
			//'userId' => $this->session->userdata('userId'),
			'userName' => $this->session->userdata('username')
			)
		);
		return $query->row_array();
	}
	public function get_video($id=FALSE)
	{
		if($id == FALSE)
		{
			$query = $this->db->get_where('video_info',array('userId' => $this->session->userdata('userId')));
			return $query->result_array();
		}
		$query = $this->db->get_where('video_info', array('id' => $id,'userId' => $this->session->userdata('userId')));
		return $query->row_array();
	}
	public function get_yunImgInfo($id=FALSE)
	{
		if($id == FALSE)
		{
			$query = $this->db->get_where('yun_img_info', array('userId' => $this->session->userdata('userId')));
			return $query->result_array();
		}
		$query = $this->db->get_where('yun_img_info', array('albumId'=>$id,'userId' => $this->session->userdata('userId')));
	  	return $query->result_array();
		
	}
	public function set_video_info()
	{
		$data = array(
			"path" => $this->input->post("video_path"),
			'userId' => $this->session->userdata('userId'),
		    'userName' => $this->session->userdata('username'),
		    'createTime' => time()
		);
		return $this->db->insert('video_info', $data);
	}
	public function update_album($id=FALSE)
	{	
		if($id==FALSE){
			return FALSE;
		}else{
			$data = array(
				"name" => $this->input->post("albumName"),
				"userId" =>$this->input->post('userId'),
				"userName" =>$this->input->post('userName'),
				"description" => $this->input->post("albumDescription"),
				"limits" => $this->input->post("albumLimits"),
				'cover' => $this->input->post("albumCover")
			);
			$this->db->where('id',$id);
			if($this->db->update('album', $data)){
				return $id;
			}else{
				return FALSE;
			}
		}
	}
	public function delete_album($id=FALSE)
	{
		if($id==FALSE){
			return FALSE;
		}	
		$this->db->delete("album",array("id"=>$id));
	}
}