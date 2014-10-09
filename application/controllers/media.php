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
			$this->checkLogin();
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
			$this->checkLogin();
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_yunImgInfo();
			//var_dump($data);exit(0);
			$this->loadView('media','media','media/photo',$data);
		}
		public function createAlbum()
		{
			$this->checkLogin();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('albumName', 'albumName', 'trim|required|xss_clean');
			$this->form_validation->set_rules('albumDescription', 'albumDescription', 'trim|xss_clean');			
			if ($this->form_validation->run() == FALSE){
				$this->result_jsonCode(array('msg' => '保存失败'),false);		
			}else{
				if($albumId = $this->media_model->add_album()){
					$this->result_jsonCode(array('msg' => '保存成功','albumId' => $albumId),true);
				}else{
					$this->result_jsonCode("保存失败",false);
				}
			}
		}
		public function updateAlbum($id=FALSE)
		{
			if ($id==FALSE) {
				return FALSE;
			}
			$this->checkLogin();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('albumName', 'albumName', 'trim|required|xss_clean');
			$this->form_validation->set_rules('albumDescription', 'albumDescription', 'trim|xss_clean');
			if ($this->form_validation->run() == FALSE){
				$this->result_jsonCode(array('msg' => '保存失败'),false);		
			}else{
				if($albumId = $this->media_model->update_album($id) ){
					$this->result_jsonCode(array('msg' => '保存成功','albumId' => $albumId),true);
				}else{
					$this->result_jsonCode("保存失败",false);
				}
			}

		}
		public function deleteAlbum($id=FALSE)
		{
			if ($id==FALSE) {
				return FALSE;
			}
			$this->media_model->delete_album($id);
		}
		public function album($albumId)
		{
			$this->checkLogin();
			//echo $albumId;exit(0);
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_yunImgInfo($albumId);
			//var_dump($data);exit(0);
			$this->loadView('media','media','media/photo',$data);
		}

		public function video()
		{
			$this->checkLogin();
			//echo $albumId;exit(0);
			$data["user"] = $this->get_currentUser();
			$data["content"] = $this->media_model->get_video();
			//var_dump($data);exit(0);
			$this->loadView('media','media','media/video',$data);
		}
		public function addVideo()
		{
			$this->checkLogin();
			$this->media_model->set_video_info();
		}
		public function albumInfo(){
			$this->result_jsonCode($this->media_model->get_album(),true);
		}
	}