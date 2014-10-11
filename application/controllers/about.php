<?php
	class About extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		}
		public function index()
		{

			$this->loadView('about of notes','about','about/index');
		}
	}