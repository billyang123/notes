<?php
	class Extra extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		}
		public function index($id)
		{
			
			if(!isset($id)) return;
			$this->load->view('extra/myrecord');
			
		}
		public function resume($cid){
			switch ($cid) {
				case '1':
					$this->load->view('extra/myrecord');
					break;			
				default:
					$this->load->view('404');
					break;
			}
		}
	}