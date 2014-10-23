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
		public function signfiles()
		{
			$data = $this->upload_model->sign_files();
			$this->result_jsonCode($data,true);
		}
		public function deletefile($key=FALSE){
			if($key==FALSE) {
				//$this->result_jsonCode('缺少key',false);
				return $this->result_jsonCode('缺少key',false);;
			}
			$result = $this->upload_model->delete_wfile($key);
			$this->result_jsonCode($result,true);
		}		
	}