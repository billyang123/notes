<?php
	class Comment extends MY_Controller {
		function __construct()
		{
		  	parent::__construct();
		  	$this->load->spark('markdown/1.2.0');
		  	$this->load->model('comment_model');
		  	$this->load->library('session');
		}
		public function index($noteId=FALSE)
		{	
			$noteId = $this->input->get('noteId');
			$data["content"] = $this->comment_model->get_comment($noteId);
			// if($this->input->is_ajax_request())
			// {
			// 	$this->load->view('comment/index',$data);
			// }else{
			// 	$this->load->view('comment/index',$data);
			// }

			// var_dump($data["content"]);
			// echo '<br>';
			// var_dump($this->comment_model->get_comment());
			// exit(0);
			$data["assets"] = $this->assets;
			$data["user"] = $this->get_currentUser();
			$this->load->view('comment/index',$data);
			
		}
		public function add($noteId)
		{	$this->checkLogin();
			$data["content"] = $this->comment_model->set_comment($noteId);
			$data["user"] = $this->get_currentUser();
			$data["assets"] = $this->assets;
			$this->load->view('comment/index',$data);
		}
		public function reply($commentId)
		{
			$this->comment_model->set_comment($noteId);
		}
	}