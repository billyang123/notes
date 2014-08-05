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
				$this->loadView('login','login','account/login',$data);
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
				$this->form_validation->set_message('username_check','用户名不存在');
				return FALSE;
			}
		}
		public function password_check($password){
			$this->form_validation->set_message('password_check',$password);
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
				if($this->account_model->add_user($username,$password,$email,$intro)){
					$data["message"] = "账号创建成功!";
					$data["redirect"] = "/notes";
					$this->loadView('login','','account/login',$data);
					
				}else{
					$data["message"] = "账号创建失败!";
					$this->loadView('register','','account/register',$data);
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
		public function userList(){
			$data["content"] = $this->account_model->get_users();
			echo($this->result_jsonCode($data));return;
		}
	}