<?php
	class Media extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->checkLogin();
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
			//echo $this->upload_model->get_token();exit(0);
			$data["images"] = $this->media_model->get_yunImgInfo();
			$this->loadView('media','media','media/album',$data);
		}
		public function photo()
		{
			//echo $albumId;exit(0);
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_yunImgInfo();
			//var_dump($data);exit(0);
			$this->loadView('media','media','media/photo',$data);
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
		public function album($albumId)
		{
			//echo $albumId;exit(0);
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_yunImgInfo($albumId);
			//var_dump($data);exit(0);
			$this->loadView('media','media','media/photo',$data);
		}
		public function video()
		{
			//echo $albumId;exit(0);
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_video();
			//var_dump($data);exit(0);
			$this->loadView('media','media','media/video',$data);
		}
		public function addVideo()
		{
			$this->media_model->set_video_info();
		}
	}