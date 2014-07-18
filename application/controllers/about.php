<?php
	class About extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		}
		public function index()
		{

			$this->loadView('notes','about','about/index');
		}
	}