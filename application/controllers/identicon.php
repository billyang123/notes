<?php

	class Identicon extends CI_Controller
	{
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->library('lidenticon');
		}
		public function show($uid,$size)
		{
			$uid = $this->input->get("uid");
			$size = $this->input->get("size");
			$key = md5($uid);
			$file = "u_identicon_$key.png";
			$this->lidenticon->init($file,$size);
		}

	}