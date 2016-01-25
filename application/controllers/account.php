<?php
	class Account extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('account_model');
		  	$this->load->library('session');
		  	$this->load->library('form_validation');
		  	$this->load->helper("uri");
		  	$this->salt = "notes";
		  	$this->load->model('media_model');
		}
		public function details(){
			$this->loadView('notes','','account/details');
		}
		//登录
		public function login(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_password_check');
			$this->_username = $this->input->post('username');
			if ($this->form_validation->run() == FALSE){
				$data["redirect"] = $this->input->get('redirect') ? $this->input->get('redirect') : "/index.php/notes";
				$data["userName"] = $this->session->userdata("username");
				$this->loadView('notes-login','login','account/login',$data);
			}else{
				$data["redirect"] = $this->input->post('redirect');
				$this->account_model->login($this->_username);
				redirect($data["redirect"]);		
			}
		}
		public function username_check($username){
			if($this->account_model->get_by_username($username)){
				return TRUE;
			}else{
				$this->form_validation->set_message('username_check','UserName does not exist！');
				return FALSE;
			}
		}
		public function password_check($password){
			$this->form_validation->set_message('password_check','password error!');
			$password = md5($password);
			if($this->account_model->password_check($this->_username,$password)){
				return TRUE;
			}else{
				//$this->form_validation->set_message('password_check',$password);
				return FALSE;
			}
		}

		//注册
		public function register(){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]|is_unique[note_users.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('intro', 'Intro', 'trim|max_length[500]');
			if($this->form_validation->run() == FALSE){
				//$this->load->view('account/register');
				$this->loadView('register','','account/register');
			}else{
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				
				$email = $this->input->post("email");
				$intro = $this->input->post("intro");
				$avatar = $this->input->post("avatar");
				$defaultAlbumId = $this->media_model->add_default_album($username);
				if($this->account_model->add_user($username,$password,$email,$intro,$defaultAlbumId,$avatar)){
					$data["message"] = "账号创建成功!";
					$data["redirect"] = "/notes";
					$this->loadView('notes-register','login','account/login',$data);
					
				}else{
					$data["message"] = "账号创建失败!";
					$this->loadView('notes-register','','account/register',$data);
				}

			}
		}
		//退出登录
		public function logout(){
			if($this->account_model->logout() == TRUE){
				redirect("/index.php/login");
				//$this->load->view('account/logout');
				//$this->loadView('logout','','account/logout');
			}else{
				redirect("/index.php/notes");
				//$this->load->view('note/notes');
				//$this->loadView('logout','','note/notes');
			}
		}
		public function updateInfo($id){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('intro', 'Intro', 'trim|max_length[500]');
			if($this->form_validation->run() == FALSE){
				//$this->load->view('account/register');
				redirect('/index.php/setting');
			}else{
				
				if($this->account_model->update_user($id)){
					$this->result_jsonCode('修改成功！',true);
					
				}else{
					$this->result_jsonCode('修改失败！',false);
				}

			}
		}
		public function logincheck()
		{
			if($this->session->userdata('logged_in')){
				$this->result_jsonCode($this->get_currentUser(),true);
			}else{
				$this->result_jsonCode('未登录',false);
			}
		}
		public function userList(){
			$data["content"] = $this->account_model->get_users();
			//var_dump($data);
			$this->loadView('account of notes','account','account/list',$data);
			//echo($this->result_jsonCode($data));return;
		}
		public function pass($id){
			$this->checkLogin();
			$result = false;
			if($this->session->userdata("auth")=="10001"){
				$result = $this->account_model->pass_account($id);
			}
			if($result){
				$this->result_jsonCode("修改成功",true);
			}else{
				$this->result_jsonCode("修改失败",false);
			}
		}
		public function nopass($id){
			$this->checkLogin();
			$result = false;
			if($this->session->userdata("auth")=="10001"){
				$result = $this->account_model->nopass_account($id);
			}
			if($result){
				$this->result_jsonCode("修改成功",true);
			}else{
				$this->result_jsonCode("修改失败",false);
			}
		}
		public function cropavatar(){
			$this->account_model->crop_avatar();
		}
	}