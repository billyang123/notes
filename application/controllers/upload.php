<?php
	class Upload extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	
		  	$this->load->model('upload_model');
		}
		public function index()
		{

			$data=$this->upload_model->upload();
			$this->result_jsonCode($data,true);
		}
		public function sign()
		{
			$data=$this->upload_model->signUpload();
			$this->result_jsonCode($data,true);
		}
		public function delete($id)
		{
			$result = $this->upload_model->delete_file($id);
			$this->result_jsonCode($result,"true");
		}		
	}