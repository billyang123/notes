<?php
	class Uploadgallery extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		 
		}
		public function index()
		{
			$data = array("assets"=>"");
			$this->loadView('notes-setting','setting','uploadgallery/index',$data);
		}		
	}