<?php
	class Mobile extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->spark('markdown/1.2.0');
		  	$this->load->model('notes_model');
		  	$this->load->model('tags_model');
		  	$this->load->library('session');
		  	$this->load->model('classify_model');
		  	$this->load->model('account_model');

		  	$this->load->library('form_validation');
		  	$this->load->helper("uri");
		  	$this->salt = "notes";
		  	$this->load->model('media_model');
		}
		public function index() {
			$data['assets'] = $this->assets;
			$this->load->view('mobile/index',$data);
		}
		public function about() {
			$data['assets'] = $this->assets;
			$this->load->view('mobile/partial/about',$data);
		}
		public function notesList() {
			$data['assets'] = $this->assets;
			$data = $this->notes_model->get_pageNotes(1,15);
			$this->load->view('mobile/partial/notelist',$data);
		}
		public function ajaxnoteslist($p=false) {
			$data['assets'] = $this->assets;
			//$this->result_jsonCode($data);
			$pageSize = $this->input->get("pageSize",15);
			if($p){
				$page = $p;
				$data = $this->notes_model->get_pageNotes($page,$pageSize);
				$data['assets'] = $this->assets;
				//$this->result_jsonCode($data);exit(0);
				$this->load->view('mobile/partial/ajaxnoteslist',$data);
			}

			
		}
		public function note($id) {
			$data['assets'] = $this->assets;
			$data["content"] = $this->notes_model->get_notes($id);
			//var_dump($data["content"]);exit(0);
			$data["user"] = $this->get_currentUser();
			$this->load->model('account_model');
			$info = $this->account_model->get_users($data["content"]["userId"]);
			//var_dump($data["content"]["scope"] ,$data["content"]["userId"],$data["user"]["userId"]);
			if($data["content"]["scope"] == '0' &&  $data["content"]["userId"]!=$data["user"]["userId"]){
				if(!$data["user"]["is_login"]){
					$this->checkLogin();
				}else{
					show_404();
				}
				return;
			}
			$data["com_user"] = array(
				"userId"=>$data["content"]["userId"],
				'userName'=>$info["username"],
				'intro' => $info["intro"],
				'email'=>$info["email"],
				'avatar'=>$info["avatar"],
				'is_login'=>true
				);
			// if($data["content"]['scope'] == '0' && $data["user"]["userId"] == $data["content"]["userId"]){
			// 	$this->checkLogin();
			// 	return;
			// }
			//$this->result_jsonCode($data);exit(0);
			if(count($data["content"])>0){
				$this->load->view('mobile/partial/note',$data);
			}else{
				show_404();
			}
		}
		public function mine() {
			$data['assets'] = $this->assets;
			$this->load->view('mobile/partial/mine',$data);
		}
		public function media() {
			$data['assets'] = $this->assets;
			$this->load->view('mobile/partial/media',$data);
		}
		public function write() {
			$data['assets'] = $this->assets;
			$this->load->view('mobile/partial/write',$data);
		}




		//登录
		public function login(){
			$this->form_validation->set_rules('username', '用户名', 'trim|required|xss_clean|callback_username_check',
				array('required' => '请填写用户名')
			);
			$this->form_validation->set_rules('password', '密码', 'trim|required|xss_clean|callback_password_check',
				array('required' => '请填写密码')
			);
			$this->_username = $this->input->post('username');
			if ($this->form_validation->run() == FALSE){
				$data["redirect"] = $this->input->get('redirect') ? $this->input->get('redirect') : "/index.php/mobile";
				$data["userName"] = $this->session->userdata("username");
				$data["error_msg"] = validation_errors();
				$this->result_jsonCode($data,FALSE);
				// $this->load->view('mobile/partial/write',$data);
				// $this->loadView('notes-login','login','account/login',$data);
			}else{
				$data["redirect"] = $this->input->post('redirect');
				$this->account_model->login($this->_username);
				$this->result_jsonCode($data,TRUE);
				//redirect($data["redirect"]);		
			}
		}
		public function username_check($username){
			if($this->account_model->get_by_username($username)){
				return TRUE;
			}else{
				$this->form_validation->set_message('username_check','用户名不存在！');
				return FALSE;
			}
		}
		public function password_check($password){
			$this->form_validation->set_message('password_check','用户名或密码错误');
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
	}