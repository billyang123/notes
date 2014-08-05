<?php
	class Write extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();

		  	$this->checkLogin();
		}
		public function index()
		{
			$this->template->set('title', 'Write');
			$this->template->set('nav', 'Write');
			$data['user'] = $this->get_currentUser();
			$this->loadView('Write','Write','write/index',$data);
		}
		
	}