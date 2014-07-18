<?php
	class Media extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->model('media_model');
		  	$this->load->library('uploadtoken');
		}
		public function index()
		{
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_album();
			//var_dump($this->uploadtoken->get_token());exit(0);
			$data["token"] = $this->uploadtoken->get_token();
			//$this->result_jsonCode($data["content"]);exit(0);
			$this->loadView('media','media','media/index',$data);
		}
		public function createAlbum()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('albumName', 'albumName', 'trim|required|xss_clean');
			$this->form_validation->set_rules('albumDescription', 'albumDescription', 'trim|xss_clean');			
			if ($this->form_validation->run() == FALSE){
				$this->result_jsonCode("相册名不为空",false);	
				
			}else{
				if($this->media_model->add_album()){
					$this->result_jsonCode("保存成功",true);
				}else{
					$this->result_jsonCode("保存失败",false);
				}
			}
		}
	}