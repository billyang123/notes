<?php
	class BaseController extends CI_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->library('template');
		}
		public function result_jsonCode($data = FALSE, $isSuccess == true)
		{
			
			$json = json_encode(array("content"=>$data,"success"=>$isSuccess));
			header('Content-type:text/json');
		   	echo $json;
		}
		public function loadView($title = '', $nav = '' , $viewName = '', $data = array(), $return = FALSE)
		{
			$this->template->set('title', $title);
			$this->template->set('nav', $nav);
			$this->template->load('template', $viewName,$data);
		}
	}