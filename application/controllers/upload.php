<?php
	class Upload extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('upload_model');
		}
		public function index()
		{
			$this->upload_model->upload();
		}

		
	}