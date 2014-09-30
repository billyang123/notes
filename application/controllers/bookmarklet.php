<?php
	class Bookmarklet extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->library('session');
		  	$this->load->model('media_model');
		}
		public function index()
		{	
			$this->checkLogin();
			$data = $this->input->get();
			$data["user"] = $this->get_currentUser();
			$data["album"] = $this->media_model->get_album();
			//$this->result_jsonCode($data,true);
			$this->loadView('bookmarklet','bookmarklet','marklet/book',$data);
		}
	}