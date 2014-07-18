<?php
	class Index extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		}
		
		public function identicon(){
			$this->load->library("identicon");	
		}
	}