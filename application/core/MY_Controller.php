<?php

	class MY_Controller extends CI_Controller
	{
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->library('template');
		  	$this->load->library('session');
		  	date_default_timezone_set('UTC');
		}
		public function result_jsonCode($data = FALSE, $isSuccess = true)
		{
			
			$json = json_encode(array("content"=>$data,"success"=>$isSuccess));
			header('Content-type:text/json');
		   	echo $json;
		}
		public function get_currentUser()
		{
			return array(
				"userId"=>$this->session->userdata('userId'),
				'username'=>$this->session->userdata('username'),
				'is_login'=>$this->session->userdata('logged_in')
			);
		}
		public function loadView($title = '', $nav = '' , $viewName = '', $data = array(), $return = FALSE)
		{
			$this->template->set('title', $title);
			$this->template->set('nav', $nav);
			// $this->template->set('is_login',$this->session->userdata('logged_in'));

			// $this->template->set('username',$this->session->userdata('username'));
			//$this->user = $this->get_currentUser();
			$this->template->set('user',$this->get_currentUser());
			$this->template->load('template', $viewName,$data);
		}
		public function checkLogin()
		{
			$this->load->helper('uri');
			if(!$this->session->userdata('logged_in'))
			{
				//$redirect = $this->uri->uri_string();
				$redirect = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				//var_dump('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				if($_SERVER['QUERY_STRING']){
					$redirect = '?' . $_SERVER['QUERY_STRING'];
				}
				if($this->input->is_ajax_request()) {
					echo '<script>window.location.href="http://'.$_SERVER['HTTP_HOST'].'/~apple/index.php/login";</script>';
					exit(0);
				}else{
					redirect('/index.php/account/login?redirect='.$redirect);
				}
				//redirect('/index.php/account/login?redirect='.$redirect);
			}

		}
	}
	