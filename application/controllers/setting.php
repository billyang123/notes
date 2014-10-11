<?php
	class Setting extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('account_model');
		  	$this->load->library('session');
		  	$this->checkLogin();
		}
		function index()
		{
			$userId= $this->session->userdata('userId');
			$data["userInfo"] = $this->account_model->get_users($userId);
			$this->loadView('notes-setting','setting','setting/index',$data);
		}
	}
