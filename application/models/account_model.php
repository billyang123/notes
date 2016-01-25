<?php
class Account_model extends CI_Model {
 
	public function __construct()
	{
	    $this->load->database();
	    $this->load->library('session');
	    $this->config->load('my_config',TRUE,TRUE);
	    $this->load->library('uploadtoken');
	}
	public function login($username)
	{
		$date = array('username'=>$username,'logged_in'=>TRUE);
		$this->session->set_userdata($date);
	}
	public function get_by_username($username)
	{
		$this->db->where('username',$username);
		$query = $this->db->get('note_users');
		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return FALSE;
		}
	}
	public function password_check($username,$password)
	{
		if($user = $this->get_by_username($username)){
			$this->session->set_userdata('userId',$user->id);
			$this->session->set_userdata('default_albumId',$user->default_albumId);
			$this->session->set_userdata('avatar',$user->avatar);
			$this->session->set_userdata('auth',$user->auth);
			return $user->password == $password ? TRUE : FALSE;
		}
		return FALSE;
	}


	public function add_user($username, $password, $email, $intro, $defaultAlbumId,$avatar)
	{
		$data = array('username'=>$username,"avatar" => $avatar,"create_date" => time(),'password'=>$password,'email'=>$email,'intro'=>$intro,'default_albumId'=>$defaultAlbumId);
		$this->db->insert('note_users',$data);
		if($this->db->affected_rows() > 0)
		{
			$this->login($username);
			return TRUE;
		}
		return FALSE;
	}
	public function email_exists($email)
	{
		$this->db->where("email",$email);
		$query= $this->db->get('note_users');
		return $query->num_rows() ? TRUE : FALSE;
	}
	public function logout()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->sess_destroy();
			return TRUE;	
		}
		return FALSE;
	}
	public function get_users($id=FALSE)
	{
		if ($id === FALSE)
		{
		$query = $this->db->get('note_users');
		return $query->result_array();
		}

		$query = $this->db->get_where('note_users', array('id' => $id));
		return $query->row_array();
	}
	public function update_user($id=FALSE)
	{
		if ($id === FALSE)
		{
			return FALSE;
		}else{
			$this->db->where('id',$id);  
			return $this->db->update('note_users',array(
				"email"=> $this->input->post("email"),
				"intro"=> $this->input->post("intro"),
				"avatar" => $this->input->post("avatar")
				));
		}
	}
	public function crop_avatar()
	{
		$this->load->library('cropavatar');
		$tmpDir = $this->app_ini['tmpDir'];
		$crop = $this->cropavatar;
		$crop->init($_POST['avatar_src'], $_POST['avatar_data'], $_FILES['avatar_file'],$tmpDir);
		$_key_ = 'avatar_'.time().'.png';
	    $result = $this->uploadtoken->uploadToQiNiu($this->app_ini['bucket'],$_key_,$crop -> getResult(),$this->app_ini['accessKey'],$this->app_ini['secretKey']);
	    $response = array(
	        'state'  => 200,
	        'message' => $crop -> getMsg(),
	        'result' => 'http://'.$this->app_ini['bucket'].'.qiniudn.com/'.$result['key']
	    );
	    echo json_encode($response);
	}
	public function pass_account($id=FALSE){
		if ($id === FALSE)
		{
			return FALSE;
		}else{
			$this->db->where('id',$id);  
			return $this->db->update('note_users',array(
				"auth"=> "10002"
			));
		}
	}
	public function nopass_account($id=FALSE){
		if ($id === FALSE)
		{
			return FALSE;
		}else{
			$this->db->where('id',$id);  
			return $this->db->update('note_users',array(
				"auth"=> "0"
			));
		}
	}
}