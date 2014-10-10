<?php

	class MY_Controller extends CI_Controller
	{
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->library('template');
		  	$this->load->library('session');
		  	$this->assets = '';
		  	date_default_timezone_set('UTC');
		  	$this->config->load('my_config',TRUE,TRUE);
		  	$this->app_ini = $this->config->item('my_config');
		}
		public function result_jsonCode($data = FALSE, $isSuccess = true)
		{
			
			$json = json_encode(array("content"=>$data,"success"=>$isSuccess));
			header('Content-type:text/json');
		   	echo $json;
		}
		public function result_jsonp($data = FALSE, $isSuccess = true)
		{
			$result = json_encode(array("content"=>$data,"success"=>$isSuccess));
		   	$callback=$this->input->get('callback');    
			echo $callback."($result)";  
		}
		public function get_currentUser()
		{	

			return array(
				"userId"=>$this->session->userdata('userId'),
				'username'=>$this->session->userdata('username'),
				'is_login'=>$this->session->userdata('logged_in'),
				'default_albumId'=>$this->session->userdata('default_albumId')
			);
		}
		public function varSet($name,$nStr)
		{
			return $this->template->set($name, $nStr);
		}
		public function loadView($title = '', $nav = '' , $viewName = '', $data = array(), $return = FALSE)
		{
			$this->template->set('title', $title);
			$this->template->set('nav', $nav);
			// $this->template->set('is_login',$this->session->userdata('logged_in'));

			// $this->template->set('username',$this->session->userdata('username'));
			//$this->user = $this->get_currentUser();

			$this->template->set_globals(array(
				'user' =>$this->get_currentUser(),
				'assets' =>$this->assets
			));
			$this->template->load('template', $viewName,$data);
		}

		public function checkLogin()
		{
			$this->load->helper('uri');
			if(!$this->session->userdata('logged_in'))
			{
				$redirect = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				
				if($this->input->is_ajax_request()) {
					echo '<script>window.location.href="http://'.$_SERVER['HTTP_HOST'].$this->assets.'/index.php/login";</script>';
					exit(0);
				}else{
					redirect('/index.php/account/login?redirect='.$redirect);
				}
				//redirect('/index.php/account/login?redirect='.$redirect);
			}

		}
		public function pagination($url = '/index.php/notes/?pg=true',$total=10,$per=2,$first_url='/index.php/notes/'){
			$this->load->library('pagination');
			$config['base_url'] = $url;
			$config['total_rows'] = $total;
			$config['per_page'] = $per; 
			$config['query_string_segment'] = 'p';
			$config['page_query_string'] = true;
			$config['first_url'] = $first_url;
			$this->pagination->initialize($config); 

			return $this->pagination->create_links();
		}
	}
	